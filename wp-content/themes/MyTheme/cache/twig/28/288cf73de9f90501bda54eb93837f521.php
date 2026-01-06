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
        // line 1
        $context["intent"] = ((array_key_exists("intent", $context)) ? (Twig\Extension\CoreExtension::default(($context["intent"] ?? null), "primary")) : ("primary"));
        // line 2
        $context["variant"] = ((array_key_exists("variant", $context)) ? (Twig\Extension\CoreExtension::default(($context["variant"] ?? null), "solid")) : ("solid"));
        // line 3
        $context["size"] = ((array_key_exists("size", $context)) ? (Twig\Extension\CoreExtension::default(($context["size"] ?? null), "md")) : ("md"));
        // line 4
        yield "
<button
  class=\"";
        // line 6
        yield $this->env->getFilter('cx')->getCallable()(["ui-btn", ("ui-btn--" .         // line 8
($context["intent"] ?? null)), ("ui-btn--" .         // line 9
($context["variant"] ?? null)), ("ui-btn--" .         // line 10
($context["size"] ?? null)), (((($tmp =         // line 11
($context["disabled"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("ui-btn--disabled") : ("")), ((        // line 12
array_key_exists("class", $context)) ? (Twig\Extension\CoreExtension::default(($context["class"] ?? null), "")) : (""))]);
        // line 13
        yield "\"
  ";
        // line 14
        yield ($context["attrs"] ?? null);
        yield "
>
  <span class=\"ui-btn__label leading-none\">
    ";
        // line 17
        yield ((array_key_exists("label", $context)) ? (Twig\Extension\CoreExtension::default(($context["label"] ?? null), "Button")) : ("Button"));
        yield "
  </span>

  ";
        // line 20
        if ((($tmp = ($context["icon_after"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 21
            yield "    <span class=\"ui-btn__icon\" aria-hidden=\"true\">
      ";
            // line 22
            yield ($context["icon_after"] ?? null);
            yield "
    </span>
  ";
        }
        // line 25
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
        return array (  85 => 25,  79 => 22,  76 => 21,  74 => 20,  68 => 17,  62 => 14,  59 => 13,  57 => 12,  56 => 11,  55 => 10,  54 => 9,  53 => 8,  52 => 6,  48 => 4,  46 => 3,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set intent  = intent  | default('primary') %}
{% set variant = variant | default('solid') %}
{% set size    = size    | default('md') %}

<button
  class=\"{{ [
    'ui-btn',
    'ui-btn--' ~ intent,
    'ui-btn--' ~ variant,
    'ui-btn--' ~ size,
    disabled ? 'ui-btn--disabled' : '',
    class | default('')
  ] | cx }}\"
  {{ attrs|raw }}
>
  <span class=\"ui-btn__label leading-none\">
    {{ label | default('Button') }}
  </span>

  {% if icon_after %}
    <span class=\"ui-btn__icon\" aria-hidden=\"true\">
      {{ icon_after | raw }}
    </span>
  {% endif %}
</button>", "ui/button.twig", "/var/www/html/wp-content/themes/MyTheme/ui/button.twig");
    }
}
