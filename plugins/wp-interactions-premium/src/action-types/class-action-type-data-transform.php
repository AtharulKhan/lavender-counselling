<?php
/**
 * Action Type: Transform data
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Data_Transform' ) ) {
	class WPI_Action_Type_Data_Transform extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = __( 'Transform data', 'wp-interactions' );
			$this->category = 'data';
			$this->type = 'all';

			$this->label = __( 'Transform Data', 'wp-interactions' );
			$this->description = __( 'Transform data from a previous step with JavaScript', 'wp-interactions' );

			$this->keywords = [
				'transform',
				'convert',
			];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'dataTransform', 'WPI_Action_Type_Data_Transform' );
}
