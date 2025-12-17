<?php

namespace App\Blocks\Lead;

use App\Core\BaseBlock;

class Block extends BaseBlock
{

    /**
     * Global state (shared across all instances)
     */
    public function getInitialState(): array
    {
        $fields = get_fields() ?: [];
        
        return [
            'title' => $fields['title'] ?? '',
        ];
    }
}