<?php
/**
 * Action Type: Get data from URL
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Data_Fetch_Url' ) ) {
	class WPI_Action_Type_Data_Fetch_Url extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'dataFetchUrl';
			$this->category = 'data';
			$this->type = 'all';

			$this->label = __( 'Get Data from URL', 'wp-interactions' );
			$this->short_label = __( 'Get URL', 'wp-interactions' );
			$this->description = __( 'Get data from a remote URL', 'wp-interactions' );

			$this->keywords = [
				'remote',
				'fetch',
			];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'dataFetchUrl', 'WPI_Action_Type_Data_Fetch_Url' );
}
