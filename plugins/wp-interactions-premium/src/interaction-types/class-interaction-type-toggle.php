<?php
/**
 * Interaction Type: Toggle Class
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Toggle' ) ) {
	class WPI_Interaction_Type_Toggle extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'toggle';
			$this->type = 'element';
			$this->category = 'mouse';

			$this->label = __( 'Click Toggle', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when you click an element on and off', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Toggle On Actions', 'wp-interactions' ),
					'slug' => 'first',
					// Translators: %s is an ordinal number.
					'description' => sprintf( __( 'Do these actions on the %s time', 'wp-interactions' ), __( 'first', 'wp-interactions' ) ),
				],
				[
					'title' => __( 'Toggle Off Actions', 'wp-interactions' ),
					'slug' => 'second',
					// Translators: %s is an ordinal number.
					'description' => sprintf( __( 'Do these actions on the %s time', 'wp-interactions' ), __( 'second', 'wp-interactions' ) ),
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

	wpi_add_interaction_type( 'toggle', 'WPI_Interaction_Type_Toggle' );
}
