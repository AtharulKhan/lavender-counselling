<?php
/**
 * Action Type: Get data from custom PHP
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Custom_Php' ) ) {
	class WPI_Action_Type_Custom_Php extends WPI_Abstract_Action_Type {
		public function __construct() {
			parent::__construct();

			// Register our REST API endpoint for running custom PHP code.
			add_action( 'rest_api_init', array( $this, 'register_rest_route' ) );
		}

		public function initialize() {
			$this->name = 'customPhp';
			$this->category = 'data';
			$this->type = 'all';
			$this->uses_frontend_rest_api = true;

			$this->label = sprintf( __( 'Run %s', 'wp-interactions' ), __( 'Custom PHP', 'wp-interactions' ) );
			$this->short_label = __( 'Custom PHP', 'wp-interactions' );
			$this->description = __( 'Runs a custom PHP expression', 'wp-interactions' );

			$this->keywords = [
				'function',
			];

			$this->properties = [
				'code' => [
					'name' => __( 'Custom PHP', 'wp-interactions' ),
					'type' => 'code',
					'default' => '',
					'help' => sprintf( __( 'PHP expression that will be executed. You can use the %s$data%s array to access referenced data from other steps, e.g. %s$data[\'my_var\']%s.', 'wp-interactions' ), '<code>', '</code>', '<code>', '</code>' ),
					'language' => 'php',
					'hidden' => true,
				],
				'id' => [
					'name' => __( 'Reference ID', 'wp-interactions' ),
					'type' => 'id',
					'default' => '',
					'hasDynamic' => false,
				],
			];

			$this->has_target = false;
			$this->has_starting_state = false;
			$this->has_duration = false;
			$this->has_easing = false;
			// $this->has_preview = false;

			// Add a signature to the action to verify the integrity of the data.
			$this->verify_integrity = true;

			// This action will provide data with the name from the `id` property.
			$this->provides = [ 'id' ];
		}

		public function register_rest_route() {
			register_rest_route( 'wpi/v1', '/custom-php', [
				'methods' => 'POST',
				'callback' => [ $this, 'run_custom_php' ],
				'permission_callback' => '__return_true',
				'args' => array(
					'interaction_key' => array(
						'required' => true,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'action_key' => array(
						'required' => true,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
					// Data needs to be an array of values
					'data' => array(
						'required' => true,
						'type' => 'json',
						'sanitize_callback' => function( $value, $request, $param ) {
							// Sanitize text field all keys and values.
							$new_value = [];
							foreach ( $value as $key => $val ) {
								// $new_value[ sanitize_text_field( $key ) ] = wp_kses_post( $val );
								$new_value[ sanitize_text_field( $key ) ] = sanitize_text_field( $val );
							}
							return $new_value;
						},
					),
				),
			] );
		}

		public function run_custom_php( $request ) {
			$result = '';

			$interaction_key = $request->get_param( 'interaction_key' );
			$action_key = $request->get_param( 'action_key' );
			$data = (object) $request->get_param( 'data' );

			// Note: We're sure that the action will have a verified secure signature.
			$action = WPI_Action::find_action( $action_key, $interaction_key );

			if ( ! empty( $action ) ) {
				$code = $action->get_value( 'code' );

				if ( stripos( $code, 'return' ) === false ) {
					$code = 'return ' . $code;
				}
				$code = urldecode( $code );

				$result = '';
				try {
					ob_start();
					$result = eval( $code . ';' );
					ob_end_clean();
				}
				catch ( Error $e ) {
					trigger_error( $e->getMessage(), E_USER_WARNING );
				}
			}

			// Return the output, but do not return JSON because we will get slashes.
			header( 'Content-Type: text/html' );
			echo esc_html( $result );
			exit();
		}
	}

	wpi_add_action_type( 'customPhp', 'WPI_Action_Type_Custom_Php' );
}
