<?php

namespace App\Blocks\Hero;

use App\Core\BaseBlock;

class Block extends BaseBlock
{
    /**
     * Interactivity API namespace
     */
    protected ?string $interactivity_namespace = 'hero-section';
    protected array $dependencies = ['interactivity'];

    /**
     * Per-instance context
     */
    protected function getContext(): array
    {
        $fields = $this->timber_context['fields'] ?? [];

        return [
            'buttonText' => $fields['cta_text'] ?? 'Learn More!!',
            'is_modal_open' => false,
        ];
    }
}
