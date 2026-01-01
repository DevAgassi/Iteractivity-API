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
        yield "<section ";
        yield ($context["attrs"] ?? null);
        yield " data-wp-interactive=\"hero-section\" data-unique-id=\"";
        yield ($context["unique_id"] ?? null);
        yield "\" ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "image", [], "any", false, false, false, 1) && CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "background_image", [], "any", false, false, false, 1))) ? ((("style=\"background-image: url(" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "image", [], "any", false, false, false, 1), "url", [], "any", false, false, false, 1)) . ");\"")) : (""));
        yield " class=\"";
        yield ($context["classes"] ?? null);
        yield "\" id=\"";
        yield ($context["id"] ?? null);
        yield "\">
\t<div class=\"max-w-7xl mx-auto md:px-4\">
\t\t<div class=\"flex flex-col md:flex-row md:items-center\">
\t\t\t<div class=\"";
        // line 4
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["classes_block"] ?? null), "image_block", [], "any", false, false, false, 4);
        yield " ";
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "image", [], "any", false, false, false, 4)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("") : ("md:block hidden"));
        yield "\">
\t\t\t\t";
        // line 5
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "image", [], "any", false, false, false, 5)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 6
            yield "\t\t\t\t\t";
            yield from $this->load("components/image.twig", 6)->unwrap()->yield(CoreExtension::toArray(["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "image", [], "any", false, false, false, 6), "ID", [], "any", false, false, false, 6), "classes" => CoreExtension::getAttribute($this->env, $this->source, ($context["classes_block"] ?? null), "image", [], "any", false, false, false, 6), "sizes" => "(max-width: 767px) 500px, 755px", "" => true]));
            // line 7
            yield "\t\t\t\t";
        }
        // line 8
        yield "\t\t\t</div>
\t\t\t<div class=\"";
        // line 9
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["classes_block"] ?? null), "wrapper_content", [], "any", false, false, false, 9);
        yield "\">
\t\t\t\t";
        // line 10
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "text", [], "any", false, false, false, 10)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 11
            yield "\t\t\t\t\t<div class=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["classes_block"] ?? null), "text", [], "any", false, false, false, 11);
            yield "\" ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "image", [], "any", false, false, false, 11) && CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "background_image_mob", [], "any", false, false, false, 11))) ? ((("style=\"background-image: url(" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "image", [], "any", false, false, false, 11), "url", [], "any", false, false, false, 11)) . ");\"")) : (""));
            yield ">
\t\t\t\t\t\t";
            // line 12
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "text", [], "any", false, false, false, 12);
            yield "
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 15
        yield "\t\t\t\t";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_1", [], "any", false, false, false, 15) || CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_1", [], "any", false, false, false, 15))) {
            // line 16
            yield "\t\t\t\t\t<div class=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["classes_block"] ?? null), "wrapper_buttons", [], "any", false, false, false, 16);
            yield "\">
\t\t\t\t\t\t";
            // line 17
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_1", [], "any", false, false, false, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 18
                yield "\t\t\t\t\t\t\t<a href=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_1", [], "any", false, false, false, 18), "url", [], "any", false, false, false, 18);
                yield "\" target=\"";
                yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_1", [], "any", false, false, false, 18), "target", [], "any", false, false, false, 18)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_1", [], "any", false, false, false, 18), "target", [], "any", false, false, false, 18)) : ("_self"));
                yield "\" class=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["classes_block"] ?? null), "button_1", [], "any", false, false, false, 18);
                yield "\">
