<?php
/**
 * Action Type: Slide
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Slide_Up' ) ) {
	class WPI_Action_Type_Slide_Up extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'slideUp';
			$this->category = 'animation';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Slide Up', 'wp-interactions' );
			$this->short_label = __( 'Slide Up', 'wp-interactions' );
			$this->description = __( 'Hide an element with a slide up animation (then show element using the Slide Down action)', 'wp-interactions' );

			$this->keywords = [
				'collapse',
				'expand',
			];
		}
	}

	wpi_add_action_type( 'slideUp', 'WPI_Action_Type_Slide_Up' );
}
