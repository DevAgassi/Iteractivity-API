<?php
/**
 * Services Page Pattern
 * 
 * Ready-to-use page template with:
 * - Intro section
 * - Services grid
 * - Pricing section
 * - Call-to-action
 *
 * @package App
 * @since 1.0.0
 */

return [
    'id'           => 'services',
    'title'        => 'Послуги',
    'description'  => 'Структура: Intro + Services Grid + Pricing + CTA',
    'categories'   => ['page_types'],
    'keywords'     => ['services', 'offerings', 'pricing'],
    'content'      => '
        <!-- wp:acf/section {"container_size":"full"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":1,"align":"center"} -->
            <h1 class="has-text-align-center">Наші Послуги</h1>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Повний спектр послуг для вашого бізнесу</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"contained"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":2} -->
            <h2>Наш спектр послуг</h2>
            <!-- /wp:heading -->
            <!-- wp:group {"layout":{"type":"grid","columnCount":2}} -->
            <div class="wp-block-group">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3} -->
                    <h3>Послуга 1</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Детальний опис послуги 1 та її переваг</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3} -->
                    <h3>Послуга 2</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Детальний опис послуги 2 та її переваг</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3} -->
                    <h3>Послуга 3</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Детальний опис послуги 3 та її переваг</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3} -->
                    <h3>Послуга 4</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Детальний опис послуги 4 та її переваг</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"contained"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":2,"align":"center"} -->
            <h2 class="has-text-align-center">Цінування</h2>
            <!-- /wp:heading -->
            <!-- wp:group {"layout":{"type":"grid","columnCount":3}} -->
            <div class="wp-block-group">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3,"align":"center"} -->
                    <h3 class="has-text-align-center">Базовий</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><strong>$99/мо</strong></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3,"align":"center"} -->
                    <h3 class="has-text-align-center">Стандарт</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><strong>$199/мо</strong></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3,"align":"center"} -->
                    <h3 class="has-text-align-center">Преміум</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><strong>$399/мо</strong></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"full","backgroundColor":"primary"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":2,"align":"center","textColor":"white"} -->
            <h2 class="has-text-align-center has-white-color has-text-color">Готові отримати послугу?</h2>
            <!-- /wp:heading -->
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons has-custom-layout">
                <!-- wp:button {"backgroundColor":"secondary"} -->
                <div class="wp-block-button">
                    <!-- wp:button -->
                    <a class="wp-block-button__link has-secondary-background-color has-background wp-element-button">Замовити</a>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:acf/section -->
    '
];
