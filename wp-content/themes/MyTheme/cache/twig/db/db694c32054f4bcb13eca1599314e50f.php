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

/* layouts/header.twig */
class __TwigTemplate_e55dcbf8a9a7a80654b824c4c66f4d3d extends Template
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
            'header' => [$this, 'block_header'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<header class=\"header\">
\t";
        // line 2
        yield $this->env->getFunction('timer_start')->getCallable()("header");
        yield "
\t";
        // line 3
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 16
        yield "\t";
        yield $this->env->getFunction('timer_end')->getCallable()("header");
        yield "
</header>
";
        yield from [];
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "\t\t<div class=\"wrapper\">
\t\t\t<h1 class=\"hdr-logo\">
\t\t\t\t<a class=\"hdr-logo-link\" href=\"";
        // line 6
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "url", [], "any", false, false, false, 6);
        yield "\">";
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "name", [], "any", false, false, false, 6);
        yield "</a>
\t\t\t</h1>
\t\t\t<nav id=\"nav-main\" class=\"nav-main\">
\t\t\t\t";
        // line 9
        yield from $this->load("partials/menu.twig", 9)->unwrap()->yield(CoreExtension::merge($context, ["items" => CoreExtension::getAttribute($this->env, $this->source,         // line 10
($context["menu"] ?? null), "get_items", [], "any", false, false, false, 10)]));
        // line 12
        yield "\t\t\t</nav>
\t\t\t<!-- #nav -->
\t\t</div>
\t";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layouts/header.twig";
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
        return array (  83 => 12,  81 => 10,  80 => 9,  72 => 6,  68 => 4,  61 => 3,  52 => 16,  50 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<header class=\"header\">
\t{{ timer_start('header') }}
\t{% block header %}
\t\t<div class=\"wrapper\">
\t\t\t<h1 class=\"hdr-logo\">
\t\t\t\t<a class=\"hdr-logo-link\" href=\"{{ site.url }}\">{{ site.name }}</a>
\t\t\t</h1>
\t\t\t<nav id=\"nav-main\" class=\"nav-main\">
\t\t\t\t{% include 'partials/menu.twig' with {
                            items: menu.get_items
                        } %}
\t\t\t</nav>
\t\t\t<!-- #nav -->
\t\t</div>
\t{% endblock %}
\t{{ timer_end('header') }}
</header>
", "layouts/header.twig", "/var/www/html/wp-content/themes/MyTheme/views/layouts/header.twig");
    }
}
