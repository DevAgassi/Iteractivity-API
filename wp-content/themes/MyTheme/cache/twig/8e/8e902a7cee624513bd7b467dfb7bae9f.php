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

/* layouts/head.twig */
class __TwigTemplate_fefb2c8bf66435b15e53b16f2972cd79 extends Template
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
        yield "<head>
    <meta charset=\"";
        // line 2
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "charset", [], "any", false, false, false, 2);
        yield "\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    <link rel=\"author\" href=\"";
        // line 4
        yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "theme", [], "any", false, false, false, 4), "link", [], "any", false, false, false, 4);
        yield "/humans.txt\" />
    <link rel=\"profile\" href=\"http://gmpg.org/xfn/11\" />
    ";
        // line 6
        $this->env->getFunction('action')->getCallable()("get_header");
        // line 7
        yield "    ";
        yield $this->env->getFunction('function')->getCallable()("wp_head");
        yield "
    
</head>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layouts/head.twig";
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
        return array (  57 => 7,  55 => 6,  50 => 4,  45 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<head>
    <meta charset=\"{{ site.charset }}\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    <link rel=\"author\" href=\"{{ site.theme.link }}/humans.txt\" />
    <link rel=\"profile\" href=\"http://gmpg.org/xfn/11\" />
    {% do action('get_header') %}
    {{ function('wp_head') }}
    
</head>", "layouts/head.twig", "/var/www/html/wp-content/themes/MyTheme/views/layouts/head.twig");
    }
}
