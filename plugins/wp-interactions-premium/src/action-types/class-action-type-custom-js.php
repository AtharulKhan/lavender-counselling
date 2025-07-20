<?php
/**
 * Action Type: Get data from custom script
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_TypeCustom_Js' ) ) {
	class WPI_Action_TypeCustom_Js extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'customJs';
			$this->category = 'data';
			$this->type = 'all';

			$this->label = sprintf( __( 'Run %s', 'wp-interactions' ), __( 'Custom JavaScript', 'wp-interactions' ) );
			$this->short_label = __( 'Custom JavaScript', 'wp-interactions' );
			$this->description = __( 'Runs a custom JavaScript expression', 'wp-interactions' );

			$this->keywords = [
				'function',
				'js',
			];

			$this->properties = [
				'code' => [
					'name' => __( 'Custom JavaScript', 'wp-interactions' ),
					'type' => 'code',
					'default' => '',
					'help' => sprintf( __( 'A JavaScript expression that will be executed. You can use %sdata%s to access referenced data from other steps, e.g. %sdata.my_var%s.', 'wp-interactions' ), '<code>', '</code>', '<code>', '</code>' ),
				],
				'id' => [
					'name' => __( 'Reference ID', 'wp-interactions' ),
					'type' => 'id',
					'default' => '',
					'hasDynamic' => false,
				],
			];

			$this->has_starting_state = false;
			$this->has_duration = false;
			$this->has_easing = false;
			// $this->has_preview = false;
			$this->is_required_target = false;

			// Add a signature to the action to verify the integrity of the data.
			$this->verify_integrity = true;

			// This action will provide data with the name from the `id` property.
			$this->provides = [ 'id' ];
		}
	}

	wpi_add_action_type( 'customJs', 'WPI_Action_TypeCustom_Js' );
}
