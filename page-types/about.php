<?php
/**
 * About Page Pattern
 * 
 * Ready-to-use page template with:
 * - Introduction section
 * - Company story/values
 * - Team section
 * - Call-to-action
 *
 * @package App
 * @since 1.0.0
 */

return [
    'id'           => 'about',
    'title'        => 'Про компанію',
    'description'  => 'Структура: Intro + Story + Team + CTA',
    'categories'   => ['page_types'],
    'keywords'     => ['about', 'company', 'team'],
    'content'      => '
        <!-- wp:acf/section {"container_size":"full"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":1,"align":"center"} -->
            <h1 class="has-text-align-center">Про нашу компанію</h1>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Дізнайтесь більше про нашу історію та цінності</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"contained"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":2} -->
            <h2>Наша історія</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Розповіжте історію вашої компанії, як вона виникла та як розвивалася</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"contained"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":2} -->
            <h2>Наші цінності</h2>
            <!-- /wp:heading -->
            <!-- wp:group {"layout":{"type":"grid","columnCount":3}} -->
            <div class="wp-block-group">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3} -->
                    <h3>Цінність 1</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Опис першої цінності</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3} -->
                    <h3>Цінність 2</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Опис другої цінності</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3} -->
                    <h3>Цінність 3</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Опис третьої цінності</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"full","backgroundColor":"light"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":2,"align":"center"} -->
            <h2 class="has-text-align-center">Готові співпрацювати з нами?</h2>
            <!-- /wp:heading -->
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons has-custom-layout">
                <!-- wp:button {"backgroundColor":"primary"} -->
                <div class="wp-block-button">
                    <!-- wp:button -->
                    <a class="wp-block-button__link has-primary-background-color has-background wp-element-button">Почніть проект</a>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:acf/section -->
    '
];
