<?php
/**
 * Interaction Type: Page Load
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Page_Load' ) ) {
	class WPI_Interaction_Type_Page_Load extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'pageLoad';
			$this->type = 'page';
			$this->category = 'page';

			$this->label = __( 'Page load', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when this page loads', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Page Load Actions', 'wp-interactions' ),
					'slug' => 'load',
					'description' => '',
					'onceOnly' => false,
					'alwaysReset' => false,
				],
			];
			$this->timeline_type = 'time'; // time, percentage.
		}
	}

	wpi_add_interaction_type( 'pageLoad', 'WPI_Interaction_Type_Page_Load' );
}
