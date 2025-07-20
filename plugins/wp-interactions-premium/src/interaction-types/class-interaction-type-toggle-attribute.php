<?php
/**
 * Interaction Type: Toggle Attribute
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Toggle_Attribute' ) ) {
	class WPI_Interaction_Type_Toggle_Attribute extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'toggleAttribute';
			$this->type = 'element';
			$this->category = 'html';

			$this->label = __( 'Attribute toggle', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when an HTML attribute is added or removed or modified from an element', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Attribute Added/Matched Actions', 'wp-interactions' ),
					'slug' => 'added',
					'description' => '',
				],
				[
					'title' => __( 'Attribute Removed/Unmatched Actions', 'wp-interactions' ),
					'slug' => 'removed',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.

			$this->options = [
				[
					'label' => __( 'Attribute Name', 'wp-interactions' ),
					'name' => 'attribute',
					'type' => 'text',
					'help' => __( 'The attribute name to watch out for', 'wp-interactions' ),
					'required' => true,
				],
				[
					'label' => __( 'Attribute Value', 'wp-interactions' ),
					'name' => 'value',
					'type' => 'text',
					'help' => __( 'The attribute value to match. If empty, matching will be based on if the attribute was added or removed.', 'wp-interactions' ),
					'required' => true,
				]
			];
		}
	}

	wpi_add_interaction_type( 'toggleAttribute', 'WPI_Interaction_Type_Toggle_Attribute' );
}
