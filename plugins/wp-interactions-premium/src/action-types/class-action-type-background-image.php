<?php
/**
 * Action Type: Background Image
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Background_Image' ) ) {
	class WPI_Action_Type_Background_Image extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'backgroundImage';
			$this->category = 'style';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Background Image', 'wp-interactions' );
			$this->description = __( 'Changes the background image', 'wp-interactions' );

			$this->keywords = [
				'bg',
			];

			$this->properties = [
				'image' => [
					'name' => __( 'Background Image', 'wp-interactions' ),
					'type' => 'image',
					'default' => '',
				],
			];

			$this->has_dynamic = false;
		}
	}

	wpi_add_action_type( 'backgroundImage', 'WPI_Action_Type_Background_Image' );
}
