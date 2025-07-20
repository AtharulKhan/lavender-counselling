<?php
/**
 * Action Type: Scale
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Scale' ) ) {
	class WPI_Action_Type_Scale extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'scale';
			$this->category = 'animation';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Scale', 'wp-interactions' );
			$this->description = __( 'Scale an element', 'wp-interactions' );

			$this->keywords = [
				'zoom',
				'scalex',
				'scaley',
			];

			$this->properties = [
				'x' => [
					'name' => 'X',
					'type' => 'number',
					'default' => 1,
					'min' => 0,
					'max' => 2,
					'step' => 0.01,
				],
				'y' => [
					'name' => 'Y',
					'type' => 'number',
					'default' => 1,
					'min' => 0,
					'max' => 2,
					'step' => 0.01,
				],
			];

			$this->has_dynamic = false;
		}
	}

	wpi_add_action_type( 'scale', 'WPI_Action_Type_Scale' );
}
