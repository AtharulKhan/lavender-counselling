<?php
/**
 * Action Type: Visibility
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Visibility' ) ) {
	class WPI_Action_Type_Visibility extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'visibility';
			$this->category = 'display';
			$this->type = 'all';

			$this->label = __( 'Visibility', 'wp-interactions' );
			$this->description = __( 'Show or hide element', 'wp-interactions' );

			$this->keywords = [
				'show',
				'hide',
			];

			$this->properties = [
				'visibility' => [
					'name' => __( 'Visibility', 'wp-interactions' ),
					'type' => 'select',
					'options' => [
						[ 'label' => __( 'Toggle visibility', 'wp-interactions' ), 'value' => 'toggle' ],
						[ 'label' => __( 'Hide', 'wp-interactions' ), 'value' => 'hide' ],
						[ 'label' => __( 'Show', 'wp-interactions' ), 'value' => 'show' ],
					],
					'default' => 'toggle',
				],
			];

			$this->has_duration = false;
			$this->has_easing = false;
			$this->has_dynamic = false;
		}
	}

	wpi_add_action_type( 'visibility', 'WPI_Action_Type_Visibility' );
}
