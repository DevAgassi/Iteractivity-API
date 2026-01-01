<?php

namespace App;

use App\Core\Bootstrap;

Bootstrap::getInstance()->boot([
    'theme' => 'tailwind',
    'debug' => false
]);

add_filter('should_load_separate_core_block_assets', '__return_true');
// Допомагає WP знайти блоки в закешованому Timber-контенті
add_filter('timber/post/content/apply_filters', '__return_true');