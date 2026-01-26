<?php

namespace App\Blocks\Sidebar;

use App\Core\Blocks\BaseBlock;

class Block extends BaseBlock
{
    public string $blockName = 'sidebar';

    /**
     * Per-instance context
     */
    protected function getContext(): array
    {
        $this->classes = 'sidebar-block';
        //dd($this->block);
        return [
            'id' => $this->timber_context['fields']['id'] ?? uniqid(),
            'parentBlockName' => $this->block['parentName'] ?? '',
        ];
    }
}
