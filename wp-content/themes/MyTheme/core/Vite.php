<?php

namespace App\Core;

class Vite
{
    public static function hotFile(): string
    {
        return get_stylesheet_directory() . '/dist/hot';
    }

    protected static function manifest(): string
    {
        return get_stylesheet_directory() . '/dist/.vite/manifest.json';
    }

    public static function isHot(): bool
    {
        return file_exists(static::hotFile());
    }

    public static function hotUrl(): string
    {
        return trim(file_get_contents(static::hotFile()));
    }

    public static function assets(): array
    {
        if (static::isHot()) {
            $base = static::hotUrl();

            return [
                'client' => $base . '@vite/client'
            ];
        }

        return [];
    }
}
