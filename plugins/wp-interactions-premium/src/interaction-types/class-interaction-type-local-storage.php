<?php
/**
 * Interaction Type: LocalStorage
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interaction_Type_Local_Storage' ) ) {
	class WPI_Interaction_Type_Local_Storage extends WPI_Abstract_Interaction_Type {
		public function initialize() {
			$this->name = 'localStorage';
			$this->type = 'page';
			$this->category = 'pageState';

			$this->label = __( 'LocalStorage change', 'wp-interactions' );
			$this->description = __( 'Define actions that happen when a LocalStorage value changes. This even works with external changes to localStorage.', 'wp-interactions' );
			$this->timelines = [
				[
					'title' => __( 'Added/Modified Actions', 'wp-interactions' ),
					'slug' => 'added',
					'description' => '',
				],
				[
					'title' => __( 'LocalStorage Removed/Cleared Item Actions', 'wp-interactions' ),
					'slug' => 'removed',
					'description' => '',
				],
			];
			$this->timeline_type = 'time'; // time, percentage.

			$this->options = [
				[
					'label' => __( 'Item Key', 'wp-interactions' ),
					'name' => 'key',
					'type' => 'text',
					'help' => __( 'The LocalStorage item key or name to watch for changes.', 'wp-interactions' ),
					'required' => true,
				],
				[
					'label' => __( 'Item Value', 'wp-interactions' ),
					'name' => 'value',
					'type' => 'text',
					'help' => __( 'If the value matches this, trigger this interaction. If empty, then all value changes will trigger this interaction.', 'wp-interactions' ),
				],
				[
					'label' => __( 'Trigger at page load', 'wp-interactions' ),
					'name' => 'onload',
					'type' => 'toggle',
					'description' => '',
					'help' => __( 'Also check if the value is a match at page load.', 'wp-interactions' ),
				],
			];
		}
	}

	wpi_add_interaction_type( 'localStorage', 'WPI_Interaction_Type_Local_Storage' );
}
