<?php
/**
 * Action Type: CSS Rules
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Css_Rule' ) ) {
	class WPI_Action_Type_Css_Rule extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'cssRule';
			$this->category = 'style';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'CSS Rule', 'wp-interactions' );
			$this->description = __( 'Change a CSS style rule', 'wp-interactions' );

			$this->keywords = [
				'rule',
				'update',
			];

			$this->properties = [
				'property' => [
					'name' => __( 'CSS Property', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'CSS Custom Properties are supported. For example: border-radius, --my-property.', 'wp-interactions' ),
					'hasDynamic' => false,
				],
				'value' => [
					'name' => __( 'Value', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'CSS Custom Properties and functions like calc() are supported. For example: 10px, 50%, #000000, etc. When using calc, make sure to add spaces between operators.', 'wp-interactions' ),
				],
			];
		}
	}

	wpi_add_action_type( 'cssRule', 'WPI_Action_Type_Css_Rule' );
}
