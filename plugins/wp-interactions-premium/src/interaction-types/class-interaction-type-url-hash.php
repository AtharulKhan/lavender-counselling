<?php
/**
 * Interaction Type: URL Hash
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Url_Hash' ) ) {
	class WPI_Interaction_Type_Url_Hash extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'urlHash';
			$this->type = 'page';
			$this->category = 'url';

			$this->label = __( 'URL hash change', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when the URL hash changes', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Hash Added Actions', 'wp-interactions' ),
					'slug' => 'hash1',
					'description' => '',
				],
				[
					'title' => __( 'Hash Removed Actions', 'wp-interactions' ),
					'slug' => 'hash2',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.

			$this->options = [
				[
					'label' => __( 'URL Hash', 'wp-interactions' ),
					'name' => 'hash',
					'type' => 'text',
					'help' => __( 'The URL Hash that will trigger the interaction.', 'wp-interactions' ),
					'required' => true,
				],
			];
		}
	}

	wpi_add_interaction_type( 'urlHash', 'WPI_Interaction_Type_Url_Hash' );
}
