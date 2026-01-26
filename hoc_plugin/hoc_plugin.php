<?php

/**
 * Plugin Name:       HOCS Plugin
 * Description:       -
 * Version:           1.0.0
 * Requires at least: 6.9
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hoc_plugin
 *
 * @package HOCSPlugin
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


add_action('init', function () {

	add_action('enqueue_block_editor_assets', function () {
		$asset_file = include(__DIR__ . '/build/index.asset.php');

		wp_enqueue_script(
			'global-hoc',
			plugins_url('build/index.js', __FILE__),
			$asset_file['dependencies'],
			$asset_file['version']
		);
	});
});
