<?php
/**
 * Action helper functions.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wpi_action_types = [];

if ( ! function_exists( 'wpi_add_action_type' ) ) {
	function wpi_add_action_type( $name, $class ) {
		global $wpi_action_types;
		$wpi_action_types[ $name ] = new $class();
	}
}

if ( ! function_exists( 'wpi_get_action_type' ) ) {
	function wpi_get_action_type( $name ) {
		global $wpi_action_types;
		return isset( $wpi_action_types[ $name ] ) ? $wpi_action_types[ $name ] : false;
	}
}

if ( ! function_exists( 'wpi_get_action_types' ) ) {
	function wpi_get_action_types() {
		global $wpi_action_types;
		return $wpi_action_types;
	}
}
