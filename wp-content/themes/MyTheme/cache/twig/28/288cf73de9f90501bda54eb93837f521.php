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
        // line 2
        $context["base_class"] = "inline-flex items-center justify-center px-4 py-2 font-medium rounded-md transition-shadow elevation-1 hover:elevation-2";
        // line 3
        $context["variants"] = ["primary" => "bg-primary text-white hover:bg-primary-dark", "outlined" => "border border-primary text-primary hover:bg-primary-50", "text" => "text-primary hover:bg-gray-100 shadow-none elevation-0"];
        // line 8
        yield "
<button 
    type=\"";
        // line 10
        yield ((array_key_exists("type", $context)) ? (Twig\Extension\CoreExtension::default(($context["type"] ?? null), "button")) : ("button"));
        yield "\"
    class=\"";
        // line 11
        yield ($context["base_class"] ?? null);
        yield " ";
        yield (($_v0 = ($context["variants"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[((array_key_exists("variant", $context)) ? (Twig\Extension\CoreExtension::default(($context["variant"] ?? null), "primary")) : ("primary"))] ?? null) : null);
        yield " ";
        yield ($context["class"] ?? null);
        yield "\"
    ";
        // line 12
        yield ($context["attrs"] ?? null);
        yield "
>
    ";
        // line 14
        yield ((array_key_exists("label", $context)) ? (Twig\Extension\CoreExtension::default(($context["label"] ?? null), "Button")) : ("Button"));
        yield "
</button>";
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
        return array (  67 => 14,  62 => 12,  54 => 11,  50 => 10,  46 => 8,  44 => 3,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# ui/button.twig #}
{% set base_class = \"inline-flex items-center justify-center px-4 py-2 font-medium rounded-md transition-shadow elevation-1 hover:elevation-2\" %}
{% set variants = {
    'primary': 'bg-primary text-white hover:bg-primary-dark',
    'outlined': 'border border-primary text-primary hover:bg-primary-50',
    'text': 'text-primary hover:bg-gray-100 shadow-none elevation-0'
} %}

<button 
    type=\"{{ type|default('button') }}\"
    class=\"{{ base_class }} {{ variants[variant|default('primary')] }} {{ class }}\"
    {{ attrs|raw }}
>
    {{ label|default('Button') }}
</button>", "ui/button.twig", "/var/www/html/wp-content/themes/MyTheme/ui/button.twig");
    }
}
