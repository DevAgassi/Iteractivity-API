<?php

namespace App\Core;

/**
 * Class BlockRegistry
 *
 * Automatically discovers and registers all ACF blocks in the theme.
 * Handles block registration, asset enqueueing, and dependency management.
 *
 * Workflow:
 * 1. Scans blocks/* directory for block.json files
 * 2. Builds FQCN: App\Blocks\{FolderName}\Block
 * 3. Registers block type with WordPress/ACF
 * 4. Enqueues block assets (CSS/JS) on wp_enqueue_scripts hook
 * 5. Manages block dependencies (Swiper, jQuery, etc.)
 *
 * @package App\Core
 * @since 1.0.0
 */
class BlockRegistry
{
    /**
     * Base namespace for all blocks
     */
    const BLOCKS_NAMESPACE = 'App\\Blocks';

    /**
     * Blocks directory relative path
     */
    const BLOCKS_DIR = '/blocks/';

    /**
     * Vite manifest path
     */
    const MANIFEST_PATH = '/dist/.vite/manifest.json';

    /**
     * Cached manifest data
     *
     * @var array|null
     */
    private static ?array $manifestCache = null;

    /**
     * Cached blocks data
     *
     * @var array|null
     */
    private static ?array $blocksDataCache = null;

    /**
     * Supported tags in DocBlock/JSON for ACF
     *
     * @var string[]
     */
    const SUPPORTED_TAGS = ['name', 'title', 'description', 'category', 'icon', 'keywords', 'mode', 'interactivity'];

    /**
     * Auto-discover and register all blocks
     * 
     * This method scans the blocks directory, instantiates block classes,
     * and registers them with WordPress/ACF. Also hooks assets enqueueing.
     *
     * @return void
     */
    public static function autoDiscoverAndRegister(): void
    {
        $start_time = microtime(true);

        foreach (self::getBlocksData() as $block_data) {
            self::registerBlock($block_data['folder_path'], $block_data['folder_name']);
        }

        $end_time = microtime(true);
        $duration = $end_time - $start_time;
        error_log("<!-- WP Register blocks time: " . round($duration * 1000, 2) . " ms -->");

        // Hook assets enqueueing to wp_enqueue_scripts
        add_action('wp_enqueue_scripts', [self::class, 'enqueueBlockAssets']);
    }

    /**
     * Enqueue all block assets on wp_enqueue_scripts hook
     * 
     * This is critical for Timber cached content - assets must be ready
     * before wp_head fires, not during block rendering.
     * 
     * IMPORTANT: Does NOT enqueue wp-blocks by default (avoids loading React, Redux, etc.)
     * Only enqueues actual block dependencies that are explicitly defined.
     * 
     * For each block:
     * - Enqueues dependencies FIRST
     * - Collects block dependencies and maps them to script handles
     * - Enqueues block CSS with proper URIs from manifest
     * - Enqueues block JS with dependency ordering
     *
     * @return void
     */
    public static function enqueueBlockAssets(): void
    {
        $manifest = self::loadManifest();
        $enqueued_deps = [];

        foreach (self::getBlocksData() as $block_data) {
            $folder_name = $block_data['folder_name'];
            $class_name = $block_data['class_name'];

            // Start with empty dependencies (don't bloat with wp-blocks)
            $script_dependencies = [];

            if (class_exists($class_name)) {
                $block_instance = new $class_name();

                // Enqueue dependencies FIRST and collect handles
                foreach ($block_instance->getDependencies() as $dep) {
                    // Only enqueue each dependency once
                    if (!isset($enqueued_deps[$dep])) {
                        $dep_handle = self::getDependencyHandle($dep);
                        // Enqueue the dependency itself
                       
                        self::enqueueDependency($dep, $manifest);
                        if ($dep_handle) {
                            $enqueued_deps[$dep] = $dep_handle;
                        }
                    }
    
                    // Add to block's script dependencies
                    if (isset($enqueued_deps[$dep])) {
                        $script_dependencies[] = $enqueued_deps[$dep];
                    }
                }
            }

            // Enqueue block CSS
            self::enqueueBlockStyle($folder_name, $manifest);

            // Enqueue block JS with dependency ordering
            self::enqueueBlockScript($folder_name, $script_dependencies, $manifest);
        }
    }

