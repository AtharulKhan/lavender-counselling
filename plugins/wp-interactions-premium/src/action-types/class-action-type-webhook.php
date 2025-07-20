<?php
/**
 * Action Type: Webhook
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Webhook' ) ) {
	class WPI_Action_Type_Webhook extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'webhook';
			$this->category = 'web';
			$this->type = 'all';

			$this->label = __( 'Webhook', 'wp-interactions' );
			$this->description = __( 'Call a webhook', 'wp-interactions' );

			$this->keywords = [];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'webhook', 'WPI_Action_Type_Webhook' );
}
