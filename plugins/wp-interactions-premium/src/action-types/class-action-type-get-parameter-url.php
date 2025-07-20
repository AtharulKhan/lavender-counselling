<?php
/**
 * Action Type: Get parameter url
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Get_Parameter_Url' ) ) {
	class WPI_Action_Type_Get_Parameter_URL extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'getParameterUrl';
			$this->category = 'data';
			$this->type = 'all';

			$this->label = __( 'Get Parameter URL', 'wp-interactions' );
			$this->short_label = __( 'Get Parameter', 'wp-interactions' );
			$this->description = __( 'Get a parameter from the URL of the current post ', 'wp-interactions' );

			$this->keywords = [
				'parameter',
                'url',
			];

			$this->properties = [
				'parameter' => [
					'name' => __( 'Parameter name', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'The name of the parameter.', 'wp-interactions' ),
				],
				'id' => [
					'name' => __( 'Reference ID', 'wp-interactions' ),
					'type' => 'id',
					'default' => '',
					'hasDynamic' => false,
				],
			];

			$this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
            $this->has_target = false;

			// This action will provide data with the name from the `id` property.
			$this->provides = [ 'id' ];
		}
	}

	wpi_add_action_type( 'getParameterUrl', 'WPI_Action_Type_Get_Parameter_Url' );
}
