<?php
/**
 * Interaction Type: Page Render
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Page_Create' ) ) {
	class WPI_Interaction_Type_Page_Create extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'pageCreate';
			$this->type = 'page';
			$this->category = 'page';

			$this->label = __( 'Page Create', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when this webpage is being created. Helpful for changing content in the page before the page even starts loading.', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Page Create Actions', 'wp-interactions' ),
					'slug' => 'create',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.
		}
	}

	wpi_add_interaction_type( 'pageCreate', 'WPI_Interaction_Type_Page_Create' );
}
