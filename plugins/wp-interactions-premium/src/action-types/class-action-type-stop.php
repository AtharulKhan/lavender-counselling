<?php
/**
 * Action Type: Conditional Stop
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Conditional_Stop' ) ) {
	class WPI_Action_Type_Conditional_Stop extends WPI_Abstract_Action_Type {
		public function initialize() {
			$this->name = 'stop';
			$this->category = 'flow';
			$this->type = 'all';

			$this->label = __( 'Conditional Stop', 'wp-interactions' );
			$this->description = __( 'Stop playing the rest of the actions if a condition is met', 'wp-interactions' );

			$this->keywords = [
				'if',
				'then',
				'halt',
			];

			$this->properties = [
				'value' => [
					'name' => __( 'Value', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'The value to compare.', 'wp-interactions' ),
				],
				'condition' => [
					'name' => __( 'Stop if the value above...', 'wp-interactions' ),
					'type' => 'select',
					'options' => [
						[ 'label' => __( 'Equals', 'wp-interactions' ), 'value' => 'equals' ],
						[ 'label' => __( 'Does Not Equal', 'wp-interactions' ), 'value' => 'not-equals' ],
						[ 'label' => __( 'Contains', 'wp-interactions' ), 'value' => 'contains' ],
						[ 'label' => __( 'Does Not Contain', 'wp-interactions' ), 'value' => 'not-contains' ],
						[ 'label' => __( 'Is Greater Than', 'wp-interactions' ), 'value' => 'greater-than' ],
						[ 'label' => __( 'Is Greater Than or Equal To', 'wp-interactions' ), 'value' => 'greater-than-or-equal-to' ],
						[ 'label' => __( 'Is Less Than', 'wp-interactions' ), 'value' => 'less-than' ],
						[ 'label' => __( 'Is Less Than or Equal To', 'wp-interactions' ), 'value' => 'less-than-or-equal-to' ],
						[ 'label' => __( 'Is Empty', 'wp-interactions' ), 'value' => 'is-empty' ],
						[ 'label' => __( 'Is Not Empty', 'wp-interactions' ), 'value' => 'is-not-empty' ],
						[ 'label' => __( 'Matches Regex', 'wp-interactions' ), 'value' => 'matches-regex' ],
						[ 'label' => __( 'Does Not Match Regex', 'wp-interactions' ), 'value' => 'does-not-match-regex' ],
						[ 'label' => __( 'Is Truthy', 'wp-interactions' ), 'value' => 'is-truthy' ],
						[ 'label' => __( 'Is Falsey', 'wp-interactions' ), 'value' => 'is-falsey' ],
						[ 'label' => __( 'Is In', 'wp-interactions' ), 'value' => 'is-in' ],
						[ 'label' => __( 'Is Not In', 'wp-interactions' ), 'value' => 'is-not-in' ],
					],
					'default' => 'equals',
					'help' => __( 'If this condition is satisfied, then the timeline will immediately stop.', 'wp-interactions' ),
				],
				'comparison_value' => [
					'name' => __( 'Comparison Value', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'The value to compare against.', 'wp-interactions' ),
					// Show this only if the "condition" property is not "is-empty" or "is-not-empty" or others
					'condition' => [
						'property' => 'condition',
						'value' => [
							'equals',
							'not-equals',
							'contains',
							'not-contains',
							'greater-than',
							'greater-than-or-equal-to',
							'less-than',
							'less-than-or-equal-to',
							'matches-regex',
							'does-not-match-regex',
						],
					],
				],
				'comparison_multi_value' => [
					'name' => __( 'Comparison Value', 'wp-interactions' ),
					'type' => 'textarea',
					'default' => '',
					'help' => __( 'The values to compare against. Enter one value per line', 'wp-interactions' ),
					// Show this only if the "condition" property is "is-in" or "is-not-in"
					'condition' => [
						'property' => 'condition',
						'value' => [
							'is-in',
							'is-not-in',
						],
					],
				],
			];

			$this->has_starting_state = false;
			$this->has_preview = false;
			$this->has_duration = false;
			$this->has_easing = false;
			$this->has_target = false;
		}
	}

	wpi_add_action_type( 'stop', 'WPI_Action_Type_Conditional_Stop' );
}
