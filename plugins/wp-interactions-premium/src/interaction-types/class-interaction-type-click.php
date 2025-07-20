<?php
/**
 * Interaction Type: Click
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Click' ) ) {
	class WPI_Interaction_Type_Click extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'click';
			$this->type = 'element';
			$this->category = 'mouse';

			$this->label = __( 'Click', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when you click an element', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Click Actions', 'wp-interactions' ),
					'slug' => 'click',
					'description' => __( 'Do these actions when the element is clicked', 'wp-interactions' ),
				],
			];
			$this->timeline_type = 'time'; // time, percentage.

			$this->options = [
				[
					// Translators: %s is an action, like 'click'.
					'label' => sprintf( __( 'Prevent default %s behavior', 'wp-interactions' ), __( 'click', 'wp-interactions' ) ),
					'name' => 'preventDefault',
					'type' => 'toggle',
				],
				[
					'label' => __( 'Add button role & tabindex', 'wp-interactions' ),
					'name' => 'buttonRole',
					'type' => 'toggle',
				],
			];
		}
	}

	wpi_add_interaction_type( 'click', 'WPI_Interaction_Type_Click' );
}
