<?php

/**
 * TemplateRegistry class
 * 
 * Handles custom template hierarchy and template-specific assets.
 * 
 * Template structure:
 * views/{template_name}/{template_name}.php   - PHP controller
 * views/{template_name}/{template_name}.twig  - Twig view
 * views/{template_name}/index.js              - JavaScript (optional)
 * views/{template_name}/index.scss            - Styles (optional)
 *
 * @package App\Core
 * @since 1.0.0
 */

namespace App\Core\Timber;

class TemplateRegistry
{
    /**
     * WordPress core template types
     *
     * @var array
     */
    private const TEMPLATE_TYPES = [
        'index',
        '404',
        'archive',
        'author',
        'category',
        'tag',
        'taxonomy',
        'date',
        'embed',
        'home',
        'frontpage',
        'privacypolicy',
        'page',
        'paged',
        'search',
        'single',
        'singular',
        'attachment',
    ];

    /**
     * Current template name (for asset loading)
     *
     * @var string|null
     */
    private static ?string $current_template = null;

    /**
     * Register template hierarchy hooks
     *
     * @since 1.0.0
     * @return void
     */
    public static function register(): void
    {
        foreach (self::TEMPLATE_TYPES as $type) {
            add_filter("{$type}_template_hierarchy", [self::class, 'modifyTemplatePath']);
        }

        // Enqueue template assets
        add_action('template_include', [self::class, 'setCurrentTemplate'], 1);
        add_action('wp_enqueue_scripts', [self::class, 'enqueueTemplateAssets']);
    }

    /**
     * Modify template paths to custom directory structure
     * 
     * Transforms:
     * - single.php -> views/single/single.php
     * - page-about.php -> views/page-about/page-about.php
     *
     * @since 1.0.0
     * @param array $templates List of template files
     * @return array Modified template paths
     */
    public static function modifyTemplatePath(array $templates): array
    {
        return array_map(function ($template) {
            $name = str_replace('.php', '', $template);
            return "views/{$name}/{$template}";
        }, $templates);
    }

    /**
     * Capture current template name for asset loading
     *
     * @param string $template Full template path
     * @return string Unchanged template path
     */
    public static function setCurrentTemplate(string $template): string
    {
        if ($template) {
            self::$current_template = basename(dirname($template));
        }

        return $template;
    }

    /**
     * Enqueue template-specific assets from Vite manifest
     *
     * Looks for:
     * - views/{template}/index.js in manifest
     * - Associated CSS files
     *
     * @since 1.0.0
     * @return void
     */
    public static function enqueueTemplateAssets(): void
    {
        if (! self::$current_template) {
            return;
        }

        $template = self::$current_template;
        $manifest = self::getManifest();

        if (empty($manifest)) {
            return;
        }

        // JavaScript
        $js_key = "views/{$template}/index.js";
        if (isset($manifest[$js_key])) {
            $js_file = $manifest[$js_key]['file'] ?? null;

            if ($js_file && self::assetExists($js_file)) {
                wp_enqueue_script_module(
                    "template-{$template}",
                    self::getDistUri($js_file)
                );
            }

            // CSS from JS manifest entry
            $css_files = $manifest[$js_key]['css'] ?? [];
            foreach ($css_files as $css_file) {
                if (self::assetExists($css_file)) {
                    wp_enqueue_style(
                        "template-{$template}-style",
                        self::getDistUri($css_file)
                    );
                }
            }
        }
    }

    /**
     * Get Vite manifest
     *
     * @return array
     */
    private static function getManifest(): array
    {
        $manifest_path = get_template_directory() .'/dist/.vite/manifest.json';

        if (!file_exists($manifest_path)) {
            return [];
        }

        $content = file_get_contents($manifest_path);
        return json_decode($content, true) ?: [];
    }

    /**
     * Check if asset file exists
     *
     * @param string $file Relative file path
     * @return bool
     */
    private static function assetExists(string $file): bool
    {
        return file_exists(get_template_directory() .'/dist/' .$file);
    }

    /**
     * Get full URI for dist file
     *
     * @param string $file Relative file path
     * @return string Full URI
     */
    private static function getDistUri(string $file): string
    {
        return get_template_directory_uri() .'/dist/' .$file;
    }
}