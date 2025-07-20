<?php
/**
 * Interaction Type: Document HTML Event
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Document_Html_Event' ) ) {
	class WPI_Interaction_Type_Document_Html_Event extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'documentHtmlEvent';
			$this->type = 'page';
			$this->category = 'pageState';

			$this->label = __( 'Document HTML event', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when an HTML event is dispatched', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Event Actions', 'wp-interactions' ),
					'slug' => 'event',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.

			$this->options = [
				[
					'label' => __( 'HTML Event Name', 'wp-interactions' ),
					'name' => 'event',
					'type' => 'text',
					'help' => __( 'The HTML event name that when dispatched by the document, triggers this interaction.', 'wp-interactions' ),
					'required' => true,
				],
			];
		}
	}

	wpi_add_interaction_type( 'documentHtmlEvent', 'WPI_Interaction_Type_Document_Html_Event' );
}
