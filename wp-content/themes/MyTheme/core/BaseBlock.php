<?php

namespace App\Core;

use Timber\Timber;

abstract class BaseBlock
{
    protected string $folder;
    protected array $block = [];
    protected array $timber_context = [];
    protected array $context = [];

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

    public function __construct()
    {
        $fields = [];

        if ($this->dto_class && class_exists($this->dto_class)) {
            // DTO використовується → беремо дані з $block у дочірньому класі
            $fields = []; // заповниться пізніше через setBlock + DTO
        } else {
            // Розробка на старті → get_fields()
            $fields = get_fields() ?: [];
        }

        $this->timber_context = Timber::context([
            'block' => [],
            'fields' => $fields,
        ]);

        // Генеруємо унікальний ID для кожного інстансу
        $this->unique_id = 'block-' . uniqid();
    }

    /**
     * Повертає залежності для enqueue
     */
    public function getDependencies(): array
    {
        return $this->dependencies;
    }

    public function setBlock(array $block): void
    {
        $this->block = $block;
        if ($this->dto_class && class_exists($this->dto_class)) {
            $dto = new $this->dto_class($block);
            // Тут BaseBlock не знає що саме всередині
            $this->timber_context['fields'] = $dto->toArray();
        }
    }

    public function setFolder(string $folder): void
    {
        $this->folder = $folder;
    }

    public function setIsPreview(bool $is_preview): void
    {
        $this->timber_context['is_preview'] = $is_preview;
    }

    /**
     * Load fields from preloaded store (NO ACF CALLS)
     */
    protected function loadFields(): void
    {
        $block_id = $this->block['id'] ?? null;

        if (! $block_id) {
            return;
        }

        //$this->timber_context['fields'] = BlockFieldsStore::get($block_id); // TODO
    }

    public function getInitialState(): array
    {
        return [];
    }

    protected function getInitialContext(): array
    {
        return [];
    }

    /**
     * Get unique ID of the block instance
     */
    public function getUniqueId(): string
    {
        return $this->unique_id;
    }

    protected function registerInteractivityState(): void
    {
        if (! $this->interactivity_namespace) {
            return;
        }

        $this->timber_context['state'] = $this->getInitialState();

        if (!empty($this->timber_context['state']) && function_exists('wp_interactivity_state')) {
            wp_interactivity_state(
                $this->interactivity_namespace,
                $this->timber_context['state']
            );
        }
    }

    protected function getAttributes(): array
    {
        $attrs = $context = $this->getInitialContext();

        $attrs['id'] = esc_attr($this->getUniqueId());

        if (isset($this->dependencies['interactivity'])) {
            $attrs['data-wp-interactive'] = esc_attr($this->interactivity_namespace);
            $attrs['data-wp-context'] = esc_attr(wp_json_encode($context));
        }

        return $attrs;
    }

    protected function getTemplate(): string
    {
        return "/blocks/{$this->folder}/view.twig";
    }

    public function render(): void
    {
        // Load fields from RAM
        // $this->loadFields();
        $this->registerInteractivityState();
        $this->timber_context['attrs'] = $this->getAttributes();
        $this->timber_context['unique_id'] = $this->getUniqueId();

        Timber::render($this->getTemplate(), $this->timber_context);
    }
}
