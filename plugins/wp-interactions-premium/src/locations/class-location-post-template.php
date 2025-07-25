<?php
/**
 * Post Location Object
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Location_Post_Template' ) ) {
	class WPI_Location_Post_Template extends WPI_Location {

		public function initialize() {
			$this->name = 'post_template';
			$this->label = __( 'Post template', 'wp-interactions' );
			$this->category = 'post';
		}

		/**
		 * Gets the values that will be displayed in the location picker.
		 *
		 * @return array
		 */
		public function get_values() {
			$options = [];

			// Get all post templates
			$post_templates = wp_get_theme()->get_post_templates();
			foreach ( $post_templates as $post_type => $templates ) {
				if ( $post_type === 'page' ) {
					continue;
				}

				if ( count( $templates ) ) {
					$template_options = [];
					foreach ( $templates as $value => $label ) {
						$template_options[] = [
							'value' => $value,
							'label' => $label,
						];
					}

					$options[] = [
						'label' => ucfirst( $post_type ),
						'options' => $template_options,
					];
				}
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
			return $this->compare_to_rule( $screen->post_template, $operator, $value );
		}
	}

	wpi_add_location_rule_type( 'post_template', 'WPI_Location_Post_Template' );
}
