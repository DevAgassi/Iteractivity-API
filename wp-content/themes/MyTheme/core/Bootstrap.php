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

use Timber\Timber;

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
     * @since 1.0.0
     * @return void
     */
    public function boot(): void
    {
        $this->initTimber();
        $this->registerServices();
        $this->bootServices();
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
    private function registerServices(): void
    {
        $this->services = [
            'site'      => StarterSite::class,
            'assets'    => Assets::class,
            'blocks'    => BlockRegistry::class,
            'templates' => TemplateRegistry::class,
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
        // BlockRegistry - register on acf/init
        if (isset($this->services['blocks']) && function_exists('acf_register_block_type')) {
            add_action('acf/init', [$this->services['blocks'], 'autoDiscoverAndRegister']);
        }

        // StarterSite - instantiate
        if (isset($this->services['site'])) {
            new $this->services['site']();
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
     * @return string|null Service class name or null
     */
    public function getService(string $name): ?string
    {
        return $this->services[$name] ?? null;
    }
}
