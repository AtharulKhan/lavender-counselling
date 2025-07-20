<?php
/**
 * Action Type: Page State
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Local_Storage' ) ) {
	class WPI_Action_Type_Local_Storage extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'localStorage';
			$this->category = 'pageState';
			$this->type = 'all';

			$this->label = __( 'Local Storage', 'wp-interactions' );
			$this->description = __( 'Sets an item in the localStorage', 'wp-interactions' );

			$this->keywords = [];

			$this->properties = [
				'key' => [
					'name' => 'Item Key',
					'type' => 'text',
					'default' => '',
				],
				'value' => [
					'name' => 'Item Value',
					'type' => 'text',
					'default' => '',
				],
			];

			$this->has_target = false;
			$this->has_duration = false;
			$this->has_easing = false;
			$this->has_preview = false;
		}
	}

	wpi_add_action_type( 'localStorage', 'WPI_Action_Type_Local_Storage' );
}
