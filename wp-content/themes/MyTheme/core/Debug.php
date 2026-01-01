<?php

/**
 * Debug Service
 * 
 * Provides static helper methods for debugging theme performance,
 * block rendering, and database queries.
 * 
 * Only active when WP_DEBUG is enabled and THEME_DEBUG is defined.
 *
 * @package App\Core
 * @since 1.0.0
 */

namespace App\Core;

class Debug
{
    /**
     * Track if debug mode is enabled
     *
     * @var bool
     */
    private static bool $enabled = false;

    /**
     * Page generation start time
     *
     * @var float|null
     */
    private static ?float $page_start_time = null;

    /**
     * Initialize debug mode
     * 
     * Should be called from Bootstrap during initialization.
     * Sets up all debug hooks and logging.
     *
     * @return void
     */
    public static function init(): void
    {
        self::$enabled = defined('THEME_DEBUG') && THEME_DEBUG;

        if (!self::$enabled) {
            return;
        }

        self::$page_start_time = microtime(true);
        self::logStartup();
    }

    /**
     * Log startup information
     *
     * @return void
     */
    private static function logStartup(): void
    {
        error_log('\\n\\n=== THEME DEBUG MODE ENABLED ===');
        error_log('WP Debug: ' . (defined('WP_DEBUG') && WP_DEBUG ? 'Yes' : 'No'));
        error_log('Environment: ' . (defined('WP_ENVIRONMENT_TYPE') ? WP_ENVIRONMENT_TYPE : 'Unknown'));
        error_log('Save Queries: ' . (defined('SAVEQUERIES') && SAVEQUERIES ? 'Yes' : 'No'));
        error_log('Time: ' . date('Y-m-d H:i:s'));
        error_log('====================================\\n');
    }

    /**
     * Check if debug mode is enabled
     *
     * @return bool
     */
    public static function isEnabled(): bool
    {
        return self::$enabled;
    }

    /**
     * Log with timing
     * 
     * Helper method to log a message with current elapsed time since page start.
     *
     * @param string $message Message to log
     * @param string|null $category Optional category/section name
     * @return void
     */
    public static function log(string $message, ?string $category = null): void
    {
        if (!self::$enabled) {
            return;
        }

        $prefix = $category ? "[{$category}] " : '';
        error_log($prefix . $message);
    }

    /**
     * Start timing a section
     * 
     * Returns the start time to be used with endTiming().
     *
     * @param string $label Section label for logging
     * @return float Start time
     */
    public static function startTiming(string $label): float
    {
        if (!self::$enabled) {
            return microtime(true);
        }

        self::log("Starting: $label", 'TIMING');
        return microtime(true);
    }

    /**
     * End timing a section
     * 
     * Logs the elapsed time since startTiming() was called.
     *
     * @param float $start_time Start time from startTiming()
     * @param string $label Section label for logging
     * @param int $precision Decimal precision for milliseconds
     * @return float Elapsed time in milliseconds
     */
    public static function endTiming(float $start_time, string $label, int $precision = 2): float
    {
        if (!self::$enabled) {
            return 0.0;
        }

        $elapsed = (microtime(true) - $start_time) * 1000;
        self::log(sprintf("Completed: $label (%.{$precision}f ms)", $elapsed), 'TIMING');
        return $elapsed;
    }

    /**
     * Log page generation completion
     * 
     * Call this at the end of page generation to log total execution time.
     * Can be hooked to wp_footer or similar.
     *
     * @return void
     */
    public static function logPageComplete(): void
    {
        if (!self::$enabled || self::$page_start_time === null) {
            return;
        }

        $end_time = microtime(true);
        $duration = ($end_time - self::$page_start_time) * 1000;
        self::log(sprintf('Total page generation time: %.2f ms', $duration), 'PAGE GENERATION');
    }

    /**
     * Get WordPress database query count
     * 
     * Returns the number of queries executed so far.
     * Requires SAVEQUERIES to be defined and true.
     *
     * @return int Number of queries
     */
    public static function getQueryCount(): int
    {
        global $wpdb;
        return $wpdb->num_queries ?? 0;
    }

