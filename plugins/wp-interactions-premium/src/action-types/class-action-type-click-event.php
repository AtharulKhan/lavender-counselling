<?php
/**
 * Action Type: Click Element
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Click_Event' ) ) {
	class WPI_Action_Type_Click_Event extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'click';
			$this->category = 'event';
			$this->type = 'time';

			$this->label = __( 'Click Event', 'wp-interactions' );
			$this->description = __( 'Simulate a click on an element', 'wp-interactions' );

			$this->keywords = [];

			$this->properties = [];

			$this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'click', 'WPI_Action_Type_Click_Event' );
}
