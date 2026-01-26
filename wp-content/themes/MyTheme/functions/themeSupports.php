<?php

namespace MyTheme\Functions;

if (!defined('ABSPATH')) {
    die();
}

class ThemeSupports
{

    public function __construct()
    {
        /**
         * Text domain definition
         */
        defined('THEME_TD') or define('THEME_TD', 'skeleton');

        add_action('after_setup_theme', [$this, 'after_setup_theme']);

        /** Disable REST API for users */
        //add_filter('rest_pre_dispatch', [$this, 'disable_rest_api_for_users'], 10, 3);

        /** Control dashboard widgets */
        add_action('wp_dashboard_setup', [$this, 'dashboard_add_widgets']);

        /** Disable Emojis */
        add_action('init', [$this, 'disable_emojis']);
    }

    /**
     * Disable the emoji's
     */
    function disable_emojis()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', [$this, 'disable_emojis_tinymce']);
        add_filter('wp_resource_hints', [$this, 'disable_emojis_remove_dns_prefetch'], 10, 2);
    }

    /**
     * Filter function used to remove the tinymce emoji plugin.
     * 
     * @param    array  $plugins  
     * @return   array             Difference betwen the two arrays
     */
    function disable_emojis_tinymce($plugins)
    {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        }

        return array();
    }

    /**
     * Remove emoji CDN hostname from DNS prefetching hints.
     *
     * @param  array  $urls          URLs to print for resource hints.
     * @param  string $relation_type The relation type the URLs are printed for.
     * @return array                 Difference betwen the two arrays.
     */
    function disable_emojis_remove_dns_prefetch($urls, $relation_type)
    {

        if ('dns-prefetch' == $relation_type) {

            // Strip out any URLs referencing the WordPress.org emoji location
            $emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
            foreach ($urls as $key => $url) {
                if (strpos($url, $emoji_svg_url_bit) !== false) {
                    unset($urls[$key]);
                }
            }
        }

        return $urls;
    }

    /**
     * Dahsboard Widgets Control
     */
    function dashboard_add_widgets()
    {
        wp_add_dashboard_widget('skeleton_contact_widget', 'Supports Contacts', [$this, 'contact_widget_handler']);
        remove_action('welcome_panel', 'wp_welcome_panel');

        remove_meta_box('wc_admin_dashboard_setup', 'dashboard', 'normal');
        remove_meta_box('dashboard_site_health', 'dashboard', 'normal');


        //remove_meta_box('dashboard_activity', 'dashboard', 'normal');
        //remove_meta_box('rg_forms_dashboard', 'dashboard', 'normal');
        //remove_meta_box('dashboard_right_now', 'dashboard', 'normal');

        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
        remove_meta_box('dashboard_primary', 'dashboard', 'side');
    }

    /**
     * Contact Widget Handler
     */
    function contact_widget_handler()
    {
        echo <<<HTML
            <div id="dashboard__widget">
                <div>
                    <a target="_blank" href="https://skeleton.org"><img class="skeleton__logo" width="120" height="120" src="<?php echo get_stylesheet_directory_uri(); ?>/resources/images/logo.avif" /></a>
                </div>
                <div>
                    <h2><?php _e('Skeleton', 'theme'); ?></h2>
                    <p>
                        <a class="hover_link" target="_blank" href="https://skeleton.org">www.skeleton.org</a>
                    </p>
                </div>
            </div>
        HTML;
    }

    /**
     * Disable REST API for users
     */
    function disable_rest_api_for_users($response, $_, $request)
    {
        if (strpos($request->get_route(), 'wp/v2/users') !== false) {
            return new \WP_Error(
                'rest_forbidden',
                'REST API restricted.',
                array(
                    'status' => 400
                )
            );
            return $response;
        }
    }

    public function after_setup_theme()
    {
        add_theme_support('menus');
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('custom-line-height');
        add_theme_support('custom-spacing');
        add_theme_support('align-wide');

        $this->allowed_block_types_all();

        // fixing bugs for templates adding and choices
        //remove_theme_support('block-templates');


        add_action('widgets_init', function () {
            register_sidebar(array(
                'name' => __('Voices Page Sidebar', 'skeleton'),
                'id' => 'template_sidebar',
                'description' => '',
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '',
                'after_title' => '',
            ));

            register_sidebar(array(
                'name' => __('Landing Page Sidebar', 'skeleton'),
                'id' => 'landing_sidebar',
                'description' => '',
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '',
                'after_title' => '',
            ));

            register_sidebar(array(
                'name' => __('Widget Default', 'skeleton'),
                'id' => 'page_right_widget_zone_default',
                'description' => '',
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '',
                'after_title' => '',
            ));

            register_sidebar(array(
                'name' => __('Footer Widget Zone', 'skeleton'),
                'id' => 'footer_widget_zone',
                'description' => '',
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '',
                'after_title' => '',
            ));

            register_sidebar(array(
                'name' => __('Before Footer (Default)', 'skeleton'),
                'id' => 'page_widget_before_footer',
                'description' => '',
                'before_widget' => '<div class="footer__widgets">',
                'after_widget' => '</div>',
                'before_title' => '',
                'after_title' => '',
            ));

            register_sidebar(array(
                'name' => __('Before Footer (News)', 'skeleton'),
                'id' => 'news_widget_before_footer',
                'description' => '',
                'before_widget' => '<div class="footer__widgets">',
                'after_widget' => '</div>',
                'before_title' => '',
                'after_title' => '',
            ));

            register_sidebar(array(
                'name' => __('Before Footer (Work)', 'skeleton'),
                'id' => 'work_widget_before_footer',
                'description' => '',
                'before_widget' => '<div class="footer__widgets">',
                'after_widget' => '</div>',
                'before_title' => '',
                'after_title' => '',
            ));

            register_sidebar(array(
                'name' => __('Before Footer (Studios)', 'skeleton'),
                'id' => 'studio_widget_before_footer',
                'description' => '',
                'before_widget' => '<div class="footer__widgets">',
                'after_widget' => '</div>',
                'before_title' => '',
                'after_title' => '',
            ));
        });

        register_nav_menus(
            array(
                'header-menu' => 'Header Menu',
                'service-menu' => 'Services Menu',
                'career-menu' => 'Career Menu',
                'recording-studios' => 'Recording Studios',
                'projects-menu' => 'Projects Menu',
                'about-menu' => 'About Menu',
                'search-by-lang-menu' => 'Search by language Menu',
                'search-by-type-menu' => 'Search by type Menu',
                'voices-in-action-menu' => 'Voices in action Menu',
                'footer-menu' => 'Footer Menu',
            )
        );

        // Update Post Links, add /news/post_slug
        add_filter('post_link', function ($post_link, $post) {
            if ('post' === $post->post_type || 'publish' == $post->post_status) {
                $url = apply_filters('wpml_home_url', get_option('home'));
                if (substr($url, -1) == '/') {
                    $url = substr($url, 0, -1);
                }
                return str_replace($url, $url . '/news', $post_link);
            }
            return $post_link;
        }, 10, 3);

        // change Post urls to news/
        add_action('init', function () {
            add_rewrite_rule('^news/([^/]+)', 'index.php?name=$matches[1]&post=$matches[2]', 'top');

            flush_rewrite_rules();
        }, 10, 0);

        add_filter('register_post_type_args', function ($args, $post_type) {
            if ('post' == $post_type) {
                $args['label'] = __('News', 'skeleton');
                $args['menu_icon'] = 'dashicons-text-page';
            }

            return $args;
        }, 10, 2);

        // remove auto p with content editor
        remove_filter('acf_the_content', 'wpautop');

        //remove post editor
        add_action('init', function () {
            remove_post_type_support('post', 'editor');
        }, 99);


        // Get Vimeo Thumbnail by video ID
        function get_vimeo_thumb($video_id)
        {
            $url = 'https://vimeo.com/api/oembed.json?url=';

            $data = get_transient('remote_vimeo_' . $video_id);

            if (isset($data) && $data !== false) {
                return $data;
            }

            $response = wp_remote_get($url . $video_id);

            if (is_wp_error($response)) {
                //$error_message = $response->get_error_message();
                return get_field('default_placholder_image', 'options')['sizes']['medium'];
            }

            $results = json_decode(wp_remote_retrieve_body($response), true);

            if (isset($results['thumbnail_url'])) {
                set_transient('remote_vimeo_' . $video_id, $results['thumbnail_url'], 60 * 60 * 240);
                return $results['thumbnail_url'];
            }

            return get_field('default_placholder_image', 'options')['sizes']['medium'];
        }

        // Critical CSS for Voices Hero
        add_action('wp_head', function () {
            echo '<style class="js-critical-css">
                .hero-block__background {{
                    background-color: #333;
                }}
            </style>';
        });


        /** Update Work Post List Columns */
        add_filter('manage_work_posts_columns', function ($columns) {
            return array_slice($columns, 0, 2, true) +
                ['client' => __('Client', 'skeleton')] +
                array_slice($columns, 2, NULL, true);
        });

        add_action('manage_work_posts_custom_column', function ($column_key, $post_id) {
            if ($column_key == 'client') {
                $verified = get_field('client', $post_id);
                _e('<span>' . $verified . '</span>');
            }
        }, 10, 2);

        add_filter('manage_edit-work_sortable_columns', function ($columns) {
            $columns['client'] = 'client';
            return $columns;
        });

        add_action('pre_get_posts', function ($query) {
            if (!is_admin()) {
                return;
            }

            $orderby = $query->get('orderby');
            if ($orderby == 'client' and is_post_type_archive('work')) {
                $query->set('meta_key', 'client');
                $query->set('orderby', 'meta_value');
            }
        });

        add_filter('should_load_separate_core_block_assets', '__return_true');

        // Допомагає WP знайти блоки в закешованому Timber-контенті
        add_filter('timber/post/content/apply_filters', '__return_true');


        register_post_type('events', [
            'label' => 'Events',
            'public' => true,
            'show_in_rest' => true, // ОБОВʼЯЗКОВО
            'supports' => ['title', 'editor'],
        ]);


        add_action('init', function () {
            add_post_type_support('events', 'core-content-patterns');
        });
    }

    private function allowed_block_types_all()
    {
        add_filter('allowed_block_types_all', function ($allowed_block_types, $block_editor_context) {

            $allowed_block_types = array(
                'acf/lead',
                'acf/text',
                'acf/hero',
                'acf/section',
                'acf/slider',
                'acf/latest-posts',
                'acf/content-sidebar',
                'acf/main-column',
                'acf/sidebar',
                'acf/calculator',
                'core/table',


                'core/shortcode',
                'core/video',

                //'core/post-content',
                //'core/heading',
                //'core/video', 
                //'core/group',
                //'core/paragraph',
            );

            return $allowed_block_types;
        }, 10, 2);
    }
}

new ThemeSupports();
