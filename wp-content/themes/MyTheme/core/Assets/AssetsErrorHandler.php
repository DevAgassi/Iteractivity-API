<?php

namespace App\Core\Assets;

class AssetsErrorHandler
{
    public static function handle(\Throwable $e): void
    {
        if (is_admin() || defined('WP_DEBUG') && WP_DEBUG) {
            self::renderAdminNotice($e);
        }

        self::disableAssets();

        error_log('[Vite] ' . $e->getMessage());
    }

    protected static function renderAdminNotice(\Throwable $e): void
    {
        add_action('admin_notices', function () use ($e) {
            ?>
            <div class="notice notice-error">
                <p><strong>Vite assets error</strong></p>
                <p><?= esc_html($e->getMessage()) ?></p>
                <p>
                    Please run:
                    <code>npm run build</code>
                </p>
            </div>
            <?php
        });
    }

    protected static function disableAssets(): void
    {
        // Глобальний флаг — assets просто не підключаться
        AbstractAssets::$isDevCache = false;

        add_filter('app/assets/enabled', '__return_false');
    }
}
