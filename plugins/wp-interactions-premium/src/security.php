<?php
/**
 * Security Functions
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'wpi_salt' ) ) {
	/**
	 * Get a salt for hashing.
	 *
	 * @return string
	 */
	function wpi_salt() {
		$salt = get_option( 'wpi_salt' );
		if ( ! $salt ) {
			$salt = wp_salt();
			update_option( 'wpi_salt', $salt, 'no' );
		}
		return $salt;
	}
}
