<?php
/**
 * Action Type: Toggle Video
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Toggle_Video' ) ) {
	class WPI_Action_Type_Toggle_Video extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'toggleVideo';
			$this->category = 'misc';
			$this->type = 'all';

			$this->label = __( 'Play/Pause Video', 'wp-interactions' );
			$this->description = __( 'Play or pause a video.', 'wp-interactions' );

			$this->keywords = [
				'video',
			];

			$this->properties = [
				'mode' => [
					'name' => __( 'Mode', 'wp-interactions' ),
					'type' => 'select',
					'options' => [
						[ 'label' => __( 'Play', 'wp-interactions' ), 'value' => 'play' ],
						[ 'label' => __( 'Pause', 'wp-interactions' ), 'value' => 'pause' ],
						[ 'label' => __( 'Toggle', 'wp-interactions' ), 'value' => 'toggle' ],
					],
					'default' => 'play',
					'help' => __( 'Play, pause or toggle a video.', 'wp-interactions' ),
				],
				'startTime' => [
					'name' => __( 'Start Time ', 'wp-interactions' ),
					'type' => 'number',
					'default' => '',
					'min' => 0,
					'max' => 30,
					'step' => 0.1,
					'help' => __( 'The time where to start playing. Used only when the video is going to play. Leave blank to play at current time.', 'wp-interactions' ),
					'condition' => [
						'property' => 'mode',
						'value' => 'play',
					],
				],
				
			];

			$this->has_dynamic = false;
			$this->has_duration = false;
			$this->has_easing = false;
		}
	}

	wpi_add_action_type( 'toggleVideo', 'WPI_Action_Type_Toggle_Video' );
}
