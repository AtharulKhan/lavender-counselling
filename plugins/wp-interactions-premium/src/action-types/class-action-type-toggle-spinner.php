<?php
/**
 * Action Type: Toggle Spinner
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Toggle_Spinner' ) ) {
	class WPI_Action_Type_Toggle_Spinner extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'toggleSpinner';
			$this->category = 'misc';
			$this->type = 'all';

			$this->label = __( 'Show or Hide Spinner', 'wp-interactions' );
			$this->short_label = __( 'Spinner', 'wp-interactions' );
			$this->description = __( 'Show or hide a loading spinner', 'wp-interactions' );

			$this->keywords = [];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'toggleSpinner', 'WPI_Action_Type_Toggle_Spinner' );
}
