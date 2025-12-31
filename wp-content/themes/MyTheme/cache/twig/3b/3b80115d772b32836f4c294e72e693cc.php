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

/* partials/tease.twig */
class __TwigTemplate_b28caa81b3e1d945a702c325df7ce5b5 extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<article class=\"tease tease-";
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "type", [], "any", false, false, false, 1);
        yield "\" id=\"tease-";
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "id", [], "any", false, false, false, 1);
        yield "\">
    ";
        // line 2
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 9
        yield "</article>";
        yield from [];
    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 3
        yield "        <h2 class=\"h2\"><a href=\"";
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "link", [], "any", false, false, false, 3);
        yield "\">";
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "title", [], "any", false, false, false, 3);
        yield "</a></h2>
        <p>";
        // line 4
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "content", [], "any", false, false, false, 4);
        yield "</p>
        ";
        // line 5
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "thumbnail", [], "any", false, false, false, 5)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 6
            yield "            <img src=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "thumbnail", [], "any", false, false, false, 6), "src", [], "any", false, false, false, 6);
            yield "\" />
        ";
        }
        // line 8
        yield "    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/tease.twig";
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
        return array (  83 => 8,  77 => 6,  75 => 5,  71 => 4,  64 => 3,  57 => 2,  52 => 9,  50 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<article class=\"tease tease-{{ post.type }}\" id=\"tease-{{ post.id }}\">
    {% block content %}
        <h2 class=\"h2\"><a href=\"{{ post.link }}\">{{ post.title }}</a></h2>
        <p>{{ post.content}}</p>
        {% if post.thumbnail %}
            <img src=\"{{ post.thumbnail.src }}\" />
        {% endif %}
    {% endblock %}
</article>", "partials/tease.twig", "/var/www/html/wp-content/themes/MyTheme/views/partials/tease.twig");
    }
}
