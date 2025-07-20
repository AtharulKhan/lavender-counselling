<?php
/**
 * Action Type: Page State
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Page_State' ) ) {
	class WPI_Action_Type_Page_State extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'pageState';
			$this->category = 'pageState';
			$this->type = 'all';

			$this->label = __( 'Page State', 'wp-interactions' );
			$this->description = __( 'Sets the current Page State to another', 'wp-interactions' );

			$this->keywords = [];

			$this->properties = [
				'state' => [
					'name' => 'New State',
					'type' => 'text',
					'default' => '',
					'help' => __( 'The page state to transition to. This can be used to trigger Page State interactions.', 'wp-interactions' ),
				],
			];

			$this->has_target = false;
			$this->has_duration = false;
			$this->has_easing = false;
			$this->has_preview = false;
		}
	}

	wpi_add_action_type( 'pageState', 'WPI_Action_Type_Page_State' );
}
