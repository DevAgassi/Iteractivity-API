<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* ui/button.twig */
class __TwigTemplate_6b6904f8878e51dbbfb12c553e110a17 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 21
        yield "
";
        // line 22
        $context["color"] = ((array_key_exists("color", $context)) ? (Twig\Extension\CoreExtension::default(($context["color"] ?? null), "primary")) : ("primary"));
        // line 23
        $context["variant"] = ((array_key_exists("variant", $context)) ? (Twig\Extension\CoreExtension::default(($context["variant"] ?? null), "solid")) : ("solid"));
        // line 24
        $context["size"] = ((array_key_exists("size", $context)) ? (Twig\Extension\CoreExtension::default(($context["size"] ?? null), "md")) : ("md"));
        // line 25
        $context["type"] = ((array_key_exists("type", $context)) ? (Twig\Extension\CoreExtension::default(($context["type"] ?? null), "button")) : ("button"));
        // line 26
        $context["dark_color"] = (($context["color"] ?? null) . "-dark");
        // line 27
        yield "
";
        // line 29
        $context["sizes_map"] = ["sm" => "px-3 py-1.5 text-sm gap-1.5", "md" => "px-5 py-2.5 text-base gap-2", "lg" => "px-6 py-3 text-lg gap-3"];
        // line 34
        yield "
