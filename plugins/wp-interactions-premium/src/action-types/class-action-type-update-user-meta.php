<?php
/**
 * Action Type: Update User Meta
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Update_User_Meta' ) ) {
	class WPI_Action_Type_Update_User_Meta extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'updateUserMeta';
			$this->category = 'post';
			$this->type = 'all';

			$this->label = __( 'Update User Meta', 'wp-interactions' );
			$this->short_label = __( 'Update User', 'wp-interactions' );
			$this->description = __( 'Updates user meta in the database', 'wp-interactions' );

			$this->keywords = [];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'updateUserMeta', 'WPI_Action_Type_Update_User_Meta' );
}
