<?php

use MyTheme\Core\Block;

class HeroBlock extends Block
{
    public function render(): void
    {
        $this->context['fields'] = get_fields();


        $this->context['initial_state'] = [
            'is_modal_open' => false,
            'cta_text' => $this->context['fields']['cta_button'] ?? 'Деталі',
        ];


        $this->renderTwig('hero.twig');
    }
}
