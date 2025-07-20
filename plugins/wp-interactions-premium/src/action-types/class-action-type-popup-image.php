<?php
/**
 * Action Type: Popup Image
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Popup_Image' ) ) {
	class WPI_Action_Type_Popup_Image extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'popupImage';
			$this->category = 'navigation';
			$this->type = 'all';

			$this->label = __( 'Open Image in Popup', 'wp-interactions' );
			$this->short_label = __( 'Image Popup', 'wp-interactions' );
			$this->description = __( 'Open an image in a popup', 'wp-interactions' );

			$this->keywords = [
				'lightbox',
			];

			$this->properties = [];
		}
	}

	wpi_add_action_type( 'popupImage', 'WPI_Action_Type_Popup_Image' );
}
