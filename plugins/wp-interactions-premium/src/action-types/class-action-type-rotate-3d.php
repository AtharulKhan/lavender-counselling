<?php
/**
 * Action Type: Rotate 3d
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Rotate_3d' ) ) {
	class WPI_Action_Type_Rotate_3d extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'rotate3d';
			$this->category = 'animation';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Rotate 3D', 'wp-interactions' );
			$this->description = __( 'Rotate or tilt an element', 'wp-interactions' );

			$this->keywords = [
				'spin',
				'rotatex',
				'rotatey',
				'rotatez',
				'tilt',
			];

			$this->properties = [
				'x' => [
					'name' => 'X',
					'type' => 'number',
					'default' => '', // This needs to be blank, if 0 then it will default to 0 degress.
					'min' => -360,
					'max' => 360,
					'step' => 0.1,
				],
				'y' => [
					'name' => 'Y',
					'type' => 'number',
					'default' => '', // This needs to be blank, if 0 then it will default to 0 degress.
					'min' => -360,
					'max' => 360,
					'step' => 0.1,
				],
				'z' => [
					'name' => 'Z',
					'type' => 'number',
					'default' => '', // This needs to be blank, if 0 then it will default to 0 degress.
					'min' => -360,
					'max' => 360,
					'step' => 0.1,
				],
			];

			$this->has_dynamic = false;
			$this->default_easing = 'linear';
		}
	}

	wpi_add_action_type( 'rotate3d', 'WPI_Action_Type_Rotate_3d' );
}
