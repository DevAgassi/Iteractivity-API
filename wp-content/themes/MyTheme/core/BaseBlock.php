<?php

/**
 * Base BaseBlock class
 * 
 * Abstract base class for all ACF blocks.
 * Handles rendering and Interactivity API state initialization.
 *
 * @package App\Core
 * @since 1.0.0
 */

namespace App\Core;

use Timber\Timber;

abstract class BaseBlock
{
    protected string $folder;

    /**
     * Block data from ACF
     *
     * @var array
     */
    protected array $block = [];

    /**
     * Block context/fields
     *
     * @var array
     */
    protected array $context = [];

    /**
     * Interactivity API namespace
     * Override in child class
     *
     * @var string|null
     */
    protected ?string $interactivity_namespace = null;

    /**
     * Set block data
     *
     * @param array $block ACF block data
     * @return void
     */
    public function setBlock(array $block): void
    {
        $this->block = $block;
    }

    public function setFolder(string $folder)
    {
        $this->folder = $folder;
    }

    /**
     * Set block context
     *
     * @param array $context Block context
     * @return void
     */
    public function setContext(array $context): void
    {
        $this->context = $context;
    }

    /**
     * Get initial state for Interactivity API
     * Override in child class to provide state
     *
     * @return array
     */
    public function getInitialState(): array
    {
        return [];
    }

    /**
     * Get initial context for Interactivity API (per-block instance)
     * Override in child class
     *
     * @return array
     */
    protected function getInitialContext(): array
    {
        return [];
    }

    /**
     * Register Interactivity API state
     *
     * @return void
     */
    protected function registerInteractivityState(): void
    {
        if (! $this->interactivity_namespace) {
            return;
        }

        $state = $this->getInitialState();

        if (!empty($state) && function_exists('wp_interactivity_state')) {
            wp_interactivity_state($this->interactivity_namespace, $state);
        }
    }

    /**
     * Get data attributes for the block wrapper
     *
     * @return string HTML attributes string
     */
    protected function getInteractivityAttributes(): string
    {
        if (! $this->interactivity_namespace) {
            return '';
        }

        $attrs = sprintf('data-wp-interactive="%s"', esc_attr($this->interactivity_namespace));

        $context = $this->getInitialContext();
        if (! empty($context)) {
            $attrs .= sprintf(' data-wp-context=\'%s\'', wp_json_encode($context));
        }

        return $attrs;
    }

    /**
     * Get Timber context for rendering
     *
     * @return array
     */
    protected function getTimberContext(): array
    {
        return Timber::context([
            'block'                    => $this->block,
            'fields'                   => get_fields() ?: [],
            'interactivity_attrs'      => $this->getInteractivityAttributes(),
        ]);
    }

    /**
     * Get template path
     * Override to customize
     *
     * @return string
     */
    protected function getTemplate(): string
    {
        return "/blocks/{$this->folder}/view.twig";
    }

    /**
     * Render the block
     *
     * @return void
     */
    public function render(): void
    {
        // Register server-side state
        $this->registerInteractivityState();

        // Render template
        $context = $this->getTimberContext();
        Timber::render($this->getTemplate(), $context);
    }
}
