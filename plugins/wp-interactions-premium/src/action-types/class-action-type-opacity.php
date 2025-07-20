<?php
/**
 * Action Type: Opacity
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Opacity' ) ) {
	class WPI_Action_Type_Opacity extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'opacity';
			$this->category = 'animation';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Opacity', 'wp-interactions' );
			$this->description = __( 'Change the opacity of an element', 'wp-interactions' );

			$this->keywords = [
				'fade',
			];

			$this->properties = [
				'opacity' => [
					'name' => __( 'Opacity', 'wp-interactions' ),
					'type' => 'number',
					'default' => 1,
					'min' => 0,
					'max' => 1,
					'step' => 0.01,
				],
			];

			$this->has_dynamic = false;
		}
	}

	wpi_add_action_type( 'opacity', 'WPI_Action_Type_Opacity' );
}