\t\t\t\t\t\t\t\t";
                // line 19
                yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_1", [], "any", false, true, false, 19), "title", [], "any", true, true, false, 19) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_1", [], "any", false, false, false, 19), "title", [], "any", false, false, false, 19)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_1", [], "any", false, false, false, 19), "title", [], "any", false, false, false, 19)) : ("Link"));
                yield "
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            }
            // line 22
            yield "\t\t\t\t\t\t";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_2", [], "any", false, false, false, 22)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 23
                yield "\t\t\t\t\t\t\t<a href=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_2", [], "any", false, false, false, 23), "url", [], "any", false, false, false, 23);
                yield "\" target=\"";
                yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_2", [], "any", false, false, false, 23), "target", [], "any", false, false, false, 23)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_2", [], "any", false, false, false, 23), "target", [], "any", false, false, false, 23)) : ("_self"));
                yield "\" class=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["classes_block"] ?? null), "button_2", [], "any", false, false, false, 23);
                yield "\">
\t\t\t\t\t\t\t\t";
                // line 24
                yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_2", [], "any", false, false, false, 24), "title", [], "any", false, false, false, 24)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "button_2", [], "any", false, false, false, 24), "title", [], "any", false, false, false, 24)) : ("Link"));
                yield "
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            }
            // line 27
            yield "\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 29
        yield "\t\t\t\t";
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "1", "color" => "primary", "attrs" => "data-wp-on--click=\"actions.openModal\" data-wp-text=\"context.buttonText\""]);
        // line 33
        yield "


\t\t\t\t";
        // line 37
        yield "\t\t\t\t<section class=\"p-10 space-y-12 bg-[var(--color-background)] min-h-screen\">
\t\t\t\t\t<h1>Cheat Sheet (2026)</h1>
\t\t\t\t\t";
        // line 40
        yield "\t\t\t\t\t<div class=\"space-y-8\">
\t\t\t\t\t\t<header class=\"border-b border-gray-200 pb-4\">
\t\t\t\t\t\t\t<h3 class=\"text-2xl font-bold\">UI Button Component</h3>
\t\t\t\t\t\t</header>

\t\t\t\t\t\t";
        // line 46
        yield "\t\t\t\t\t\t<div
\t\t\t\t\t\t\tclass=\"grid grid-row gap-8\">
\t\t\t\t\t\t\t";
        // line 49
        yield "\t\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t\t<h3 class=\"text-xl font-semibold uppercase tracking-wider text-[var(--color-text-light)]\">1. Solid Colors (Default)</h3>
\t\t\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-6 bg-white rounded-xl shadow-sm\">
\t\t\t\t\t\t\t\t\t";
        // line 52
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "Primary Solid", "color" => "primary"]);
        yield "
\t\t\t\t\t\t\t\t\t";
        // line 53
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "Success Solid", "color" => "success"]);
        yield "
\t\t\t\t\t\t\t\t\t";
        // line 54
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "Error Solid", "color" => "error"]);
        yield "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
        // line 59
        yield "\t\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t\t<p class=\"text-sm font-mono text-gray-500\">variant: 'outlined'</p>
\t\t\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-6 bg-white rounded-xl shadow-sm\">
\t\t\t\t\t\t\t\t\t";
        // line 62
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "Primary Outlined", "variant" => "outlined", "color" => "primary"]);
        yield "
\t\t\t\t\t\t\t\t\t";
        // line 63
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "Warning Outlined", "variant" => "outlined", "color" => "warning"]);
        yield "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
        // line 68
        yield "\t\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t\t<p class=\"text-sm font-mono text-gray-500\">Sizes (sm, md, lg)</p>
\t\t\t\t\t\t\t\t<div class=\"gap-4 p-6 bg-white rounded-xl shadow-sm\">
\t\t\t\t\t\t\t\t\t";
        // line 71
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "Small", "size" => "sm"]);
        yield "
\t\t\t\t\t\t\t\t\t";
        // line 72
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "Medium", "size" => "md"]);
        yield "
\t\t\t\t\t\t\t\t\t";
        // line 73
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "Large", "size" => "lg"]);
        yield "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
        // line 79
        yield "\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t<p class=\"text-sm font-mono text-gray-500\">States & Features</p>
\t\t\t\t\t\t\t<div class=\"gap-4 p-6 bg-white rounded-xl shadow-sm\">
\t\t\t\t\t\t\t\t";
        // line 82
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "Disabled Button", "disabled" => true]);
        yield "
