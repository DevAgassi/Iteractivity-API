<?php

namespace App\Core;

use Timber\Timber;

abstract class BaseBlock
{
    abstract protected function getContext(): array;

    protected string $folder;
    protected array $block = [];
    protected array $timber_context = [];
    protected array $context = [];
    protected string $content = '';
    protected array $fields = [];

    /**
     * Масив глобальних залежностей блоку
     * ['swiper', 'jquery', 'interactivity'] тощо
     *
     * @var array
     */
    protected array $dependencies = [];

    /**
     * DTO class name для конкретного блоку
     *
     * @var string|null
     */
    protected ?string $dto_class = null;

    /**
     * Унікальний ID блока на сторінці
     */
    protected string $unique_id;

    protected ?string $interactivity_namespace = null;

    /**
     * Get block dependencies
     */
    public function getDependencies(): array
    {
        return $this->dependencies;
    }

    /**
     * Get unique ID of the block instance
     */
    public function getUniqueId(): string
    {
        return $this->unique_id;
    }

    /**
     * Get block template path
     */
    protected function getTemplate(): string
    {
        return "{$this->folder}/view.twig";
    }

    public function init($block, $folder_name, $id, $content = ''): self
    {
        $this->block = $block;
        $this->folder = $folder_name;
        $this->unique_id = $id ?? uniqid('block_', true);
        $this->content = $content;

        $fields_timing_start = Debug::isEnabled() ? microtime(true) : null;
        
        if ($this->dto_class && class_exists($this->dto_class)) {
            $dto = new $this->dto_class($block);
            // Transform Native Block Data To Understandable Fields
            $this->fields = $dto->toArray();
            
            if (Debug::isEnabled()) {
                $duration = (microtime(true) - $fields_timing_start) * 1000;
                Debug::log(
                    sprintf('Loaded fields via DTO (%s): %s (%.2f ms)', 
                        basename($this->dto_class), 
                        implode(', ', array_keys($this->fields)),
                        $duration
                    ),
                    'BLOCK FIELDS'
                );
            }
        } else {
            $this->fields = get_fields() ?: [];
            
            if (Debug::isEnabled()) {
                $duration = (microtime(true) - $fields_timing_start) * 1000;
                Debug::log(
                    sprintf('Loaded %d ACF fields: %s (%.2f ms)',
                        count($this->fields),
                        !empty($this->fields) ? implode(', ', array_keys($this->fields)) : '(none)',
                        $duration
                    ),
                    'BLOCK FIELDS'
                );
            }
        }

        $this->timber_context = Timber::context([
            'fields' => $this->fields,
        ]);

        return $this;
    }

    /**
     * Set block data
     */
    public function setBlock(array $block): void
    {
        $this->block = $block;
    }

    /**
     * Set folder name of the block
     */
    public function setFolder(string $folder): void
    {
        $this->folder = $folder;
    }


    /**
     * Register block state for interactivity/Nantive //TODO переробити в два окремі методи, білш чисту архитектуру
     */
    protected function registerState(): void
    {
        $this->timber_context['context'] = $this->getContext();

        if (! $this->interactivity_namespace) {
            return;
        }


        $this->timber_context['interactivity_attrs'] = get_block_wrapper_attributes([
            'data-unique-id' => $this->unique_id,
            'data-wp-interactive' => $this->interactivity_namespace,
        ]);

        if (!empty($this->timber_context['context'])) {
            $this->timber_context['interactivity_attrs'] .= ' ' . wp_interactivity_data_wp_context($this->timber_context['context']);
        }

        // TODO: переробити в майбутньому
        if (!empty($this->timber_context['context']) && function_exists('wp_interactivity_state')) {
            //   $attrs =
            //   $attrs .= sprintf(' data-wp-context=\'%s\'', wp_json_encode($this->timber_context['state']));
            wp_interactivity_state(
                $this->interactivity_namespace,
                $this->timber_context['context']
            );
        }
    }

    /**
     * Render the block
     */
    public function render(): void
    {
        // Load fields from RAM
        $this->registerState();
        $this->timber_context['unique_id'] = $this->getUniqueId();
        $this->timber_context['is_preview'] = is_admin() && !wp_doing_ajax();

        Timber::render($this->getTemplate(), $this->timber_context);
    }
}
