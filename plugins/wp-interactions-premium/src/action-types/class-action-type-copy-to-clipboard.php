<?php
/**
 * Action Type: Copy to Clipboard
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Copy_To_Clipboard' ) ) {
	class WPI_Action_Type_Copy_To_Clipboard extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'copyToClipboard';
			$this->category = 'misc';
			$this->type = 'all';

			$this->label = __( 'Copy to Clipboard', 'wp-interactions' );
			$this->description = __( 'Copies text to the clipboard', 'wp-interactions' );

			$this->keywords = [
				'paste',
			];

			$this->properties = [
				'text' => [
					'name' => __( 'Text', 'wp-interactions' ),
					'type' => 'textarea',
					'default' => '',
				],
			];

			$this->has_target = false;
			$this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'copyToClipboard', 'WPI_Action_Type_Copy_To_Clipboard' );
}
