<?php

namespace App\Core\Blocks;

use App\Core\Debug;
use App\Core\Assets\Assets;

class BlockAssets
{
    public static function enqueueBlockDependency(array $dependencies, array $dependencies_module, string $script_path): void
    {
        $start_time = Debug::isEnabled() ? microtime(true) : null;
        $manifest = Assets::getManifest();
        $assets = [];


        if (Assets::$isDevCache) {
            $assets = 'blocks/' . $script_path;
        } else {
            $path = 'blocks/' . $script_path;
            isset($manifest[$path]) ?
                $assets = $path : null;
        }

        Assets::enqueueAssets($assets, 'blocks/' . $script_path, $dependencies, $dependencies_module);

        if ($start_time !== null) {
            $duration = (microtime(true) - $start_time) * 1000;
            Debug::logBlockAssets($duration);
        }
    }
}
