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

namespace App\Core;

class Assets
{
    /**
     * Path to manifest from theme root
     */
    private const MANIFEST_PATH = '/dist/.vite/manifest.json';

    /**
     * Cached manifest data
     *
     * @var array|null
     */
    private static ?array $manifest = null;

    /**
     * Get the manifest array
     *
     * @return array Manifest data or empty array on error
     */
    public static function getManifest(): array
    {
        if (self::$manifest !== null) {
            return self::$manifest;
        }

        $path = get_template_directory() .self::MANIFEST_PATH;

        if (!file_exists($path)) {
            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log("Assets Error: Manifest not found at {$path}");
            }
            return [];
        }

        $content = file_get_contents($path);
        self::$manifest = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("Assets Error: JSON decode failed - " .json_last_error_msg());
            self::$manifest = [];
        }

        return self::$manifest;
    }

    /**
     * Get full URI for an asset by manifest key
     *
     * @param string $key Asset key (e.g., 'blocks/Hero/index.js')
     * @return string|null Full URI or null if not found
     */
    public static function getUri(string $key): ?string
    {
        $manifest = self::getManifest();

        if (! isset($manifest[$key]['file'])) {
            return null;
        }

        return get_template_directory_uri() .'/dist/' .$manifest[$key]['file'];
    }

    /**
     * Get CSS files associated with a JS entry
     *
     * @param string $key JS asset key
     * @return array Array of CSS URIs
     */
    public static function getCssUris(string $key): array
    {
        $manifest = self::getManifest();
        $css_files = $manifest[$key]['css'] ?? [];

        return array_map(function ($file) {
            return get_template_directory_uri() .'/dist/' .$file;
        }, $css_files);
    }

    /**
     * Check if asset exists in manifest
     *
     * @param string $key Asset key
     * @return bool
     */
    public static function exists(string $key): bool
    {
        $manifest = self::getManifest();
        return isset($manifest[$key]);
    }
}