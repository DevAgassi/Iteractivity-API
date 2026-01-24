<?php

namespace App\Blocks\MainColumn;

use App\Core\Blocks\BaseBlock;

class Block extends BaseBlock
{
    public string $blockName = 'mainColumn';

    /**
     * Per-instance context
     */
    protected function getContext(): array
    {
        $this->classes = 'mainColumn-block';

        return [
            'container_size' => $this->timber_context['fields']['container_size'] ?? 'normal',
            'id' => $this->timber_context['fields']['id'] ?? uniqid(),
        ];
    }
}
