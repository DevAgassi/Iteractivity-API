<?php

namespace App\Blocks\hero;

use App\Core\BaseBlock;

class Block extends BaseBlock
{
    /**
     * Interactivity API namespace
     */
    protected ? string $interactivity_namespace = 'hero-section';

    /**
     * Global state (shared across all instances)
     */
    public function getInitialState(): array
    {
        $fields = get_fields() ?: [];

        return [
            'buttonText' => $fields['cta_text'] ?? 'Learn More',
        ];
    }

    /**
     * Per-instance context
     */
    protected function getInitialContext(): array
    {
        return [
            'is_modal_open' => false,
        ];
    }
}