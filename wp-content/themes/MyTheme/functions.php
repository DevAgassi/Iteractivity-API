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



add_filter('allowed_block_types_all', function ($allowed_block_types, $block_editor_context) {

    $allowed_block_types = array(
        'acf/hero',
        'acf/section',
        'acf/latest-posts',
        'core/heading',
        'core/video',
        'core/group',
        'core/paragraph',
    );

    return $allowed_block_types;
}, 10, 2);


add_action('init', function() {
    // 1. Реєструємо категорію (опціонально)
    register_block_pattern_category(
        'my_theme_layouts',
        array( 'label' => 'Мої Секції' )
    );

    // 2. Реєструємо сам патерн
    register_block_pattern(
        'my-theme/hero-section',
        array(
            'title'       => 'Hero Секція з вибором ширини',
            'categories'  => array('my_theme_layouts'),
            'description' => 'Секція з ACF блоку та вкладеним заголовком',
            'content'     => '
                <!-- wp:acf/section {"name":"acf/section","data":{"container_size":"wide","_container_size":"field_your_key_here"},"mode":"preview"} -->
                <!-- wp:core/heading {"level":1} -->
                <h1>Вітаємо у нашому шаблоні!</h1>
                <!-- /wp:core/heading -->
                <!-- wp:acf/hero {"name":"acf/hero","data":{"field_693454e257df0":"","field_69567cf5212a8":""}} /-->
                <!-- /wp:acf/section -->
            ',
        )
    );
});