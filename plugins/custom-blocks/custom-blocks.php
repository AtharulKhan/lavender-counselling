<?php
/**
 * Plugin Name:       Custom Blocks
 * Description:       A collection of custom blocks for Lavender Counselling website.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Lavender Counselling
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-blocks
 *
 * @package           custom-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers all blocks found in the build directory.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function custom_blocks_init() {
	$build_dir = __DIR__ . '/build';
	
	// Check if build directory exists
	if ( ! is_dir( $build_dir ) ) {
		return;
	}
	
	// Get all subdirectories in the build folder
	$block_dirs = glob( $build_dir . '/*', GLOB_ONLYDIR );
	
	foreach ( $block_dirs as $block_dir ) {
		// Check if block.json exists in this directory
		if ( file_exists( $block_dir . '/block.json' ) ) {
			register_block_type( $block_dir );
		}
	}
}
add_action( 'init', 'custom_blocks_init' );