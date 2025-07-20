<?php
/**
 * Action Type: Get data from WP REST API
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Data_From_Rest_Api' ) ) {
	class WPI_Action_Type_Data_From_Rest_Api extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'dataCustomRestApi';
			$this->category = 'data';
			$this->type = 'all';

			$this->label = __( 'Get Data from WP REST API', 'wp-interactions' );
			$this->short_label = __( 'Get REST API Data', 'wp-interactions' );
			$this->description = __( 'Get data from the WordPress REST API', 'wp-interactions' );

			$this->keywords = [
				'fetch',
			];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'dataCustomRestApi', 'WPI_Action_Type_Data_From_Rest_Api' );
}
