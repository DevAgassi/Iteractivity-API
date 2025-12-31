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

/* /var/www/html/wp-content/themes/MyTheme/blocks/hero/view.twig */
class __TwigTemplate_9142518392c15fcf333bbb26c2472327 extends Template
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
        yield "<section id=\"hero-block\" class=\"hero-section\" ";
        yield ($context["attrs"] ?? null);
        yield " data-wp-interactive=\"hero-section\" data-unique-id=\"";
        yield ($context["unique_id"] ?? null);
        yield "\">
\t<div class=\"hero-content flex flex-col items-center justify-center text-center gap-6\">
\t\t<h1>";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, ($context["state"] ?? null), "title", [], "any", false, false, false, 3)));
        yield "</h1>
\t\t<button type=\"button\" class=\"rounded-xl font-semibold text-black bg-primary-500 hover:bg-primary-600 transition px-4 py-2 text-base\" 'data-wp-on--click' : 'actions.openModal' , 'data-wp-text' : 'state.buttonText'>
            ";
        // line 5
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["state"] ?? null), "buttonText", [], "any", false, false, false, 5);
        yield "
\t\t</button>
\t\t";
        // line 7
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => CoreExtension::getAttribute($this->env, $this->source,         // line 8
($context["state"] ?? null), "buttonText", [], "any", false, false, false, 8), "variant" => "primary", "attrs" => "data-wp-on--click=\"actions.openModal\""]);
        // line 11
        yield "
\t</div>
</section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/var/www/html/wp-content/themes/MyTheme/blocks/hero/view.twig";
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
        return array (  63 => 11,  61 => 8,  60 => 7,  55 => 5,  50 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section id=\"hero-block\" class=\"hero-section\" {{ attrs|raw }} data-wp-interactive=\"hero-section\" data-unique-id=\"{{ unique_id }}\">
\t<div class=\"hero-content flex flex-col items-center justify-center text-center gap-6\">
\t\t<h1>{{ state.title|striptags|e }}</h1>
\t\t<button type=\"button\" class=\"rounded-xl font-semibold text-black bg-primary-500 hover:bg-primary-600 transition px-4 py-2 text-base\" 'data-wp-on--click' : 'actions.openModal' , 'data-wp-text' : 'state.buttonText'>
            {{ state.buttonText }}
\t\t</button>
\t\t{{ ui_button({
\t\t\tlabel: state.buttonText,
\t\t\tvariant: 'primary',
\t\t\tattrs: 'data-wp-on--click=\"actions.openModal\"'
\t\t}) }}
\t</div>
</section>
", "/var/www/html/wp-content/themes/MyTheme/blocks/hero/view.twig", "/var/www/html/wp-content/themes/MyTheme/blocks/hero/view.twig");
    }
}
