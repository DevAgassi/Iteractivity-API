<?php
/**
 * Home Page Pattern
 * 
 * Ready-to-use page template with:
 * - Hero section with large heading
 * - Features/services grid
 * - Testimonials section
 * - Call-to-action
 *
 * @package App
 * @since 1.0.0
 */

return [
    'id'           => 'home',
    'title'        => 'Домашня сторінка',
    'description'  => 'Структура: Hero + Features + Testimonials + CTA',
    'categories'   => ['page_types'],
    'keywords'     => ['home', 'homepage', 'landing'],
    'viewportWidth' => 1200,
    'content'      => '
        <!-- wp:acf/section {"container_size":"full"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":1,"align":"center"} -->
            <h1 class="has-text-align-center">Вітаємо на нашому сайті</h1>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Опишіть вашу пропозицію та переваги вашого бізнесу</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"contained"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":2} -->
            <h2>Наші Послуги</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Представьте основні послуги або продукти</p>
            <!-- /wp:paragraph -->
            <!-- wp:group {"layout":{"type":"grid","columnCount":3}} -->
            <div class="wp-block-group">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3} -->
                    <h3>Послуга 1</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Опис послуги 1</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3} -->
                    <h3>Послуга 2</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Опис послуги 2</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3} -->
                    <h3>Послуга 3</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Опис послуги 3</p>
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
            <h2 class="has-text-align-center">Готові почати?</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Зв\'яжіться з нами для отримання додаткової інформації</p>
            <!-- /wp:paragraph -->
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons has-custom-layout">
                <!-- wp:button {"backgroundColor":"primary"} -->
                <div class="wp-block-button">
                    <!-- wp:button -->
                    <a class="wp-block-button__link has-primary-background-color has-background wp-element-button">Зв\'яжіться з нами</a>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:acf/section -->
    '
];
