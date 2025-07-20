<?php
/**
 * Action Type: Replace HTML
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Replace_Html' ) ) {
	class WPI_Action_Type_Replace_Html extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'replaceHtml';
			$this->category = 'html';
			$this->type = 'all';

			$this->label = __( 'Replace HTML', 'wp-interactions' );
			$this->short_label = __( 'Replace', 'wp-interactions' );
			$this->description = __( 'Replace the inner HTML of an element', 'wp-interactions' );

			$this->keywords = [
				'innerhtml',
				'text',
			];

			$this->properties = [
				'html' => [
					'name' => __( 'New HTML', 'wp-interactions' ),
					'type' => 'textarea',
					'default' => '',
					'help' => __( 'The new HTML that will replace the content of the target element', 'wp-interactions' ),
				],
			];

			$this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'replaceHtml', 'WPI_Action_Type_Replace_Html' );
}
