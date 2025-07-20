<?php
/**
 * Interactions Collection
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Interactions' ) ) {
	class WPI_Interactions {

		/**
		 * Loads all the interactions for the given args.
		 *
		 * @param bool $is_for_frontend Whether or not to load all interactions
		 * or only the ones that should be rendered in the frontend.
		 */
		public static function load( $is_for_frontend = false ) {
			global $wpdb;

			if ( $is_for_frontend ) {
				// Load all published interactions.
				$all_interactions = $wpdb->get_results( "
					SELECT *
					FROM {$wpdb->posts}
					WHERE post_type = 'wpi-interaction'
						AND post_status = 'publish'
				" );

			} else { // For the backend, load all the interactions.
				// Load all the interactions,
				$all_interactions = $wpdb->get_results( "
					SELECT *
					FROM {$wpdb->posts}
					WHERE post_type = 'wpi-interaction'
						AND (post_status = 'publish' OR post_status = 'wpi-inactive')
					ORDER BY post_date ASC
				" );
			}

			$interactions = [];
			foreach ( $all_interactions as $post ) {
				$interaction = new WPI_Interaction( $post );

				// TODO: Validate whether the interaction is valid or not
				// according to the schema, this is important so that our script
				// and editor won't error because of corrupted data / user
				// modified data.

				if ( ! $is_for_frontend ) {
					$interactions[] = $interaction;
				} else if ( $interaction->should_render_in_frontend() ) {
					$interactions[] = $interaction;
				}
			}

			return $interactions;
		}
	}
}
