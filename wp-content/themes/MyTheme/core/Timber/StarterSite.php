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

namespace App\Core\Timber;

use Timber\Site;
use Timber\Timber;

/**
 * Class StarterSite
 * 
 * @package App\Core
 */
class StarterSite extends Site
{
    private $vite;
    /**
     * StarterSite constructor.
     * 
     * Initializes all theme hooks, filters, and template loader.
     *
     * @since 1.0.0
     */
    public function __construct($vite)
    {
        $this->vite = $vite;

        // WordPress core actions
        add_action('after_setup_theme', [$this, 'theme_supports']);
        add_action('enqueue_block_editor_assets', [$this, 'enqueue_editor_assets']);

        add_action('init', [$this, 'register_post_types']);
        add_action('init', [$this, 'register_taxonomies']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
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
    public function enqueue_assets(): void
    {
        /**
         * Main JS file with dependencies and CSS imports
         */
        $this->vite->enqueueAssets('resources/scripts/app.js', 'app');
    }

    /**
     * Inject styles into the block editor.
     *
     * @since 1.0.0
     * @return void
     */
    public function enqueue_editor_assets(): void
    {

        add_filter('block_editor_settings_all', function ($settings) {
            $path = 'resources/scripts/admin.js';
            $manifest = $this->vite->getManifest();

            if (!isset($manifest[$path])) {
                return $settings;
            }

            $file = $manifest[$path];
            if (isset($file['css'])) {
                foreach ($file['css'] as $css) {
                    $settings['styles'][] = [
                        'css' => "@import url('" . get_template_directory_uri() . "/dist/{$css}')",
                    ];
                }
            }

            return $settings;
        });
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
        $context['menu'] = Timber::get_menu();
        $context['header_menu'] = Timber::get_menu('header_menu');
        $context['footer_menu'] = Timber::get_menu('footer_menu');
        $context['is_mobile'] = wp_is_mobile();
        $context['options'] = get_fields('options');
        $context['site'] = $this;
        $context['assets'] = $this->vite;

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
        // Навігаційні меню
        register_nav_menus([
            'header_menu' => __('Header Menu', 'theme'),
            'footer_menu'  => __('Footer Menu', 'theme'),
        ]);

        // Стандартна підтримка ядра WordPress
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_theme_support('html5', ['comment-form', 'comment-list', 'gallery', 'caption', 'search-form']);

        // Вмикаємо підтримку стилів редактора (Gutenberg)
        add_theme_support('editor-styles');

        // Ініціалізуємо логіку ACF Local JSON
        $this->setup_acf_local_json();

        if (function_exists('acf_add_options_page')) {
            acf_add_options_page();
        }
    }

    /**
     * Налаштування ACF Local JSON: автоматичне завантаження та дублювання в папки блоків.
     * Актуально для WordPress 2026: забезпечує портативність полів через Git.
     */
    private function setup_acf_local_json(): void
    {
        /**
         * 1. Вказуємо ACF, звідки автоматично завантажувати поля (Load JSON).
         * Це дозволяє синхронізувати поля на різних серверах без імпорту БД.
         */
        add_filter('acf/settings/load_json', function ($paths) {
            $paths[] = get_template_directory() . '/acf-json';
            return $paths;
        });

        /**
         * 2. Дублювання JSON-файлу в папку конкретного блоку після збереження.
         * Допомагає тримати всю логіку блока (стилі, шаблони, поля) в одному місці.
         */
        add_action('acf/update_field_group', function ($group) {
            $block_name = '';

            // Шукаємо, чи прив'язана ця група до ACF блоку
            if (!empty($group['location'])) {
                foreach ($group['location'] as $location_group) {
                    foreach ($location_group as $rule) {
                        if ($rule['param'] === 'block') {
                            $block_name = str_replace('acf/', '', $rule['value']);
                            break 2;
                        }
                    }
                }
            }

            if (empty($block_name)) return;

            $source_file = get_template_directory() . '/acf-json/' . $group['key'] . '.json';
            $target_dir  = get_template_directory() . '/blocks/' . $block_name;

            // Якщо папка блока існує (там лежить block.json), копіюємо туди JSON полів
            if (is_dir($target_dir) && file_exists($source_file)) {
                copy($source_file, $target_dir . '/' . $group['key'] . '.json');
            }
        }, 20);
    }

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
            'cx' => [
                'callable' => [$this, 'filter_cx'],
            ],
        ];

        return array_merge($filters, $custom_filters);
    }

    /**
     * Умное слияние классов Tailwind (аналог tailwind-merge)
     * Очищает дубликаты и конфликтующие префиксы (gap-2 vs gap-5)
     */
    public function filter_cx($input): string
    {
        if (empty($input)) return '';

        // 1. Приводим всё к плоскому списку активных классов за один проход
        $rawClasses = [];
        $items = is_array($input) ? $input : [$input];

        foreach ($items as $key => $value) {
            if (is_string($key)) {
                if ($value) $rawClasses[] = $key;
            } elseif (is_array($value)) {
                // Рекурсивно обрабатываем вложенные массивы, если нужно
                foreach ($value as $k => $v) {
                    if (is_string($k)) {
                        if ($v) $rawClasses[] = $k;
                    } elseif ($v) $rawClasses[] = $v;
                }
            } elseif ($value) {
                $rawClasses[] = $value;
            }
        }

        // 2. Разбиваем строку на отдельные классы
        // Используем " " как разделитель, array_filter уберет лишние пробелы
        $allClasses = explode(' ', implode(' ', $rawClasses));

        $result = [];
        // Список префиксов для быстрой проверки (O(1) вместо O(n))
        // Ключ — это префикс, значение — признак того, что его нужно проверять
        $toTrack = [
            'p' => 1,
            'px' => 1,
            'py' => 1,
            'pt' => 1,
            'pb' => 1,
            'pl' => 1,
            'pr' => 1,
            'm' => 1,
            'mx' => 1,
            'my' => 1,
            'mt' => 1,
            'mb' => 1,
            'ml' => 1,
            'mr' => 1,
            'gap' => 1,
            'rounded' => 1,
            'ring' => 1,
            'shadow' => 1
        ];

        foreach ($allClasses as $class) {
            if ($class === '') continue;

            // Ищем дефис для быстрого определения префикса (например, "px-4")
            $dashPos = strpos($class, '-');

            if ($dashPos !== false) {
                $prefix = substr($class, 0, $dashPos);

                // Если префикс в нашем списке отслеживания — перезаписываем по ключу
                if (isset($toTrack[$prefix])) {
                    $result[$prefix] = $class;
                    continue;
                }
            }

            // Если не префикс (или не тот, что мы отслеживаем), сохраняем как есть
            $result[$class] = $class;
        }

        return implode(' ', $result);
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
        $cache_dir = get_template_directory() . '/cache/twig';

        // Створюємо папку кешу якщо не існує
        if (! file_exists($cache_dir)) {
            mkdir($cache_dir, 0777, true);
        }

        // Увімкнути кешування Twig
        $options['cache'] = $cache_dir;

        // У dev можна додати debug та auto_reload
        if (WP_ENVIRONMENT_TYPE === 'local') {
            $options['debug'] = true;
            $options['auto_reload'] = true; // Twig буде перезавантажувати шаблони при зміні файлу
        }

        return $options;
    }
}
