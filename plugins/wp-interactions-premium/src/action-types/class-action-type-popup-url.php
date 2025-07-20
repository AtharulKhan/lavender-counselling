<?php
/**
 * Action Type: Popup URL
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Popup_Url' ) ) {
	class WPI_Action_Type_Popup_Url extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'popupUrl';
			$this->category = 'navigation';
			$this->type = 'all';

			$this->label = __( 'Open URL in popup', 'wp-interactions' );
			$this->short_label = __( 'URL popup', 'wp-interactions' );
			$this->description = __( 'Open a URL in a popup', 'wp-interactions' );

			$this->keywords = [
				'lightbox',
			];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'popupUrl', 'WPI_Action_Type_Popup_Url' );
}
