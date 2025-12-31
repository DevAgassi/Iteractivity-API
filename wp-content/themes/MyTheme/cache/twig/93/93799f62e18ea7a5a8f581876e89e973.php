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
        yield ">
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
\t\t<header class=\"header\">
\t\t\t";
        // line 15
        yield $this->env->getFunction('timer_start')->getCallable()("header");
        yield "
\t\t\t";
        // line 16
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 29
        yield "\t\t\t";
        yield $this->env->getFunction('timer_end')->getCallable()("header");
        yield "
\t\t</header>

\t\t<section id=\"content\" class=\"content-wrapper container px-5 mx-auto\">
\t\t\t";
        // line 33
        if ((($tmp = ($context["title"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 34
            yield "\t\t\t\t<h1>";
            yield ($context["title"] ?? null);
            yield "</h1>
\t\t\t";
        }
        // line 36
        yield "\t\t\t<div class=\"wrapper\">
\t\t\t\t";
        // line 37
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 40
        yield "\t\t\t</div>
\t\t</section>
\t\t";
        // line 42
        yield $this->env->getFunction('timer_start')->getCallable()("footer");
        yield "
\t\t";
        // line 43
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 46
        yield "\t\t";
        yield $this->env->getFunction('function')->getCallable()("wp_footer");
        yield "
\t\t";
        // line 47
        $this->env->getFunction('action')->getCallable()("get_footer");
        // line 48
        yield "\t\t";
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
        yield from $this->load("partials/head.twig", 8)->unwrap()->yield($context);
        // line 9
        yield "\t";
        yield from [];
    }

    // line 16
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 17
        yield "\t\t\t\t<div class=\"wrapper\">
\t\t\t\t\t<h1 class=\"hdr-logo\">
\t\t\t\t\t\t<a class=\"hdr-logo-link\" href=\"";
        // line 19
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "url", [], "any", false, false, false, 19);
        yield "\">";
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "name", [], "any", false, false, false, 19);
        yield "</a>
\t\t\t\t\t</h1>
\t\t\t\t\t<nav id=\"nav-main\" class=\"nav-main\">
\t\t\t\t\t\t";
        // line 22
        yield from $this->load("partials/menu.twig", 22)->unwrap()->yield(CoreExtension::merge($context, ["items" => CoreExtension::getAttribute($this->env, $this->source,         // line 23
($context["menu"] ?? null), "get_items", [], "any", false, false, false, 23)]));
        // line 25
        yield "\t\t\t\t\t</nav>
\t\t\t\t\t<!-- #nav -->
\t\t\t\t</div>
\t\t\t";
        yield from [];
    }

    // line 37
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 38
        yield "\t\t\t\t\tSorry, no content
\t\t\t\t";
        yield from [];
    }

    // line 43
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 44
        yield "\t\t\t";
        yield from $this->load("partials/footer.twig", 44)->unwrap()->yield($context);
        // line 45
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
        return array (  208 => 45,  205 => 44,  198 => 43,  192 => 38,  185 => 37,  177 => 25,  175 => 23,  174 => 22,  166 => 19,  162 => 17,  155 => 16,  150 => 9,  147 => 8,  140 => 7,  130 => 48,  128 => 47,  123 => 46,  121 => 43,  117 => 42,  113 => 40,  111 => 37,  108 => 36,  102 => 34,  100 => 33,  92 => 29,  90 => 16,  86 => 15,  81 => 13,  77 => 12,  73 => 11,  68 => 10,  66 => 7,  61 => 6,  55 => 4,  53 => 3,  49 => 2,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html {{ site.language_attributes }}>
\t{% if assets.isHot() %}
\t\t<script id=\"hot-client\" type=\"module\" src=\"{{ assets.render().client }}\"></script>
\t{% endif %}
\t{{ timer_start('head') }}
\t{% block head %}
\t\t{% include 'partials/head.twig' %}
\t{% endblock %}
\t{{ timer_end('head') }}
\t<body class=\"{{ body_class }}\">
\t\t{{ function('wp_body_open') }}
\t\t<a class=\"skip-link screen-reader-text\" href=\"#content\">{{ _e('Skip to content') }}</a>
\t\t<header class=\"header\">
\t\t\t{{ timer_start('header') }}
\t\t\t{% block header %}
\t\t\t\t<div class=\"wrapper\">
\t\t\t\t\t<h1 class=\"hdr-logo\">
\t\t\t\t\t\t<a class=\"hdr-logo-link\" href=\"{{ site.url }}\">{{ site.name }}</a>
\t\t\t\t\t</h1>
\t\t\t\t\t<nav id=\"nav-main\" class=\"nav-main\">
\t\t\t\t\t\t{% include 'partials/menu.twig' with {
                            items: menu.get_items
                        } %}
\t\t\t\t\t</nav>
\t\t\t\t\t<!-- #nav -->
\t\t\t\t</div>
\t\t\t{% endblock %}
\t\t\t{{ timer_end('header') }}
\t\t</header>

\t\t<section id=\"content\" class=\"content-wrapper container px-5 mx-auto\">
\t\t\t{% if title %}
\t\t\t\t<h1>{{ title }}</h1>
\t\t\t{% endif %}
\t\t\t<div class=\"wrapper\">
\t\t\t\t{% block content %}
\t\t\t\t\tSorry, no content
\t\t\t\t{% endblock %}
\t\t\t</div>
\t\t</section>
\t\t{{ timer_start('footer') }}
\t\t{% block footer %}
\t\t\t{% include 'partials/footer.twig' %}
\t\t{% endblock %}
\t\t{{ function('wp_footer') }}
\t\t{% do action('get_footer') %}
\t\t{{ timer_end('footer') }}
\t</body>
</html>
", "layouts/base.twig", "/var/www/html/wp-content/themes/MyTheme/views/layouts/base.twig");
    }
}
