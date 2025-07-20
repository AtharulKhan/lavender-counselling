<?php
/**
 * Action Type: Redirect to URL
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Redirect_To_Url' ) ) {
	class WPI_Action_Type_Redirect_To_Url extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'redirectToUrl';
			$this->category = 'navigation';
			$this->type = 'all';

			$this->label = __( 'Redirect', 'wp-interactions' );
			$this->description = __( 'Redirect to a URL', 'wp-interactions' );

			$this->keywords = [
				'scrolltop',
			];

			$this->properties = [
				'url' => [
					'name' => __( 'URL', 'wp-interactions' ),
					'type' => 'text',
					'placeholder' => 'https://',
					'help' => __( 'The URL to redirect to.', 'wp-interactions' ),
				],
			];

			$this->has_target = false;
			$this->has_starting_state = false;
			$this->has_duration = false;
			$this->has_easing = false;
			$this->has_preview = false;
		}
	}

	wpi_add_action_type( 'redirectToUrl', 'WPI_Action_Type_Redirect_To_Url' );
}
