<?php
/**
 * Plugin Name: WP Interactions
 * Description: Make your blocks interactive! Effortlessly set triggers that do actions.
 * Requires at least: 6.5.3
 * Requires PHP: 7.0
 * Version: 1.2.0
 * Update URI: https://api.freemius.com
 * Author: Gambit Technologies, Inc
 * Text Domain: wp-interactions
 *
 * @package wp-interactions
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

defined( 'WPINTERACTIONS_BUILD' ) || define( 'WPINTERACTIONS_BUILD', 'premium' );
defined( 'WPINTERACTIONS_VERSION' ) || define( 'WPINTERACTIONS_VERSION', '1.2.0' );
defined( 'WPINTERACTIONS_FILE' ) || define( 'WPINTERACTIONS_FILE', __FILE__ );

require_once( plugin_dir_path( __FILE__ ) . 'src/freemius.php' );

/**
 * ==============================================================================
 * Initialize licensing. START
 * ==============================================================================
 */

if ( ! function_exists( 'wpi_f' ) ) {
	function wpi_f() {
		return WPI_Freemius::get_instance( [
			'plugin_id' => '14670',
			'slug' => 'wp-interactions',
			'option_name' => 'wpi_activation_data',
			'plugin_main_file' => WPINTERACTIONS_FILE,
		] );
	}

	add_action( 'init', function() {
		WPI_Freemius_Admin::get_instance( wpi_f(), [
			'show_plan' => true,
			'labels' => [
				'popup_title' => __( 'Plugin Premium License', 'wp-interactions' ),
				'popup_description' => __( 'Having an activated license key will allow you to enable plan-specific features, receive premium plugin updates and premium support.', 'wp-interactions' ),
				'license_key_field_label' => __( 'License Key', 'wp-interactions' ),
				'license_key_field_help' => __( 'Paste in your license key here. If you changed plans while having a license key active, you may need to deactivate and re-activate it to update your plugin capabilities.', 'wp-interactions' ),
				'activate_license' => __( 'Activate License Key', 'wp-interactions' ),
				'manage_license' => __( 'Manage License Key', 'wp-interactions' ),
				'activate_button' => __( 'Activate License', 'wp-interactions' ),
				'deactivate_button' => __( 'Deactivate License', 'wp-interactions' ),
				'sync_button' => __( 'Sync License', 'wp-interactions' ),
				'invalid_nonce' => __( 'Invalid nonce', 'wp-interactions' ),
				'deactiation_success' => __( 'License deactivated successfully', 'wp-interactions' ),
				'activation_success' => __( 'License activated successfully', 'wp-interactions' ),
				'sync_success' => __( 'License plan synced successfully', 'wp-interactions' ),
				'no_license_key' => __( 'No license key provided', 'wp-interactions' ),
			]
		] );
	} );
}

/**
 * ==============================================================================
 * Initialize licensing. END
 * ==============================================================================
 */

require_once( plugin_dir_path( __FILE__ ) . 'src/class-interactions.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/class-interaction.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/class-action.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/class-frontend-screen.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/security.php' );

require_once( plugin_dir_path( __FILE__ ) . 'src/locations.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/action-types.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types.php' );

require_once( plugin_dir_path( __FILE__ ) . 'src/locations/abstract-location.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-misc-all.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-post.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-post-type.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-post-archive.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-post-status.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-post-format.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-post-template.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-post-taxonomy.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-page.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-page-template.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-page-parent.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/locations/class-location-block-template.php' );

require_once( plugin_dir_path( __FILE__ ) . 'src/admin/manage-interactions.php' );

if ( ! is_admin() ) {
	require_once( plugin_dir_path( __FILE__ ) . 'src/frontend/frontend.php' );
}

if ( is_admin() ) {
	require_once( plugin_dir_path( __FILE__ ) . 'src/admin/admin.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'src/editor/editor.php' );
}

/**
 * Load the interaction and action types. We split this off into a function so
 * it can only be called when needed.
 *
 * - editor.php calls this for the editor
 * - frontend.php calls this if there are interactions in the page.
 *
 * @return void
 */
if ( ! function_exists( 'wpi_require_types' ) ) {
	function wpi_require_types() {
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/abstract-action-type.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-display.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-visibility.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-opacity.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-move.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-rotate.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-rotate-3d.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-scale.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-skew.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-confetti.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-slide-up.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-slide-down.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-count-up.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-toggle-class.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-update-attribute.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-text-color.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-background-color.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-background-image.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-css-rule.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-scroll-to-element.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-redirect-to-url.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-add-url-hash.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-get-parameter-url.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-popup-url.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-popup-image.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-dynamic-navigate.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-click-event.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-focus.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-fill-input.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-dispatch-event.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-svg-motion-path.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-svg-morph.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-svg-line-draw.php' );
		if ( wpi_f()->is_plan( 'professional' ) || wpi_f()->is_plan( 'agency' ) ) {
			require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-console-log.php' );
			require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-data-from-attribute.php' );
			require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-value-from-input.php' );
			require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-text-from-element.php' );
			require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-custom-js.php' );
			require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-custom-php.php' );
		}
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-data-from-rest-api.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-data-fetch-url.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-data-transform.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-webhook.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-replace-html.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-replace-text.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-insert-html.php' );
		if ( wpi_f()->is_plan( 'professional' ) || wpi_f()->is_plan( 'agency' ) ) {
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-increment-decrement.php' );
			require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-render-shortcode.php' );
			require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-get-post-data.php' );
			require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-update-post-meta.php' );
		}
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-update-user-meta.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-toggle-spinner.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-tooltip.php' );

		if ( wpi_f()->is_plan( 'professional' ) || wpi_f()->is_plan( 'agency' ) ) {
			require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-stop.php' );
		}
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-confirm.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-local-storage.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-page-state.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-copy-to-clipboard.php' );

		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/abstract-interaction-type.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-click.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-toggle.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-hover.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-mouse-hovering.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-mouse-press.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-toggle-class.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-toggle-attribute.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-enter-viewport.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-keypress.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-input-change.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-page-create.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-page-load.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-page-exit.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-page-scrolling.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-scroll-strength.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-mouse-move.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-url-hash.php' );
		// require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-form-submitted.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-document-html-event.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-html-event.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-local-storage.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/interaction-types/class-interaction-type-page-state.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-scrub-video.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'src/action-types/class-action-type-toggle-video.php' );
	}
}

// This is placed after the definition of wpi_require_types() since these depend on it.
require_once( plugin_dir_path( __FILE__ ) . 'src/rest-api/class-rest-editor.php' );
require_once( plugin_dir_path( __FILE__ ) . 'src/rest-api/class-rest-location-rules.php' );
