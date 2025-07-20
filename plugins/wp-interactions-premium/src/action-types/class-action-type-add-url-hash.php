<?php
/**
 * Action Type: Add URL Hash
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Add_Url_Hash' ) ) {
	class WPI_Action_Type_Add_Url_Hash extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'addUrlHash';
			$this->category = 'navigation';
			$this->type = 'all';

			$this->label = __( 'URL Hash', 'wp-interactions' );
			// Translators: {hash} is a placeholder for the hash value.
			$this->dynamic_label = __( 'Navigate to #{hash}', 'wp-interactions' ); // Use this property as the label.
			$this->description = __( 'Add a hash to the URL', 'wp-interactions' );

			$this->keywords = [
				'anchor',
			];

			$this->properties = [
				'hash' => [
					'name' => 'Hash',
					'type' => 'text',
					'default' => '',
				],
			];

			$this->has_starting_state = false;
			$this->has_target = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'addUrlHash', 'WPI_Action_Type_Add_Url_Hash' );
}
