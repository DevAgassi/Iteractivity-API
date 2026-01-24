<?php

/**
 * Vite class
 * 
 * Handles Vite-compiled assets using manifest.json.
 * Provides URI resolution for compiled files.
 *
 * @package App\Core
 * @since 1.0.0
 */

namespace App\Core\Vite;

class Vite extends BaseVite
{
    /**
     * Tracks already loaded assets to prevent duplicates
     *
     * @var array<string, bool>
     */
    private array $loadedAssets = [];

    /**
     * Enqueue assets (entry point)
     */
    public function enqueueAssets(string|array $path, string $name, array $deps = [], array $deps_module = []): void
    {
        if ($this->isLoaded($name)) {
            return;
        }

        if ($this->isHot()) {
            $this->enqueueHotAsset($path, $name, $deps_module);
        } else {
            $this->enqueueProdAsset($path, $name, $deps, $deps_module);
        }
    }

    /**
     * Enqueue asset for Vite dev server (hot reload)
     */
    private function enqueueHotAsset(string|array $path, string $name, array $deps_module = []): void
    {
        $full_path = get_template_directory() . '/' . $path;
        if (!file_exists($full_path)) {
            return;
        }

        $manifest = $this->getManifest();
        $manifest !== null && $this->hotEnqueue($name, $manifest['url'] . '/' . $path, $deps_module);

        $this->markAsLoaded($name);
    }

    /**
     * Enqueue asset for production (manifest)
     */
    private function enqueueProdAsset(string|array $path, string $name, array $deps = [], array $deps_module = []): void
    {
        $manifest = $this->getManifest();
        $this->setDependencyHandle($deps);

        if (empty($path) || $manifest === null || !isset($manifest[$path])) {
            return;
        }

        $asset = $manifest[$path];

        wp_enqueue_script_module(
            $name,
            get_template_directory_uri() . '/dist/' . $asset['file'],
            $deps_module,
            null,
            ['footer' => true]
        );

        $this->enqueueChunks($asset, $manifest, $name);

        $this->markAsLoaded($name);
    }

    /**
     * Enqueue asset chunks: imports & CSS
     *
     * @param array $asset    Manifest entry for the main asset
     * @param array $manifest Full Vite manifest
     * @param string $parent  Parent handle for dependencies
     */
    private function enqueueChunks(array $asset, array $manifest, string $parent): void
    {
        // Enqueue module imports
        if (!empty($asset['imports'])) {
            foreach ($asset['imports'] as $import) {
                if (!isset($manifest[$import])) {
                    continue;
                }

                $import_file = $manifest[$import];

                wp_enqueue_script_module(
                    $import,
                    get_template_directory_uri() . '/dist/' . $import_file['file'],
                    [$parent],
                    null,
                    ['footer' => true]
                );

                $this->markAsLoaded($import);

                // Recursive imports (optional, якщо є nested imports)
                if (!empty($import_file['imports'])) {
                    $this->enqueueChunks($import_file, $manifest, $import);
                }
            }
        }

        // Enqueue CSS
        if (!empty($asset['css'])) {
            foreach ($asset['css'] as $css) {
                if ($this->isLoaded($css)) {
                    continue;
                }

                wp_enqueue_style($css, get_template_directory_uri() . '/dist/' . $css, [], null);

                $this->markAsLoaded($css);
            }
        }
    }

    /**
     * Enqueue assets in development mode
     */
    protected function hotEnqueue(string $name, string $file_url, array $deps_module = []): void
    {
        wp_enqueue_script_module($name, $file_url, $deps_module, null, ['footer' => true]);
    }

    /**
     * Set dependency handles
     */
    protected function setDependencyHandle(array $deps): void
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

    /**
     * Check if asset is already loaded
     */
    private function isLoaded(string $handle): bool
    {
        return isset($this->loadedAssets[$handle]);
    }

    /**
     * Mark asset as loaded
     */
    private function markAsLoaded(string $handle): void
    {
        $this->loadedAssets[$handle] = true;
    }
}
