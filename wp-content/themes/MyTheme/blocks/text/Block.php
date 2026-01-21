<?php

namespace App\Blocks\Text;

use App\Core\Blocks\BaseBlock;

class Block extends BaseBlock
{
    public string $blockName = 'text';

    /**
     * Interactivity API namespace
     */
    protected ?string $interactivity_namespace = 'text-section';

    /**
     * Per-instance context
     */
    protected function getContext(): array
    {
        $this->classes = 'text-content';
        $fields = $this->timber_context['fields'] ?? [];

        return [
            'text' => $fields['text'] ?? '',
            'inner_content' => $this->content,
            'has_inner_blocks' => $this->is_preview ?: !empty($this->content),
        ];
    }
}
