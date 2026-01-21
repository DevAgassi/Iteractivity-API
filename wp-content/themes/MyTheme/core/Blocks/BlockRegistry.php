<?php

namespace App\Core\Blocks;

class BlockRegistry
{
    public static function init(): void
    {
        /** Register block categories */
        self::registerBlockCategories();

        /**
         * Register blocks by scanning the blocks directory for block.json files
         */
        foreach (glob(get_template_directory() . '/blocks/*/block.json') as $file) {
            register_block_type($file);
        }
    }

    /**
     * Register custom block categories
     */
    public static function registerBlockCategories(): void
    {
        add_filter('block_categories_all', function ($categories) {
            return array_merge(
                $categories,
                array(
                    array(
                        'slug'  => 'custom-content',
                        'title' => __('Content', 'mytheme'),
                        'icon'  => null,
                    ),
                    array(
                        'slug'  => 'custom-layout',
                        'title' => __('Layout', 'mytheme'),
                        'icon'  => null,
                    ),
                )
            );
        }, 10);
    }
}
