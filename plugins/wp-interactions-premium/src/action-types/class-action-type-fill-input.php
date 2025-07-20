<?php
/**
 * Action Type: Fill Input
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Fill_Input' ) ) {
	class WPI_Action_Type_Fill_Input extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'input';
			$this->category = 'event';
			$this->type = 'time';

			$this->label = __( 'Fill Input', 'wp-interactions' );
			$this->description = __( 'Fills in an input', 'wp-interactions' );

			$this->keywords = [
				'type',
				'complete',
				'select',
			];

			$this->properties = [
				'value' => [
					'name' => 'Value',
					'type' => 'text',
					'default' => '',
					'help' => __( 'The value to fill in the input. For checkbox or radio inputs, use the words true or false to check/uncheck.', 'wp-interactions' ),
				],
			];

			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'input', 'WPI_Action_Type_Fill_Input' );
}
