<?php
/**
 * Action Type: Move
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Move' ) ) {
	class WPI_Action_Type_Move extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'move';
			$this->category = 'animation';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Move', 'wp-interactions' );
			$this->description = __( 'Move an element', 'wp-interactions' );

			$this->keywords = [
				'translate',
				'translatex',
				'translatey',
				'translatez',
				'x',
				'y',
				'z',
			];

			$this->properties = [
				'x' => [
					'name' => 'X',
					'type' => 'number',
					'default' => '', // This needs to be blank, if 0 then it will default to 0px.
					'min' => -100,
					'max' => 100,
					'step' => 1,
				],
				'y' => [
					'name' => 'Y',
					'type' => 'number',
					'default' => '', // This needs to be blank, if 0 then it will default to 0px.
					'min' => -100,
					'max' => 100,
					'step' => 1,
				],
				'z' => [
					'name' => 'Z',
					'type' => 'number',
				'default' => '', // This needs to be blank, if 0 then it will default to 0px.
					'min' => -100,
					'max' => 100,
					'step' => 1,
				],
			];

			$this->has_dynamic = false;
		}
	}

	wpi_add_action_type( 'move', 'WPI_Action_Type_Move' );
}
