<?php
/**
 * Interaction Type: Form Submitted
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Form_Submitted' ) ) {
	class WPI_Interaction_Type_Form_Submitted extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'formSubmitted';
			$this->type = 'page';
			$this->category = 'pageState';

			$this->label = __( 'Form submitted', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when a form is submitted', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Submit Actions', 'wp-interactions' ),
					'slug' => 'submit',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.
		}
	}

	wpi_add_interaction_type( 'formSubmitted', 'WPI_Interaction_Type_Form_Submitted' );
}
