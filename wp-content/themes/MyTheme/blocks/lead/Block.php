<?php

namespace App\Blocks\Lead;

use App\Core\Blocks\BaseBlock;

class Block extends BaseBlock
{
    public string $blockName = 'lead';

    /**
     * Per-instance context
     */
    protected function getContext(): array
    {
        $this->classes = 'lead-content';
        $fields = $this->timber_context['fields'] ?? [];

        return [
            'text' => $fields['lead'] ?? '',
            'is_modal_open' => false,
        ];
    }
}
