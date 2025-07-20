<?php
/**
 * Interaction Type: Toggle Class
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Toggle_Class' ) ) {
	class WPI_Interaction_Type_Toggle_Class extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'toggleClass';
			$this->type = 'element';
			$this->category = 'html';

			$this->label = __( 'Class toggle', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when a CSS class is added or removed from an element', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Class Added Actions', 'wp-interactions' ),
					'slug' => 'added',
					'description' => '',
				],
				[
					'title' => __( 'Class Removed Actions', 'wp-interactions' ),
					'slug' => 'removed',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.

			$this->options = [
				[
					'label' => __( 'Class', 'wp-interactions' ),
					'name' => 'class',
					'type' => 'text',
					'help' => __( 'The CSS class to watch out for', 'wp-interactions' ),
					'required' => true,
				]
			];
		}
	}

	wpi_add_interaction_type( 'toggleClass', 'WPI_Interaction_Type_Toggle_Class' );
}
