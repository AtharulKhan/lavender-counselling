<?php
/**
 * Interactions helper functions.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wpi_interaction_types = [];

if ( ! function_exists( 'wpi_add_interaction_type' ) ) {
	function wpi_add_interaction_type( $name, $class ) {
		global $wpi_interaction_types;
		$wpi_interaction_types[ $name ] = new $class();
	}
}

if ( ! function_exists( 'wpi_get_interaction_type' ) ) {
	function wpi_get_interaction_type( $name ) {
		global $wpi_interaction_types;
		return $wpi_interaction_types[ $name ] ?? false;
	}
}

if ( ! function_exists( 'wpi_get_interaction_types' ) ) {
	function wpi_get_interaction_types() {
		global $wpi_interaction_types;
		return $wpi_interaction_types;
	}
}
