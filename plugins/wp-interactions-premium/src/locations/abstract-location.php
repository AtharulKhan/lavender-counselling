<?php
/**
 * Location class abstract
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Location' ) ) {
	class WPI_Location {

		/**
		 * Location rule name
		 *
		 * @var string
		 */
		public $name = '';

		/**
		 * Location rule label
		 *
		 * @var string
		 */
		public $label = '';

		/**
		 * Location rule category
		 *
		 * @var string
		 */
		public $category = '';

		/**
		 * Location rule options for the editor.
		 *
		 * @var string
		 */
		public $editor_options = [];

		/**
		 * Default editor options.
		 *
		 * @var array
		 */
		const DEFAULT_EDITOR_OPTIONS = [
			'hasValueControl' => true,
		];

		/**
		 * Constructor
		 */
		public function __construct() {
			$this->initialize();
			$this->editor_options = array_merge( self::DEFAULT_EDITOR_OPTIONS, $this->editor_options );
		}

		/**
		 * Initialize properties
		 *
		 * @return void
		 */
		public function initialize() {
			// Override and initialize properties here.
		}

		/**
		 * Gets the values that will be displayed in the location picker.
		 *
		 * @return array
		 */
		public function get_values() {
			return array();
		}

		/**
		 * Matches wether the saved location rule applies to the current
		 * frontend page.
		 *
		 * @param WPI_Frontend_Screen $screen Object containing the properties of the current
		 * page. See wpi_get_frontend_screen() for more info.
		 * @param string $operator == or !==
		 * @param mixed $value The value to check against
		 * @return boolean True if the rule matches, false otherwise.
		 */
		public function is_match( $screen, $operator, $value ) {
			return false;
		}

		public function compare_to_rule( $value, $operator, $rule_value ) {
			$result = $value == $rule_value;

			// Allow "all" to match any value.
			if ( $rule_value === 'all' || $rule_value === '' ) {
				$result = true;
			}

			// Reverse result for "!=" operator.
			if ( $operator === '!=' ) {
				return ! $result;
			}
			return $result;
		}

		/**
		 * Get the display label for the location rule.
		 *
		 * @param string $operator
		 * @param string $value
		 * @return string
		 */
		public function get_display_label( $operator, $value ) {
			if ( $operator === '==' ) {
				// Translators: %s is the location label and %s is the value.
				return sprintf( __( '%s is %s', 'wp-interactions' ), $this->label, $value );
			} else if ( $operator === '!=' ) {
				// Translators: %s is the location label and %s is the value.
				return sprintf( __( '%s is not %s', 'wp-interactions' ), $this->label, $value );
			}
			return $this->label . ' ' . $operator . ' ' . $value;
		}
	}
}
