<?php

namespace App\Blocks\Calculator;

use App\Core\Blocks\BaseBlock;

class Block extends BaseBlock
{
    /** @var string Block unique identifier */
    public string $blockName = 'calculator';

    /** @var string Interactivity API store namespace */
    protected ?string $interactivity_namespace = 'calculator';

    /** @var array WordPress script dependencies */
    protected array $dependencies_module = ['@wordpress/interactivity'];

    // Per-instance context (ACF slides)
    protected function getContext(): array
    {
        // $fields = $this->timber_context['fields'];

        return [
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
