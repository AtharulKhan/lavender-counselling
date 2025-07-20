<?php
/**
 * Action Type: Focus
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Focus' ) ) {
	class WPI_Action_Type_Focus extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'focus';
			$this->category = 'event';
			$this->type = 'time';

			$this->label = __( 'Focus', 'wp-interactions' );
			$this->description = __( 'Move focus to an element.', 'wp-interactions' );

			$this->keywords = [
				'click',
				'blur',
			];

			$this->targets = [
				[ 'value' => 'trigger' ],
				[ 'value' => 'block' ],
				[ 'value' => 'block-name' ],
				[ 'value' => 'class' ],
				[ 'value' => 'selector' ],
			];

			$this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'focus', 'WPI_Action_Type_Focus' );
}
