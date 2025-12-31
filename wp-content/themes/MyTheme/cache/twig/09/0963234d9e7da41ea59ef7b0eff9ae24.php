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

/* /blocks/Slider/view.twig */
class __TwigTemplate_595f348d546f5969f57626fe1793e8eb extends Template
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
        $context["limit"] = (((($tmp = ($context["is_preview"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (1) : (null));
        // line 2
        yield "
<section class=\"swiper-slider\" ";
        // line 3
        yield ($context["attrs"] ?? null);
        yield ">
\t<div class=\"swiper-container\" ";
        // line 4
        yield (((($tmp = ($context["is_preview"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("data-preview=\"true\"") : (""));
        yield ">
\t\t<div class=\"swiper-wrapper\">
\t\t\t";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "slides", [], "any", false, false, false, 6), 0, ($context["limit"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["slide"]) {
            // line 7
            yield "\t\t\t\t<div class=\"swiper-slide\">
\t\t\t\t\t";
            // line 8
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "image", [], "any", false, false, false, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 9
                yield "\t\t\t\t\t\t<img src=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "image", [], "any", false, false, false, 9), "url", [], "any", false, false, false, 9);
                yield "\" alt=\"";
                yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "image", [], "any", false, true, false, 9), "alt", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "image", [], "any", false, false, false, 9), "alt", [], "any", false, false, false, 9), "")) : (""));
                yield "\">
\t\t\t\t\t";
            }
            // line 11
            yield "\t\t\t\t\t";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "title", [], "any", false, false, false, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 12
                yield "\t\t\t\t\t\t<h3>";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "title", [], "any", false, false, false, 12);
                yield "</h3>
\t\t\t\t\t";
            }
            // line 14
            yield "\t\t\t\t\t";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "description", [], "any", false, false, false, 14)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 15
                yield "\t\t\t\t\t\t<p>";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "description", [], "any", false, false, false, 15);
                yield "</p>
\t\t\t\t\t";
            }
            // line 17
            yield "\t\t\t\t\t";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "cta_link", [], "any", false, false, false, 17) && CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "cta_text", [], "any", false, false, false, 17))) {
                // line 18
                yield "\t\t\t\t\t\t<a href=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "cta_link", [], "any", false, false, false, 18);
                yield "\" class=\"btn btn-primary\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["slide"], "cta_text", [], "any", false, false, false, 18);
                yield "</a>
\t\t\t\t\t";
            }
            // line 20
            yield "\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['slide'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        yield "\t\t</div>

\t\t<!-- Optional navigation -->
\t\t<div class=\"swiper-button-next\"></div>
\t\t<div class=\"swiper-button-prev\"></div>
\t\t<div class=\"swiper-pagination\"></div>
\t</div>
</section>
<InnerBlocks/>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/blocks/Slider/view.twig";
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
        return array (  109 => 22,  102 => 20,  94 => 18,  91 => 17,  85 => 15,  82 => 14,  76 => 12,  73 => 11,  65 => 9,  63 => 8,  60 => 7,  56 => 6,  51 => 4,  47 => 3,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set limit = is_preview ? 1 : null %}

<section class=\"swiper-slider\" {{ attrs|raw }}>
\t<div class=\"swiper-container\" {{ is_preview ? 'data-preview=\"true\"' : '' }}>
\t\t<div class=\"swiper-wrapper\">
\t\t\t{% for slide in fields.slides|slice(0, limit) %}
\t\t\t\t<div class=\"swiper-slide\">
\t\t\t\t\t{% if slide.image %}
\t\t\t\t\t\t<img src=\"{{ slide.image.url }}\" alt=\"{{ slide.image.alt|default('') }}\">
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if slide.title %}
\t\t\t\t\t\t<h3>{{ slide.title }}</h3>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if slide.description %}
\t\t\t\t\t\t<p>{{ slide.description }}</p>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if slide.cta_link and slide.cta_text %}
\t\t\t\t\t\t<a href=\"{{ slide.cta_link }}\" class=\"btn btn-primary\">{{ slide.cta_text }}</a>
\t\t\t\t\t{% endif %}
\t\t\t\t</div>
\t\t\t{% endfor %}
\t\t</div>

\t\t<!-- Optional navigation -->
\t\t<div class=\"swiper-button-next\"></div>
\t\t<div class=\"swiper-button-prev\"></div>
\t\t<div class=\"swiper-pagination\"></div>
\t</div>
</section>
<InnerBlocks/>
", "/blocks/Slider/view.twig", "/var/www/html/wp-content/themes/MyTheme/blocks/Slider/view.twig");
    }
}
