<?php
/**
 * Interaction Type: Mouse Press
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Mouse_Press' ) ) {
	class WPI_Interaction_Type_Mouse_Press extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'mousePress';
			$this->type = 'element';
			$this->category = 'mouse';

			$this->label = __( 'Mouse down and release', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when you press or release your mouse on an element', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Mouse Down Actions', 'wp-interactions' ),
					'slug' => 'down',
					'description' => '',
				],
				[
					'title' => __( 'Mouse Up Actions', 'wp-interactions' ),
					'slug' => 'up',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.

			$this->options = [
				[
					// Translators: %s is an action, like 'click'.
					'label' => sprintf( __( 'Prevent default %s behavior', 'wp-interactions' ), __( 'press', 'wp-interactions' ) ),
					'name' => 'preventDefault',
					'type' => 'toggle',
				],
			];
		}
	}

	wpi_add_interaction_type( 'mousePress', 'WPI_Interaction_Type_Mouse_Press' );
}
