<?php

namespace MyTheme\Functions;

class ThemeSupports
{

    public function __construct()
    {
        /**
         * Text domain definition
         */
        defined('THEME_TD') or define('THEME_TD', 'skeleton');

        add_action('after_setup_theme', [$this, 'after_setup_theme']);
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

        if (function_exists('acf_add_options_page')) {
            acf_add_options_page();
        }


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
                'acf/sidebar-column',
                'acf/calculator',


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
