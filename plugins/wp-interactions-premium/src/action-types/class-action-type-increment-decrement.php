<?php
/**
 * Action Type: Increment or Decrement Number
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Increment_Decrement' ) ) {
	class WPI_Action_Type_Increment_Decrement extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'incrementDecrement';
			$this->category = 'html';
			$this->type = 'all';

			$this->label = __( 'Increment or Decrement', 'wp-interactions' );
			$this->dynamic_label = 'mode'; // Use this property as the label.
			$this->description = __( 'Increment or decrement a text number in your HTML, works only with integers.', 'wp-interactions' );

			$this->keywords = [
				'plus',
				'minus',
			];

			$this->properties = [
				'mode' => [
					'name' => __( 'Mode', 'wp-interactions' ),
					'type' => 'select',
					'options' => [
						[ 'label' => __( 'Increment', 'wp-interactions' ), 'value' => 'increment' ],
						[ 'label' => __( 'Decrement', 'wp-interactions' ), 'value' => 'decrement' ],
					],
					'default' => 'increment',
				],
				'property' => [
					'name' => __( 'Property to be updated', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'The attribute to be updated. If blank, the element\'s text content will be incremented.', 'wp-interactions' ),
				],
			];

			$this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'incrementDecrement', 'WPI_Action_Type_Increment_Decrement' );
}
