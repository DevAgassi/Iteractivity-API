<?php

namespace App\Core\Vite;

abstract class BaseVite
{
    protected ?array $manifestCache = null;
    public ?bool  $isDevCache    = null;

    protected function manifest(): array|null
    {
        try {
            if ($this->manifestCache !== null) {
                return $this->manifestCache;
            }

            $path = $this->isHot()
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

            return $this->manifestCache = $data;
        } catch (\RuntimeException $e) {
            ViteErrorHandler::handle($e);
            return null;
        }
    }

    public function getManifest(): array|null
    {
        return $this->manifest();
    }

    public function render(): array
    {
        $assets = [];
        $manifest = $this->manifest();

        if ($this->isHot() && isset($manifest['url'])) {
            $assets['client'] = $manifest['url'] . '/@vite/client';
        }

        return $assets;
    }

    public function isHot(): bool
    {
        if ($this->isDevCache !== null) {
            return $this->isDevCache;
        }

        return $this->isDevCache = file_exists(
            get_stylesheet_directory() . '/dist/hot'
        );
    }
}
