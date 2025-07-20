<?php
/**
 * Action Type: SVG morph
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_SVG_Morph' ) ) {
	class WPI_Action_Type_SVG_Morph extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'svgMorph';
			$this->category = 'svg';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'SVG Morph', 'wp-interactions' );
			$this->description = __( 'Morph an SVG path', 'wp-interactions' );

			$this->keywords = [
				'path',
				'shape',
			];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'svgMorph', 'WPI_Action_Type_SVG_Morph' );
}
