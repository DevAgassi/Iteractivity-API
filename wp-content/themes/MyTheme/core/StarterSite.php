<?php

/**
 * StarterSite class
 * 
 * Main theme configuration class that extends Timber\Site.
 * Handles template loading, theme supports, Twig customization,
 * and provides a centralized place for theme functionality.
 *
 * @package App\Core
 * @since 1.0.0
 */

namespace App\Core;

use Illuminate\Support\Facades\App;
use Timber\Core;
use Timber\Site;
use Timber\Timber;

/**
 * Class StarterSite
 * 
 * @package App\Core
 */
class StarterSite extends Site
{
    /**
     * StarterSite constructor.
     * 
     * Initializes all theme hooks, filters, and template loader.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        // WordPress core actions
        add_action('after_setup_theme', [$this, 'theme_supports']);
        add_action('init', [$this, 'register_post_types']);
        add_action('init', [$this, 'register_taxonomies']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);

        // Timber filters
        add_filter('timber/context', [$this, 'add_to_context']);
        add_filter('timber/twig/filters', [$this, 'add_filters_to_twig']);
        add_filter('timber/twig/functions', [$this, 'add_functions_to_twig']);
        add_filter('timber/twig/environment/options', [$this, 'update_twig_environment_options']);

        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Assets
    |--------------------------------------------------------------------------
    */

