<?php

namespace MyTheme\Functions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Twig\TwigFilter;

class TwigThemeExtension extends AbstractExtension
{
    public function __construct()
    {
        // Подключаем этот класс к Timber 2
        add_filter('timber/twig', [$this, 'register_extension']);
    }

    public function register_extension($twig)
    {
        $twig->addExtension($this);
        return $twig;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('shout', [$this, 'make_shout']),
            new TwigFilter('format_date', [$this, 'custom_date']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('dd', 'dd'),
            new TwigFunction('getimage', [$this, 'getimage']),
            new TwigFunction('inlinesvg', [$this, 'inlinesvg']),
            new TwigFunction('getcleanphone', [$this, 'getcleanphone']),
            new TwigFunction('is_new_post', [$this, 'check_if_new']),
            new TwigFunction('regextexttospan', [$this, 'regextexttospan']),
            new TwigFunction('get_copyright', [$this, 'display_copyright']),
        ];
    }

    /** FILTERS */

    public function make_shout(string $text): string
    {
        return mb_strtoupper($text) . '!!!';
    }

    public function custom_date(string $date): string
    {
        return date('d.m.Y', strtotime($date));
    }

    /** FUNCTIONS */

    public function check_if_new(int $post_id): bool
    {
        $post_date = get_the_time('U', $post_id);
        // Если посту меньше 7 дней — он новый
        return (time() - $post_date) < (7 * 24 * 60 * 60);
    }

    public function getimage($filename)
    {
        echo get_template_directory_uri() . '/assets/media/' . $filename;
    }

    public function display_copyright(): string
    {
        return '&copy; ' . date('Y') . ' ' . get_bloginfo('name');
    }

    public function inlinesvg($id, $is_fromlibrary = true)
    {
        $attached_file = get_attached_file($id);
        if ($attached_file) {
            if ($is_fromlibrary) {
                echo file_get_contents($attached_file);
            } else {
                echo file_get_contents(get_template_directory() . '/assets/media/' . $attached_file);
            }
        }
    }

    public function getcleanphone($item)
    {
        if (empty($item)) {
            return false;
        }

        return preg_replace("/[^0-9]/", "", $item);
    }

    public function regextexttospan($text)
    {
        if (empty($text)) {
            return false;
        }

        return preg_replace('/\[(.*?)\]/', '<span>$1</span>', $text);
    }
}

new TwigThemeExtension();
