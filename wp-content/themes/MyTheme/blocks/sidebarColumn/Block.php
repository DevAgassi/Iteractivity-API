<?php

namespace App\Blocks\SidebarColumn;

use App\Core\Blocks\BaseBlock;

class Block extends BaseBlock
{
    public string $blockName = 'sidebarColumn';

    /**
     * Per-instance context
     */
    protected function getContext(): array
    {
        $this->classes = 'sidebarColumn-block';

        return [
            'id' => $this->timber_context['fields']['id'] ?? uniqid(),
        ];
    }
}
