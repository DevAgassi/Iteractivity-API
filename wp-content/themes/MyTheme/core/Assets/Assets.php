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
        self::setDependencyHandle($deps);

        if (self::$isDevCache) {
            if (!file_exists(get_template_directory() . '/' . $path)) {
                return;
            }
            $manifest !== null && self::hotEnqueue($name, $manifest['url'] . '/' . $path, $deps_module);
            return;
        }

        if (!empty($path) && $manifest !== null && isset($manifest[$path])) {
            $js_file = $manifest[$path];

            // If there are module dependencies, enqueue as module
            wp_enqueue_script_module(
                $name,
                get_template_directory_uri() . '/dist/' . $js_file['file'],
                $deps_module,
                null,
                ['footer' => true]
            );

            // Only enqueue imports if script is not a module
            if (isset($js_file['imports'])) {
                foreach ($js_file['imports'] as $import) {
                    $file = $manifest[$import];
                    wp_enqueue_script_module(
                        $import,
                        get_template_directory_uri() . '/dist/' . $file['file'],
                        [$name],
                        null,
                        ['footer' => true]
                    );
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
    public static function enqueueEditorAssets(string|array $path, string $name): void
    {
        $manifest = self::getManifest();

        if ($manifest !== null && isset($manifest[$path])) {
            $file = $manifest[$path];

            if (isset($file)) {
                if (is_admin()) {
                    wp_enqueue_script(
                        $name,
                        get_template_directory_uri() . '/dist/' . $file['file'],
                        array('wp-blocks'),
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
     * Set dependency handles
     */
    protected static function setDependencyHandle(array $deps): void
    {
        if (empty($deps)) {
            return;
        }

        foreach ($deps as $dep) {
            match ($dep) {
                'jquery' => wp_enqueue_script('jquery'),
                default => null,
            };
        }
    }
}