\t\t\t\t\t\t\t\t";
        // line 83
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "No Background", "no_bg" => true, "color" => "primary", "variant" => "ghost"]);
        yield "
\t\t\t\t\t\t\t\t";
        // line 84
        yield $this->env->getFunction('ui_button')->getCallable()(["label" => "With Custom Icon", "color" => "secondary", "icon_after" => "<svg class=\"w-4 h-4\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path d=\"M14 5l7 7m0 0l-7 7m7-7H3\"></path></svg>"]);
        // line 88
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<header class=\"border-b border-[var(--color-border)] pb-6\">
\t\t\t\t\t\t<h2 class=\"text-3xl font-bold text-[var(--color-text)]\">UI Link Component</h2>
\t\t\t\t\t\t<p class=\"text-[var(--color-text-light)] mt-2\">Тестування всіх варіацій, кольорів та станів компонента.</p>
\t\t\t\t\t</header>

\t\t\t\t\t";
        // line 99
        yield "\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t<h3 class=\"text-xl font-semibold uppercase tracking-wider text-[var(--color-text-light)]\">1. Solid Colors (Default)</h3>
\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-6 bg-white rounded-xl shadow-sm\">
\t\t\t\t\t\t\t";
        // line 102
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Primary", "color" => "primary", "attrs" => "data-wp-on--click=\"actions.openModal\""]);
        yield "
\t\t\t\t\t\t\t";
        // line 103
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Secondary", "color" => "secondary"]);
        yield "
\t\t\t\t\t\t\t";
        // line 104
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Accent", "color" => "accent"]);
        yield "
\t\t\t\t\t\t\t";
        // line 105
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Success", "color" => "success"]);
        yield "
\t\t\t\t\t\t\t";
        // line 106
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Warning", "color" => "warning"]);
        yield "
\t\t\t\t\t\t\t";
        // line 107
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Error", "color" => "error"]);
        yield "
\t\t\t\t\t\t\t";
        // line 108
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "SK Blue", "color" => "sk-blue-primary"]);
        yield "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t";
        // line 113
        yield "\t\t\t\t\t<div class=\"grid grid-cols-1 md:grid-cols-2 gap-8\">
\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">2. Outlined Variant</h3>
\t\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-6 bg-white rounded-xl shadow-sm border border-gray-100\">
\t\t\t\t\t\t\t\t";
        // line 117
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Outlined", "color" => "primary", "variant" => "outlined"]);
        yield "
\t\t\t\t\t\t\t\t";
        // line 118
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Success", "color" => "success", "variant" => "outlined"]);
        yield "
\t\t\t\t\t\t\t\t";
        // line 119
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Warning", "color" => "warning", "variant" => "outlined"]);
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">3. Ghost Variant</h3>
\t\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-6 bg-white rounded-xl shadow-sm border border-gray-100\">
\t\t\t\t\t\t\t\t";
        // line 125
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Ghost Link", "color" => "primary", "variant" => "ghost"]);
        yield "
\t\t\t\t\t\t\t\t";
        // line 126
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Delete", "color" => "error", "variant" => "ghost"]);
        yield "
\t\t\t\t\t\t\t\t";
        // line 127
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "With Icon", "color" => "secondary", "variant" => "ghost", "type" => "link"]);
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t";
        // line 133
        yield "\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">4. Reverse Mode (On Dark Background)</h3>
\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-8 bg-[var(--color-primary-dark)] rounded-xl shadow-inner\">
\t\t\t\t\t\t\t";
        // line 136
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Reverse Solid", "color" => "primary", "reverse" => true]);
        yield "
\t\t\t\t\t\t\t";
        // line 137
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Reverse Outlined", "color" => "secondary", "variant" => "outlined", "reverse" => true, "no_bg" => true]);
        yield "
