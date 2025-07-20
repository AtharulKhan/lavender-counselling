<?php
/**
 * Contains the frontend script.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Frontend' ) ) {
	class WPI_Frontend {
		/**
		 * The interaction and action configurations that have already been
		 * loaded.
		 */
		public $loaded_interaction_configs = [];
		public $loaded_action_configs = [];

		/**
		 * Add our hooks.
		 */
		function __construct() {
			if ( ! is_admin() ) {
				// Load the interactions.
				add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend' ) );

				// Conditionally load the utility classes stylesheet.
				add_filter( 'render_block', array( $this, 'enqueue_utility_classes' ), 10, 2 );
			}
        }

		/**
		 * Loads the frontend script.
		 *
		 * @return void
		 */
		public function enqueue_frontend() {
			// Load all interactions for the frontend.
			$interactions = WPI_Interactions::load( true );

			// Just register the utility classes stylesheet, it will be enqueued
			// by render_block if a block uses a utility class.
			wp_register_style(
				'wpi-utility-classes',
				plugins_url( 'dist/utility-classes.css', WPINTERACTIONS_FILE ),
				array(),
				WPINTERACTIONS_VERSION
			);

			// Don't enqueue anything if there are no interactions for the frontend.
			if ( ! count( $interactions ) ) {
				return;
			}

			// Load the required interaciton and action types.
			wpi_require_types();

			wp_enqueue_script(
				'wpi-frontend',
				plugins_url( 'dist/frontend.js', WPINTERACTIONS_FILE ),
				array(),
				WPINTERACTIONS_VERSION
			);

			// This contains nothing for now.
			// wp_enqueue_style(
			// 	'wpi-frontend',
			// 	plugins_url( 'dist/frontend.css', WPINTERACTIONS_FILE ),
			// 	array(),
			// 	WPINTERACTIONS_VERSION
			// );

			// Add the first part of the WPIRunner check script
			// This script ensures that WPIRunner is defined before running the configurations
			// This has to be done immediately (interval = 1) before WPIRunner initialization
			// This makes sure that WPI works even if the main script is loaded asynchronously
			wp_add_inline_script( 'wpi-frontend',
"( () => {
	const maxAttempts = 500;
	let attempts = 1;
	const checkRunner = () => {
		if ( typeof WPIRunner !== 'undefined' ) {"
		);

			// Pass the configuration
			$animations = [];
			foreach ( $interactions as $interaction_index => $interaction ) {
				// These are the animation data needed by the frontend.
				$animation_data = $interaction->generate_animation_data();
				$animations[] = $animation_data;

				// Load the interaction configuration used by the animation.
				$interaction_type = wpi_get_interaction_type( $animation_data['type'] );
				if ( ! empty( $interaction_type ) ) {
					$interaction_name = $interaction_type->name;
					if ( ! isset( $this->loaded_interaction_configs[ $interaction_name ] ) ) {
						$this->loaded_interaction_configs[ $interaction_name ] = true;

						if ( apply_filters( "wpi/interaction/load/{$interaction_name}", true ) ) {
							do_action( "wpi/interaction/enqueue/{$interaction_name}" );
							// Load frontend scripts for the interaction if there is any.
							$script = $interaction_type->get_frontend_inline_script();
							if ( ! empty( $script ) ) {
								wp_add_inline_script( 'wpi-frontend', $script );
							}
						}
					}
				}

				// Load the action configurations used by the animation.
				foreach ( $animation_data['timelines'] as $timeline_index => $timeline ) {
					foreach ( $timeline['actions'] as $action_index => $action ) {
						$action_type = wpi_get_action_type( $action['type'] );
						if ( ! empty( $action_type ) ) {
							$action_name = $action_type->name;
							// Allow the action to change things in the
							// animation configuration. This is needed for
							// instances like when the cover block's background
							// color should have a different selector.
							$animations[ $interaction_index ]['timelines'][ $timeline_index ]['actions'][ $action_index ] = $action_type->initilize_action( $action, $animation_data );

							if ( ! isset( $this->loaded_action_configs[ $action_name ] ) ) {
								$this->loaded_action_configs[ $action_name ] = true;

								if ( apply_filters( "wpi/action/load/{$action_name}", true ) ) {
									do_action( "wpi/action/enqueue/{$action_name}" );
									// Load frontend scripts for the action if there is any.
									$script = $action_type->get_frontend_inline_script();
									wp_add_inline_script( 'wpi-frontend', $script );
								}
							}
						}
					}
				}
			}

			// Set the interactions.
			wp_add_inline_script( 'wpi-frontend', 'WPIRunner.configure(' . json_encode( $animations ) . ');' );

			// Add the closing part of the WPIRunner check script
			wp_add_inline_script( 'wpi-frontend',
			"} else if ( attempts++ < maxAttempts ) { setTimeout( checkRunner, 10 ) }
		};
	checkRunner();
} )();" );
			// TODO: we need to transform the block selector to

			// We need to know how to access the REST API.
			$args = apply_filters( 'wpi/localize_script/frontend', array() );
			if ( ! empty( $args ) ) {
				wp_localize_script( 'wpi-frontend', 'wpi', $args );
			}
		}

		/**
		 * Enqueues the utility classes stylesheet if a WPI utility class is used.
		 *
		 * @param string $block_content
		 * @param Array $block
		 * @return string Block content
		 */
		public function enqueue_utility_classes( $block_content, $block ) {
			if ( isset( $block['attrs']['className'] ) ) {
				if ( strpos( $block['attrs']['className'], 'wpi-' ) !== false ) {
					wp_enqueue_style( 'wpi-utility-classes' );
					remove_filter( 'render_block', array( $this, 'enqueue_utility_classes' ), 10, 2 );
				}
			}

			return $block_content;
		}

		public static function enqueue_rest_script_params() {
			// Check if we have applied the filter already
			if ( ! has_filter( 'wpi/localize_script/frontend', array( 'WPI_Frontend', 'add_rest_script_params' ) ) ) {
				add_filter( 'wpi/localize_script/frontend', array( 'WPI_Frontend', 'add_rest_script_params' ) );
			}
		}

		public static function add_rest_script_params( $args ) {
			$args['restUrl'] = trailingslashit( esc_url_raw( rest_url() ) );
			$args['restNonce'] = wp_create_nonce( 'wp_rest' ); // This needs to be 'wp_rest' to use the built-in nonce verification
			return $args;
		}
	}

	new WPI_Frontend();
}
