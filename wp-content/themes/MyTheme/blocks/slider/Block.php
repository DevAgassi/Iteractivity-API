<?php

namespace App\Blocks\Slider;

use App\Core\Blocks\BaseBlock;

class Block extends BaseBlock
{
    public string $blockName = 'slider';

    // Per-instance context (ACF slides)
    protected function getContext(): array
    {
        $this->classes = 'slider-block';

        $fields = $this->timber_context['fields'];

        return [
            'autoplay' => true,
            'speed' => 500,
            'slides' => $fields['slides'] ?? [],
            'activeSlide' => 0,
        ];
    }
}
