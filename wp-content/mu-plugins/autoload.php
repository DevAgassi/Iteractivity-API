<?php


/**
 * Load Composer autoloader
 */

$autoload = ABSPATH . 'vendor/autoload.php';

if (file_exists($autoload)) {
    require_once $autoload;
}

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://github.com/timber/starter-theme
 */
