<?php
/**
 * Contains the configuration for the editor
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Editor' ) ) {
	class WPI_Editor {

		/**
		 * Loads the editor script.
		 *
		 * @return void
		 */
		function __construct() {
			if ( is_admin() ) {
				add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor' ) );
				add_action( 'enqueue_block_assets', array( $this, 'enqueue_assets' ) );
			}
		}

		/**
		 * Loads the editor script.
		 *
		 * @return void
		 */
		public function enqueue_editor() {
			// Load the required interaciton and action types.
			wpi_require_types();

			wp_enqueue_script(
				'wpi-editor',
				plugins_url( 'dist/editor.js', WPINTERACTIONS_FILE ),
				array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-plugins', 'wp-components', 'lodash' ),
				WPINTERACTIONS_VERSION
			);
			wp_enqueue_style(
				'wpi-editor-utility-classes',
				plugins_url( 'dist/editor-utility-classes.css', WPINTERACTIONS_FILE ),
				array(),
				WPINTERACTIONS_VERSION
			);
			wp_enqueue_style(
				'wpi-editor',
				plugins_url( 'dist/editor.css', WPINTERACTIONS_FILE ),
				array(),
				WPINTERACTIONS_VERSION
			);

			[ $interactions, $interaction_categories ] = $this->get_interaction_types_config();
			[ $actions, $action_categories ] = $this->get_action_types_config();

			$args = apply_filters( 'wpi/localize_script', array(
				'interactions' => $interactions,
				'interactionCategories' => $interaction_categories,
				'actions' => $actions,
				'actionCategories' => $action_categories,
				'locationRuleTypes' => WPI_Rest_Location_Rules::get_location_rule_types(),
				'manageInteractionsUrl' => admin_url( 'edit.php?post_type=wpi-interaction' ),
				'plan' => wpi_f()->get_plan_name(),
			) );
			wp_localize_script( 'wpi-editor', 'interactions', $args );

			// We need to know how to access the REST API.
			global $wp_version;
			wp_localize_script( 'wpi-editor', 'wpi', array(
				'pluginVersion' => WPINTERACTIONS_VERSION,
				'wpVersion' => $wp_version,
				'restUrl' => trailingslashit( esc_url_raw( rest_url() ) ),
				'restNonce' => wp_create_nonce( 'wp_rest' ), // This needs to be 'wp_rest' to use the built-in nonce verification
			) );
		}

		public function enqueue_assets() {
			wp_enqueue_style(
				'wpi-utility-classes',
				plugins_url( 'dist/utility-classes.css', WPINTERACTIONS_FILE ),
				array(),
				WPINTERACTIONS_VERSION
			);

			// This contains nothing for now.
			// wp_enqueue_style(
			// 	'wpi-styles',
			// 	plugins_url( 'dist/frontend.css', WPINTERACTIONS_FILE ),
			// 	array(),
			// 	WPINTERACTIONS_VERSION
			// );
		}

		/**
		 * Returns the interactions for the editor.
		 *
		 * @return array
		 */
		public function get_interactions() {
			$interactions = WPI_Interactions::load();

			$data = [];
			foreach ( $interactions as $interaction ) {
				$data[] = $interaction->get_data();
			}

			return $data;
		}

		public function get_interaction_types_config() {
			$interactions = [];

			$element_categories = [
				'mouse' => __( 'Mouse', 'wp-interactions' ),
				'html' => __( 'HTML & CSS', 'wp-interactions' ),
				'entrance' => __( 'Entrance', 'wp-interactions' ),
				'keyboard' => __( 'Keyboard', 'wp-interactions' ),
				'misc' => __( 'Miscellaneous', 'wp-interactions' ),
			];

			$page_categories = [
				'page' => __( 'Page', 'wp-interactions' ),
				'scroll' => __( 'Scroll', 'wp-interactions' ),
				'mouse' => __( 'Mouse', 'wp-interactions' ),
				'url' => __( 'URL', 'wp-interactions' ),
				'pageState' => __( 'Page State', 'wp-interactions' ),
				'misc' => __( 'Miscellaneous', 'wp-interactions' ),
			];

			// Gather all the interactions first.

			$element_interactions = [];
			$page_interactions = [];

			$interaction_types = wpi_get_interaction_types();
			foreach ( $interaction_types as $interaction_type ) {
				$category = empty( $interaction_type->category ) ? 'misc' : $interaction_type->category;
				$interactions[ $interaction_type->name ] = $interaction_type->get_editor_config();

				if ( $interaction_type->type === 'element' ) {
					if ( ! isset( $element_interactions[ $category ] ) ) {
						$element_interactions[ $category ] = [];
					}
					$element_interactions[ $category ][] = $interaction_type->name;
				} else if ( $interaction_type->type === 'page' ) {
					if ( ! isset( $page_interactions[ $category ] ) ) {
						$page_interactions[ $category ] = [];
					}
					$page_interactions[ $category ][] = $interaction_type->name;
				}
			}

			// Sort the element & page categories.

			$element_interaction_categories = [];
			foreach ( $element_categories as $key => $name ) {
				if ( isset( $element_interactions[ $key ] ) ) {
					$element_interaction_categories[] = [
						'name' => $name,
						'interactions' => $element_interactions[ $key ]
					];
				}
			}

			$page_interaction_categories = [];
			foreach ( $page_categories as $key => $name ) {
				if ( isset( $page_interactions[ $key ] ) ) {
					$page_interaction_categories[] = [
						'name' => $name,
						'interactions' => $page_interactions[ $key ]
					];
				}
			}

			$interaction_categories = [
				'element' => $element_interaction_categories,
				'page' => $page_interaction_categories,
			];

			return [ $interactions, $interaction_categories ];
		}

		public function get_action_types_config() {
			$actions = [];

			// Gather all the actions first.
			$types = [];
			$action_types = wpi_get_action_types();
			foreach ( $action_types as $action_type ) {
				$category = empty( $action_type->category ) ? 'misc' : $action_type->category;
				$actions[ $action_type->name ] = $action_type->get_editor_config();

				if ( ! isset( $types[ $category ] ) ) {
					$types[ $category ] = [];
				}
				$types[ $category ][] = $action_type->name;
			}

			// Sort the categories.

			$categories = [
				'display' => __( 'Display', 'wp-interactions' ),
				'animation' => __( 'Animation', 'wp-interactions' ),
				'style' => __( 'Style', 'wp-interactions' ),
				'navigation' => __( 'Navigation', 'wp-interactions' ),
				'event' => __( 'Event', 'wp-interactions' ),
				'svg' => __( 'SVG', 'wp-interactions' ),
				'html' => __( 'HTML', 'wp-interactions' ),
				'data' => __( 'Data Handling', 'wp-interactions' ),
				'web' => __( 'Web Service', 'wp-interactions' ),
				'content' => __( 'Content', 'wp-interactions' ),
				'post' => __( 'Post', 'wp-interactions' ),
				'flow' => __( 'Logic Flow', 'wp-interactions' ),
				'pageState' => __( 'Page State', 'wp-interactions' ),
				'misc' => __( 'Miscellaneous', 'wp-interactions' ),
			];

			$action_categories = [];
			foreach ( $categories as $key => $name ) {
				if ( isset( $types[ $key ] ) ) {
					$action_categories[] = [
						'name' => $name,
						'actions' => $types[ $key ]
					];
				}
			}

			return [ $actions, $action_categories ];
		}
	}

	new WPI_Editor();
}
