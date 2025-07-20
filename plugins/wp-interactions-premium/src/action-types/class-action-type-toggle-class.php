<?php
/**
 * Action Type: Toggle CSS class
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Toggle_Class' ) ) {
	class WPI_Action_Type_Toggle_Class extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'toggleClass';
			$this->category = 'style';
			$this->type = 'all';

			$this->label = __( 'Toggle CSS Class', 'wp-interactions' );
			$this->short_label = __( 'Toggle Class', 'wp-interactions' );
			$this->dynamic_label = 'action'; // Use this property as the label.
			$this->description = __( 'Toggles a CSS class', 'wp-interactions' );

			$this->keywords = [
				'add',
				'remove',
			];

			$this->properties = [
				'class' => [
					'name' => 'Class name',
					'type' => 'text',
					'default' => '',
				],
				'action' => [
					'name' => 'Action',
					'type' => 'select',
					'default' => 'add',
					'options' => [
						[ 'value' => 'add', 'label' => sprintf( __( 'Add %s', 'wp-interactions' ), __( 'class', 'wp-interactions' ) ) ],
						[ 'value' => 'remove', 'label' => sprintf( __( 'Remove %s', 'wp-interactions' ), __( 'class', 'wp-interactions' ) ) ],
						[ 'value' => 'toggle', 'label' => sprintf( __( 'Toggle %s', 'wp-interactions' ), __( 'class', 'wp-interactions' ) ) ],
					]
				],
			];

			$this->has_starting_state = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'toggleClass', 'WPI_Action_Type_Toggle_Class' );
}
