<?php 

namespace MyTheme\Core;

/**
 * Клас для роботи з ассетами, скомпільованими за допомогою Vite.
 * Використовує файл manifest.json для визначення URI.
 */
class Assets {
    
    // Шлях до маніфесту від кореня теми
    const MANIFEST_PATH = '/dist/.vit/manifest.json'; 

    private static $manifest = null;

    /**
     * Завантажує та повертає масив маніфесту.
     * @return array Масив маніфесту або порожній масив у разі помилки.
     */
    private static function getManifest(): array {
        if (self::$manifest !== null) {
            return self::$manifest;
        }

        // 1. Формуємо повний шлях до маніфесту
        $path = get_template_directory() . self::MANIFEST_PATH;
        $manifest_content = @file_get_contents($path);

        // 2. Обробка помилки: Файл не знайдено
        if (!$manifest_content) {
            // У режимі розробки можна вивести error_log, щоб не засмічувати фронтенд
            error_log("Assets Error: Manifest not found at " . $path);
            return [];
        }

        // 3. Декодування JSON
        self::$manifest = json_decode($manifest_content, true);
        
        // 4. Обробка помилки: Помилка декодування
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("Assets Error: JSON decoding failed: " . json_last_error_msg());
            return [];
        }
        
        return self::$manifest;
    }

    /**
     * Повертає повний URI скомпільованого ассету за ключем маніфесту.
     * @param string $key Ключ ассету (наприклад, 'blocks/Hero/index.js' або 'node_modules/@wordpress/interactivity/build-module/index.js').
     * @return string|null Повний URI ассету або null, якщо ключ не знайдено.
     */
    public static function getUri(string $key): ?string {
        $manifest = self::getManifest();

        // 1. Шукаємо точне співпадіння ключа
        if (isset($manifest[$key])) {
            $file = $manifest[$key]['file'];
            
            // 2. Формуємо повний URI: (шлях до теми) + (директорія dist/.vit) + (ім'я файлу)
            $base_uri = get_template_directory_uri() . dirname(self::MANIFEST_PATH);
            
            return $base_uri . '/' . $file;
        }

        return null;
    }
}