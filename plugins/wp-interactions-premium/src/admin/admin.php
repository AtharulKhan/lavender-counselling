<?php
/**
 * Admin Settings
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPI_Admin_Screens' ) ) {
	class WPI_Admin_Screens {
		function __construct() {
			add_action( 'admin_menu', array( $this, 'add_dashboard_page' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

			add_action( 'admin_init', array( $this, 'redirect_to_welcome_page' ) );
		}

		public function add_dashboard_page() {
			// Our settings page.
			add_submenu_page(
				'options-general.php', // Parent slug.
				__( 'WP Interactions', 'wp-interactions' ), // Page title.
				__( 'WP Interactions', 'wp-interactions' ), // Menu title.
				'manage_options', // Capability.
				'wp-interactions', // Menu slug.
				array( $this, 'getting_started_content' ), // Callback function.
				null // Position
			);

			// Our getting started page.
			add_submenu_page(
				isset( $_GET['page'] ) && $_GET['page'] === 'wp-interactions-getting-started' ? 'options-general.php' : '', // Parent slug. Only show when in the page.
				__( 'Get Started', 'wp-interactions' ), // Page title.
				'<span class="fs-submenu-item fs-sub"></span>' . __( 'Get Started', 'wp-interactions' ), // Menu title.
				'manage_options', // Capability.
				'wp-interactions-getting-started', // Menu slug.
				array( $this, 'getting_started_content' ), // Callback function.
				null // Position
			);
		}

		public function enqueue_admin_scripts( $hook ) {
			// For WP Interactions pages, show our admin css.
			if ( stripos( $hook, 'page_wp-interactions' ) !== false ) {
				wp_enqueue_style( 'wpi-admin', plugins_url( 'dist/admin.css', WPINTERACTIONS_FILE ), array(), WPINTERACTIONS_VERSION );
			}
		}

		public function getting_started_content() {
			// check user capabilities
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			$freemius = WPI_Freemius::get_instance();
			$activation_html = '';
			if ( ! $freemius->is_activated() ) {
				// Required for wp.ajax to work
				wp_enqueue_script( 'wp-util' );

				$modal = WPI_Freemius_Admin::get_instance()->get_license_key_modal_script();
				echo $modal['html'];
				echo '<div class="notice-warning notice" style="padding: 16px;">' .
					'<p>' . __( 'Your License key for WP Interactions is not activated. Please activate your license key to enable features specific to your plan and to receive premium plugin updates.', 'wp-interactions' ) . '</p>' .
					'<button class="button button-primary" type="button" onclick="document.querySelector(\'#' . $modal['id'] . '\').showModal()">' .
					__( 'Activate License', 'wp-interactions' ) . '</button>' .
					'</div>';
			}

			?>
			<div class="wrap wpi-wrap">
				<div class="wpi-header">
					<img class="wpi-logo" src="<?php echo esc_url( plugins_url( 'src/admin/assets/wpi-logo.webp', WPINTERACTIONS_FILE ) ); ?>" alt="WP Interactions Logo" />
					<nav></nav>
					<div></div>
				</div>
				<div class="wpi-getting-started">
					<?php /* Translators: %s are the span tags */ ?>
					<h2><?php printf( __( 'Make Your Website %sInteractive%s Using WP Interactions', 'wp-interactions' ), '<span>', '</span>' ) ?></h2>
					<p class="wpi-subtitle"><?php _e( 'Craft animations and dynamic user interactions with our versatile trigger and action engine.', 'wp-interactions' ) ?></p>
					<div class="wpi-video-wrapper">
						<iframe class="wpi-video" src="https://www.youtube.com/embed/8qomdH6m9iA" title="<?php esc_attr( __( 'Getting Started', 'wp-interactions' ) ) ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowFullScreen></iframe>
					</div>
					<!-- TODO: <a href="" class="wpi-button"><?php _e( 'View Example Post', 'wp-interactions' ) ?></a> -->
				</div>
				<div class="wpi-3-column">
					<div class="wpi-column">
						<div class="wpi-icon"><img src="<?php echo esc_url( plugins_url( 'src/admin/assets/interaction-icon.svg', WPINTERACTIONS_FILE ) ); ?>" alt="" /></div>
						<h3><?php _e( 'What are Interactions?', 'wp-interactions' ) ?></h3>
						<p><?php _e( 'Interactions are a way to make your website more interactive. They are made up of triggers and actions.', 'wp-interactions' ) ?></p>
						<p><?php _e( 'You can use interactions to create animations, dynamic user experiences, and more.', 'wp-interactions' ) ?></p>
					</div>
					<div class="wpi-column">
						<div class="wpi-icon"><img src="<?php echo esc_url( plugins_url( 'src/admin/assets/trigger-icon.svg', WPINTERACTIONS_FILE ) ); ?>" alt="" /></div>
						<h3><?php _e( 'What are Triggers?', 'wp-interactions' ) ?></h3>
						<p><?php _e( 'Triggers are events that happen on the frontend of your website.', 'wp-interactions' ) ?></p>
						<p><?php _e( 'Triggers can also be things like a clicking on an element, a class change, the user trying to exit the page, the page state changes, or even when the URL hash changes.', 'wp-interactions' ) ?></p>
					</div>
					<div class="wpi-column">
						<div class="wpi-icon"><img src="<?php echo esc_url( plugins_url( 'src/admin/assets/action-icon.svg', WPINTERACTIONS_FILE ) ); ?>" alt="" /></div>
						<h3><?php _e( 'What are Actions?', 'wp-interactions' ) ?></h3>
						<p><?php _e( 'Actions are what happens when a trigger is fired.', 'wp-interactions' ) ?></p>
						<p><?php _e( 'Actions can be things like animating or changing the color of an element, updating the contents of your page, changing the page state or even showing a confirmation dialog', 'wp-interactions' ) ?></p>
					</div>
				</div>
				<div class="wpi-2-column">
					<a href="https://docs.wpinteractions.com" class="wpi-column wpi-column-hover" target="_docs">
						<div class="wpi-icon"><img src="<?php echo esc_url( plugins_url( 'src/admin/assets/documentation-icon.svg', WPINTERACTIONS_FILE ) ); ?>" alt="" /></div>
						<h3><?php _e( 'Documentation', 'wp-interactions' ) ?></h3>
						<p><?php _e( 'Visit our knowledge base for troubleshooting, guides, FAQs and updates.', 'wp-interactions' ) ?></p>
						<span class="wpi-button"><?php _e( 'Visit Documentation', 'wp-interactions' ) ?></span>
					</a>
					<a href="https://www.facebook.com/groups/wpinteractions" class="wpi-column wpi-column-hover" target="_community">
						<div class="wpi-icon"><img src="<?php echo esc_url( plugins_url( 'src/admin/assets/community-icon.svg', WPINTERACTIONS_FILE ) ); ?>" alt="" /></div>
						<h3><?php _e( 'Community', 'wp-interactions' ) ?></h3>
						<p><?php _e( 'Join the WP Interactions Community on Facebook. Discuss, ask questions, craft interactions with like-minded people.', 'wp-interactions' ) ?></p>
						<span class="wpi-button"><?php _e( 'Join Community', 'wp-interactions' ) ?></span>
					</a>
				</div>
			</div>
			<?php
		}

		/**
		 * Adds a marker to remember to redirect after activation.
		 * Redirecting right away will not work.
		 */
		public static function start_redirect_to_welcome_page( $network_wide ) {
			if ( ! $network_wide ) {
				update_option( 'wpi_redirect_to_welcome', '1', 'no' );
			}
		}

		/**
		 * Redirect to the welcome screen if our marker exists.
		 */
		public function redirect_to_welcome_page() {
			if ( get_option( 'wpi_redirect_to_welcome' ) &&
				current_user_can( 'manage_options' ) &&
				true // ! sugb_fs()->is_activation_mode() // TODO: comment out for now, replace eventually with our own Freemius function.
			) {
				// Never go here again.
				delete_option( 'wpi_redirect_to_welcome' );

				// Allow others to bypass the welcome screen.
				if ( ! apply_filters( 'wpi/activation_screen_enabled', true ) ) {
					return;
				}

				// Or go to the getting started page.
				wp_redirect( esc_url( admin_url( 'options-general.php?page=wp-interactions-getting-started' ) ) );

				die();
			}
		}
	}

	new WPI_Admin_Screens();
}

// This filter is used by the Freemius activation screen, we can disable redirection with this.
add_filter( 'fs_redirect_on_activation_wp-interactions', function ( $redirect ) {
	return apply_filters( 'wpi/activation_screen_enabled', $redirect );
} );

// Redirect to the welcome screen.
register_activation_hook( WPINTERACTIONS_FILE, array( 'WPI_Admin_Screens', 'start_redirect_to_welcome_page' ) );
