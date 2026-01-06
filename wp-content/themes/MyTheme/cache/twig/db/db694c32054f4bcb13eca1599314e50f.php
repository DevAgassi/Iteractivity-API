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
        yield $this->env->getFunction('timer_start')->getCallable()("header");
        yield "
";
        // line 2
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 74
        yield $this->env->getFunction('timer_end')->getCallable()("header");
        yield "
";
        yield from [];
    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 3
        yield "\t<header>
\t\t<nav class=\"relative bg-gray-800\">
\t\t\t<div class=\"mx-auto max-w-7xl px-2 sm:px-6 lg:px-8\">
\t\t\t\t<div class=\"relative flex h-16 items-center justify-between\">
\t\t\t\t\t<div
\t\t\t\t\t\tclass=\"absolute inset-y-0 left-0 flex items-center sm:hidden\">
\t\t\t\t\t\t<!-- Mobile menu button-->
\t\t\t\t\t\t<button type=\"button\" command=\"--toggle\" commandfor=\"mobile-menu\" class=\"relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500\">
\t\t\t\t\t\t\t<span class=\"absolute -inset-0.5\"></span>
\t\t\t\t\t\t\t<span class=\"sr-only\">Open main menu</span>
\t\t\t\t\t\t\t<svg viewbox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" data-slot=\"icon\" aria-hidden=\"true\" class=\"size-6 in-aria-expanded:hidden\">
\t\t\t\t\t\t\t\t<path d=\"M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t<svg viewbox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" data-slot=\"icon\" aria-hidden=\"true\" class=\"size-6 not-in-aria-expanded:hidden\">
\t\t\t\t\t\t\t\t<path d=\"M6 18 18 6M6 6l12 12\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"flex flex-1 items-center justify-center sm:items-stretch sm:justify-start\">
\t\t\t\t\t\t<div class=\"flex shrink-0 items-center\">
\t\t\t\t\t\t\t<img src=\"https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500\" alt=\"Your Company\" class=\"h-8 w-auto\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"hidden sm:ml-6 sm:block\">
\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\tclass=\"flex space-x-4\">
\t\t\t\t\t\t\t\t";
        // line 28
        yield from $this->load("partials/menu.twig", 28)->unwrap()->yield(CoreExtension::merge($context, ["items" => CoreExtension::getAttribute($this->env, $this->source,         // line 29
($context["header_menu"] ?? null), "get_items", [], "any", false, false, false, 29)]));
        // line 31
        yield "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0\">
\t\t\t\t\t\t<button type=\"button\" class=\"relative rounded-full p-1 text-gray-400 focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500\">
\t\t\t\t\t\t\t<span class=\"absolute -inset-1.5\"></span>
\t\t\t\t\t\t\t<span class=\"sr-only\">View notifications</span>
\t\t\t\t\t\t\t<svg viewbox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" data-slot=\"icon\" aria-hidden=\"true\" class=\"size-6\">
\t\t\t\t\t\t\t\t<path d=\"M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</button>

\t\t\t\t\t\t<!-- Profile dropdown -->
\t\t\t\t\t\t<el-dropdown class=\"relative ml-3\">
\t\t\t\t\t\t\t<button class=\"relative flex rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500\">
\t\t\t\t\t\t\t\t<span class=\"absolute -inset-1.5\"></span>
\t\t\t\t\t\t\t\t<span class=\"sr-only\">Open user menu</span>
\t\t\t\t\t\t\t\t<img src=\"https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80\" alt=\"\" class=\"size-8 rounded-full bg-gray-800 outline -outline-offset-1 outline-white/10\"/>
\t\t\t\t\t\t\t</button>

