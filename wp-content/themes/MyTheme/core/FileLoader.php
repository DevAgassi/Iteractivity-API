<?php

namespace App\Core;

/**
 * Класс для автоматического подключения PHP файлов в указанных папках.
 */
class FileLoader {

    /**
     * @param array $folders Массив путей к папкам относительно корня темы.
     */
    public function __construct(array $folders) {
        $this->init($folders);
    }

    /**
     * Запускает процесс сканирования и подключения.
     */
    private function init(array $folders): void {
        foreach ($folders as $folder) {
            // Формируем полный путь к папке темы
            $directory = get_stylesheet_directory() . '/' . ltrim($folder, '/');

            if (is_dir($directory)) {
                $this->recursiveRequire($directory);
            }
        }
    }

    /**
     * Рекурсивно проходит по папкам и подключает файлы.
     */
    private function recursiveRequire(string $path): void {
        try {
            // SKIP_DOTS игнорирует точки . и ..
            $dir = new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS);
            $iter = new \RecursiveIteratorIterator($dir);

            foreach ($iter as $file) {
                // Проверяем: 
                // 1. Это файл, а не папка
                // 2. Расширение php
                // 3. Имя не начинается с "_"
                if (
                    $file->isFile() && 
                    $file->getExtension() === 'php' && 
                    strpos($file->getFilename(), '_') !== 0
                ) {
                    require_once $file->getPathname();
                }
            }
        } catch (\Exception $e) {
            // В продакшне лучше логировать ошибки, если папка недоступна для чтения
            error_log('FileLoader Error: ' . $e->getMessage());
        }
    }
}