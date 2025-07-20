<?php
/**
 * Action Type: Confetti
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Confetti' ) ) {
	class WPI_Action_Type_Confetti extends WPI_Abstract_Action_Type {
		public function __construct() {
			parent::__construct();

			add_action( "wpi/action/enqueue/confetti", array( $this, 'enqueue_frontend_script' ) );
		}

		public function initialize() {
			$this->name = 'confetti';
			$this->category = 'misc';
			$this->type = 'all';

			$this->label = __( 'Throw Confetti', 'wp-interactions' );
			$this->short_label = __( 'Confetti', 'wp-interactions' );
			$this->description = __( 'Celebrate with some confetti!', 'wp-interactions' );

			$this->keywords = [];

			$this->properties = [];

			$this->targets = [
				[ 'value' => 'trigger' ],
				[ 'value' => 'block' ],
				[ 'value' => 'block-name' ],
				[ 'value' => 'class' ],
				[ 'value' => 'selector' ],
				[ 'value' => 'window' ],
			];

			$this->has_starting_state = false;
			// $this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}

		public function enqueue_frontend_script() {
			wp_enqueue_script( 'wpi-frontend-confetti', plugins_url( 'dist/frontend-confetti.js', WPINTERACTIONS_FILE ), array( 'wpi-frontend' ), WPINTERACTIONS_VERSION );
		}
	}

	wpi_add_action_type( 'confetti', 'WPI_Action_Type_Confetti' );
}
