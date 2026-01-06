<?php

namespace App\Blocks\Section;

use App\Core\Blocks\BaseBlock;

class Block extends BaseBlock
{
    public string $blockName = 'section';

    /**
     * Per-instance context
     */
    protected function getContext(): array
    {

        $this->classes = 'section-block';

        return [];
    }
}
