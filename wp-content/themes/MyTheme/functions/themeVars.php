<?php

namespace MyTheme\Functions;

if (!defined('ABSPATH')) {
	die();
}

class ThemeVars
{

    public function __construct()
    {
        add_filter('script_module_data_app', function (array $data) {
            return array_merge($data, array(
                'home'   => get_home_url(),
                'isHome' => is_front_page(),
                'nonce'  => wp_create_nonce('wp_rest'),
                'root'   => esc_url_raw(rest_url()),
            ));
        });
    }
}

new ThemeVars();