    /**
     * Log query execution
     * 
     * Helper to log database query information.
     *
     * @param int $query_count Number of queries
     * @param string $context Context/location of queries
     * @return void
     */
    public static function logQueries(int $query_count, string $context): void
    {
        if (!self::$enabled) {
            return;
        }

        self::log("SQL Queries: {$query_count}", "DB ({$context})");
    }

    /**
     * Get recent ACF queries
     * 
     * Retrieves recent database queries related to ACF postmeta.
     * Requires SAVEQUERIES to be enabled.
     *
     * @param int $post_id Post ID to filter by
     * @param int $limit Maximum number of queries to return
     * @return array Array of query data
     */
    public static function getAcfQueries(int $post_id, int $limit = 10): array
    {
        global $wpdb;

        if (!defined('SAVEQUERIES') || !SAVEQUERIES || empty($wpdb->queries)) {
            return [];
        }

        $acf_queries = [];
        $count = 0;

        // Iterate backwards through queries to get most recent first
        foreach (array_reverse($wpdb->queries) as $query) {
            if ($count >= $limit) {
                break;
            }

            $sql = $query[0];

            // Look for ACF-related postmeta queries
            if (
                strpos($sql, 'postmeta') !== false &&
                strpos($sql, '_') !== false &&
                strpos($sql, (string)$post_id) !== false
            ) {

                $acf_queries[] = [
                    'sql' => substr($sql, 0, 150) . (strlen($sql) > 150 ? '...' : ''),
                    'time' => $query[1],
                ];
                $count++;
            }
        }

        return $acf_queries;
    }

    /**
     * Log ACF queries for a context
     * 
     * Logs ACF-related database queries.
     *
     * @param int $post_id Post ID
     * @param string $context Context name (e.g., block name)
     * @return void
     */
    public static function logAcfQueries(int $post_id, string $context): void
    {
        if (!self::$enabled) {
            return;
        }

        $queries = self::getAcfQueries($post_id, 5);
        foreach ($queries as $query) {
            self::log(
                sprintf('Query (%.4f s): %s', $query['time'], $query['sql']),
                "ACF QUERY ({$context})"
            );
        }
    }

    /**
     * Log block information
     * 
     * Comprehensive block logging including timing, queries, and fields.
     *
     * @param string $block_name Block name
     * @param float $duration_ms Rendering duration in milliseconds
     * @param int $query_count Number of queries executed
     * @param array $acf_fields ACF fields data
     * @return void
     */
    public static function logBlockRender(
        string $block_name,
        float $duration_ms,
        float $duration_context,
        array $acf_fields = []
    ): void {
        if (!self::$enabled) {
            return;
        }

        $block_upper = strtoupper($block_name);

        if (!empty($acf_fields)) {
            self::log(
                'Fields: ' . implode(', ', array_keys($acf_fields)),
                "BLOCK {$block_upper} ACF"
            );
        }

        self::log(
            sprintf('Render time: %.2f ms', $duration_ms),
            "BLOCK {$block_upper}"
        );

        self::log(
            sprintf('Context Render time: %.2f ms', $duration_context),
            "BLOCK {$block_upper}"
        );
    }

    /**
     * Log block discovery
     * 
     * Logs block discovery and registration summary.
     *
     * @param int $count Number of blocks discovered
     * @param float $duration_ms Discovery duration in milliseconds
     * @return void
     */
    public static function logBlockDiscovery(int $count, float $duration_ms): void
    {
        if (!self::$enabled) {
            return;
        }

        self::log(
            sprintf('Discovered and registered %d blocks in %.2f ms', $count, $duration_ms),
            'BLOCK REGISTRATION'
        );
    }

    /**
     * Log block assets enqueueing
     * 
     * Logs asset enqueueing completion.
     *
     * @param float $duration_ms Enqueueing duration in milliseconds
     * @return void
     */
    public static function logBlockAssets(float $duration_ms): void
    {
        if (!self::$enabled) {
            return;
        }

        self::log(
            sprintf('Assets enqueued in %.2f ms', $duration_ms),
            'BLOCK ASSETS'
        );
    }
}
