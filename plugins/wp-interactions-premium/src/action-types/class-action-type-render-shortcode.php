<?php
/**
 * Action Type: Render Shortcode
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Render_Shortcode' ) ) {
	class WPI_Action_Type_Render_Shortcode extends WPI_Abstract_Action_Type {
		public function __construct() {
			parent::__construct();

			// Register our REST API endpoint for rendering shortcodes.
			add_action( 'rest_api_init', array( $this, 'register_rest_route' ) );
		}

		public function initialize() {
			$this->name = 'renderShortcode';
			$this->category = 'content';
			$this->type = 'time';
			$this->uses_frontend_rest_api = true;

			$this->label = __( 'Render Shortcode', 'wp-interactions' );
			$this->description = __( 'Render a shortcode and get the output', 'wp-interactions' );

			$this->keywords = [
			];

			$this->properties = [
				'shortcode' => [
					'name' => __( 'Shortcode', 'wp-interactions' ),
					'type' => 'textarea',
					'default' => '',
					'placeholder' => __( '[my_shortcode]', 'wp-interactions' ),
					'help' =>
						__( 'Enter your shortcode here, you will need to use another action to use the shortcode output.', 'wp-interactions' ) .
						' ' .
						sprintf( '<a href="%s" target="_blank">%s</a>',
							// TODO: [DOCS] update this to an article
							'https://docs.wpinteractions.com/article/573-what-is-the-element-picker',
							__( 'Learn more', 'wp-interactions' )
						),
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
			$this->has_preview = false;

			// Add a signature to the action to verify the integrity of the data.
			$this->verify_integrity = true;

			// This action will provide data with the name from the `id` property.
			$this->provides = [ 'id' ];
		}

		public function register_rest_route() {
			register_rest_route( 'wpi/v1', '/render-shortcode', [
				'methods' => 'POST',
				'callback' => [ $this, 'render_shortcode' ],
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
								$new_value[ sanitize_text_field( $key ) ] = wp_kses_post( $val );
							}
							return $new_value;
						},
					),
				),
			] );
		}

		public function render_shortcode( $request ) {
			$result = '';

			$interaction_key = $request->get_param( 'interaction_key' );
			$action_key = $request->get_param( 'action_key' );
			$data = $request->get_param( 'data' );

			// Note: We're sure that the action will have a verified secure signature.
			$action = WPI_Action::find_action( $action_key, $interaction_key );

			if ( ! empty( $action ) ) {
				$shortcode = $action->get_value( 'shortcode' );

				// Extract all {{name}} from the shortcode and replace with the data value.
				$matches = [];
				$new_shortcode = preg_replace_callback( '/{{(.*?)}}/', function( $match ) use ( $data ) {
					$var_key = $match[1];
					if ( isset( $data[ $var_key ] ) ) {
						return esc_attr( $data[ $var_key ] );
					}
					return $match[0];
				}, $shortcode );

				// Render it!
				$result = wp_kses_post( do_shortcode( $new_shortcode ) );
			}

			// Return the output, but do not return JSON because we will get slashes.
			header( 'Content-Type: text/html' );
			echo $result;
			exit();
		}
	}

	wpi_add_action_type( 'renderShortcode', 'WPI_Action_Type_Render_Shortcode' );
}
