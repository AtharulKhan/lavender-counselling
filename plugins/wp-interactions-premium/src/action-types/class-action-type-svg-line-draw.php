<?php
/**
 * Action Type: SVG line drawing
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_SVG_Line_Draw' ) ) {
	class WPI_Action_Type_SVG_Line_Draw extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'svgLineDraw';
			$this->category = 'svg';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'SVG Line Draw', 'wp-interactions' );
			$this->short_label = __( 'SVG Draw', 'wp-interactions' );
			$this->description = __( 'Draw an SVG line', 'wp-interactions' );

			$this->keywords = [
				'sketch',
				'animate',
			];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'svgLineDraw', 'WPI_Action_Type_SVG_Line_Draw' );
}
