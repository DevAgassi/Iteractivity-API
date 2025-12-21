<?php

namespace App\Blocks\Lead;

use App\Core\BaseBlock;

class Block extends BaseBlock
{

    /**
     * Global state (shared across all instances)
     */
    protected function getContext(): array
    {
        return [
            'title' => $this->timber_context['fields']['title'] ?? '',
        ];
    }
}
