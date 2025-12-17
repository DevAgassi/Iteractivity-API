<?php

namespace App;

use App\Core\Bootstrap;

Bootstrap::getInstance()->boot();

add_action('wp_head', function () {
    if (WP_ENVIRONMENT_TYPE === 'local') :
        $vite_dev_server_url = 'http://localhost:3030';
    //    echo '<script type="module" src="' . esc_url($vite_dev_server_url . '/@vite/client') . '"></script>' . "\n";
    //    echo '<script type="module" src="' . esc_url($vite_dev_server_url . '/assets/scripts/main.js') . '"></script>';
    endif;
}, 1);


add_filter( 'should_load_separate_core_block_assets', '__return_true' );
// Допомагає WP знайти блоки в закешованому Timber-контенті
//add_filter( 'timber/post/content/apply_filters', '__return_true' );