<?php
/**
 * Action Type: Page State
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Dispatch_Event' ) ) {
	class WPI_Action_Type_Dispatch_Event extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'dispatchEvent';
			$this->category = 'event';
			$this->type = 'all';

			$this->label = __( 'Dispatch Event', 'wp-interactions' );
			$this->description = __( 'Dispatches an HTML Event either from an element or from the window.', 'wp-interactions' );

			$this->keywords = [
				'dispatchevent',
				'trigger',
			];

			$this->properties = [
				'event' => [
					'name' => 'Event Name',
					'type' => 'text',
					'default' => '',
				],
				'value' => [
					'name' => 'Event Details',
					'type' => 'text',
					'default' => '',
					'help' => __( 'The value here will be passed to the event\'s detail property.', 'wp-interactions' ),
				],
			];

			$this->targets = [
				[ 'value' => 'trigger' ],
				[ 'value' => 'block' ],
				[ 'value' => 'window' ],
				[ 'value' => 'document' ],
			];

			$this->has_starting_state = false;
			$this->has_duration = false;
			$this->has_easing = false;
			$this->has_preview = false;
		}
	}

	wpi_add_action_type( 'dispatchEvent', 'WPI_Action_Type_Dispatch_Event' );
}
