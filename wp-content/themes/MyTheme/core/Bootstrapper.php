<?php namespace MyTheme\Core;

class Bootstrapper {
    
    // ... (інші методи)

    /**
     * Додає атрибут type="module" до скриптів, зібраних Vite.
     */
    public static function addModuleTypeToScripts(string $tag, string $handle, string $src): string {
        // Застосовуємо до всіх наших скриптів
        if (strpos($handle, 'mytheme-') !== false) {
            // Замінюємо <script на <script type="module"
            $tag = str_replace('<script', '<script type="module"', $tag);
        }
        return $tag;
    }
    
    /**
     * Примусово підключає Interactivity Runtime та налаштовує фільтри.
     */
    public static function run(): void {
        
        // Реєструємо фільтр, який перетворює наші скрипти на модулі (КРОК 2)
        add_filter('script_loader_tag', [self::class, 'addModuleTypeToScripts'], 10, 3); 
        
        // Примусове підключення Interactivity Runtime (КРОК 1)
        add_action('wp_enqueue_scripts', function() {
            $interactivity_uri = Assets::getUri($manifest_key); 
            
            if ($interactivity_uri) {
                // Використовуємо WP-залежності для гарантії, що 'wp' об'єкт існує
                
                wp_enqueue_script(
                    'mytheme-interactivity-runtime', // Наш хендл
                    $interactivity_uri, 
                    $base_dependencies, 
                    null, 
                    false // Завантажуємо у хедері
                );
            }
        }, 5); 
    }
}