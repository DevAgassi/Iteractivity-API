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

/* ui/link.twig */
class __TwigTemplate_41100952f67b9439cb9f34570ebb9ea4 extends Template
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
        // line 28
        yield "
";
        // line 29
        $context["color"] = ((array_key_exists("color", $context)) ? (Twig\Extension\CoreExtension::default(($context["color"] ?? null), "primary")) : ("primary"));
        // line 30
        $context["variant"] = ((array_key_exists("variant", $context)) ? (Twig\Extension\CoreExtension::default(($context["variant"] ?? null), "solid")) : ("solid"));
        // line 31
        $context["size"] = ((array_key_exists("size", $context)) ? (Twig\Extension\CoreExtension::default(($context["size"] ?? null), "md")) : ("md"));
        // line 32
        $context["target"] = ((array_key_exists("target", $context)) ? (Twig\Extension\CoreExtension::default(($context["target"] ?? null), "_self")) : ("_self"));
        // line 33
        yield "
";
        // line 34
        $context["disabled_class"] = (((($tmp = ($context["disabled"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("opacity-50 pointer-events-none grayscale-[0.5]") : (""));
        // line 35
        yield "
";
        // line 37
        $context["base_class"] = "group inline-flex items-center justify-center font-medium rounded-md transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 antialiased";
        // line 38
        yield "
";
        // line 40
        $context["sizes_map"] = ["sm" => "px-3 py-1.5 text-sm gap-1.5", "md" => "px-5 py-2.5 text-base gap-2", "lg" => "px-5.5 py-2.5 text-lg gap-2"];
        // line 45
        yield "
";
        // line 47
        $context["structure_map"] = ["solid" => "shadow-sm hover:shadow-md active:translate-y-px", "outlined" => ("border-2 border-" . (((($tmp =         // line 49
($context["reverse"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("white") : (($context["color"] ?? null)))), "ghost" => "shadow-none"];
        // line 52
        yield "
";
        // line 54
        $context["current_size"] = (($_v0 = ($context["sizes_map"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[($context["size"] ?? null)] ?? null) : null);
        // line 55
        if ((($context["variant"] ?? null) == "ghost")) {
            // line 56
            yield "    ";
            $context["current_size"] = Twig\Extension\CoreExtension::replace(($context["current_size"] ?? null), ["px-5" => "px-2", "px-3" => "px-1"]);
        }
        // line 58
        yield "
";
        // line 60
        if ((($tmp = ($context["reverse"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 61
            yield "    ";
            $context["color_class"] = (((((($tmp = ($context["no_bg"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-transparent") : ("bg-white hover:bg-gray-50")) . " text-") . ($context["color"] ?? null));
        } else {
            // line 63
            yield "    ";
            if ((($context["variant"] ?? null) == "solid")) {
                // line 64
                yield "        ";
                $context["color_class"] = ((((($tmp = ($context["no_bg"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-transparent") : (((("bg-" . ($context["color"] ?? null)) . " hover:bg-") . ($context["dark_color"] ?? null)))) . " text-white");
                // line 65
                yield "    ";
            } else {
                // line 66
                yield "        ";
                $context["color_class"] = (((((($tmp = ($context["no_bg"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-transparent") : ((("hover:bg-" . ($context["color"] ?? null)) . "/10"))) . " text-") . ($context["color"] ?? null));
                // line 67
                yield "    ";
            }
        }
        // line 69
        yield "
";
        // line 72
        $context["final_classes"] = $this->env->getFilter('cx')->getCallable()([        // line 73
($context["base_class"] ?? null),         // line 74
($context["color_class"] ?? null), (($_v1 =         // line 75
($context["structure_map"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[($context["variant"] ?? null)] ?? null) : null),         // line 76
($context["current_size"] ?? null),         // line 77
($context["disabled_class"] ?? null), ((        // line 78
array_key_exists("class", $context)) ? (Twig\Extension\CoreExtension::default(($context["class"] ?? null), "")) : (""))]);
        // line 80
        yield "
<a 
    ";
        // line 82
        if ((($tmp = ($context["id"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "id=\"";
            yield ($context["id"] ?? null);
            yield "\"";
        }
        // line 83
        yield "    href=\"";
        yield (((($tmp = ($context["disabled"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("javascript:void(0)") : (((array_key_exists("href", $context)) ? (Twig\Extension\CoreExtension::default(($context["href"] ?? null), "#")) : ("#"))));
        yield "\" 
    target=\"";
        // line 84
        yield ($context["target"] ?? null);
        yield "\"
    ";
        // line 85
        if ((($tmp = ($context["title"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "title=\"";
            yield ($context["title"] ?? null);
            yield "\"";
        }
        // line 86
        yield "    ";
        if ((($context["aria_label"] ?? null) || ($context["title"] ?? null))) {
            yield "aria-label=\"";
            yield ((array_key_exists("aria_label", $context)) ? (Twig\Extension\CoreExtension::default(($context["aria_label"] ?? null), ($context["title"] ?? null))) : (($context["title"] ?? null)));
            yield "\"";
        }
        // line 87
        yield "    ";
        if ((($context["rel"] ?? null) || (($context["target"] ?? null) == "_blank"))) {
            yield "rel=\"";
            yield ((array_key_exists("rel", $context)) ? (Twig\Extension\CoreExtension::default(($context["rel"] ?? null), (((($context["target"] ?? null) == "_blank")) ? ("noopener noreferrer") : ("")))) : ((((($context["target"] ?? null) == "_blank")) ? ("noopener noreferrer") : (""))));
            yield "\"";
        }
        // line 88
        yield "    ";
        if ((($tmp = ($context["disabled"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "aria-disabled=\"true\" tabindex=\"-1\"";
        }
        // line 89
        yield "    class=\"";
        yield ($context["final_classes"] ?? null);
        yield "\"
    ";
        // line 90
        yield ($context["attrs"] ?? null);
        yield "
>
    <span class=\"leading-none\">";
        // line 92
        yield ((array_key_exists("label", $context)) ? (Twig\Extension\CoreExtension::default(($context["label"] ?? null), "Link")) : ("Link"));
        yield "</span>

    ";
        // line 94
        if ((($context["type"] ?? null) == "link")) {
            // line 95
            yield "        <span class=\"inline-flex shrink-0 transition-transform duration-300 group-hover:translate-x-1\" aria-hidden=\"true\">
            <svg xmlns=\"www.w3.org\" viewBox=\"0 -960 960 960\" class=\"w-[1.1em] h-[1.1em] fill-current block\">
                <path d=\"m560-240-56-58 142-142H160v-80h486L504-662l56-58 240 240-240 240Z\"/>
            </svg>
        </span>
    ";
        }
        // line 101
        yield "</a>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "ui/link.twig";
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
        return array (  190 => 101,  182 => 95,  180 => 94,  175 => 92,  170 => 90,  165 => 89,  160 => 88,  153 => 87,  146 => 86,  140 => 85,  136 => 84,  131 => 83,  125 => 82,  121 => 80,  119 => 78,  118 => 77,  117 => 76,  116 => 75,  115 => 74,  114 => 73,  113 => 72,  110 => 69,  106 => 67,  103 => 66,  100 => 65,  97 => 64,  94 => 63,  90 => 61,  88 => 60,  85 => 58,  81 => 56,  79 => 55,  77 => 54,  74 => 52,  72 => 49,  71 => 47,  68 => 45,  66 => 40,  63 => 38,  61 => 37,  58 => 35,  56 => 34,  53 => 33,  51 => 32,  49 => 31,  47 => 30,  45 => 29,  42 => 28,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# 
  UI COMPONENT: Link (Button-like)
  
  АТРИБУТИ (Arguments):
  - label   (String)  : Текст посилання/кнопки. За замовчуванням: 'Link'.
  - href    (String)  : URL адреса. За замовчуванням: '#'.
  - color   (String)  : Колір з теми (primary, secondary, accent, warning, success, error).
  - variant (String)  : Стиль ('solid' - заливка, 'outlined' - контур, 'ghost' - без рамок).
  - type    (String)  : Якщо 'link', додається іконка стрілки праворуч.
  - reverse (Boolean) : Якщо true, фон стає білим, а текст — кольоровим (для темних блоків).
  - no_bg   (Boolean) : Якщо true, прибирає фон (корисно для ghost або прозорих outlined).
  - target  (String)  : Атрибут target ('_blank', '_self').
  - attrs   (String)  : Додаткові HTML атрибути (data-wp, aria-label тощо).
  - class   (String)  : Додаткові кастомні класи Tailwind.
  - title      (String)  : Текст підказки при наведенні.
  - aria_label (String)  : Опис для скрінрідерів (якщо відрізняється від label).
  - id         (String)  : Унікальний ідентифікатор елемента.
  - rel        (String)  : Відношення посилання (напр. 'nofollow', 'author').
  - disabled   (Boolean) : Якщо true, посилання стає неактивним (сірим та інертним).
  - size (String): 'sm' (малий), 'md' (середній), 'lg' (великий). За замовчуванням: 'md'.

  ПРИКЛАДИ ПІДКЛЮЧЕННЯ:
  1. Базовий: {{ ui_link({ label: 'Читати', href: '/news' }) }}
  2. Кнопка успіху: {{ ui_link({ label: 'Готово', color: 'success', variant: 'solid' }) }}
  3. Контурна на темному: {{ ui_link({ label: 'Інфо', variant: 'outlined', reverse: true, no_bg: true }) }}
  4. З іконкою та WP Interactivity: {{ ui_link({ label: 'Далі', type: 'link', attrs: 'data-wp-on--click=\"actions.open\"' }) }}
#}

{% set color   = color|default('primary') %}
{% set variant = variant|default('solid') %}
{% set size    = size|default('md') %}
{% set target  = target|default('_self') %}

{% set disabled_class = disabled ? \"opacity-50 pointer-events-none grayscale-[0.5]\" : \"\" %}

{# 1. БАЗОВІ КЛАСИ #}
{% set base_class = \"group inline-flex items-center justify-center font-medium rounded-md transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 antialiased\" %}

{# 2. ЛОГІКА РОЗМІРІВ #}
{% set sizes_map = {
    'sm': \"px-3 py-1.5 text-sm gap-1.5\",
    'md': \"px-5 py-2.5 text-base gap-2\",
    'lg': \"px-5.5 py-2.5 text-lg gap-2\"
} %}

{# 3. ЛОГІКА СТРУКТУРИ #}
{% set structure_map = {
    'solid': \"shadow-sm hover:shadow-md active:translate-y-px\",
    'outlined': \"border-2 border-\" ~ (reverse ? 'white' : color),
    'ghost': \"shadow-none\"
} %}

{# Корекція падінгів для Ghost #}
{% set current_size = sizes_map[size] %}
{% if variant == 'ghost' %}
    {% set current_size = current_size|replace({'px-5':'px-2', 'px-3':'px-1'}) %}
{% endif %}

{# 4. ЛОГІКА КОЛЬОРУ (Виправлено синтаксис конкатенації) #}
{% if reverse %}
    {% set color_class = (no_bg ? 'bg-transparent' : 'bg-white hover:bg-gray-50') ~ \" text-\" ~ color %}
{% else %}
    {% if variant == 'solid' %}
        {% set color_class = (no_bg ? 'bg-transparent' : \"bg-\" ~ color ~ \" hover:bg-\" ~ dark_color) ~ \" text-white\" %}
    {% else %}
        {% set color_class = (no_bg ? 'bg-transparent' : \"hover:bg-\" ~ color ~ \"/10\") ~ \" text-\" ~ color %}
    {% endif %}
{% endif %}

{# 5. ФІНАЛЬНИЙ ЗБІР ЧЕРЕЗ CX #}
{# Ми просто передаємо всі змінні в масив, а фільтр cx зробить магію #}
{% set final_classes = [
    base_class,
    color_class,
    structure_map[variant],
    current_size,
    disabled_class,
    class|default('')
]|cx %}

<a 
    {% if id %}id=\"{{ id }}\"{% endif %}
    href=\"{{ disabled ? 'javascript:void(0)' : href|default('#') }}\" 
    target=\"{{ target }}\"
    {% if title %}title=\"{{ title }}\"{% endif %}
    {% if aria_label or title %}aria-label=\"{{ aria_label|default(title) }}\"{% endif %}
    {% if rel or target == '_blank' %}rel=\"{{ rel|default(target == '_blank' ? 'noopener noreferrer' : '') }}\"{% endif %}
    {% if disabled %}aria-disabled=\"true\" tabindex=\"-1\"{% endif %}
    class=\"{{ final_classes }}\"
    {{ attrs|raw }}
>
    <span class=\"leading-none\">{{ label|default('Link') }}</span>

    {% if type == 'link' %}
        <span class=\"inline-flex shrink-0 transition-transform duration-300 group-hover:translate-x-1\" aria-hidden=\"true\">
            <svg xmlns=\"www.w3.org\" viewBox=\"0 -960 960 960\" class=\"w-[1.1em] h-[1.1em] fill-current block\">
                <path d=\"m560-240-56-58 142-142H160v-80h486L504-662l56-58 240 240-240 240Z\"/>
            </svg>
        </span>
    {% endif %}
</a>", "ui/link.twig", "/var/www/html/wp-content/themes/MyTheme/ui/link.twig");
    }
}
