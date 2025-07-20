<?php
/**
 * Post Location Object
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Location_Post_Archive' ) ) {
	class WPI_Location_Post_Archive extends WPI_Location {

		public function initialize() {
			$this->name = 'post_archive';
			$this->label = __( 'Post archive', 'wp-interactions' );
			$this->category = 'post';
		}

		/**
		 * Gets the values that will be displayed in the location picker.
		 *
		 * @return array
		 */
		public function get_values() {
			$options = [];

			// Get all post types
			$post_types = get_post_types( [ 'public' => true ], 'objects' );

			foreach ( $post_types as $post_type ) {
				$options[] = [
					'value' => $post_type->name,
					'label' => $post_type->label,
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
			return $this->compare_to_rule( $screen->post_archive, $operator, $value )
				|| $this->compare_to_rule( $screen->is_archive, $operator, $value )
				|| $this->compare_to_rule( $screen->is_home, $operator, $value );
		}
	}

	wpi_add_location_rule_type( 'post_archive', 'WPI_Location_Post_Archive' );
}
