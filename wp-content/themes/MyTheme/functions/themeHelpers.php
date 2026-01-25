<?php

namespace MyTheme\Functions;

if (!defined('ABSPATH')) {
    die();
}

class ThemeHelpers
{

    public function __construct() {}

    function getArgsTagsCatsDate($args, $query): array
    {

        if ($query['year_min']) {
            $args['date_query'][] = [
                'year' => $query['year_min'],
                'compare' => '>=',
            ];
        }

        if ($query['year_max']) {
            $args['date_query'][] = [
                'year' => $query['year_max'],
                'compare' => '<=',
            ];
        }

        if ($query['cats']) {
            if (is_array($query['cats'])) {
                $args['tax_query'][] = [
                    'taxonomy' => 'category',
                    'terms' => $query['cats'],
                    'field' => 'slug',
                    'operator' => 'IN',
                ];
            }
        }

        if ($query['terms']) {
            if (is_array($query['terms'])) {
                $args['tax_query'][] = [
                    'taxonomy' => 'post_tag',
                    'terms' => $query['terms'],
                    'field' => 'slug',
                    'operator' => 'IN',
                ];
            }
        }

        if (isset($query['entities']) && $query['entities']) {
            if (is_array($query['entities'])) {
                $args['tax_query'][] = [
                    'taxonomy' => 'entity',
                    'terms' => $query['entities'],
                    'field' => 'slug',
                    'operator' => 'IN',
                ];
            }
        }

        return $args;
    }

    // current user data including acf fields
    function validate_recaptcha($token)
    {
        $siteverify = 'https://www.google.com/recaptcha/api/siteverify';
        $secret_key = get_field('recaptcha_secret_key', 'options');

        if (!isset($token)) return false;

        $res = file_get_contents("$siteverify?secret=$secret_key&response=$token");
        $res = json_decode($res, true);

        // returns whether the response is successful or not
        return $res['success'];
    }
}

new ThemeHelpers();
