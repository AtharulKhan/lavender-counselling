<?php
/**
 * Action Type: Toggle HTML attribute
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Update_Attribute' ) ) {
	class WPI_Action_Type_Update_Attribute extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'updateAttribute';
			$this->category = 'html';
			$this->type = 'all';

			$this->label = __( 'Update Attribute', 'wp-interactions' );
			$this->dynamic_label = 'action'; // Use this property as the label.
			$this->description = __( 'Updates an HTML attribute', 'wp-interactions' );

			$this->keywords = [
				'add',
				'remove',
				'data',
			];

			$this->properties = [
				'attribute' => [
					'name' => 'Attribute name',
					'type' => 'text',
					'default' => '',
				],
				'value' => [
					'name' => 'Value',
					'type' => 'text',
					'default' => '',
					'help' => __( 'The value to update the attribute to. If toggle is picked below, the attribute will be toggled with this value.', 'wp-interactions' ),
				],
				'action' => [
					'name' => 'Action',
					'type' => 'select',
					'default' => 'update',
					'options' => [
						[ 'value' => 'update', 'label' => sprintf( __( 'Update %s', 'wp-interactions' ), __( 'attribute', 'wp-interactions' ) ) ],
						[ 'value' => 'remove', 'label' => sprintf( __( 'Remove %s', 'wp-interactions' ), __( 'attribute', 'wp-interactions' ) ) ],
						[ 'value' => 'toggle', 'label' => sprintf( __( 'Toggle %s', 'wp-interactions' ), __( 'attribute', 'wp-interactions' ) ) ],
					],
					'help' => __( 'If update is picked, the attribute will be updated to the specifiied value. If remove, the attribute name will just be removed. If toggle, then the attribute with the value will be toggled on and off.' )
				],
			];

			$this->has_starting_state = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'updateAttribute', 'WPI_Action_Type_Update_Attribute' );
}
