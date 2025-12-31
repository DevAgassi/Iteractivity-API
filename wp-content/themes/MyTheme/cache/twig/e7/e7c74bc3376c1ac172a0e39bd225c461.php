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

/* partials/tease-post.twig */
class __TwigTemplate_80a4b1ec5d7e220a0fb3c0d780717e0c extends Template
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

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "partials/tease.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("partials/tease.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "    <h2 class=\"h2\"><a href=\"";
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "link", [], "any", false, false, false, 4);
        yield "\">";
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "title", [], "any", false, false, false, 4);
        yield "</a></h2>
    <p>
        ";
        // line 6
        yield CoreExtension::getAttribute($this->env, $this->source,         // line 7
($context["post"] ?? null), "excerpt", [["words" => 5, "read_more" => "Keep reading"]], "method", false, false, false, 7);
        // line 11
        yield "
    </p>
    ";
        // line 13
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "thumbnail", [], "any", false, false, false, 13), "src", [], "any", false, false, false, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "        <img src=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "thumbnail", [], "any", false, false, false, 14), "src", [], "any", false, false, false, 14);
            yield "\" />
    ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/tease-post.twig";
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
        return array (  75 => 14,  73 => 13,  69 => 11,  67 => 7,  66 => 6,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'partials/tease.twig' %}

{% block content %}
    <h2 class=\"h2\"><a href=\"{{ post.link }}\">{{ post.title }}</a></h2>
    <p>
        {{
            post.excerpt({
                words: 5,
                read_more: 'Keep reading'
            })
        }}
    </p>
    {% if post.thumbnail.src %}
        <img src=\"{{ post.thumbnail.src }}\" />
    {% endif %}
{% endblock %}", "partials/tease-post.twig", "/var/www/html/wp-content/themes/MyTheme/views/partials/tease-post.twig");
    }
}
