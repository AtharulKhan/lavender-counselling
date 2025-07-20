<?php
/**
 * Action Type: Update Post Meta
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Update_Post_Meta' ) ) {
	class WPI_Action_Type_Update_Post_Meta extends WPI_Abstract_Action_Type {
		public function __construct() {
			parent::__construct();

			// Register our REST API endpoint for running getting post data.
			add_action( 'rest_api_init', array( $this, 'register_rest_route' ) );
		}

		public function initialize() {
			$this->name = 'updatePostMeta';
			$this->category = 'post';
			$this->type = 'all';
			$this->uses_frontend_rest_api = true;

			$this->label = __( 'Update Post Meta', 'wp-interactions' );
			$this->short_label = __( 'Update Meta', 'wp-interactions' );
			$this->description = __( 'Updates post meta in the database', 'wp-interactions' );

			$this->keywords = [
				'data',
				'page',
				'custom field',
			];

			$this->properties = [
				'post' => [
					'name' => __( 'Post', 'wp-interactions' ),
					'type' => 'select',
					'options' => [
						[ 'label' => __( 'Current Post', 'wp-interactions' ), 'value' => 'current-post' ],
						[ 'label' => __( 'Another Post', 'wp-interactions' ), 'value' => 'other-post' ],
					],
					'default' => 'current-post',
					'help' => __( 'The post where the post meta belongs to.', 'wp-interactions' ),
				],
				'post_id' => [
					'name' => __( 'Post id', 'wp-interactions' ),
					'type' => 'posts',
					'default' => '',
					'help' => __( 'Provide a specific post id.', 'wp-interactions' ),
					// This property is only visible when the "post" property is set to "other-post".
					'condition' => [
						'property' => 'post',
						'value' => 'other-post',
					],
				],
				'meta_key' => [
					'name' => __( 'Meta key', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'The key of the post meta to get.', 'wp-interactions' ),
				],
				'update_type' => [
					'name' => __( 'Update type', 'wp-interactions' ),
					'type' => 'select',
					'options' => [
						[ 'label' => __( 'Increment value', 'wp-interactions' ), 'value' => 'increment' ],
						[ 'label' => __( 'Decrement value', 'wp-interactions' ), 'value' => 'decrement' ],
						[ 'label' => __( 'Set to zero', 'wp-interactions' ), 'value' => 'zero' ],
						[ 'label' => __( 'Set to true', 'wp-interactions' ), 'value' => 'true' ],
						[ 'label' => __( 'Set to false', 'wp-interactions' ), 'value' => 'false' ],
						[ 'label' => __( 'Toggle boolean', 'wp-interactions' ), 'value' => 'toggle-boolean' ],
						[ 'label' => __( 'Set to null', 'wp-interactions' ), 'value' => 'null' ],
						[ 'label' => __( 'Specify value', 'wp-interactions' ), 'value' => 'value' ],
					],
					'default' => 'increment',
					'help' => __( 'How to update the meta value.', 'wp-interactions' ),
				],
				'value' => [
					'name' => __( 'Value', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'How to update the meta value.', 'wp-interactions' ),
					// This property is only visible when "update_type" property is set to "value"
					'condition' => [
						'property' => 'update_type',
						'value' => 'value',
					],
				],
				'permissions' => [
					'name' => __( 'Permissions', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'Only visitors with these user capabilities can perform this update. Leave blank if you want ANYONE to be able to use this update.', 'wp-interactions' ),
					'hidden' => true,
					'hasDynamic' => false,
				],
				'id' => [
					'name' => __( 'Reference ID', 'wp-interactions' ),
					'type' => 'id',
					'default' => '',
					'hasDynamic' => false,
					'help' => __( 'The updated value will be returned.', 'wp-interactions' ),
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

		public function initilize_action( $action, $animation_data ) {
			// This means we're getting data from the current post, so we need
			// to provide the post id.
			if ( $action['value']['post'] === '' || $action['value']['post'] === 'current-post' ) {
				if ( ! has_filter( 'wpi/localize_script/frontend', array( $this, 'add_current_post_id' ) ) ) {
					add_filter( 'wpi/localize_script/frontend', array( $this, 'add_current_post_id' ) );
				}
			}

			return parent::initilize_action( $action, $animation_data );
		}

		/**
		 * Adds the current post id to the data.
		 *
		 * @param Array $data The data to be localized.
		 * @return Array The modified data.
		 */
		public function add_current_post_id( $data ) {
			$data['currentPostId'] = get_the_ID();
			return $data;
		}

		public function register_rest_route() {
			register_rest_route( 'wpi/v1', '/update-post-meta', [
				'methods' => 'POST',
				'callback' => [ $this, 'update_post_data' ],
				// We will manually check the permissions.
				'permission_callback' => '__return_true',
				'args' => array(
					'interaction_key' => array(
						'required' => true,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'action_key' => array(
						'required' => true,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'post_id' => array(
						'required' => true,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'meta_key' => array(
						'required' => true,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'update_type' => array(
						'required' => true,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'value' => array(
						'required' => false,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
				),
			] );
		}

		public function update_post_data( $request ) {
			$post_id = $request->get_param( 'post_id' );
			$meta_key = $request->get_param( 'meta_key' );
			$update_type = $request->get_param( 'update_type' ) ?: 'increment';
			$value = $request->get_param( 'value' );

			$interaction_key = $request->get_param( 'interaction_key' );
			$action_key = $request->get_param( 'action_key' );

			// Note: We're sure that the action will have a verified secure signature.
			$action = WPI_Action::find_action( $action_key, $interaction_key );

			$new_value = '';

			if ( ! empty( $action ) ) {
				$permissions = $action->get_value( 'permissions' );
				if ( ! empty( $permissions ) ) {
					if ( ! current_user_can( $permissions ) ) {
						return new WP_Error( '403', esc_html__( 'You do not have permission to perform this action', 'wp-interactions' ), array( 'status' => 403 ) );
					}
				}
				// Update the post meta.
				$current_value = get_post_meta( $post_id, $meta_key, true );
				if ( $update_type === 'increment' ) {
					if ( empty( $current_value ) ) {
						$current_value = 0;
					}
					$new_value = $current_value + 1;
				} elseif ( $update_type === 'decrement' ) {
					if ( empty( $current_value ) ) {
						$current_value = 0;
					}
					$new_value = $current_value - 1;
				} elseif ( $update_type === 'zero' ) {
					$new_value = 0;
				} elseif ( $update_type === 'true' ) {
					$new_value = true;
				} elseif ( $update_type === 'false' ) {
					$new_value = false;
				} elseif ( $update_type === 'toggle-boolean' ) {
					$new_value = ! $current_value;
				} elseif ( $update_type === 'null' ) {
					$new_value = null;
				} elseif ( $update_type === 'value' ) {
					$new_value = $value;
				}
				if ( $current_value !== $new_value ) {
					update_post_meta( $post_id, $meta_key, $new_value );
				} else {
					$new_value = $current_value;
				}
			}

			// Return the output, but do not return JSON because we will get slashes.
			header( 'Content-Type: text/html' );
			echo esc_html( $new_value );
			exit();
		}
	}

	wpi_add_action_type( 'updatePostMeta', 'WPI_Action_Type_Update_Post_Meta' );
}
