<?php
/**
 * Blog List Page Pattern
 * 
 * Ready-to-use page template with:
 * - Page title
 * - Blog posts grid
 *
 * @package App
 * @since 1.0.0
 */

return [
    'id'           => 'blog',
    'title'        => 'Архів постів',
    'description'  => 'Структура: Intro + Blog Grid',
    'categories'   => ['page_types'],
    'keywords'     => ['blog', 'posts', 'articles'],
    'content'      => '
        <!-- wp:acf/section {"container_size":"full"} -->
        <div class="wp-block-acf-section">
            <!-- wp:heading {"level":1,"align":"center"} -->
            <h1 class="has-text-align-center">Блог</h1>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Останні статті та новини</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:acf/section -->

        <!-- wp:acf/section {"container_size":"contained"} -->
        <div class="wp-block-acf-section">
            <!-- wp:query {"queryId":0,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
            <div class="wp-block-query">
                <!-- wp:post-template -->
                <!-- wp:group -->
                <div class="wp-block-group">
                    <!-- wp:post-title {"isLink":true} /-->
                    <!-- wp:post-excerpt /-->
                </div>
                <!-- /wp:group -->
                <!-- /wp:post-template -->

                <!-- wp:query-pagination -->
                <div class="wp-block-query-pagination">
                    <!-- wp:query-pagination-previous /-->
                    <!-- wp:query-pagination-numbers /-->
                    <!-- wp:query-pagination-next /-->
                </div>
                <!-- /wp:query-pagination -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:acf/section -->
    '
];
