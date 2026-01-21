<?php

namespace App\Blocks\PizzaDoughCalculator;

use App\Core\BaseBlock;

class Block extends BaseBlock
{
    protected ?string $interactivity_namespace = 'pizza-dough-calculator';

    // Per-instance context (ACF slides)
    protected function getContext(): array
    {
        // $fields = $this->timber_context['fields'];

        return [
            //'slides' => $fields['slides'] ?? [],
            'activeSlide' => 0,
            "calculations" => [
                "numberOf" => 0,
                "weightOf" => 0,
                "hydrationOf" => 0
            ],
            "ingredients" => [
                "unitFlourKg" => "g",
                "flour" => 0,
                "water" => 0,
                "oil" => 0,
                "salt" => 0,
                "yeast" => 0
            ],
            "unitFlourKg" => "g",
            "unitWaterL" => "ml",
            "unitOilL" => "ml",
            "unitSaltKg" => "g",
            "unitYeastKg" => "g"
        ];
    }
}
