<?php
/**
 * Interaction Type: Mouse Hovering
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Mouse_Hovering' ) ) {
	class WPI_Interaction_Type_Mouse_Hovering extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'mouseHovering';
			$this->type = 'element';
			$this->category = 'mouse';

			$this->label = __( 'While mouse hovering', 'wp-interactions' );
			$this->description = __( 'Actions for mouse hover within an element', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Hover X Actions', 'wp-interactions' ),
					'slug' => 'hoverx',
					'description' => __( '0% is the left side, 100% is the right side of the element.', 'wp-interactions' ),
				],
				[
					'title' => __( 'Hover Y Actions', 'wp-interactions' ),
					'slug' => 'hovery',
					'description' => __( '0% is the top side, 100% is the bottom side of the element.', 'wp-interactions' ),
				],
			];

			$this->options = [
				[
					'label' => __( 'Smoothness', 'wp-interactions' ),
					'name' => 'smoothness',
					'type' => 'number',
					'placeholder' => '200',
					'min' => 0,
					'help' => __( 'Adjust smoothness. 0 for immediate effect, increase for slower transitions', 'wp-interactions' ),				],
				[
					'label' => __( 'Reset to center', 'wp-interactions' ),
					'name' => 'resetToCenter',
					'type' => 'toggle',
					'placeholder' => true,
				],
				[
					'label' => __( 'Reset delay', 'wp-interactions' ),
					'name' => 'resetDelay',
					'type' => 'number',
					'placeholder' => '1000',
					'min' => 0,
					'help' => __( 'Set delay before timeline resets to center on mouse leave.', 'wp-interactions' ),
					'condition' => [
						'option' => 'resetToCenter',
						'value' => true,
					],
				],
			];

			$this->timeline_type = 'percentage'; // time, percentage.
		}
	}

	wpi_add_interaction_type( 'mouseHovering', 'WPI_Interaction_Type_Mouse_Hovering' );
}