    /**
     * Get all blocks data from the blocks directory
     * 
     * Scans the blocks directory once and caches result in memory.
     * Returns structured data for each block including folder path, name,
     * class name, and parsed block.json metadata.
     *
     * @return array Array of block data arrays with keys: folder_path, folder_name, class_name, metadata
     */
    private static function getBlocksData(): array
    {
        if (self::$blocksDataCache !== null) {
            return self::$blocksDataCache;
        }

        $blocks_dir = get_template_directory() . self::BLOCKS_DIR;
        $block_json_files = glob($blocks_dir . '*/block.json');
        $blocks_data = [];

        foreach ($block_json_files as $file) {
            $folder_path = dirname($file);
            $folder_name = basename($folder_path);
            $class_name = self::BLOCKS_NAMESPACE . '\\' . $folder_name . '\\Block';

            if (class_exists($class_name)) {
                $metadata = json_decode(file_get_contents($file), true);

                $blocks_data[] = [
                    'folder_path' => $folder_path,
                    'folder_name' => $folder_name,
                    'class_name' => $class_name,
                    'metadata' => $metadata ?? [],
                ];
            } else {
                error_log("Block class $class_name not found in $folder_path");
            }
        }

        self::$blocksDataCache = $blocks_data;
        return $blocks_data;
    }

    /**
     * Load and cache the Vite manifest
     * 
     * Reads the Vite manifest.json file once and caches it in memory
     * to avoid multiple filesystem reads.
     *
     * @return array Manifest data or empty array if not found
     */
    private static function loadManifest(): array
    {
        if (self::$manifestCache !== null) {
            return self::$manifestCache;
        }

        $manifest_path = get_template_directory() . self::MANIFEST_PATH;

        if (!file_exists($manifest_path)) {
            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log("Manifest not found at: $manifest_path");
            }
            self::$manifestCache = [];
            return [];
        }

