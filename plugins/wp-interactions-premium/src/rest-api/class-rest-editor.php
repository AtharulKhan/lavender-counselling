<?php
/**
 * Contains the REST API used by the editor for loading saving the interactions.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Rest_Editor' ) ) {
	class WPI_Rest_Editor {

		/**
		 * Enqueues our scripts.
		 *
		 * @return void
		 */
		function __construct() {
			// Register our management rest routes
			add_action( 'rest_api_init', array( $this, 'register_route' ) );

			// Make sure our interaction types and action types are all registered.
			if ( wp_is_json_request() ) {
				wpi_require_types();
			}
		}

		public function register_route() {
			register_rest_route( 'wpi/v1', '/get_interactions', array(
				'methods' => 'GET',
				'callback' => array( $this, 'get_interactions' ),
				'permission_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			) );

			register_rest_route( 'wpi/v1', '/update_interaction', array(
				'methods' => 'POST',
				'callback' => array( $this, 'update_interaction' ),
				'permission_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
				'args' => array(
					'data' => array(
						'validate_callback' => __CLASS__ . '::validate_interaction',
					),
				),
			) );

			register_rest_route( 'wpi/v1', '/delete_interaction', array(
				'methods' => 'POST',
				'callback' => array( $this, 'delete_interaction' ),
				'permission_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
				'args' => array(
					'data' => array(
						'validate_callback' => __CLASS__ . '::validate_interaction',
					),
				),
			) );
		}

		public static function validate_string( $value, $request, $param ) {
			if ( ! is_string( $value ) ) {
				return new WP_Error( 'invalid_param', sprintf( esc_html__( '%s must be a string.', 'wp-interactions' ), $param ) );
			}
			return true;
		}

		public static function validate_interaction( $value, $request, $param ) {
			$result = self::validate_string( $value, $request, $param );
			if ( is_wp_error( $result ) ) {
				return $result;
			}

			$data = json_decode( $value );
			if ( ! $data ) {
				return new WP_Error( 'invalid_param', sprintf( esc_html__( '%s must be a valid JSON string.', 'wp-interactions' ), $param ) );
			}

			$result = WPI_Interaction::validate_interaction_data( $data );
			if ( is_wp_error( $result ) ) {
				return $is_valid;
			}

			return true;
		}

		public function get_interactions() {
			$interactions = WPI_Interactions::load();

			$return = [];
			foreach ( $interactions as $interaction ) {
				$return[] = $interaction->get_data();
			}

			return rest_ensure_response( $return );
		}

		public function update_interaction( $request ) {
			$data = $request->get_param( 'data' );
			$data = json_decode( $data, true );
			return rest_ensure_response( WPI_Interaction::update( $data ) );
		}

		public function delete_interaction( $request ) {
			$key = $request->get_param( 'key' );
			return rest_ensure_response( WPI_Interaction::trash( $key ) );
		}
	}

	new WPI_Rest_Editor();
}
