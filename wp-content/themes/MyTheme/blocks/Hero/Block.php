<?php

namespace App\Blocks\Hero;

use App\Core\Blocks\BaseBlock;

class Block extends BaseBlock
{
    public string $blockName = 'hero';

    protected array $dependencies = ['jquery'];
    protected array $dependencies_module = ['@wordpress/interactivity'];

    /**
     * Interactivity API namespace
     */
    protected ?string $interactivity_namespace = 'hero-section';

    /**
     * Per-instance context
     */
    protected function getContext(): array
    {
        $this->classes = 'hero-content';
        $fields = $this->timber_context['fields'] ?? [];

        return [
            'buttonText' => $fields['cta_text'] ?? 'Learn More!!!1',
            'is_modal_open' => false,
        ];
    }
}
