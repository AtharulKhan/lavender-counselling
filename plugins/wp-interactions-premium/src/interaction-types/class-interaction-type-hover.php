<?php
/**
 * Interaction Type: Hover
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Hover' ) ) {
	class WPI_Interaction_Type_Hover extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'hover';
			$this->type = 'element';
			$this->category = 'mouse';

			$this->label = __( 'Mouse hover', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when your mouse hovers in or out of an element', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'On Hover Actions', 'wp-interactions' ),
					'slug' => 'in',
					'description' => '',
				],
				[
					'title' => __( 'On Hover Out Actions', 'wp-interactions' ),
					'slug' => 'out',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.
		}
	}

	wpi_add_interaction_type( 'hover', 'WPI_Interaction_Type_Hover' );
}
