<?php

use Timber\Timber;

/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 2.0
 *
 */

// Зберігаємо в глобальній змінній, щоб в кінці розрахувати
$start_time = microtime(true);
$context = Timber::context(
    [
        'posts' => Timber::get_posts(),
    ]
);

$end_time = microtime(true);
$duration = $end_time - $start_time;
echo "<!-- WP Page Context time: " . round($duration * 1000, 2) . " ms -->";
$start_time = microtime(true);
Timber::render('index.twig', $context);

$end_time = microtime(true);
$duration = $end_time - $start_time;
echo "<!-- WP Page render time: " . round($duration * 1000, 2) . " ms -->";