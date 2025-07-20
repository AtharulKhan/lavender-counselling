<?php
/**
 * Action Type: Get value from input
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Value_From_Input' ) ) {
	class WPI_Action_Type_Value_From_Input extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'valueFromInput';
			$this->category = 'data';
			$this->type = 'time';

			$this->label = __( 'Get Value from Input', 'wp-interactions' );
			$this->short_label = __( 'Get Input', 'wp-interactions' );
			$this->description = __( 'Get the value of an HTML input field to use in later actions', 'wp-interactions' );

			$this->keywords = [
				'data',
			];

			$this->properties = [
				'id' => [
					'name' => __( 'Reference ID', 'wp-interactions' ),
					'type' => 'id',
					'default' => '',
					'hasDynamic' => false,
				],
			];

			$this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;

			// This action will provide data with the name from the `id` property.
			$this->provides = [ 'id' ];
		}
	}

	wpi_add_action_type( 'valueFromInput', 'WPI_Action_Type_Value_From_Input' );
}
