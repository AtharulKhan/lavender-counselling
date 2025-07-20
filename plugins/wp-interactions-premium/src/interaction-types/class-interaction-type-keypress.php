<?php
/**
 * Interaction Type: Keypress
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Keypress' ) ) {
	class WPI_Interaction_Type_Keypress extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'keypress';
			$this->type = 'element';
			$this->category = 'keyboard';

			$this->label = __( 'Key press and release', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when a key is pressed or released', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Key Down Actions', 'wp-interactions' ),
					'slug' => 'down',
					'description' => '',
				],
				[
					'title' => __( 'Key Up Actions', 'wp-interactions' ),
					'slug' => 'up',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.
		}
	}

	wpi_add_interaction_type( 'keypress', 'WPI_Interaction_Type_Keypress' );
}
