<?php

/**
 * Assets class
 * 
 * Handles Vite-compiled assets using manifest.json.
 * Provides URI resolution for compiled files.
 *
 * @package App\Core
 * @since 1.0.0
 */

namespace App\Core\Assets;

class Assets extends AbstractAssets
{
    /**
     * Enqueue assets based on Vite manifest
     */
    public static function enqueueAssets(string|array $path, string $name, array $deps = [], array $deps_module = []): void
    {
        $manifest = self::getManifest();
        if (self::$isDevCache) {
            $manifest !== null && self::hotEnqueue($name, $manifest['url'] . '/' . $path, $deps_module);
            return;
        }

        self::setDependencyHandle($deps);

        if (!empty($path) && $manifest !== null && isset($manifest[$path])) {
            $js_file = $manifest[$path];


            wp_enqueue_script_module($name,  get_template_directory_uri() . '/dist/' . $js_file['file'], $deps_module, null, ['footer' => true]);

            if (isset($js_file['imports'])) {
                foreach ($js_file['imports'] as $import) {
                    wp_enqueue_script($import, get_template_directory_uri() . '/dist/' . $import, ['main'], null, true);
                }
            }

            if (isset($js_file['css'])) {
                foreach ($js_file['css'] as $css) {
                    wp_enqueue_style($css, get_template_directory_uri() . '/dist/' . $css, [], null);
                }
            }
        }
    }

    /**
     * Enqueue editor-specific styles from manifest
     */
    public static function enqueueEditorStyles(string|array $path): void
    {
        $manifest = self::getManifest();

        if ($manifest !== null && isset($manifest[$path])) {
            $file = $manifest[$path];

            if (isset($file)) {
                if (is_admin()) {
                    add_editor_style('/dist/' . $file['file']);
                }
            }
        }
    }

    /**
     * Enqueue editor-specific styles from manifest
     */
    public static function enqueueEditorAssets(string|array $path): void
    {
        $manifest = self::getManifest();

        if ($manifest !== null && isset($manifest[$path])) {
            $file = $manifest[$path];

            if (isset($file)) {
                if (is_admin()) {
                    wp_enqueue_script(
                        'editor-fix',
                        get_template_directory_uri() . '/dist/' . $file['file'],
                        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post', 'wp-editor'),
                        filemtime(get_template_directory() . '/dist/' . $file['file'])
                    );

                    if (isset($file['css'])) {
                        foreach ($file['css'] as $css) {
                            add_editor_style('/dist/' . $css);
                        }
                    }
                }
            }
        }
    }

    /**
     * Enqueue assets in development mode
     */
    protected static function hotEnqueue(string $name, string $file_url, array $deps_module = []): void
    {
        wp_enqueue_script_module($name, $file_url, $deps_module, null, ['footer' => true]);
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
    protected static function enqueueSwiperDependency(): void
    {

        if (!isset($manifest['assets/scripts/swiper.js'])) {
            error_log("Swiper global script not found in manifest");
            return;
        }

        // Register and enqueue Swiper global script
        // No dependencies for Swiper itself
        wp_register_script(
            'swiper',
            get_template_directory_uri() . '/dist/' . $manifest['assets/scripts/swiper.js']['file'],
            [], // No dependencies for Swiper itself
            null,
            true // Load in footer
        );
        if (!is_admin()) {
            wp_enqueue_script('swiper');
        }

        if (isset($manifest['assets/scripts/swiper.js']['css'])) {
            foreach ($manifest['assets/scripts/swiper.js']['css'] as $css) {
                wp_enqueue_style($css, get_template_directory_uri() . '/dist/' . $css, [], null);
            }
        }
    }

    /**
     * Set dependency handles
     */
    protected static function setDependencyHandle(array $deps): void
    {
        if (empty($deps)) {
            return;
        }

        foreach ($deps as $dep) {
            match ($dep) {
                'swiper' => self::enqueueSwiperDependency(),
                'jquery' => wp_enqueue_script('jquery'),
                default => null,
            };
        }
    }
}
