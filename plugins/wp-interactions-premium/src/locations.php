<?php
/**
 * Location helper functions.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wpi_location_rules = [];

if ( ! function_exists( 'wpi_add_location_rule_type' ) ) {
	function wpi_add_location_rule_type( $name, $class ) {
		global $wpi_location_rules;
		// $wpi_location_rules[ $name ] = new $class();
		$wpi_location_rules[ $name ] = $class;
	}
}

if ( ! function_exists( 'wpi_get_location' ) ) {
	function wpi_get_location( $name ) {
		global $wpi_location_rules;
		if ( isset( $wpi_location_rules[ $name ] ) ) {
			// The location rules might not be initialized yet.
			if ( is_string( $wpi_location_rules[ $name ] ) ) {
				$class = $wpi_location_rules[ $name ];
				$wpi_location_rules[ $name ] = new $class();
			}
			return $wpi_location_rules[ $name ];
		}
		return false;
	}
}

if ( ! function_exists( 'wpi_get_locations' ) ) {
	function wpi_get_locations() {
		global $wpi_location_rules;
		// The location rules might not be initialized yet.
		foreach ( $wpi_location_rules as $name => $class ) {
			if ( is_string( $class ) ) {
				$wpi_location_rules[ $name ] = new $class();
			}
		}
		return $wpi_location_rules;
	}
}
