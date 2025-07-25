<?php
/**
 * Post Location Object
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Location_Post_Status' ) ) {
	class WPI_Location_Post_Status extends WPI_Location {

		public function initialize() {
			$this->name = 'post_status';
			$this->label = __( 'Post status', 'wp-interactions' );
			$this->category = 'post';
		}

		/**
		 * Gets the values that will be displayed in the location picker.
		 *
		 * @return array
		 */
		public function get_values() {
			$options = [];

			$post_statuses = get_post_statuses();
			foreach ( $post_statuses as $post_status => $label ) {
				$options[] = [
					'value' => $post_status,
					'label' => $label,
				];
			}
			return $options;
		}

		/**
		 * Matches wether the saved location rule applies to the current
		 * frontend page.
		 *
		 * @param WPI_Frontend_Screen $screen Object containing the properties of the current
		 * page. See wpi_get_frontend_screen() for more info.
		 * @param string $operator == or !==
		 * @param mixed $value The value to check against
		 * @return boolean True if the rule matches, false otherwise.
		 */
		public function is_match( $screen, $operator, $value ) {
			return $this->compare_to_rule( $screen->post_status, $operator, $value );
		}
	}

	wpi_add_location_rule_type( 'post_status', 'WPI_Location_Post_Status' );
}
