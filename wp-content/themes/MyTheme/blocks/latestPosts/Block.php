<?php

namespace App\Blocks\LatestPosts;

use App\Core\Blocks\BaseBlock;
use Timber\Timber;

class Block extends BaseBlock
{
    /** @var string Block unique identifier */
    public string $blockName = 'latestPosts';

    /** @var array WordPress script dependencies */
    protected array $dependencies_module = ['@wordpress/interactivity'];

    /** @var string Interactivity API store namespace */
    protected ?string $interactivity_namespace = 'latestposts';

    /**
     * Build block context with initial posts and configuration.
     *
     * @return array Block context data including posts, pagination info, and settings
     */
    protected function getContext(): array
    {        
        $this->classes = 'latest-posts-block';
        $fields = $this->timber_context['fields'] ?? [];

        /** @var int Posts per page from ACF field, minimum 1 */
        $postsPerPage = max(1, (int)($fields['posts_per_page'] ?? 3));

        /** @var array Initial posts fetched from database */
        $posts = Timber::get_posts([
            'posts_per_page' => $postsPerPage,
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

        /** @var string Load more button text with WPML support */
        $loadMoreText = $fields['load_more_button_text'] ?? 'Завантажити ще';
        if (function_exists('__')) {
            $loadMoreText = __($loadMoreText, 'mytheme');
        }

        return [
            'posts' => $posts,
            'totalPosts' => wp_count_posts('post')->publish,
            'postsPerPage' => $postsPerPage,
            'offset' => $postsPerPage,
            'loadMoreText' => $loadMoreText,
            'isLoading' => false,
        ];
    }
}
