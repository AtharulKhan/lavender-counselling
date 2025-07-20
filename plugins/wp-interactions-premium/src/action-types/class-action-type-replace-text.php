<?php
/**
 * Action Type: Replace Text
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Replace_Text' ) ) {
	class WPI_Action_Type_Replace_Text extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'replaceText';
			$this->category = 'html';
			$this->type = 'all';

			$this->label = __( 'Replace Text', 'wp-interactions' );
			$this->short_label = __( 'Replace', 'wp-interactions' );
			$this->description = __( 'Replace the text of an element', 'wp-interactions' );

			$this->keywords = [
				'innertext',
			];

			$this->properties = [
				'text' => [
					'name' => __( 'New Text', 'wp-interactions' ),
					'type' => 'textarea',
					'default' => '',
					'help' => __( 'The new text that will replace the text content of the target element', 'wp-interactions' ),
				],
			];

			$this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'replaceText', 'WPI_Action_Type_Replace_Text' );
}
