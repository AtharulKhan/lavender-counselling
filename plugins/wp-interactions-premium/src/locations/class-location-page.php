<?php
/**
 * Post Location Object
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Location_Page' ) ) {
	class WPI_Location_Page extends WPI_Location {

		public function initialize() {
			$this->name = 'page';
			$this->label = __( 'Page', 'wp-interactions' );
			$this->category = 'page';
		}

		/**
		 * Gets the values that will be displayed in the location picker.
		 *
		 * @return array
		 */
		public function get_values() {
			$options = [];

			// Get all pages
			$posts = get_posts( [
				'post_type' => 'page',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
			] );
			// Add at the start an "all" option
			array_unshift( $posts, ( object ) [
				'ID' => 'page',
				'post_title' => sprintf( __( 'All %s', 'wp-interactions' ), __( 'Pages', 'wp-interactions' ) ),
			] );

			$options[] = [
				'label' => __( 'Page', 'wp-interactions' ),
				'post_type' => 'page',
				'options' => array_map( function( $post ) {
					$post_title = ! empty( $post->post_title ) ? $post->post_title : __( '(no title)', 'wp-interactions' );
					if ( is_numeric( $post->ID ) ) {
						$post_title = $post_title . ' (#' . $post->ID . ')';
					}
					return [
						'value' => $post->ID,
						'label' => $post_title,
					];
				}, $posts ),
			];

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
			return $this->compare_to_rule( $screen->post_id, $operator, $value );
		}

		/**
		 * Get the display label for the location rule.
		 *
		 * @param string $operator
		 * @param string $value
		 * @return string
		 */
		public function get_display_label( $operator, $value ) {
			if ( empty( $value ) ) {
				$value = 'page';
			}

			if ( ! empty( $value ) && ! is_numeric( $value ) ) {
				$post_type_obj = get_post_type_object( $value );
				$value = $post_type_obj->labels->name;
				if ( $operator === '==' ) {
					return sprintf( __( 'All %s', 'wp-interactions' ), $value );
				} else if ( $operator === '!=' ) {
					return sprintf( __( 'Not all %s', 'wp-interactions' ), $value );
				}
			}

			if ( ! empty( $value ) && is_numeric( $value ) ) {
				$edit_url = get_edit_post_link( $value );
				$value = "<a href='{$edit_url}' target='_edit'>#{$value}</a>";
			}

			return parent::get_display_label( $operator, $value );
		}
	}

	wpi_add_location_rule_type( 'page', 'WPI_Location_Page' );
}
