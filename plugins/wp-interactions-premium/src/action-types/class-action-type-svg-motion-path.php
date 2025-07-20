<?php
/**
 * Action Type: SVG motion path
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_SVG_Motion_Path' ) ) {
	class WPI_Action_Type_SVG_Motion_Path extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'svgMotionPath';
			$this->category = 'svg';
			$this->type = 'time';
			$this->is_animation = true;

			$this->label = __( 'SVG Motion Path', 'wp-interactions' );
			$this->short_label = __( 'SVG Path', 'wp-interactions' );
			$this->description = __( 'Animate an SVG along a path', 'wp-interactions' );

			$this->keywords = [
				'line',
			];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'svgMotionPath', 'WPI_Action_Type_SVG_Motion_Path' );
}
