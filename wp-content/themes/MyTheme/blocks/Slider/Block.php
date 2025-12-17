<?php

namespace App\Blocks\Slider;

use App\Core\BaseBlock;

class Block extends BaseBlock
{
    protected array $dependencies = ['swiper'];

    // Global state (наприклад autoplay)
    public function getInitialState(): array
    {
        return [
            'autoplay' => true,
            'speed' => 500
        ];
    }

    // Per-instance context (ACF slides)
    protected function getInitialContext(): array
    {
        $fields = $this->timber_context['fields'];

        return [
            'slides' => $fields['slides'] ?? [],
            'activeSlide' => 0,
        ];
    }
}
