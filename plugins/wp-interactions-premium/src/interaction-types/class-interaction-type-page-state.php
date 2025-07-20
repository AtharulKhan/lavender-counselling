<?php
/**
 * Interaction Type: Page State
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Page_State' ) ) {
	class WPI_Interaction_Type_Page_State extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'pageState';
			$this->type = 'page';
			$this->category = 'pageState';

			$this->label = __( 'Page state change', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when a page state changes', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Matched State Actions', 'wp-interactions' ),
					'slug' => 'matched',
					'description' => '',
				],
				[
					'title' => __( 'UnMatched State Actions', 'wp-interactions' ),
					'slug' => 'unmatched',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.

			$this->options = [
				[
					'label' => __( 'State Name', 'wp-interactions' ),
					'name' => 'state',
					'type' => 'text',
					'help' => __( 'The name of the state that would trigger this interaction. e.g. busy, completed', 'wp-interactions' ),
					'required' => true,
				],
			];
		}
	}

	wpi_add_interaction_type( 'pageState', 'WPI_Interaction_Type_Page_State' );
}
