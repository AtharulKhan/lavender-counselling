<?php
/**
 * Interaction Type: Input Change
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Input_Change' ) ) {
	class WPI_Interaction_Type_Input_Change extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'inputChange';
			$this->type = 'element';
			$this->category = 'keyboard';

			$this->label = __( 'Input change', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when an input changes', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Input Change Actions', 'wp-interactions' ),
					'slug' => 'change',
					'description' => '',
				],
				[
					'title' => __( 'Input Blur Actions', 'wp-interactions' ),
					'slug' => 'blur',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.
		}
	}

	wpi_add_interaction_type( 'inputChange', 'WPI_Interaction_Type_Input_Change' );
}
