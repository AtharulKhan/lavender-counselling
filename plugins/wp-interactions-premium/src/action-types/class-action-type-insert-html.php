<?php
/**
 * Action Type: Append HTML
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Insert_Html' ) ) {
	class WPI_Action_Type_Insert_Html extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'insertHtml';
			$this->category = 'html';
			$this->type = 'all';

			$this->label = __( 'Insert HTML', 'wp-interactions' );
			$this->dynamic_label = 'position'; // Use this property as the label.
			$this->description = __( 'Insert HTML inside or outside an element', 'wp-interactions' );

			$this->keywords = [
				'innerhtml',
				'text',
			];

			$this->properties = [
				'html' => [
					'name' => __( 'Inserted HTML', 'wp-interactions' ),
					'type' => 'textarea',
					'default' => '',
					'help' => __( 'The HTML that will be inserted', 'wp-interactions' ),
				],
				'position' => [
					'name' => __( 'Position to insert HTML', 'wp-interactions' ),
					'type' => 'select',
					'options' => [
						[ 'label' => __( 'Append HTML inside', 'wp-interactions' ), 'value' => 'beforeend' ],
						[ 'label' => __( 'Prepend HTML inside', 'wp-interactions' ), 'value' => 'afterbegin' ],
						[ 'label' => __( 'Insert HTML before', 'wp-interactions' ), 'value' => 'beforebegin' ],
						[ 'label' => __( 'Insert HTML after', 'wp-interactions' ), 'value' => 'afterend' ],
					],
					'default' => 'beforeend',
				],
			];

			$this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'insertHtml', 'WPI_Action_Type_Insert_Html' );
}
