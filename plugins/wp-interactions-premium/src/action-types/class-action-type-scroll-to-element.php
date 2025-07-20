<?php
/**
 * Action Type: Scroll to element
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Scroll_To_Element' ) ) {
	class WPI_Action_Type_Scroll_To_Element extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'scrollToElement';
			$this->category = 'navigation';
			$this->type = 'all';

			$this->label = __( 'Scroll to element', 'wp-interactions' );
			$this->short_label = __( 'Scroll', 'wp-interactions' );
			$this->description = __( 'Scroll to an element', 'wp-interactions' );
			$this->label_applied_to = __( 'Scroll to element', 'wp-interactions' );

			$this->keywords = [
				'scrolltop',
			];

			$this->properties = [
				'note' => [
					'name' => __( 'Pick the block or element below in the "Applied to" below to scroll to.', 'wp-interactions' ),
					'type' => 'note',
				],
				'scrollPosition' => [
					'name' => __( 'Scroll Position', 'wp-interactions' ),
					'type' => 'select',
					'options' => [
						[ 'label' => __( 'Top', 'wp-interactions' ), 'value' => 'top' ],
						[ 'label' => __( 'Center', 'wp-interactions' ), 'value' => 'center' ],
						[ 'label' => __( 'Bottom', 'wp-interactions' ), 'value' => 'bottom' ],
					],
					'help' => __( 'The vertical alignment of the target after scrolling', 'wp-interactions' ),
					'default' => 'start',
				],
				'offset' => [
					'name' => __( 'Scroll Offset', 'wp-interactions' ),
					'type' => 'number',
					'min' => -300,
					'max' => 300,
					'default' => 0,
					'help' => __( 'Additional vertical scroll offset', 'wp-interactions' ),
				],
			];

			$this->has_preview = false;
			$this->has_dynamic = false;
		}
	}

	wpi_add_action_type( 'scrollToElement', 'WPI_Action_Type_Scroll_To_Element' );
}
