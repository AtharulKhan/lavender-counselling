<?php
/**
 * Interaction Type: Exit Page
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Page_Exit' ) ) {
	class WPI_Interaction_Type_Page_Exit extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'pageExit';
			$this->type = 'page';
			$this->category = 'page';

			$this->label = __( 'Exit page intent', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when a user intends to exit the page (works for non-touch devices only)', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Exit Intent Actions', 'wp-interactions' ),
					'slug' => 'exit',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.

			$this->options = [
				[
					'label' => __( 'Delay', 'wp-interactions' ),
					'name' => 'delay',
					'type' => 'number',
					'help' => __( 'Number of seconds from when the page loads until the exit intent is watched for.', 'wp-interactions' ),
					'required' => true,
					'placeholder' => '2',
					'min' => '0',
					'step' => '0.1',
				],
			];
		}
	}

	wpi_add_interaction_type( 'pageExit', 'WPI_Interaction_Type_Page_Exit' );
}
