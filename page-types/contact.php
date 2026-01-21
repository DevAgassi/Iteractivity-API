<?php
/**
 * Contact Page Pattern
 * 
 * Ready-to-use page template with:
 * - Intro section
 * - Contact form
 * - Contact information
 *
 * @package App
 * @since 1.0.0
 */

return [
    'id'           => 'contact',
    'title'        => 'Контакти',
    'description'  => 'Структура: Intro + Contact Form + Info',
    'categories'   => ['page_types'],
    'keywords'     => ['contact', 'form', 'email'],
    'content'      => '
        <!-- wp:acf/section {"container_size":"full"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":1,"align":"center"} -->
            <h1 class="has-text-align-center">Зв\'яжіться з нами</h1>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Ми завжди рада почути від вас</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"contained"} -->
        <div class="wp-block-acf-section">
            <!-- wp:group {"layout":{"type":"grid","columnCount":2}} -->
            <div class="wp-block-group">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":2} -->
                    <h2>Форма зв\'язку</h2>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Заповніть форму і ми зв\'яжемося з вами найближчим часом</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":2} -->
                    <h2>Контактна інформація</h2>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p><strong>Email:</strong> info@example.com</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph -->
                    <p><strong>Телефон:</strong> +380 XX XXX XX XX</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph -->
                    <p><strong>Адреса:</strong> м. Київ, вулиця Прикладу 1</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:acf/section -->
    '
];
