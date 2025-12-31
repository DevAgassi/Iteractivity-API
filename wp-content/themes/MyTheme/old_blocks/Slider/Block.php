<?php

namespace App\Blocks\Slider;

use App\Core\BaseBlock;

class Block extends BaseBlock
{
    protected array $dependencies = ['swiper'];

    // Per-instance context (ACF slides)
    protected function getContext(): array
    {
        $fields = $this->timber_context['fields'];

        return [
            'autoplay' => true,
            'speed' => 500,
            'slides' => $fields['slides'] ?? [],
            'activeSlide' => 0,
        ];
    }
}
