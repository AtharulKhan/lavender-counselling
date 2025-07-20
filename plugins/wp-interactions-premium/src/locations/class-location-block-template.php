<?php
/**
 * Block Template Location Object
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Location_Block_Template' ) ) {
	class WPI_Location_Block_Template extends WPI_Location {

		public function initialize() {
			$this->name = 'wp_template';
			$this->label = __( 'Block template', 'wp-interactions' );
			$this->category = 'theme';
		}

		/**
		 * Gets the values that will be displayed in the location picker.
		 *
		 * @return array
		 */
		public function get_values() {
			$options = [];

			// Get all block templates
			$block_templates = get_block_templates();

			foreach ( $block_templates as $template ) {
				$options[] = [
					'label' => $template->title,
					'value' => $template->id,
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
			return $this->compare_to_rule( $screen->wp_template, $operator, $value );
		}
	}

	wpi_add_location_rule_type( 'wp_template', 'WPI_Location_Block_Template' );
}
