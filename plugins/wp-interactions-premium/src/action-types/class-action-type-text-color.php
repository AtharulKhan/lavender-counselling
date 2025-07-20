<?php
/**
 * Action Type: Text Color
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Text_Color' ) ) {
	class WPI_Action_Type_Text_Color extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'textColor';
			$this->category = 'style';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Text Color', 'wp-interactions' );
			$this->description = __( 'Changes the text color', 'wp-interactions' );

			$this->keywords = [
				'text',
				'color',
			];

			$this->properties = [
				'color' => [
					'name' => __( 'Text Color', 'wp-interactions' ),
					'type' => 'color',
					'default' => '#000000',
				],
			];

			$this->has_dynamic = false;
		}
	}

	wpi_add_action_type( 'textColor', 'WPI_Action_Type_Text_Color' );
}
