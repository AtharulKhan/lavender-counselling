<?php
/**
 * Interaction Type: Mouse Move
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Mouse_Move' ) ) {
	class WPI_Interaction_Type_Mouse_Move extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'mouseMove';
			$this->type = 'page';
			$this->category = 'mouse';

			$this->label = __( 'Mouse move in viewport', 'wp-interactions' );
			$this->description = __( 'Define actions that happen while the mouse is moving in the viewport', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Move X Actions', 'wp-interactions' ),
					'slug' => 'x',
					'description' => '',
				],
				[
					'title' => __( 'Move Y Actions', 'wp-interactions' ),
					'slug' => 'y',
					'description' => '',
				],
			];
			$this->timeline_type = 'percentage'; // time, percentage.
		}
	}

	wpi_add_interaction_type( 'mouseMove', 'WPI_Interaction_Type_Mouse_Move' );
}