    /**
     * Enqueue theme styles and scripts.
     * 
     * Loads main stylesheet with cache busting based on file modification time.
     *
     * @since 1.0.0
     * @return void
     */
    public function enqueue_styles(): void
    {
        // $main_stylesheet = '/assets/styles/main.css';
        // $stylesheet_path = get_template_directory() .$main_stylesheet;

        // if (file_exists($stylesheet_path)) {
        //     wp_enqueue_style(
        //         'theme-main-style',
        //         get_template_directory_uri() .$main_stylesheet,
        //         [],
        //         filemtime($stylesheet_path)
        //     );
        // }

        $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
        $manifest = [];

        if (file_exists($manifest_path)) {
            $manifest = json_decode(file_get_contents($manifest_path), true);
        }

        // Завантажуємо глобальні стилі (якщо є)
        $css_file = $manifest['assets/styles/main.css']['file'];
        if (isset($manifest['assets/styles/main.css'])) {
            wp_enqueue_style('main', get_template_directory_uri() . '/dist/' . $css_file);
        }

        // Завантажуємо глобальні js залежності
        $js_file = $manifest['assets/scripts/main.js']['file'];
        if (isset($manifest['assets/scripts/main.js'])) {
            wp_enqueue_script('main', get_template_directory_uri() . '/dist/' . $js_file);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Custom Post Types & Taxonomies
    |--------------------------------------------------------------------------
    */

    /**
     * Register custom post types.
     * 
     * @since 1.0.0
     * @link https://developer.wordpress.org/reference/functions/register_post_type/
     * @return void
     */
    public function register_post_types(): void
    {
        // Register custom post types here
    }

    /**
     * Register custom taxonomies.
     * 
     * @since 1.0.0
     * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
     * @return void
     */
    public function register_taxonomies(): void
    {
        // Register custom taxonomies here
    }

    /*
    |--------------------------------------------------------------------------
    | Timber Context
    |--------------------------------------------------------------------------
    */

    /**
     * Add global variables to Timber context.
     * 
     * These variables are available in all Twig templates.
     * Access via {{ site }}, {{ menu }}, etc.
     *
     * @since 1.0.0
     * @param array $context Timber context array.
     * @return array Modified context with additional variables.
     */
    public function add_to_context(array $context): array
    {
        $context['menu'] = Timber::get_menu('primary_navigation');
        $context['site'] = $this;
        $context['vite'] = new Vite();

        return $context;
    }

    /*
    | Theme Supports
    |--------------------------------------------------------------------------
    */

    /**
     * Register theme supports and features.
     * 
     * Configures WordPress theme features like menus, thumbnails,
     * HTML5 support, and post formats.
     *
     * @since 1.0.0
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/
     * @return void
     */
    public function theme_supports(): void
    {
        // Navigation menus
        register_nav_menus([
            'primary_navigation' => __('Primary Navigation', 'theme'),
            'footer_navigation'  => __('Footer Navigation', 'theme'),
        ]);

        // Core theme supports
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');

        // HTML5 markup
        add_theme_support('html5', [
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'search-form',
        ]);

        // Post formats
        add_theme_support('post-formats', [
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Twig Filters
    |--------------------------------------------------------------------------
    |
    | Custom Twig filters available in templates.
    | Usage: {{ variable|filter_name }}
    |
    */

    /**
     * Register custom Twig filters.
     * 
     * Filters transform variables in templates.
     * Example: {{ "hello"|myfoo }} outputs "hello bar!"
     *
     * @since 1.0.0
     * @link https://timber.github.io/docs/v2/hooks/filters/#timber/twig/filters
     * @param array $filters Existing Twig filters.
     * @return array Filters with custom additions.
     */
    public function add_filters_to_twig(array $filters): array
    {
        $custom_filters = [
            'myfoo' => [
                'callable' => [$this, 'filter_myfoo'],
            ],
        ];

        return array_merge($filters, $custom_filters);
    }

    /**
     * Example Twig filter: Append " bar!" to string.
     * 
     * Usage in Twig: {{ "foo"|myfoo }} -> "foo bar!"
     *
     * @since 1.0.0
     * @param string $text Input text.
     * @return string Modified text with " bar!" appended.
     */
    public function filter_myfoo(string $text): string
    {
        return $text . ' bar!';
    }

    /*
    |--------------------------------------------------------------------------
    | Twig Functions
    |--------------------------------------------------------------------------
    |
    | Custom Twig functions available in templates.
    | Usage: {{ function_name(args) }}
    |
    */

    /**
     * Register custom Twig functions.
     * 
     * Functions can be called directly in templates.
     * Example: {{ dump(post) }}, {{ get_theme_mod('option') }}
     *
     * @since 1.0.0
     * @link https://timber.github.io/docs/v2/hooks/filters/#timber/twig/functions
     * @param array $functions Existing Twig functions.
     * @return array Functions with custom additions.
     */
    public function add_functions_to_twig(array $functions): array
    {
        $custom_functions = [
            'get_theme_mod' => [
                'callable' => 'get_theme_mod',
            ],
            'dump' => [
                'callable' => [$this, 'twig_dump'],
            ],
            'timer_start' => [
                'callable' => function ($key) {
                    if (!isset($GLOBALS['twig_timers'])) {
                        $GLOBALS['twig_timers'] = [];
                    }
                    $GLOBALS['twig_timers'][$key]['start'] = microtime(true);
                },
            ],
            'timer_end' => [
                'callable' => function ($key) {
                    if (isset($GLOBALS['twig_timers'][$key]['start'])) {
                        $start = $GLOBALS['twig_timers'][$key]['start'];
                        $end = microtime(true);
                        $GLOBALS['twig_timers'][$key]['duration'] = $end - $start;
                        return "<!-- Twig [$key] render time: " . round($GLOBALS['twig_timers'][$key]['duration'] * 1000, 2) . " ms -->";
                    }
                    return '';
                },
            ],
        ];

        return array_merge($functions, $custom_functions);
    }

    /**
     * Debug dump function for Twig templates.
     * 
     * Uses Symfony VarDumper if available, falls back to var_dump.
     * Usage in Twig: {{ dump(variable) }}
     *
     * @since 1.0.0
     * @param mixed $var Variable to dump.
     * @return void
     */
    public function twig_dump(mixed $var): void
    {
        if (function_exists('dump')) {
            dump($var);
        } else {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Twig Environment
    |--------------------------------------------------------------------------
    */

    /**
     * Configure Twig environment options.
     * 
     * Customize Twig behavior like autoescape, cache, debug mode.
     *
     * @since 1.0.0
     * @link https://twig.symfony.com/doc/3.x/api.html#environment-options
     * @param array $options Twig environment options.
     * @return array Modified options.
     */
    public function update_twig_environment_options(array $options): array
    {
        // $cache_dir = get_template_directory() . '/cache/twig';

        // // Створюємо папку кешу якщо не існує
        // if (! file_exists($cache_dir)) {
        //     mkdir($cache_dir, 0777, true);
        // }

        // // Увімкнути кешування Twig
        // $options['cache'] = $cache_dir;

        // // У dev можна додати debug та auto_reload
        // if (WP_ENVIRONMENT_TYPE === 'local') {
        //     $options['debug'] = true;
        //     $options['auto_reload'] = true; // Twig буде перезавантажувати шаблони при зміні файлу
        // }

        return $options;
    }
}
