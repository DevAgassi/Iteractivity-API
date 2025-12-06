<?php

namespace MyTheme\Core;

/**
 * Class BlockRegistry
 *
 * Automatically discovers and registers all ACF blocks in the theme.
 *
 * Workflow:
 * 1. Scans blocks/* for *Block.php files
 * 2. Builds FQCN: MyTheme\Blocks\{Folder}\{BlockClass}
 * 3. Checks if the class exists and extends Block::class
 * 4. Reads metadata from block.json
 * 5. Registers the block via acf_register_block_type()
 *
 * @package MyTheme\Core
 */
class BlockRegistry
{
    /**
     * Namespace for all blocks
     */
    const BLOCKS_NAMESPACE = 'MyTheme\\Blocks';

    /**
     * Supported tags in DocBlock/JSON for ACF
     *
     * @var string[]
     */
    const SUPPORTED_TAGS = ['name', 'title', 'description', 'category', 'icon', 'keywords', 'mode', 'interactivity'];

    /**
     * Automatically discovers and registers all blocks
     *
     * @return void
     */
    public static function autoDiscoverAndRegister(): void
    {
        $blocks_dir = get_template_directory() . '/blocks/';
        $block_files = glob($blocks_dir . '*/*block.php');

        foreach ($block_files as $file) {
            $class_name_short = basename($file, '.php');
            $folder_name = basename(dirname($file));
            $fqcn = self::BLOCKS_NAMESPACE . '\\' . $folder_name . '\\' . $class_name_short;

            if (class_exists($fqcn) && is_subclass_of($fqcn, Block::class)) {
                self::registerBlock($fqcn, $folder_name, $blocks_dir);
            } else {
                error_log("Block registration failed: Class $fqcn not valid.");
            }
        }
    }

    /**
     * Registers a single block via ACF
     *
     * @param string $class_name Fully qualified class name
     * @param string $folder_name Block folder name
     * @param string $blocks_dir Base blocks directory
     * @return void
     */
    private static function registerBlock(string $class_name, string $folder_name, string $blocks_dir): void
    {
        $jsonContent = $blocks_dir . $folder_name . '/block.json';
        $gt_option = null;

        if (file_exists($jsonContent)) {
            $jsonContent = file_get_contents($jsonContent);
            $gt_option = json_decode($jsonContent, true);
        }

        if (!$gt_option) {
            error_log("Metadata is missing for block: $class_name");
            return;
        }

        if (!isset($gt_option['name']) || !isset($gt_option['title'])) {
            error_log("Required tags (@name, @title) missing for $class_name.");
            return;
        }

        \acf_register_block_type([
            'name'            => $gt_option['name'],
            'title'           => $gt_option['title'],
            'description'     => $gt_option['description'] ?? '',
            'category'        => $gt_option['category'] ?? 'layout',
            'mode'            => $gt_option['mode'] ?? 'auto',
            'icon'            => $gt_option['icon'] ?? 'star-filled',
            'keywords'        => $gt_option['keywords'] ?? 'main',
            'supports'        => $gt_option['supports'] ?? ["align" => true],

            /**
             * Render callback
             *
             * @param array $block Block data
             * @param string $content HTML content
             * @param bool $is_preview Preview mode
             * @param int $post_id Post ID
             * @return void
             */
            'render_callback' => function ($block, $content, $is_preview, $post_id) use ($class_name, $gt_option, $folder_name) {
                $block_instance = new $class_name();
                $base_dependencies = [];

                $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
                $manifest = [];
                if (file_exists($manifest_path)) {
                    $manifest = json_decode(file_get_contents($manifest_path), true);
                }

                $js_key = "blocks/{$folder_name}/index.js";
                if (isset($manifest[$js_key])) {
                    $js_file = $manifest[$js_key]['file'] ?? null;
                    if ($js_file && file_exists(get_template_directory() . '/dist/' . $js_file)) {
                        $handle = 'mytheme-block-' . $gt_option['name'] . '-view';

                        if (!empty($gt_option['interactivity'])) {
                            $base_dependencies[] = ['id' => '@wordpress/interactivity'];
                        }
                        wp_enqueue_script_module($handle, get_template_directory_uri() . '/dist/' . $js_file, $base_dependencies);
                    }
                }

                $css_files = $manifest[$js_key]['css'] ?? [];
                foreach ($css_files as $css_file) {
                    if ($css_file && file_exists(get_template_directory() . '/dist/' . $css_file)) {
                        $handle = 'mytheme-block-' . $gt_option['name'] . '-style';
                        wp_enqueue_style($handle, get_template_directory_uri() . '/dist/' . $css_file);
                    }
                }

                $block_instance->render();
            },
        ]);
    }
}
