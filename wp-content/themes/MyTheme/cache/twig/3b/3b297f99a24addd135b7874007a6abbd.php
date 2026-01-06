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

/* partials/menu.twig */
class __TwigTemplate_95bba14d2ea78dc1ff6240bb91f564c4 extends Template
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
        // line 1
        $context["children"] = false;
        // line 2
        yield "
";
        // line 3
        if ((($tmp = ($context["menu"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 4
            yield "\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 5
                yield "\t\t";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "children", [], "any", false, false, false, 5)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 6
                    yield "\t\t\t";
                } else {
                    // line 7
                    yield "\t\t\t\t";
                    // line 8
                    yield "\t\t\t\t";
                    $context["is_curr"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "current", [], "any", false, false, false, 8);
                    // line 9
                    yield "\t\t\t\t";
                    $context["base_classes"] = "rounded-md px-3 py-2 text-sm font-medium text-header-link";
                    // line 10
                    yield "
\t\t\t\t";
                    // line 12
                    yield "\t\t\t\t";
                    $context["tag"] = (((($tmp = ($context["is_curr"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("span") : ("a"));
                    // line 13
                    yield "
\t\t\t\t";
                    // line 15
                    yield "\t\t\t\t<";
                    yield ($context["tag"] ?? null);
                    yield " class=\"";
                    yield ($context["base_classes"] ?? null);
                    yield " ";
                    yield (((($tmp =  !($context["is_curr"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("hover:bg-header-link/5") : ("cursor-default"));
                    yield "\" ";
                    if ((($tmp = ($context["is_curr"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield " aria-current=\"page\" ";
                    } else {
                        yield " href=\"";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 15);
                        yield "\" target=\"";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "target", [], "any", false, false, false, 15);
                        yield "\" ";
                    }
                    yield ">
\t\t\t\t\t";
                    // line 16
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 16);
                    yield "
\t\t\t\t</";
                    // line 17
                    yield ($context["tag"] ?? null);
                    yield ">
\t\t";
                }
                // line 19
                yield "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            yield "
\t";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/menu.twig";
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
        return array (  111 => 20,  105 => 19,  100 => 17,  96 => 16,  77 => 15,  74 => 13,  71 => 12,  68 => 10,  65 => 9,  62 => 8,  60 => 7,  57 => 6,  54 => 5,  49 => 4,  47 => 3,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set children = false %}

{% if menu %}
\t{% for item in items %}
\t\t{% if item.children %}
\t\t\t{% else %}
\t\t\t\t{# 1. Спільна конфігурація класів та атрибутів #}
\t\t\t\t{% set is_curr = item.current %}
\t\t\t\t{% set base_classes = \"rounded-md px-3 py-2 text-sm font-medium text-header-link\" %}

\t\t\t\t{# 2. Визначаємо назву тегу #}
\t\t\t\t{% set tag = is_curr ? 'span' : 'a' %}

\t\t\t\t{# 3. Вивід з мінімальним дублюванням #}
\t\t\t\t<{{tag}} class=\"{{ base_classes }} {{ not is_curr ? 'hover:bg-header-link/5' : 'cursor-default' }}\" {% if is_curr %} aria-current=\"page\" {% else %} href=\"{{ item.link }}\" target=\"{{ item.target }}\" {% endif %}>
\t\t\t\t\t{{ item.title }}
\t\t\t\t</{{tag}}>
\t\t{% endif %}
\t{% endfor %}

\t{#<ul class=\"menu-list\">
\t\t\t\t{% for item in items %}
\t\t\t\t\t{% if item.children %}
\t\t\t\t\t\t<li class=\"nav-item dropdown {{item.classes  | join(' ') }}\">
\t\t\t\t\t\t\t{% if item.link %}
\t\t\t\t\t\t\t\t<a class=\"nav-link dropdown-toggle\" target=\"{{ item.target }}\" href=\"{{ item.link }}\">
\t\t\t\t\t\t\t\t\t{{ item.title }}<span class=\"nav_mobile-link\"></span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<span role=\"button\" tabindex=\"0\" class=\"nav-link dropdown-toggle\">
\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t{{ item.title }}
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<svg class=\"desktop__arrow\" width=\"11\" height=\"9\" viewbox=\"0 0 11 9\">
\t\t\t\t\t\t\t\t\t\t<g transform=\"rotate(-180 5.5 4.5)\"><path fill=\"#fff\" d=\"M5.546.5l5 8h-10z\"/></g>
\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t\t<svg class=\"mobile__arrow\" width=\"12\" height=\"8\" viewbox=\"0 0 12 8\" fill=\"none\">
\t\t\t\t\t\t\t\t\t\t<path d=\"M1.41 0.580078L6 5.17008L10.59 0.580078L12 2.00008L6 8.00008L0 2.00008L1.41 0.580078Z\" fill=\"#EEEEEE\"/>
\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t{% include \"parts/components/header-menu.twig\" with {'items': item.children} %}
\t\t\t\t\t\t</li>
\t\t\t\t\t{% else %}
\t\t\t\t\t\t<li class=\"{{item.classes | join(' ') }}{{ item.meta('attr_id') and item.meta('attr_id') == 'cart_menu' ? ' cart__menu' : ''}}\" {{ item.meta('attr_id') and item.meta('attr_id') != 'cart_menu' ? 'data-id=\"'~item.meta('attr_id')~'\"' : ''}}>
\t\t\t\t\t\t\t{% if item.meta('attr_id') %}
\t\t\t\t\t\t\t\t{% if item.meta('attr_id') == 'cart_menu' %}
\t\t\t\t\t\t\t\t\t<a id=\"cart__menu\" class=\"nav-link sk-d-none\" target=\"{{ item.target }}\" href=\"{{ item.link ~ '?p=favorites' }}\">
\t\t\t\t\t\t\t\t\t\t<span class=\"cart__heart\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"cart__heart-count\">0</i>
\t\t\t\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" preserveaspectratio=\"xMidYMid meet\" width=\"40\" height=\"40\" viewbox=\"0 0 40 40\" style=\"width:100%;height:100%\">
\t\t\t\t\t\t\t\t\t\t\t\t<defs>
\t\t\t\t\t\t\t\t\t\t\t\t\t<animateTransform id=\"_RG\" repeatcount=\"1\" dur=\"1s\" begin=\"0s\" xlink:href=\"#_R_G_L_1_G_D_0_P_0_G_0_T_0\" fill=\"freeze\" attributename=\"transform\" from=\"1 1\" to=\"1 1\" type=\"scale\" additive=\"sum\" keytimes=\"0;0.28;0.96;1\" values=\"1 1;1.4000000000000001 1.4000000000000001;1 1;1 1\" keysplines=\"0.333 0 0.116 1;0.597 0 0.298 1;0 0 0 0\" calcmode=\"spline\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<animate id=\"_GR\" repeatcount=\"infinity\" dur=\"1s\" begin=\"0s\" xlink:href=\"#_R_G_L_0_G_D_0_P_0\" fill=\"freeze\" attributename=\"rx\" from=\"6\" to=\"20\" keytimes=\"0;0.04;0.84;1\" values=\"6;6;20;20\" keysplines=\"0.167 0.167 0.667 1;0.167 0.167 0.667 1;0 0 0 0\" calcmode=\"spline\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<animate id=\"_GR1\" repeatcount=\"infinity\" dur=\"1s\" begin=\"0s\" xlink:href=\"#_R_G_L_0_G_D_0_P_0\" fill=\"freeze\" attributename=\"ry\" from=\"6\" to=\"20\" keytimes=\"0;0.04;0.84;1\" values=\"6;6;20;20\" keysplines=\"0.167 0.167 0.667 1;0.167 0.167 0.667 1;0 0 0 0\" calcmode=\"spline\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<animate id=\"_GR2\" repeatcount=\"infinity\" dur=\"1s\" begin=\"0s\" xlink:href=\"#_R_G_L_0_G_D_0_P_0\" fill=\"freeze\" attributename=\"opacity\" from=\"1\" to=\"0\" keytimes=\"0;0.04;0.76;1\" values=\"1;1;0;0\" keysplines=\"0.277 0.217 0.746 0.989;0.277 0.217 0.746 0.989;0 0 0 0\" calcmode=\"spline\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<animate id=\"_GR3\" repeatcount=\"infinity\" dur=\"1s\" begin=\"0s\" xlink:href=\"#_R_G_L_0_G\" fill=\"freeze\" attributename=\"opacity\" from=\"0\" to=\"0\" keytimes=\"0;0.04;0.040004;0.88;0.88;1\" values=\"0;0;1;1;0;0\" keysplines=\"0 0 0 0;0 0 0 0;0 0 0 0;0 0 0 0;0 0 0 0\" calcmode=\"spline\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<animate attributetype=\"XML\" attributename=\"opacity\" dur=\"1s\" from=\"0\" to=\"1\" xlink:href=\"#time_group\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</defs>
\t\t\t\t\t\t\t\t\t\t\t\t<g id=\"_R_G\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<g id=\"_R_G_L_1_G\" transform=\" translate(20, 20) translate(-12, -12)\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<g id=\"_R_G_L_1_G_D_0_P_0_G_0_T_0\" transform=\" translate(12, 11.825)\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<path id=\"_R_G_L_1_G_D_0_P_0\" fill=\"#ff4242\" fill-opacity=\"1\" fill-rule=\"nonzero\" d=\" M0 9.18 C0,9.18 -1.45,7.88 -1.45,7.88 C-3.13,6.36 -4.53,5.05 -5.62,3.95 C-6.72,2.85 -7.6,1.86 -8.25,0.99 C-8.9,0.11 -9.35,-0.69 -9.61,-1.42 C-9.87,-2.16 -10,-2.91 -10,-3.67 C-10,-5.24 -9.48,-6.55 -8.43,-7.6 C-7.38,-8.65 -6.07,-9.18 -4.5,-9.18 C-3.63,-9.18 -2.81,-8.99 -2.02,-8.62 C-1.24,-8.26 -0.57,-7.74 0,-7.07 C0.57,-7.74 1.24,-8.26 2.03,-8.62 C2.81,-8.99 3.63,-9.18 4.5,-9.18 C6.07,-9.18 7.38,-8.65 8.43,-7.6 C9.48,-6.55 10,-5.24 10,-3.67 C10,-2.91 9.87,-2.16 9.61,-1.42 C9.35,-0.69 8.9,0.11 8.25,0.99 C7.6,1.86 6.73,2.85 5.63,3.95 C4.53,5.05 3.13,6.36 1.45,7.88 C1.45,7.88 0,9.18 0,9.18z \"/></g>
\t\t\t\t\t\t\t\t\t\t\t\t\t</g>
\t\t\t\t\t\t\t\t\t\t\t\t\t<g id=\"_R_G_L_0_G_M\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<g id=\"_R_G_L_0_G\" transform=\" translate(20, 20) translate(0, 0)\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<g id=\"_R_G_L_0_G_D_0_P_0_G_0_T_0\"><ellipse id=\"_R_G_L_0_G_D_0_P_0\" fill=\"#ff4242\" fill-opacity=\"1\" fill-rule=\"nonzero\" cx=\"0\" cy=\"0\"/></g>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</g>
\t\t\t\t\t\t\t\t\t\t\t\t\t</g>
\t\t\t\t\t\t\t\t\t\t\t\t</g>
\t\t\t\t\t\t\t\t\t\t\t\t<g id=\"time_group\"/></svg>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t{% set size = (item.title)|length > 15 ?
\t\t\t\t\t\t\t\t\t\t'style=\"font-size: 14px;\"' : '' %}
\t\t\t\t\t\t\t\t\t\t<span {{ size }}>{{ item.title }}</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t{% if item.link %}
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" target=\"{{ item.target }}\" href=\"{{ item.link }}\">
\t\t\t\t\t\t\t\t\t\t\t<span>{{ item.title }}</span>
\t\t\t\t\t\t\t\t\t\t\t<svg class=\"desktop__arrow\" width=\"11\" height=\"9\" viewbox=\"0 0 11 9\">
\t\t\t\t\t\t\t\t\t\t\t\t<g transform=\"rotate(-180 5.5 4.5)\"><path fill=\"#fff\" d=\"M5.546.5l5 8h-10z\"/></g>
\t\t\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t\t\t\t<svg class=\"mobile__arrow\" width=\"12\" height=\"8\" viewbox=\"0 0 12 8\" fill=\"none\">
\t\t\t\t\t\t\t\t\t\t\t\t<path d=\"M1.41 0.580078L6 5.17008L10.59 0.580078L12 2.00008L6 8.00008L0 2.00008L1.41 0.580078Z\" fill=\"#EEEEEE\"/>
\t\t\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t<span role=\"button\" tabindex=\"0\" class=\"nav-link dropdown-toggle\">
\t\t\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t\t\t{{ item.title }}
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t<svg class=\"desktop__arrow\" width=\"11\" height=\"9\" viewbox=\"0 0 11 9\">
\t\t\t\t\t\t\t\t\t\t\t\t<g transform=\"rotate(-180 5.5 4.5)\"><path fill=\"#fff\" d=\"M5.546.5l5 8h-10z\"/></g>
\t\t\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t\t\t\t<svg class=\"mobile__arrow\" width=\"12\" height=\"8\" viewbox=\"0 0 12 8\" fill=\"none\">
\t\t\t\t\t\t\t\t\t\t\t\t<path d=\"M1.41 0.580078L6 5.17008L10.59 0.580078L12 2.00008L6 8.00008L0 2.00008L1.41 0.580078Z\" fill=\"#EEEEEE\"/>
\t\t\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% if item.meta('attr_id') == 'search_voices' %}
\t\t\t\t\t\t\t\t\t{% include \"parts/components/search-voices.twig\" %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% if item.meta('attr_id') == 'audio_production' %}
\t\t\t\t\t\t\t\t\t{% include \"parts/components/audio-production.twig\" %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<a class=\"nav-link\" target=\"{{ item.target }}\" href=\"{{ item.link }}\">
\t\t\t\t\t\t\t\t\t{{ item.title }}
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</li>
\t\t\t\t\t{% endif %}
\t\t\t\t{% endfor %}
\t\t\t</ul>#}
{% endif %}
", "partials/menu.twig", "/var/www/html/wp-content/themes/MyTheme/views/partials/menu.twig");
    }
}
