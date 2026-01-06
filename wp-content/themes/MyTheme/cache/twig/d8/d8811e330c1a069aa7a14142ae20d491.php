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

/* /blocks/section/view.twig */
class __TwigTemplate_d98f4fb9391d435b0f8cbe3be9681bd6 extends Template
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
        yield "<section id=\"";
        yield ($context["id"] ?? null);
        yield "\" class=\"";
        yield ($context["classes"] ?? null);
        yield "\">
\t<div class=\"container container--\">
\t\t<InnerBlocks/>
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
        return "/blocks/section/view.twig";
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section id=\"{{ id }}\" class=\"{{ classes }}\">
\t<div class=\"container container--\">
\t\t<InnerBlocks/>
\t</div>
</section>
", "/blocks/section/view.twig", "/var/www/html/wp-content/themes/MyTheme/blocks/section/view.twig");
    }
}
