<?php
/**
 * Action Type: Show Tooltip
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Show_Tooltip' ) ) {
	class WPI_Action_Type_Show_Tooltip extends WPI_Abstract_Action_Type {
		public function __construct() {
			parent::__construct();

			add_action( "wpi/action/enqueue/tooltip", array( $this, 'enqueue_frontend_script' ) );
		}

		public function initialize() {
			$this->name = 'tooltip';
			$this->category = 'misc';
			$this->type = 'all';

			$this->label = __( 'Show or Hide Tooltip', 'wp-interactions' );
			$this->short_label = __( 'Tooltip', 'wp-interactions' );
			$this->description = __( 'Show a tooltip bubble with some helpful text', 'wp-interactions' );

			$this->keywords = [];

			$this->properties = [];
		}

		public function enqueue_frontend_script() {
			wp_enqueue_script( 'wpi-frontend-tooltip', plugins_url( 'dist/frontend-tooltip.js', WPINTERACTIONS_FILE ), array( 'wpi-frontend' ), WPINTERACTIONS_VERSION );
		}
	}

	wpi_add_action_type( 'tooltip', 'WPI_Action_Type_Show_Tooltip' );
}
