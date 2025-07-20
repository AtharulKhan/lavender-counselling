<?php
/**
 * Action Type: Get data from attribute
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Data_From_Attribute' ) ) {
	class WPI_Action_Type_Data_From_Attribute extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'dataFromAttribute';
			$this->category = 'data';
			$this->type = 'time';

			$this->label = __( 'Get Data From Attribute', 'wp-interactions' );
			$this->short_label = __( 'Get Attribute', 'wp-interactions' );
			// Translators: {attribute} is a placeholder for an attribute name.
			$this->dynamic_label = __( 'Get {attribute}', 'wp-interactions' ); // Use this property as the label.
			$this->description = __( 'Get data from an HTML attribute to use in later actions', 'wp-interactions' );
			$this->label_applied_to = __( 'Get from Element', 'wp-interactions' );

			$this->keywords = [
				'data',
			];

			$this->properties = [
				'attribute' => [
					'name' => __( 'Attribute to get', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'The name of the element attribute.', 'wp-interactions' ),
				],
				'id' => [
					'name' => __( 'Reference ID', 'wp-interactions' ),
					'type' => 'id',
					'default' => '',
					'hasDynamic' => false,
				],
			];

			$this->has_starting_state = false;
			// $this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;

			// This action will provide data with the name from the `id` property.
			$this->provides = [ 'id' ];
		}
	}

	wpi_add_action_type( 'dataFromAttribute', 'WPI_Action_Type_Data_From_Attribute' );
}
