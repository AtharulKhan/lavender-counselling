<?php
/**
 * Action Type: Confirm
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Confirm' ) ) {
	class WPI_Action_Type_Confirm extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'confirm';
			$this->category = 'flow';
			$this->type = 'time';

			$this->label = __( 'Confirmation Dialogue', 'wp-interactions' );
			$this->short_label = __( 'Confirm', 'wp-interactions' );
			$this->description = __( 'Show a confirmation dialogue before continuing on the succeeding actions. If the user clicks cancel, the timeline will stop.', 'wp-interactions' );

			$this->keywords = [
				'question',
				'ask',
			];

			$this->properties = [
				'message' => [
					'name' => __( 'Confirmation Message', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
				],
			];

			$this->has_starting_state = false;
			$this->has_target = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'confirm', 'WPI_Action_Type_Confirm' );
}