";
        // line 36
        if ((($tmp = ($context["reverse"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 37
            yield "    ";
            $context["color_class"] = (((((($tmp = ($context["no_bg"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-transparent") : ("bg-white hover:bg-gray-50")) . " text-") . ($context["color"] ?? null));
        } else {
            // line 39
            yield "    ";
            if ((($context["variant"] ?? null) == "solid")) {
                // line 40
                yield "        ";
                $context["color_class"] = ((((($tmp = ($context["no_bg"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-transparent") : (((("bg-" . ($context["color"] ?? null)) . " hover:bg-") . ($context["dark_color"] ?? null)))) . " text-white");
                // line 41
                yield "    ";
            } else {
                // line 42
                yield "        ";
                $context["color_class"] = (((((($tmp = ($context["no_bg"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-transparent") : ((("hover:bg-" . ($context["color"] ?? null)) . "/10"))) . " text-") . ($context["color"] ?? null));
                // line 43
                yield "    ";
            }
        }
        // line 45
        yield "
";
        // line 47
        $context["button_classes"] = $this->env->getFilter('cx')->getCallable()(["inline-flex items-center justify-center font-medium rounded-md transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 antialiased", (($_v0 =         // line 49
($context["sizes_map"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[($context["size"] ?? null)] ?? null) : null),         // line 50
($context["color_class"] ?? null), (((        // line 51
($context["variant"] ?? null) == "solid")) ? ("shadow-sm hover:shadow-md active:translate-y-px") : ("")), (((        // line 52
($context["variant"] ?? null) == "outlined")) ? (("border-2 border-" . (((($tmp = ($context["reverse"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("white") : (($context["color"] ?? null))))) : ("")), (((($tmp =         // line 53
($context["disabled"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("opacity-50 pointer-events-none grayscale-[0.5]") : ("cursor-pointer")), ((        // line 54
array_key_exists("class", $context)) ? (Twig\Extension\CoreExtension::default(($context["class"] ?? null), "")) : (""))]);
        // line 56
        yield "
<button 
    type=\"";
        // line 58
        yield ($context["type"] ?? null);
        yield "\"
    class=\"";
        // line 59
        yield ($context["button_classes"] ?? null);
        yield "\"
    ";
        // line 60
        if ((($tmp = ($context["disabled"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "disabled aria-disabled=\"true\"";
        }
        // line 61
        yield "    ";
        if ((($tmp = ($context["id"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "id=\"";
            yield ($context["id"] ?? null);
            yield "\"";
        }
        // line 62
        yield "    ";
        if ((($tmp = ($context["title"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "title=\"";
            yield ($context["title"] ?? null);
            yield "\"";
        }
        // line 63
        yield "    ";
        yield ($context["attrs"] ?? null);
        yield "
>
    <span class=\"leading-none\">";
        // line 65
        yield ((array_key_exists("label", $context)) ? (Twig\Extension\CoreExtension::default(($context["label"] ?? null), "Button")) : ("Button"));
        yield "</span>

    ";
        // line 67
        if ((($tmp = ($context["icon_after"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 68
            yield "        <span class=\"inline-flex shrink-0 transition-transform duration-300 group-hover:translate-x-1\" aria-hidden=\"true\">
            ";
            // line 69
            yield ($context["icon_after"] ?? null);
            yield "
        </span>
    ";
        }
        // line 72
        yield "</button>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "ui/button.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  148 => 72,  142 => 69,  139 => 68,  137 => 67,  132 => 65,  126 => 63,  119 => 62,  112 => 61,  108 => 60,  104 => 59,  100 => 58,  96 => 56,  94 => 54,  93 => 53,  92 => 52,  91 => 51,  90 => 50,  89 => 49,  88 => 47,  85 => 45,  81 => 43,  78 => 42,  75 => 41,  72 => 40,  69 => 39,  65 => 37,  63 => 36,  60 => 34,  58 => 29,  55 => 27,  53 => 26,  51 => 25,  49 => 24,  47 => 23,  45 => 22,  42 => 21,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# 
  UI COMPONENT: Button
  
  АТРИБУТЫ (Arguments):
  - label      (String)  : Текст на кнопке. По умолчанию: 'Button'.
  - color      (String)  : Цвет из @theme (primary, secondary, success, error, sk-blue).
  - variant    (String)  : Стиль ('solid', 'outlined', 'ghost').
  - size       (String)  : Размер ('sm', 'md', 'lg'). По умолчанию: 'md'.
  - type       (String)  : HTML тип кнопки ('button', 'submit', 'reset').
  - disabled   (Boolean) : Состояние активности.
  - reverse    (Boolean) : Инверсия цветов для темных фонов.
  - no_bg      (Boolean) : Убирает фоновую подложку.
  - icon_after (String)  : HTML код иконки (SVG), которая вставится после текста.
  - attrs      (String)  : Любые HTML атрибуты (data-wp-on--click, aria-controls и т.д.).
  - class      (String)  : Дополнительные классы Tailwind.

  ПРИМЕРЫ:
  {{ ui_button({ label: 'Отправить', color: 'success', type: 'submit' }) }}
  {{ ui_button({ label: 'Удалить', color: 'error', variant: 'outlined', size: 'sm' }) }}
#}

{% set color    = color|default('primary') %}
{% set variant  = variant|default('solid') %}
{% set size     = size|default('md') %}
{% set type     = type|default('button') %}
{% set dark_color = color ~ '-dark' %}

{# 1. КАРТА РАЗМЕРОВ #}
{% set sizes_map = {
    'sm': \"px-3 py-1.5 text-sm gap-1.5\",
    'md': \"px-5 py-2.5 text-base gap-2\",
    'lg': \"px-6 py-3 text-lg gap-3\"
} %}

{# 2. ЛОГИКА ЦВЕТА #}
{% if reverse %}
    {% set color_class = (no_bg ? 'bg-transparent' : 'bg-white hover:bg-gray-50') ~ \" text-\" ~ color %}
{% else %}
    {% if variant == 'solid' %}
        {% set color_class = (no_bg ? 'bg-transparent' : \"bg-\" ~ color ~ \" hover:bg-\" ~ dark_color) ~ \" text-white\" %}
    {% else %}
        {% set color_class = (no_bg ? 'bg-transparent' : \"hover:bg-\" ~ color ~ \"/10\") ~ \" text-\" ~ color %}
    {% endif %}
{% endif %}

{# 3. СБОР КЛАССОВ ЧЕРЕЗ ФИЛЬТР CX #}
{% set button_classes = [
    \"inline-flex items-center justify-center font-medium rounded-md transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 antialiased\",
    sizes_map[size],
    color_class,
    variant == 'solid' ? \"shadow-sm hover:shadow-md active:translate-y-px\" : \"\",
    variant == 'outlined' ? \"border-2 border-\" ~ (reverse ? 'white' : color) : \"\",
    disabled ? \"opacity-50 pointer-events-none grayscale-[0.5]\" : \"cursor-pointer\",
    class|default('')
]|cx %}

<button 
    type=\"{{ type }}\"
    class=\"{{ button_classes }}\"
    {% if disabled %}disabled aria-disabled=\"true\"{% endif %}
    {% if id %}id=\"{{ id }}\"{% endif %}
    {% if title %}title=\"{{ title }}\"{% endif %}
    {{ attrs|raw }}
>
    <span class=\"leading-none\">{{ label|default('Button') }}</span>

    {% if icon_after %}
        <span class=\"inline-flex shrink-0 transition-transform duration-300 group-hover:translate-x-1\" aria-hidden=\"true\">
            {{ icon_after|raw }}
        </span>
    {% endif %}
</button>", "ui/button.twig", "/var/www/html/wp-content/themes/MyTheme/ui/button.twig");
    }
}
