<?php

namespace App\Blocks\ContentSidebar;

use App\Core\Blocks\BaseBlock;

class Block extends BaseBlock
{
    public string $blockName = 'contentSidebar';

    /**
     * Per-instance context
     */
    protected function getContext(): array
    {
        $this->classes = 'contentSidebar-block';

        return [
            'container_size' => $this->timber_context['fields']['container_size'] ?? 'normal',
            'id' => $this->timber_context['fields']['id'] ?? uniqid(),
            'has_inner_blocks' => $this->is_preview ?: !empty($this->content),
        ];
    }
}
