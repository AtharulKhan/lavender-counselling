<?php
/**
 * Interaction Type: Scroll Strength
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Scroll_Strength' ) ) {
	class WPI_Interaction_Type_Scroll_Strength extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'scrollStrength';
			$this->type = 'page';
			$this->category = 'scroll';

			$this->label = __( 'Page scroll strength', 'wp-interactions' );
			$this->description = __( 'Define actions according to page scroll strength', 'wp-interactions' );
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
				[
					'label' => __( 'Max Scroll Amount', 'wp-interactions' ),
					'name' => 'max_scroll',
					'type' => 'number',
					'placeholder' => '100',
					'min' => 1,
					'help' => __( 'The scroll distance in pixels that represents 100% scroll strength', 'wp-interactions' ),
				],
			];

			$this->timeline_type = 'percentage'; // time, percentage.
		}
	}

	wpi_add_interaction_type( 'scrollStrength', 'WPI_Interaction_Type_Scroll_Strength' );
}