\t\t\t\t\t\t\t";
        // line 138
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Reverse Ghost", "color" => "error", "variant" => "ghost", "reverse" => true]);
        yield "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t";
        // line 143
        yield "\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">5. States & Types</h3>
\t\t\t\t\t\t<div class=\"grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4\">
\t\t\t\t\t\t\t<div class=\"p-1 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 mb-2 italic\">Icon Type</span>
\t\t\t\t\t\t\t\t";
        // line 148
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Get Started", "color" => "primary", "type" => "link"]);
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"p-1 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 mb-2 italic\">External (_blank)</span>
\t\t\t\t\t\t\t\t";
        // line 152
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Open Google", "href" => "https://google.com", "target" => "_blank", "color" => "secondary"]);
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"p-1 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 mb-2 italic\">Disabled State</span>
\t\t\t\t\t\t\t\t";
        // line 156
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Not Allowed", "color" => "primary", "disabled" => true]);
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"p-1 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 mb-2 italic\">Custom Class (Rounded None)</span>
\t\t\t\t\t\t\t\t";
        // line 160
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Pill Button", "color" => "accent", "class" => "rounded-none"]);
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t";
        // line 166
        yield "\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">6. Brand Specific (SK Blue)</h3>
\t\t\t\t\t\t<div class=\"gap-4 p-6 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl\">
\t\t\t\t\t\t\t";
        // line 169
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "SK Primary", "color" => "sk-blue-primary"]);
        yield "
\t\t\t\t\t\t\t";
        // line 170
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "SK Outlined", "color" => "sk-blue-primary", "variant" => "outlined"]);
        yield "
\t\t\t\t\t\t\t";
        // line 171
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "SK Ghost", "color" => "sk-blue-primary", "variant" => "ghost", "type" => "link"]);
        yield "
\t\t\t\t\t\t\t";
        // line 172
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "SK No BG", "color" => "sk-blue-primary", "variant" => "ghost", "type" => "link", "no_bg" => true]);
        yield "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t";
        // line 177
        yield "\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">7. Button Sizes</h3>
\t\t\t\t\t\t<div class=\"flex flex-wrap items-end gap-6 p-6 bg-white rounded-xl shadow-sm border border-gray-100\">
\t\t\t\t\t\t\t<div class=\"flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 italic\">Small (sm)</span>
\t\t\t\t\t\t\t\t";
        // line 182
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Small Button", "size" => "sm", "color" => "primary"]);
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 italic\">Medium (md)</span>
\t\t\t\t\t\t\t\t";
        // line 186
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Medium Button", "size" => "md", "color" => "primary"]);
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 italic\">Large (lg)</span>
\t\t\t\t\t\t\t\t";
        // line 190
        yield $this->env->getFunction('ui_link')->getCallable()(["label" => "Large Button", "size" => "lg", "color" => "primary", "type" => "link"]);
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t</section>

