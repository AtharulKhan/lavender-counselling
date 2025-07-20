<?php
/**
 * Action Type: Slide
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Slide_Down' ) ) {
	class WPI_Action_Type_Slide_Down extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'slideDown';
			$this->category = 'animation';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Slide Down', 'wp-interactions' );
			$this->short_label = __( 'Slide Down', 'wp-interactions' );
			$this->description = __( 'Show an element with a slide down ainmatin (only works if the element used Slide Up first)', 'wp-interactions' );

			$this->keywords = [
				'collapse',
				'expand',
			];
		}
	}

	wpi_add_action_type( 'slideDown', 'WPI_Action_Type_Slide_Down' );
}
