<?php
/**
 * Action Type: Skew
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Skew' ) ) {
	class WPI_Action_Type_Skew extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'skew';
			$this->category = 'animation';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Skew', 'wp-interactions' );
			$this->description = __( 'Skew an element', 'wp-interactions' );

			$this->keywords = [
				'skewx',
				'skewy',
				'twist',
			];

			$this->properties = [
				'x' => [
					'name' => 'X',
					'type' => 'number',
					'default' => 0,
					'min' => -360,
					'max' => 360,
					'step' => 0.1,
				],
				'y' => [
					'name' => 'Y',
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

	wpi_add_action_type( 'skew', 'WPI_Action_Type_Skew' );
}
