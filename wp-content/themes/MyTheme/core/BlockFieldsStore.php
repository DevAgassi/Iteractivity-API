<?php

namespace App\Core;

/**
 * Preloads ALL ACF block fields for a post in ONE SQL query
 */
class BlockFieldsStore
{
    protected static bool $loaded = false;

    /**
     * Fields indexed by block_id
     * [
     *   'block_abc123' => [ field => value ]
     * ]
     */
    protected static array $fields = [];

    public static function preload(int $post_id): void
    {
        if (self::$loaded) {
            return;
        }

        $meta = get_post_meta($post_id);

        foreach ($meta as $key => $value) {
            if (str_starts_with($key, 'block_')) {
                self::$fields[$key] = maybe_unserialize($value[0]);
            }
        }

        self::$loaded = true;
    }

    public static function get(string $block_id): array
    {
        return self::$fields[$block_id] ?? [];
    }
}
