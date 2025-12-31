<?php

namespace App\Core\Assets;

abstract class AbstractAssets
{
    protected static ?array $manifestCache = null;
    public static ?bool  $isDevCache    = null;

    protected static function manifest(): array|null
    {
        try {
            if (self::$manifestCache !== null) {
                return self::$manifestCache;
            }

            $path = static::isHot()
                ? get_stylesheet_directory() . '/dist/hot'
                : get_stylesheet_directory() . '/dist/manifest.json';

            if (!is_readable($path)) {
                throw new \RuntimeException('Vite manifest file not readable: ' . $path);
            }

            $json = file_get_contents($path);

            if (json_validate($json)) {
                $data = json_decode($json, true);
            } else {
                $data['url'] = $json;
            }

            return self::$manifestCache = $data;
        } catch (\RuntimeException $e) {
            AssetsErrorHandler::handle($e);
            return null;
        }
    }

    public static function getManifest(): array|null
    {
        return static::manifest();
    }

    public static function render(): array
    {
        $assets = [];
        $manifest = static::manifest();

        if (static::isHot() && isset($manifest['url'])) {
            $assets['client'] = $manifest['url'] . '/@vite/client';
        }

        return $assets;
    }

    public static function isHot(): bool
    {
        if (self::$isDevCache !== null) {
            return self::$isDevCache;
        }

        return self::$isDevCache = file_exists(
            get_stylesheet_directory() . '/dist/hot'
        );
    }
}
