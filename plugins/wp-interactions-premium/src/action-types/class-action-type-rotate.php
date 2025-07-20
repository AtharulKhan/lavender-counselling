<?php
/**
 * Action Type: Move
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Rotate' ) ) {
	class WPI_Action_Type_Rotate extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'rotate';
			$this->category = 'animation';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Rotate', 'wp-interactions' );
			$this->description = __( 'Rotate an element', 'wp-interactions' );

			$this->keywords = [
				'spin',
			];

			$this->properties = [
				'rotate' => [
					'name' => __( 'Rotate', 'wp-interactions' ),
					'type' => 'number',
					'default' => 0,
					'min' => -360,
					'max' => 360,
					'step' => 0.1,
				],
			];

			$this->has_dynamic = false;
		}
	}

	wpi_add_action_type( 'rotate', 'WPI_Action_Type_Rotate' );
}