\t\t\t</div>
\t\t</div>
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
        return array (  423 => 190,  416 => 186,  409 => 182,  402 => 177,  395 => 172,  391 => 171,  387 => 170,  383 => 169,  378 => 166,  370 => 160,  363 => 156,  356 => 152,  349 => 148,  342 => 143,  335 => 138,  331 => 137,  327 => 136,  322 => 133,  314 => 127,  310 => 126,  306 => 125,  297 => 119,  293 => 118,  289 => 117,  283 => 113,  276 => 108,  272 => 107,  268 => 106,  264 => 105,  260 => 104,  256 => 103,  252 => 102,  247 => 99,  235 => 88,  233 => 84,  229 => 83,  225 => 82,  220 => 79,  212 => 73,  208 => 72,  204 => 71,  199 => 68,  192 => 63,  188 => 62,  183 => 59,  176 => 54,  172 => 53,  168 => 52,  163 => 49,  159 => 46,  152 => 40,  148 => 37,  143 => 33,  140 => 29,  136 => 27,  130 => 24,  121 => 23,  118 => 22,  112 => 19,  103 => 18,  101 => 17,  96 => 16,  93 => 15,  87 => 12,  80 => 11,  78 => 10,  74 => 9,  71 => 8,  68 => 7,  65 => 6,  63 => 5,  57 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section {{ attrs|raw }} data-wp-interactive=\"hero-section\" data-unique-id=\"{{ unique_id }}\" {{ fields.image and fields.background_image ? 'style=\"background-image: url('~ fields.image.url ~ ');\"' : '' }} class=\"{{ classes }}\" id=\"{{ id }}\">
\t<div class=\"max-w-7xl mx-auto md:px-4\">
\t\t<div class=\"flex flex-col md:flex-row md:items-center\">
\t\t\t<div class=\"{{ classes_block.image_block }} {{ fields.image ?'': 'md:block hidden' }}\">
\t\t\t\t{% if fields.image %}
\t\t\t\t\t{% include 'components/image.twig' with {'id': fields.image.ID, 'classes': classes_block.image, 'sizes': '(max-width: 767px) 500px, 755px', '': true} only %}
\t\t\t\t{% endif %}
\t\t\t</div>
\t\t\t<div class=\"{{ classes_block.wrapper_content }}\">
\t\t\t\t{% if fields.text %}
\t\t\t\t\t<div class=\"{{ classes_block.text }}\" {{ fields.image and fields.background_image_mob ? 'style=\"background-image: url('~ fields.image.url ~ ');\"' : '' }}>
\t\t\t\t\t\t{{ fields.text }}
\t\t\t\t\t</div>
\t\t\t\t{% endif %}
\t\t\t\t{% if fields.button_1 or fields.button_1 %}
\t\t\t\t\t<div class=\"{{ classes_block.wrapper_buttons }}\">
\t\t\t\t\t\t{% if fields.button_1 %}
\t\t\t\t\t\t\t<a href=\"{{ fields.button_1.url }}\" target=\"{{ fields.button_1.target ?: '_self' }}\" class=\"{{ classes_block.button_1 }}\">
\t\t\t\t\t\t\t\t{{ fields.button_1.title ?? 'Link' }}
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% if fields.button_2 %}
\t\t\t\t\t\t\t<a href=\"{{ fields.button_2.url }}\" target=\"{{ fields.button_2.target ?: '_self' }}\" class=\"{{ classes_block.button_2 }}\">
\t\t\t\t\t\t\t\t{{ fields.button_2.title ?: 'Link' }}
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t</div>
\t\t\t\t{% endif %}
\t\t\t\t{{ ui_button({
\t\t\t\t\tlabel: '1',
\t\t\t\t\tcolor: 'primary',
\t\t\t\t\tattrs: 'data-wp-on--click=\"actions.openModal\" data-wp-text=\"context.buttonText\"'
\t\t\t\t}) }}


