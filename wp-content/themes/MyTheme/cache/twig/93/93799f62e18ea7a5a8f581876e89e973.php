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

/* layouts/base.twig */
class __TwigTemplate_cd43c717c86b00a99fab3c8a4380c0ca extends Template
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
            'head' => [$this, 'block_head'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html ";
        // line 2
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "language_attributes", [], "any", false, false, false, 2);
        yield " data-theme=\"1dark\">
\t";
        // line 3
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["assets"] ?? null), "isHot", [], "method", false, false, false, 3)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 4
            yield "\t\t<script id=\"hot-client\" type=\"module\" src=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["assets"] ?? null), "render", [], "method", false, false, false, 4), "client", [], "any", false, false, false, 4);
            yield "\"></script>
\t";
        }
        // line 6
        yield "\t";
        yield $this->env->getFunction('timer_start')->getCallable()("head");
        yield "
\t";
        // line 7
        yield from $this->unwrap()->yieldBlock('head', $context, $blocks);
        // line 10
        yield "\t";
        yield $this->env->getFunction('timer_end')->getCallable()("head");
        yield "
\t<body class=\"";
        // line 11
        yield ($context["body_class"] ?? null);
        yield "\">
\t\t";
        // line 12
        yield $this->env->getFunction('function')->getCallable()("wp_body_open");
        yield "
\t\t<a class=\"skip-link screen-reader-text\" href=\"#content\">";
        // line 13
        yield _e("Skip to content");
        yield "</a>
\t\t";
        // line 14
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 17
        yield "
\t\t<main class=\"content-wrapper\" role=\"main\">
\t\t\t";
        // line 19
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 22
        yield "\t\t</main>

\t\t";
        // line 24
        yield $this->env->getFunction('timer_start')->getCallable()("footer");
        yield "
\t\t";
        // line 25
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 28
        yield "
\t\t";
        // line 29
        yield $this->env->getFunction('function')->getCallable()("wp_footer");
        yield "
\t\t";
        // line 30
        yield $this->env->getFunction('timer_end')->getCallable()("footer");
        yield "
\t</body>
</html>
";
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 8
        yield "\t\t";
        yield from $this->load("layouts/head.twig", 8)->unwrap()->yield($context);
        // line 9
        yield "\t";
        yield from [];
    }

    // line 14
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 15
        yield "\t\t\t";
        yield from $this->load("layouts/header.twig", 15)->unwrap()->yield($context);
        // line 16
        yield "\t\t";
        yield from [];
    }

    // line 19
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 20
        yield "\t\t\t\tSorry, no content
\t\t\t";
        yield from [];
    }

    // line 25
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 26
        yield "\t\t\t";
        yield from $this->load("layouts/footer.twig", 26)->unwrap()->yield($context);
        // line 27
        yield "\t\t";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layouts/base.twig";
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
        return array (  172 => 27,  169 => 26,  162 => 25,  156 => 20,  149 => 19,  144 => 16,  141 => 15,  134 => 14,  129 => 9,  126 => 8,  119 => 7,  110 => 30,  106 => 29,  103 => 28,  101 => 25,  97 => 24,  93 => 22,  91 => 19,  87 => 17,  85 => 14,  81 => 13,  77 => 12,  73 => 11,  68 => 10,  66 => 7,  61 => 6,  55 => 4,  53 => 3,  49 => 2,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html {{ site.language_attributes }} data-theme=\"1dark\">
\t{% if assets.isHot() %}
\t\t<script id=\"hot-client\" type=\"module\" src=\"{{ assets.render().client }}\"></script>
\t{% endif %}
\t{{ timer_start('head') }}
\t{% block head %}
\t\t{% include 'layouts/head.twig' %}
\t{% endblock %}
\t{{ timer_end('head') }}
\t<body class=\"{{ body_class }}\">
\t\t{{ function('wp_body_open') }}
\t\t<a class=\"skip-link screen-reader-text\" href=\"#content\">{{ _e('Skip to content') }}</a>
\t\t{% block header %}
\t\t\t{% include 'layouts/header.twig' %}
\t\t{% endblock %}

\t\t<main class=\"content-wrapper\" role=\"main\">
\t\t\t{% block content %}
\t\t\t\tSorry, no content
\t\t\t{% endblock %}
\t\t</main>

\t\t{{ timer_start('footer') }}
\t\t{% block footer %}
\t\t\t{% include 'layouts/footer.twig' %}
\t\t{% endblock %}

\t\t{{ function('wp_footer') }}
\t\t{{ timer_end('footer') }}
\t</body>
</html>
", "layouts/base.twig", "/var/www/html/wp-content/themes/MyTheme/views/layouts/base.twig");
    }
}
