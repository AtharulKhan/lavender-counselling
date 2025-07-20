<?php
/**
 * Action Type: Dynamic Navigate
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Dynamic_Navigate' ) ) {
	class WPI_Action_Type_Dynamic_Navigate extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'dynamicNavigate';
			$this->category = 'navigation';
			$this->type = 'time';

			$this->label = __( 'Dynamic Navigate', 'wp-interactions' );
			$this->description = __( 'Loads a web page without requiring a page load', 'wp-interactions' );

			$this->keywords = [
				'load',
				'ajax',
			];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'dynamicNavigate', 'WPI_Action_Type_Dynamic_Navigate' );
}
