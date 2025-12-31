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
        if ((($tmp = ($context["menu"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 2
            yield "    <ul>
        ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 4
                yield "            <li class=\"";
                yield Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "classes", [], "any", false, false, false, 4), " ");
                yield "\">
                <a target=\"";
                // line 5
                yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "target", [], "any", false, false, false, 5);
                yield "\" href=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 5);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 5);
                yield "</a>
                ";
                // line 6
                yield from $this->load("partials/menu.twig", 6)->unwrap()->yield(CoreExtension::merge($context, ["items" => CoreExtension::getAttribute($this->env, $this->source,                 // line 7
$context["item"], "children", [], "any", false, false, false, 7)]));
                // line 9
                yield "            </li>
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            yield "    </ul>
";
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
        return array (  95 => 11,  80 => 9,  78 => 7,  77 => 6,  69 => 5,  64 => 4,  47 => 3,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if menu %}
    <ul>
        {% for item in items %}
            <li class=\"{{ item.classes|join(' ') }}\">
                <a target=\"{{ item.target }}\" href=\"{{ item.link }}\">{{ item.title }}</a>
                {% include 'partials/menu.twig' with {
                    items: item.children
                } %}
            </li>
        {% endfor %}
    </ul>
{% endif %}", "partials/menu.twig", "/var/www/html/wp-content/themes/MyTheme/views/partials/menu.twig");
    }
}
