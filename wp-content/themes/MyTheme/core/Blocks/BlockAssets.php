<?php

namespace App\Core\Blocks;

use App\Core\Debug;

class BlockAssets
{
    public static function enqueueBlockDependency(array $dependencies, array $dependencies_module, string $script_path): void
    {
        $vite = apply_filters('theme/container', null)?->getService('assets');

        $start_time = Debug::isEnabled() ? microtime(true) : null;
        $manifest = $vite->getManifest();
        $assets = [];

        if ($vite->isDevCache) {
            $assets = 'blocks/' . $script_path;
        } else {
            $path = 'blocks/' . $script_path;
            isset($manifest[$path]) ?
                $assets = $path : null;
        }

        $vite->enqueueAssets($assets, 'blocks/' . $script_path, $dependencies, $dependencies_module);

        if ($start_time !== null) {
            $duration = (microtime(true) - $start_time) * 1000;
            Debug::logBlockAssets($duration);
        }
    }

    /* public static function enqueueFromManifest(string $script_path): void
    {
        $manifest = Vite::getManifest();

        wp_enqueue_script_module(
            $script_path,
            get_stylesheet_directory_uri() . '/dist/' . $manifest[$script_path]['file'],
            [],
            null,
            ['footer' => true]
        );

        if (isset($manifest[$script_path]['css'])) {
            foreach ($manifest[$script_path]['css'] as $css) {
                wp_enqueue_style($css, get_stylesheet_directory_uri() . '/dist/' . $css, [], null);
            }
        }

        if (isset($manifest[$script_path]['imports'])) {
            foreach ($manifest[$script_path]['imports'] as $import) {
                $file = $manifest[$import];
                wp_enqueue_script_module(
                    $import,
                    get_stylesheet_directory_uri() . '/dist/' . $file['file'],
                    [$script_path],
                    null,
                    ['footer' => true]
                );
            }
        }
    }*/
}
