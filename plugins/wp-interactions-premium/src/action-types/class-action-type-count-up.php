<?php
/**
 * Action Type: Count Up
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Count_Up' ) ) {
	class WPI_Action_Type_Count_Up extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'countUp';
			$this->category = 'animation';
			$this->type = 'all';

			$this->label = __( 'Count up', 'wp-interactions' );
			$this->description = __( 'Count up to a number', 'wp-interactions' );

			$this->keywords = [
				'increment',
			];

			// $this->properties = [
			// ];
		}
	}

	wpi_add_action_type( 'countUp', 'WPI_Action_Type_Count_Up' );
}
