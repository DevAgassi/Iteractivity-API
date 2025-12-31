<?php

namespace App\Core\Blocks;

class BlockRegistry
{
    public static function init(): void
    {
        foreach (glob(get_template_directory() . '/blocks/*/block.json') as $file) {
            register_block_type($file);
        }
    }
}
