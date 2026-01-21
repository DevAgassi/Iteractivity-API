<?php
/**
 * Case Study Page Pattern
 * 
 * Ready-to-use page template for showcasing project examples with:
 * - Project hero
 * - Project details
 * - Results/metrics
 * - Call-to-action
 *
 * @package App
 * @since 1.0.0
 */

return [
    'id'           => 'case-study',
    'title'        => 'Кейс-студія',
    'description'  => 'Структура: Hero + Details + Results + CTA',
    'categories'   => ['page_types'],
    'keywords'     => ['case', 'study', 'project', 'portfolio'],
    'content'      => '
        <!-- wp:acf/section {"container_size":"full"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":1,"align":"center"} -->
            <h1 class="has-text-align-center">Назва проекту</h1>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Клієнт: Назва компанії</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"contained"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":2} -->
            <h2>Завдання</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Опишіть завдання та виклики, які стояли перед клієнтом</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"contained"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":2} -->
            <h2>Рішення</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Опишіть запропоноване рішення та підхід</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"contained"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":2} -->
            <h2>Результати</h2>
            <!-- /wp:heading -->
            <!-- wp:group {"layout":{"type":"grid","columnCount":3}} -->
            <div class="wp-block-group">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3,"align":"center"} -->
                    <h3 class="has-text-align-center">Метрика 1</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><strong>+500%</strong></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3,"align":"center"} -->
                    <h3 class="has-text-align-center">Метрика 2</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><strong>+300%</strong></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3,"align":"center"} -->
                    <h3 class="has-text-align-center">Метрика 3</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><strong>+200%</strong></p>
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
            <h2 class="has-text-align-center has-white-color has-text-color">Готові реалізувати подібний проект?</h2>
            <!-- /wp:heading -->
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons has-custom-layout">
                <!-- wp:button {"backgroundColor":"secondary"} -->
                <div class="wp-block-button">
                    <!-- wp:button -->
                    <a class="wp-block-button__link has-secondary-background-color has-background wp-element-button">Почніть проект</a>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:acf/section -->
    '
];
