<?php
/**
 * Interaction Type: Page Scrolling
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Page_Scrolling' ) ) {
	class WPI_Interaction_Type_Page_Scrolling extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'pageScrolling';
			$this->type = 'page';
			$this->category = 'scroll';

			$this->label = __( 'While page is scrolling', 'wp-interactions' );
			$this->description = __( 'Define actions that happen while the page is scrolling', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Scrolling Actions', 'wp-interactions' ),
					'slug' => 'scroll',
					'description' => '',
				],
			];

			$this->options = [
				[
					'label' => __( 'Smoothness', 'wp-interactions' ),
					'name' => 'smoothness',
					'type' => 'number',
					'placeholder' => '200',
					'min' => 0,
					'help' => __( 'Adjust smoothness. 0 for immediate effect, increase for slower transitions', 'wp-interactions' ),
				],
			];

			$this->timeline_type = 'percentage'; // time, percentage.
		}
	}

	wpi_add_interaction_type( 'pageScrolling', 'WPI_Interaction_Type_Page_Scrolling' );
}
