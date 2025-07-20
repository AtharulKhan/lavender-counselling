<?php
/**
 * Action Type: Scrub Video
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Scrub_Video' ) ) {
	class WPI_Action_Type_Scrub_Video extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'scrubVideo';
			$this->category = 'misc';
			$this->type = 'all';
			$this->is_animation = true;

			$this->label = __( 'Scrub Video', 'wp-interactions' );
			$this->description = __( 'Go to a current time in a video', 'wp-interactions' );

			$this->keywords = [
				'video',
			];

			$this->properties = [
				'targetTime' => [
					'name' => __( 'Target Time ', 'wp-interactions' ),
					'type' => 'number',
					'default' => 0,
					'min' => 0,
					'max' => 30,
					'step' => 0.1,
					'help' => __( 'The target time in seconds to seek', 'wp-interactions' ),
				],
			];

			$this->default_easing = 'linear';
			$this->has_dynamic = false;
		}
	}

	wpi_add_action_type( 'scrubVideo', 'WPI_Action_Type_Scrub_Video' );
}