\t\t\t\t{# Cheat Sheet Panel: UI Link Component #}
\t\t\t\t<section class=\"p-10 space-y-12 bg-[var(--color-background)] min-h-screen\">
\t\t\t\t\t<h1>Cheat Sheet (2026)</h1>
\t\t\t\t\t{# SECTION: BUTTONS #}
\t\t\t\t\t<div class=\"space-y-8\">
\t\t\t\t\t\t<header class=\"border-b border-gray-200 pb-4\">
\t\t\t\t\t\t\t<h3 class=\"text-2xl font-bold\">UI Button Component</h3>
\t\t\t\t\t\t</header>

\t\t\t\t\t\t{# Сетка вариантов #}
\t\t\t\t\t\t<div
\t\t\t\t\t\t\tclass=\"grid grid-row gap-8\">
\t\t\t\t\t\t\t{# Solid #}
\t\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t\t<h3 class=\"text-xl font-semibold uppercase tracking-wider text-[var(--color-text-light)]\">1. Solid Colors (Default)</h3>
\t\t\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-6 bg-white rounded-xl shadow-sm\">
\t\t\t\t\t\t\t\t\t{{ ui_button({ label: 'Primary Solid', color: 'primary' }) }}
\t\t\t\t\t\t\t\t\t{{ ui_button({ label: 'Success Solid', color: 'success' }) }}
\t\t\t\t\t\t\t\t\t{{ ui_button({ label: 'Error Solid', color: 'error' }) }}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t{# Outlined #}
\t\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t\t<p class=\"text-sm font-mono text-gray-500\">variant: 'outlined'</p>
\t\t\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-6 bg-white rounded-xl shadow-sm\">
\t\t\t\t\t\t\t\t\t{{ ui_button({ label: 'Primary Outlined', variant: 'outlined', color: 'primary' }) }}
\t\t\t\t\t\t\t\t\t{{ ui_button({ label: 'Warning Outlined', variant: 'outlined', color: 'warning' }) }}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t{# Sizes #}
\t\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t\t<p class=\"text-sm font-mono text-gray-500\">Sizes (sm, md, lg)</p>
\t\t\t\t\t\t\t\t<div class=\"gap-4 p-6 bg-white rounded-xl shadow-sm\">
\t\t\t\t\t\t\t\t\t{{ ui_button({ label: 'Small', size: 'sm' }) }}
\t\t\t\t\t\t\t\t\t{{ ui_button({ label: 'Medium', size: 'md' }) }}
\t\t\t\t\t\t\t\t\t{{ ui_button({ label: 'Large', size: 'lg' }) }}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t{# Специальные состояния #}
\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t<p class=\"text-sm font-mono text-gray-500\">States & Features</p>
\t\t\t\t\t\t\t<div class=\"gap-4 p-6 bg-white rounded-xl shadow-sm\">
\t\t\t\t\t\t\t\t{{ ui_button({ label: 'Disabled Button', disabled: true }) }}
\t\t\t\t\t\t\t\t{{ ui_button({ label: 'No Background', no_bg: true, color: 'primary', variant: 'ghost' }) }}
\t\t\t\t\t\t\t\t{{ ui_button({ 
\t\t\t\t\t\t\t\tlabel: 'With Custom Icon', 
\t\t\t\t\t\t\t\tcolor: 'secondary',
\t\t\t\t\t\t\t\ticon_after: '<svg class=\"w-4 h-4\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path d=\"M14 5l7 7m0 0l-7 7m7-7H3\"></path></svg>' 
\t\t\t\t\t\t\t}) }}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<header class=\"border-b border-[var(--color-border)] pb-6\">
\t\t\t\t\t\t<h2 class=\"text-3xl font-bold text-[var(--color-text)]\">UI Link Component</h2>
\t\t\t\t\t\t<p class=\"text-[var(--color-text-light)] mt-2\">Тестування всіх варіацій, кольорів та станів компонента.</p>
\t\t\t\t\t</header>

\t\t\t\t\t{# 1. СЕКЦІЯ: ВСІ КОЛЬОРИ (SOLID) #}
\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t<h3 class=\"text-xl font-semibold uppercase tracking-wider text-[var(--color-text-light)]\">1. Solid Colors (Default)</h3>
\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-6 bg-white rounded-xl shadow-sm\">
\t\t\t\t\t\t\t{{ ui_link({ label: 'Primary', color: 'primary', attrs: 'data-wp-on--click=\"actions.openModal\"', }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'Secondary', color: 'secondary' }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'Accent', color: 'accent' }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'Success', color: 'success' }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'Warning', color: 'warning' }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'Error', color: 'error' }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'SK Blue', color: 'sk-blue-primary' }) }}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t{# 2. СЕКЦІЯ: ВАРІАНТИ (OUTLINED & GHOST) #}
\t\t\t\t\t<div class=\"grid grid-cols-1 md:grid-cols-2 gap-8\">
\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">2. Outlined Variant</h3>
\t\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-6 bg-white rounded-xl shadow-sm border border-gray-100\">
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Outlined', color: 'primary', variant: 'outlined' }) }}
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Success', color: 'success', variant: 'outlined' }) }}
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Warning', color: 'warning', variant: 'outlined' }) }}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">3. Ghost Variant</h3>
\t\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-6 bg-white rounded-xl shadow-sm border border-gray-100\">
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Ghost Link', color: 'primary', variant: 'ghost' }) }}
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Delete', color: 'error', variant: 'ghost' }) }}
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'With Icon', color: 'secondary', variant: 'ghost', type: 'link' }) }}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t{# 3. СЕКЦІЯ: REVERSE & NO_BG (ДЛЯ ТЕМНИХ ФОНІВ) #}
\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">4. Reverse Mode (On Dark Background)</h3>
\t\t\t\t\t\t<div class=\"flex flex-wrap gap-4 p-8 bg-[var(--color-primary-dark)] rounded-xl shadow-inner\">
\t\t\t\t\t\t\t{{ ui_link({ label: 'Reverse Solid', color: 'primary', reverse: true }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'Reverse Outlined', color: 'secondary', variant: 'outlined', reverse: true, no_bg: true }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'Reverse Ghost', color: 'error', variant: 'ghost', reverse: true }) }}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t{# 4. СЕКЦІЯ: ТИПИ ТА СТАНИ #}
\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">5. States & Types</h3>
\t\t\t\t\t\t<div class=\"grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4\">
\t\t\t\t\t\t\t<div class=\"p-1 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 mb-2 italic\">Icon Type</span>
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Get Started', color: 'primary', type: 'link' }) }}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"p-1 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 mb-2 italic\">External (_blank)</span>
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Open Google', href: 'https://google.com', target: '_blank', color: 'secondary' }) }}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"p-1 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 mb-2 italic\">Disabled State</span>
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Not Allowed', color: 'primary', disabled: true }) }}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"p-1 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 mb-2 italic\">Custom Class (Rounded None)</span>
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Pill Button', color: 'accent', class: 'rounded-none' }) }}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t{# 5. СЕКЦІЯ: СПЕЦІАЛЬНІ КОЛЬОРИ SK #}
\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">6. Brand Specific (SK Blue)</h3>
\t\t\t\t\t\t<div class=\"gap-4 p-6 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl\">
\t\t\t\t\t\t\t{{ ui_link({ label: 'SK Primary', color: 'sk-blue-primary' }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'SK Outlined', color: 'sk-blue-primary', variant: 'outlined' }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'SK Ghost', color: 'sk-blue-primary', variant: 'ghost', type: 'link' }) }}
\t\t\t\t\t\t\t{{ ui_link({ label: 'SK No BG', color: 'sk-blue-primary', variant: 'ghost', type: 'link', no_bg: true }) }}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t{# 6. СЕКЦІЯ: РОЗМІРИ (SIZES) #}
\t\t\t\t\t<div class=\"space-y-4\">
\t\t\t\t\t\t<h3 class=\"text-xl font-semibold text-[var(--color-text-light)] uppercase tracking-wider\">7. Button Sizes</h3>
\t\t\t\t\t\t<div class=\"flex flex-wrap items-end gap-6 p-6 bg-white rounded-xl shadow-sm border border-gray-100\">
\t\t\t\t\t\t\t<div class=\"flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 italic\">Small (sm)</span>
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Small Button', size: 'sm', color: 'primary' }) }}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 italic\">Medium (md)</span>
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Medium Button', size: 'md', color: 'primary' }) }}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"flex flex-col items-center gap-2\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-gray-400 italic\">Large (lg)</span>
\t\t\t\t\t\t\t\t{{ ui_link({ label: 'Large Button', size: 'lg', color: 'primary', type: 'link' }) }}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t</section>

\t\t\t</div>
\t\t</div>
\t</div>
</section>
", "/var/www/html/wp-content/themes/MyTheme/blocks/hero/view.twig", "/var/www/html/wp-content/themes/MyTheme/blocks/hero/view.twig");
    }
}
