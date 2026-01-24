<?php

namespace App\Core\Blocks;

use Timber\Timber;
use App\Core\Debug;

abstract class BaseBlock
{
    abstract protected function getContext(): array;
    protected string $blockName;
    protected string $folder;
    protected array $block = [];
    protected array $timber_context = [];
    protected array $context = [];
    protected string $content = '';
    protected array $fields = [];
    protected string $classes = '';
    protected bool $is_preview = false;

    /**
     * Масив глобальних залежностей блоку
     * ['jquery']
     *
     * @var array
     */
    protected array $dependencies = [];

    /**
     * Масив глобальних  модульніх залежностей
     * ['@wordpress/interactivity']
     *
     * @var array
     */
    protected array $dependencies_module = [];

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

    /**
     * Namespace для реєстрації стану блоку в Interactivity
     *
     * @var string|null
     */
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

    public function __construct($block, $folder_name, $id, $content, $is_preview)
    {
        if (!isset($this->blockName)) {
            throw new \Exception("Властивість \$blockName має бути визначена в класі " . static::class);
        }

        $this->is_preview = $is_preview;
        $this->block = $block;
        $this->folder = $folder_name  . '/blocks/' . $this->blockName;
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
                    sprintf(
                        'Loaded fields via DTO (%s): %s (%.2f ms)',
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
                    sprintf(
                        'Loaded %d ACF fields: %s (%.2f ms)',
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
    protected function registerContext(): void
    {
        $this->timber_context = [
            ...$this->timber_context,
            'context' => $this->getContext(),
            'classes' => $this->classes,
            'unique_id' => $this->getUniqueId(),
            'is_preview' => is_admin() && !wp_doing_ajax(),
            'attrs' => get_block_wrapper_attributes([
                'data-unique-id' => $this->unique_id,
                'class' => $this->classes,
            ])
        ];

        $this->registerState();
    }

    protected function registerAssets()
    { 
        BlockAssets::enqueueBlockDependency($this->dependencies, $this->dependencies_module, $this->blockName . '/block.js');
    }

    protected function registerState()
    {
        if ($this->interactivity_namespace) {
            // autoregister interactivity dependency
            $this->dependencies[] = 'interactivity';

            // Додаємо unique_id в контекст для JavaScript
            $contextData = $this->timber_context['context'];
            $contextData['unique_id'] = $this->unique_id;
            $contextData['offset'] = $contextData['offset'] ?? 0;
            $contextData['isLoading'] = false;

            $this->timber_context['attrs'] .= ' '
                . wp_interactivity_data_wp_context($contextData)
                . ' data-wp-interactive="' . esc_attr($this->interactivity_namespace) . '"';

            if (function_exists('wp_interactivity_state')) {
                wp_interactivity_state(
                    $this->interactivity_namespace,
                    $contextData
                );
            }
        }
    }

    public static function renderCallback($block, $content = '', $is_preview = false, $post_id = 0)
    {
        $start_time = Debug::isEnabled() ? microtime(true) : null;

        $instance = new static($block, '', $post_id, $content, $is_preview);

        $instance->registerAssets();
        $instance->registerContext();

        $context_time = Debug::isEnabled() ? microtime(true) : null;

        Timber::render($instance->getTemplate(), $instance->timber_context);

        if (Debug::isEnabled()) {
            $duration = (microtime(true) - $start_time) * 1000;
            $context_duration = ($context_time - $start_time) * 1000;
            Debug::logBlockRender($instance->blockName, $duration, $context_duration);
        }
    }
}
