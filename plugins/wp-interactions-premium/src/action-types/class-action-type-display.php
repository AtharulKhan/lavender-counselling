<?php
/**
 * Action Type: Display
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Display' ) ) {
	class WPI_Action_Type_Display extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'display';
			$this->category = 'display';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Display', 'wp-interactions' );
 			$this->description = __( 'Change the CSS rule: display', 'wp-interactions' );

			$this->keywords = [
				'none',
				'hide',
				'show',
				'block',
				'flex',
				'grid',
			];

			$this->properties = [
				'display' => [
					'name' => __( 'Display', 'wp-interactions' ),
					'type' => 'select',
					'options' => [
						[ 'label' => __( 'Block', 'wp-interactions' ), 'value' => 'block' ],
						[ 'label' => __( 'None', 'wp-interactions' ), 'value' => 'none' ],
						[ 'label' => __( 'Inline', 'wp-interactions' ), 'value' => 'inline' ],
						[ 'label' => __( 'Inline-block', 'wp-interactions' ), 'value' => 'inline-block' ],
						[ 'label' => __( 'Flex', 'wp-interactions' ), 'value' => 'flex' ],
						[ 'label' => __( 'Inline-flex', 'wp-interactions' ), 'value' => 'inline-flex' ],
						[ 'label' => __( 'Grid', 'wp-interactions' ), 'value' => 'grid' ],
						[ 'label' => __( 'Inline-grid', 'wp-interactions' ), 'value' => 'inline-grid' ],
						[ 'label' => __( 'Initial', 'wp-interactions' ), 'value' => 'initial' ],
						[ 'label' => __( 'Inherit', 'wp-interactions' ), 'value' => 'inherit' ],
						[ 'label' => __( 'Revert', 'wp-interactions' ), 'value' => 'revert' ],
						[ 'label' => __( 'Unset', 'wp-interactions' ), 'value' => 'unset' ],
					],
					'default' => 'block',
				],
			];

			// $this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'display', 'WPI_Action_Type_Display' );
}