\t\t\t\t\t\t\t<el-menu anchor=\"bottom end\" popover class=\"w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden\">Your profile</a>
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden\">Settings</a>
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden\">Sign out</a>
\t\t\t\t\t\t\t</el-menu>
\t\t\t\t\t\t</el-dropdown>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<el-disclosure id=\"mobile-menu\" hidden class=\"block sm:hidden\">
\t\t\t\t<div
\t\t\t\t\tclass=\"space-y-1 px-2 pt-2 pb-3\">
\t\t\t\t\t<!-- Current: \"bg-gray-900 text-white\", Default: \"text-gray-300 hover:bg-white/5 hover:text-white\" -->
\t\t\t\t\t<a href=\"#\" aria-current=\"page\" class=\"block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white\">Dashboard</a>
\t\t\t\t\t<a href=\"#\" class=\"block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white\">Team</a>
\t\t\t\t\t<a href=\"#\" class=\"block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white\">Projects</a>
\t\t\t\t\t<a href=\"#\" class=\"block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white\">Calendar</a>
\t\t\t\t</div>
\t\t\t</el-disclosure>
\t\t</nav>
\t</header>
";
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
        return array (  93 => 31,  91 => 29,  90 => 28,  63 => 3,  56 => 2,  49 => 74,  47 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ timer_start('header') }}
{% block header %}
\t<header>
\t\t<nav class=\"relative bg-gray-800\">
\t\t\t<div class=\"mx-auto max-w-7xl px-2 sm:px-6 lg:px-8\">
\t\t\t\t<div class=\"relative flex h-16 items-center justify-between\">
\t\t\t\t\t<div
\t\t\t\t\t\tclass=\"absolute inset-y-0 left-0 flex items-center sm:hidden\">
\t\t\t\t\t\t<!-- Mobile menu button-->
\t\t\t\t\t\t<button type=\"button\" command=\"--toggle\" commandfor=\"mobile-menu\" class=\"relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500\">
\t\t\t\t\t\t\t<span class=\"absolute -inset-0.5\"></span>
\t\t\t\t\t\t\t<span class=\"sr-only\">Open main menu</span>
\t\t\t\t\t\t\t<svg viewbox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" data-slot=\"icon\" aria-hidden=\"true\" class=\"size-6 in-aria-expanded:hidden\">
\t\t\t\t\t\t\t\t<path d=\"M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t<svg viewbox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" data-slot=\"icon\" aria-hidden=\"true\" class=\"size-6 not-in-aria-expanded:hidden\">
\t\t\t\t\t\t\t\t<path d=\"M6 18 18 6M6 6l12 12\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"flex flex-1 items-center justify-center sm:items-stretch sm:justify-start\">
\t\t\t\t\t\t<div class=\"flex shrink-0 items-center\">
\t\t\t\t\t\t\t<img src=\"https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500\" alt=\"Your Company\" class=\"h-8 w-auto\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"hidden sm:ml-6 sm:block\">
\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\tclass=\"flex space-x-4\">
\t\t\t\t\t\t\t\t{% include 'partials/menu.twig' with {
\t\t\t\t\t\t\t\t\titems: header_menu.get_items
\t\t\t\t\t\t\t\t} %}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0\">
\t\t\t\t\t\t<button type=\"button\" class=\"relative rounded-full p-1 text-gray-400 focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500\">
\t\t\t\t\t\t\t<span class=\"absolute -inset-1.5\"></span>
\t\t\t\t\t\t\t<span class=\"sr-only\">View notifications</span>
\t\t\t\t\t\t\t<svg viewbox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" data-slot=\"icon\" aria-hidden=\"true\" class=\"size-6\">
\t\t\t\t\t\t\t\t<path d=\"M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</button>

\t\t\t\t\t\t<!-- Profile dropdown -->
\t\t\t\t\t\t<el-dropdown class=\"relative ml-3\">
\t\t\t\t\t\t\t<button class=\"relative flex rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500\">
\t\t\t\t\t\t\t\t<span class=\"absolute -inset-1.5\"></span>
\t\t\t\t\t\t\t\t<span class=\"sr-only\">Open user menu</span>
\t\t\t\t\t\t\t\t<img src=\"https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80\" alt=\"\" class=\"size-8 rounded-full bg-gray-800 outline -outline-offset-1 outline-white/10\"/>
\t\t\t\t\t\t\t</button>

\t\t\t\t\t\t\t<el-menu anchor=\"bottom end\" popover class=\"w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden\">Your profile</a>
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden\">Settings</a>
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden\">Sign out</a>
\t\t\t\t\t\t\t</el-menu>
\t\t\t\t\t\t</el-dropdown>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<el-disclosure id=\"mobile-menu\" hidden class=\"block sm:hidden\">
\t\t\t\t<div
\t\t\t\t\tclass=\"space-y-1 px-2 pt-2 pb-3\">
\t\t\t\t\t<!-- Current: \"bg-gray-900 text-white\", Default: \"text-gray-300 hover:bg-white/5 hover:text-white\" -->
\t\t\t\t\t<a href=\"#\" aria-current=\"page\" class=\"block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white\">Dashboard</a>
\t\t\t\t\t<a href=\"#\" class=\"block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white\">Team</a>
\t\t\t\t\t<a href=\"#\" class=\"block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white\">Projects</a>
\t\t\t\t\t<a href=\"#\" class=\"block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white\">Calendar</a>
\t\t\t\t</div>
\t\t\t</el-disclosure>
\t\t</nav>
\t</header>
{% endblock %}
{{ timer_end('header') }}
", "layouts/header.twig", "/var/www/html/wp-content/themes/MyTheme/views/layouts/header.twig");
    }
}
