<?php
/**
 * Action Type: Console Log
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Console_Log' ) ) {
	class WPI_Action_Type_Console_Log extends WPI_Abstract_Action_Type {
		public function __construct() {
			parent::__construct();

			// Prevent loading.
			add_filter( "wpi/action/load/consoleLog", [ $this, 'load' ] );
		}

		public function initialize() {
			$this->name = 'consoleLog';
			$this->category = 'misc';
			$this->type = 'all';

			$this->label = __( 'Console Log', 'wp-interactions' );
			$this->description = __( 'Prints a value in the browser\'s console.log, use for debugging purposes only.', 'wp-interactions' );

			$this->keywords = [];

			$this->properties = [
				'value' => [
					'name' => __( 'String or Expression', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => sprintf( __( 'Enter a string or a JavaScript expression. You can use %sdata%s to access referenced data from other steps, e.g. %sdata.my_var%s. You can use %sthis%s to reference the current action target/s. Expressions are only available in the frontend.', 'wp-interactions' ), '<code>', '</code>', '<code>', '</code>', '<code>', '</code>' ),
				],
			];

			$this->has_starting_state = false;
			// $this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
			$this->is_required_target = false;
		}

		// Only load when the user can edit pages for security because this is a
		// debugging tool that can evaluate JavaScript.
		public function load( $load ) {
			return current_user_can( 'edit_pages' );
		}
	}

	wpi_add_action_type( 'consoleLog', 'WPI_Action_Type_Console_Log' );
}
