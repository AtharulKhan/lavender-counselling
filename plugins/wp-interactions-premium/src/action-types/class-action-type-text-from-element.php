<?php
/**
 * Action Type: Get text from element
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Text_From_Element' ) ) {
	class WPI_Action_Type_Text_From_Element extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'textFromElement';
			$this->category = 'data';
			$this->type = 'time';

			$this->label = __( 'Get Text From Element', 'wp-interactions' );
			$this->short_label = __( 'Get Text', 'wp-interactions' );
			$this->description = __( 'Get text from an HTML Element to use in later actions', 'wp-interactions' );

			$this->keywords = [
				'data',
			];

			$this->properties = [
				'id' => [
					'name' => __( 'Reference ID', 'wp-interactions' ),
					'type' => 'id',
					'default' => '',
					'hasDynamic' => false,
				],
			];

			$this->has_starting_state = false;
			$this->has_duration = false;
			$this->has_easing = false;

			// This action will provide data with the name from the `id` property.
			$this->provides = [ 'id' ];
		}
	}

	wpi_add_action_type( 'textFromElement', 'WPI_Action_Type_Text_From_Element' );
}
