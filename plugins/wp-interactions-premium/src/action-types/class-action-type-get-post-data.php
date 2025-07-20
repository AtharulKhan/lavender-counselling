<?php
/**
 * Action Type: Get Post Data
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Action_Type_Get_Post_Data' ) ) {
	class WPI_Action_Type_Get_Post_Data extends WPI_Abstract_Action_Type {
		public function __construct() {
			parent::__construct();

			// Register our REST API endpoint for running getting post data.
			add_action( 'rest_api_init', array( $this, 'register_rest_route' ) );
		}

		public function initialize() {
			$this->name = 'getPostData';
			$this->category = 'post';
			$this->type = 'all';
			$this->uses_frontend_rest_api = true;

			$this->label = __( 'Get Post Data', 'wp-interactions' );
			// Translators: {attribute} is a placeholder for an attribute name.
			$this->dynamic_label = __( 'Get {data_type}', 'wp-interactions' ); // Use this property as the label.
			$this->description = __( 'Gets post data or metadata', 'wp-interactions' );

			$this->keywords = [
				'data',
				'page',
				'title',
				'excerpt',
				'dynamic',
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
				'data_type' => [
					'name' => __( 'Data to get', 'wp-interactions' ),
					'type' => 'select',
					'options' => [
						[ 'label' => __( 'Post Title', 'wp-interactions' ), 'value' => 'title' ],
						[ 'label' => __( 'Post ID', 'wp-interactions' ), 'value' => 'id' ],
						[ 'label' => __( 'Post Excerpt', 'wp-interactions' ), 'value' => 'excerpt' ],
						[ 'label' => __( 'Post Slug', 'wp-interactions' ), 'value' => 'slug' ],
						[ 'label' => __( 'Post Meta', 'wp-interactions' ), 'value' => 'meta' ],
					],
					'default' => 'title',
					'help' => __( 'The type of post data to get.', 'wp-interactions' ),

				],
				'meta_key' => [
					'name' => __( 'Meta key', 'wp-interactions' ),
					'type' => 'text',
					'default' => '',
					'help' => __( 'The key of the post meta to get.', 'wp-interactions' ),
					// This property is only visible when the "data_type" property is set to "meta".
					'condition' => [
						'property' => 'data_type',
						'value' => 'meta',
					],
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
			register_rest_route( 'wpi/v1', '/get-post-data', [
				'methods' => 'POST',
				'callback' => [ $this, 'get_post_data' ],
				'permission_callback' => '__return_true',
				'args' => array(
					'post_id' => array(
						'required' => true,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'data_type' => array(
						'required' => true,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'meta_key' => array(
						'required' => false,
						'type' => 'string',
						'sanitize_callback' => 'sanitize_text_field',
					),
				),
			] );
		}

		public function get_post_data( $request ) {
			$post_id = $request->get_param( 'post_id' );
			$data_type = $request->get_param( 'data_type' ) ?: 'title';
			$meta_key = $request->get_param( 'meta_key' );

			if ( empty( $post_id ) || empty( $data_type ) ) {
				return new WP_Error( '400', esc_html__( 'Missing post id or data type', 'wp-interactions' ), array( 'status' => 400 ) );
			}

			$result = '';
			if ( $data_type === 'title' ) {
				$result = get_the_title( $post_id );
			} elseif ( $data_type === 'id' ) {
				$result = $post_id;
			} elseif ( $data_type === 'excerpt' ) {
				$result = get_the_excerpt( $post_id );
			} elseif ( $data_type === 'slug' ) {
				$result = get_post_field( 'post_name', $post_id );
			} elseif ( $data_type === 'meta' ) {
				$result = get_post_meta( $post_id, $meta_key, true );
			}

			// Return the output, but do not return JSON because we will get slashes.
			header( 'Content-Type: text/html' );
			echo esc_html( $result );
			exit();
		}
	}

	wpi_add_action_type( 'getPostData', 'WPI_Action_Type_Get_Post_Data' );
}