        $content = file_get_contents($manifest_path);
        self::$manifestCache = json_decode($content, true) ?? [];

        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("Manifest JSON decode failed: " . json_last_error_msg());
            self::$manifestCache = [];
        }

        return self::$manifestCache;
    }

    /**
     * Enqueue block CSS
     * 
     * Registers and enqueues the block's stylesheet based on manifest entry.
     *
     * @param string $folder_name Block folder name
     * @param array $manifest Vite manifest data
     * @return void
     */
    private static function enqueueBlockStyle(string $folder_name, array $manifest): void
    {
        $css_key = "blocks/{$folder_name}/index.scss";

        if (!isset($manifest[$css_key])) {
            return;
        }

        $style_handle = 'block-' . $folder_name . '-style';
        wp_enqueue_style(
            $style_handle,
            get_template_directory_uri() . '/dist/' . $manifest[$css_key]['file'],
            [],
            null
        );
    }

    /**
     * Enqueue block script with dependencies
     * 
     * Registers and enqueues the block's JavaScript with proper dependency ordering.
     * Dependencies ensure scripts load in correct order.
     * 
     * Only enqueues actual dependencies defined in block's getDependencies().
     * Does NOT add wp-blocks to keep frontend slim (avoids React, Redux, etc.)
     * Automatically detects if block uses Interactivity API and uses module registration.
     * Important: All dependencies are already enqueued before this runs.
     *
     * @param string $folder_name Block folder name
     * @param array $script_dependencies Array of dependency handles
     * @param array $manifest Vite manifest data
     * @return void
     */
    private static function enqueueBlockScript(string $folder_name, array $script_dependencies, array $manifest): void
    {
        $js_key = "blocks/{$folder_name}/index.js";

        if (!isset($manifest[$js_key])) {
            return;
        }

        $script_handle = 'block-' . $folder_name . '-script';

        // Ensure all dependencies are in the array (avoid duplicates)
        $script_dependencies = array_unique($script_dependencies);

        // Check if block uses Interactivity API
        $uses_interactivity = in_array('wp-interactivity', $script_dependencies);
                             
        // For blocks using Interactivity API, use wp_enqueue_script_module
        if ($uses_interactivity && function_exists('wp_enqueue_script_module')) {
            // Convert handles to module handles (add @ prefix for WordPress modules)
            $module_dependencies = array_map(function ($dep) {
                return str_starts_with($dep, '@') ? $dep : '@wordpress/interactivity';
            }, $script_dependencies);
 
            wp_enqueue_script_module(
                $script_handle,
                get_template_directory_uri() . '/dist/' . $manifest[$js_key]['file'],
                $module_dependencies,
                '1.0.0',
              array('in_footer' => false)
            );
        } else {
            // Regular script registration for non-interactivity blocks
            // Empty dependencies array if no dependencies defined
            wp_register_script(
                $script_handle,
                get_template_directory_uri() . '/dist/' . $manifest[$js_key]['file'],
                $script_dependencies, // Can be empty array
                null,
                true // Load in footer
            );
            wp_enqueue_script($script_handle);
        }
    }

    /**
     * Get WordPress script handle for a dependency name
     * 
     * Maps dependency names (e.g., 'swiper') to their registered WordPress handles.
     *
     * @param string $dep Dependency name (e.g., 'swiper', 'jquery', 'interactivity')
     * @return string|null Script handle or null if mapping not found
     */
    private static function getDependencyHandle(string $dep): ?string
    {
        return match ($dep) {
            'swiper' => 'swiper-global',
            'jquery' => 'jquery',
            'wp-interactivity' => 'wp-interactivity',
            default => null,
        };
    }

    /**
     * Register a single block with WordPress
     * 
     * Registers the block type with custom render callback that instantiates
     * the block class and calls its render method (Timber-based).
     * 
     * Assets (style/view_script) are NOT set here because they're enqueued
     * on wp_enqueue_scripts hook instead of during block rendering.
     *
     * @param string $folder_path Absolute path to block folder
     * @param string $folder_name Block folder name
     * @return void
     */
    private static function registerBlock(string $folder_path, string $folder_name): void
    {
        $class_name = self::BLOCKS_NAMESPACE . '\\' . $folder_name . '\\Block';

        register_block_type($folder_path, [
            'style' => null,       // Assets enqueued on wp_enqueue_scripts hook
            'view_script' => null, // Assets enqueued on wp_enqueue_scripts hook
            'render_callback' => function ($attributes, $content, $is_preview, $post_id, $block) use ($folder_name, $class_name) {
                return self::renderBlock($class_name, $folder_name, $block, $is_preview);
            },
        ]);
    }

    /**
     * Render a block by instantiating its class and calling render()
     * 
     * Creates a block instance, sets its data from the block object,
     * and calls its render method. The block class should return a string
     * from its render() method, not echo.
     *
     * @param string $class_name Fully qualified block class name
     * @param string $folder_name Block folder name
     * @param object $block WordPress block object with parsed_block data
     * @param bool $is_preview Whether rendering in preview mode
     * @return string Rendered block HTML
     */
    private static function renderBlock(string $class_name, string $folder_name, object $block, bool $is_preview): string
    {
        if (!class_exists($class_name)) {
            return "Block class $class_name not found.";
        }

        try {
            $block_instance = new $class_name();
            $block_instance->setFolder($folder_name);
            $block_instance->setBlock($block->parsed_block);
            $block_instance->setIsPreview($is_preview);

            $rendered = $block_instance->render();

            // Ensure return value is always a string
            return is_string($rendered) ? $rendered : '';
        } catch (\Exception $e) {
            error_log("Block rendering error for {$class_name}: " . $e->getMessage());
            return '';
        }
    }

    /**
     * Enqueue a block dependency
     * 
     * Handles enqueueing of common dependencies like Swiper, jQuery, and
     * WordPress Interactivity API. Resolves asset URIs from Vite manifest.
     *
     * @param string $dep Dependency identifier (e.g., 'swiper', 'jquery', 'interactivity')
     * @param array $manifest Vite manifest data for asset resolution
     * @return void
     */
    private static function enqueueDependency(string $dep, array $manifest): void
    {
        match ($dep) {
            'swiper' => self::enqueueSwiperDependency($manifest),
            'jquery' => wp_enqueue_script('jquery'),
            default => null,
        };
    }

    /**
     * Enqueue Swiper library and styles
     * 
     * Enqueues both the Swiper JavaScript library and its CSS from manifest.
     * Ensures Swiper is always available before other scripts that depend on it.
     *
     * @param array $manifest Vite manifest data
     * @return void
     */
    private static function enqueueSwiperDependency(array $manifest): void
    {
        if (!isset($manifest['assets/scripts/swiper-global.js'])) {
            error_log("Swiper global script not found in manifest");
            return;
        }

        // Register and enqueue Swiper global script
        // No dependencies for Swiper itself
        wp_register_script(
            'swiper-global',
            get_template_directory_uri() . '/dist/' . $manifest['assets/scripts/swiper-global.js']['file'],
            [], // No dependencies for Swiper itself
            null,
            true // Load in footer
        );

        wp_enqueue_script('swiper-global');

        // Enqueue Swiper CSS
        if (isset($manifest['assets/styles/swiper-global.css'])) {
            wp_register_style(
                'swiper-global',
                get_template_directory_uri() . '/dist/' . $manifest['assets/styles/swiper-global.css']['file'],
                [],
                null
            );
            wp_enqueue_style('swiper-global');
        }
    }
}
