<?php

/**
 * Bootstrap class
 * 
 * Main application bootstrapper that initializes all core services.
 * Single entry point for theme initialization.
 *
 * @package App\Core
 * @since 1.0.0
 */

namespace App\Core;

use App\Core\Blocks\BlockRegistry;
use Timber\Timber;
use App\Core\Vite\Vite;
use App\Core\Timber\StarterSite;
use App\Core\Timber\TemplateRegistry;
use App\Core\FileLoader;

class Bootstrap
{
    /**
     * Singleton instance
     *
     * @var self|null
     */
    private static ?self $instance = null;

    /**
     * Registered services
     *
     * @var array
     */
    private array $services = [];

    /**
     * Get singleton instance
     *
     * @return self
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Private constructor for singleton
     */
    private function __construct()
    {
        // Prevent direct instantiation
    }

    /**
     * Boot the application
     * 
     * Initializes Timber and all core services.
     * 
     * Options:
     * - 'theme': Theme class name (default: Tailwind::class)
     * - 'debug': Enable debug mode for development (default: WP_DEBUG)
     *
     * @since 1.0.0
     * @return void
     */
    public function boot(array $options = []): void
    {
        add_filter('theme/container', fn() => self::$instance);

        // Initialize debug mode
        $debug_enabled = $options['debug'] ?? (defined('WP_DEBUG') && WP_DEBUG);

        if ($debug_enabled) {
            $this->enableDebugMode();
        }

        $this->initTimber();

        $this->registerServices($options);
        $this->bootServices();
    }

    /**
     * Enable debug mode
     * 
     * Initializes the Debug service for tracking performance metrics.
     *
     * @return void
     */
    private function enableDebugMode(): void
    {
        // Define debug constant for use throughout the theme
        define('THEME_DEBUG', true);

        // Initialize Debug service
        Debug::init();
    }

    /**
     * Initialize Timber
     *
     * @return void
     */
    private function initTimber(): void
    {
        if (!class_exists('Timber\Timber')) {
            add_action('admin_notices', function () {
                echo '<div class="error"><p>Timber not found.Install it via Composer.</p></div>';
            });
            return;
        }

        Timber::init();
    }

    /**
     * Register all core services
     *
     * @return void
     */
    private function registerServices(array $config = []): void
    {
        $default_config = [
            'requireFolders' => ['functions'],
        ];

        $config = array_merge($default_config, $config);

        // Initialize Vite service
        $vite = new Vite();

        $this->services = [
            'assets'    => $vite,
            'site'      => new StarterSite($vite),
            'blocks'    => BlockRegistry::class,
            'templates' => TemplateRegistry::class,
            'tailwind'  => $config['tailwind'] ?? Tailwind::class,
            'fileloader' => new FileLoader($default_config['requireFolders'])
        ];

        /**
         * Filter registered services
         *
         * @param array $services Array of service classes
         */
        $this->services = apply_filters('theme/services', $this->services);
    }

    /**
     * Boot all registered services
     *
     * @return void
     */
    private function bootServices(): void
    {
        // StarterSite - instantiate
        if (isset($this->services['blocks'])) {
            add_action('init', fn() => $this->services['blocks']::init());
        }

        // TemplateRegistry - register immediately
        if (isset($this->services['templates'])) {
            $this->services['templates']::register();
        }
    }

    /**
     * Get a registered service class
     *
     * @param string $name Service name
     * @return string|mixed
     */
    public function getService(string $name): mixed
    {
        return $this->services[$name] ?? null;
    }


    static function theme_service(string $name)
    {
        return apply_filters('theme/container', null)?->getService($name);
    }
}
