<?php
/**
 * Contains the options for the location rules.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Rest_Location_Rules' ) ) {
	class WPI_Rest_Location_Rules {

		/**
		 * Hooks our location rules options
		 *
		 * @return void
		 */
		function __construct() {
			add_action( 'rest_api_init', array( $this, 'register_route' ) );
		}

		public function register_route() {
			register_rest_route( 'wpi/v1', '/get_location_rules/(?P<type>[\w\d-]+)', array(
				'methods' => 'GET',
				'callback' => array( $this, 'get_location_rules' ),
				'permission_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
				'args' => array(
					'type' => array(
						'validate_callback' => __CLASS__ . '::validate_string'
					),
				),
			) );
		}

		public static function validate_string( $value, $request, $param ) {
			if ( ! is_string( $value ) ) {
				return new WP_Error( 'invalid_param', sprintf( esc_html__( '%s must be a string.', STACKABLE_I18N ), $param ) );
			}
			return true;
		}

		public function get_location_rules( $request ) {
			$type = $request->get_param( 'type' );
			$options = [];

			// If rule type doesn't exist, return empty array
			$location = wpi_get_location( $type );
			if ( $location ) {
				$options = $location->get_values();
			}

			return rest_ensure_response(
				apply_filters( 'wpi/rest/location_rule_type_options', $options, $type )
			);
		}

		/**
		 * Returns all the location rule types. Each rule type has a
		 * corresponding location class in /lib/locations
		 *
		 * @return Array An array of location rule types for display in the
		 * location rule picker.
		 */
		public static function get_location_rule_types() {
			$types = [];
			$location_rules = wpi_get_locations();
			foreach ( $location_rules as $location_rule ) {
				$category = empty( $location_rule->category ) ? 'misc' : $location_rule->category;

				if ( ! isset( $types[ $category ] ) ) {
					$types[ $category ] = [];
				}

				$types[ $category ][] = [
					'value' => $location_rule->name,
					'label' => $location_rule->label,
					'editorOptions' => $location_rule->editor_options,
				];
			}

			$options = [];
			$location_categories = [
				'post' => __( 'Post', 'wp-interactions' ),
				'page' => __( 'Page', 'wp-interactions' ),
				'theme' => __( 'Theme', 'wp-interactions' ),
				'misc' => __( 'Miscellaneous', 'wp-interactions' ),
			];
			foreach ( $location_categories as $key => $location_category ) {
				if ( isset( $types[ $key ] ) ) {
					$options[] = [
						'label' => $location_category,
						'options' => $types[ $key ],
					];
				}
			}

			return apply_filters( 'wpi/rest/location_rule_types', $options );
		}
	}

	new WPI_Rest_Location_Rules();
}
