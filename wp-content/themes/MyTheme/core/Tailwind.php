 <?php

    /**
     * @package App\Core
     * @since 1.0.0
     */

    namespace App\Core;

    class Tailwind {
        /**
         * Initialize Tailwind CSS integration
         *
         * @since 1.0.0
         * @return void
         */
        public function __construct() {
            // Add Tailwind CSS specific initialization code here
            add_action('wp_enqueue_scripts', [$this, 'enqueueTailwindStyles'], 20);
        }

        /**
         * Enqueue Tailwind CSS styles
         *
         * @since 1.0.0
         * @return void
         */
        public function enqueueTailwindStyles() {
            wp_enqueue_style(
                'mytheme-tailwind',
                get_template_directory_uri() . '/assets/styles/tailwind.css',
                [],
                filemtime(get_template_directory() . '/assets/styles/tailwind.css')
            );
        }
    }
