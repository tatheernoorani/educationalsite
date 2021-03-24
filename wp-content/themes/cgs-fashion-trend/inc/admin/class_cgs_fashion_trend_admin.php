<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'class_cgs_fashion_trend_admin' ) ) {
	class class_cgs_fashion_trend_admin {
		public function __construct() {
			add_action( 'wp_loaded', array( $this, 'cgs_fashion_trend_admin_notice' ) );
			add_action( 'wp_loaded', array( $this, 'cgs_fashion_trend_hide_notices' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'cgs_fashion_trend_ajax_enqueue_scripts' ) );
			add_action( 'wp_ajax_get_started_import_site', array( $this, 'cgs_fashion_trend_ajax_import_button_handler' ) );
		}
		public function cgs_fashion_trend_admin_notice(){
			$notice_nag = get_option( 'welcome_notice_hide_welcome' );
			if ( ! $notice_nag ) {
				add_action( 'admin_notices', array( $this, 'cgs_fashion_trend_welcome_notice' ) );
			}
		}
		public function cgs_fashion_trend_welcome_notice(){
?>
		<div class="admin_welcome_notice">
            <a class="admin_welcome_notice_close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'admin-welcome-notice-hide-notice', 'welcome' ) ), 'admin_welcome_notice_hide_notices_nonce', 'admin_welcome_notice_nonce' ) ); ?>">
				<?php esc_html_e( 'Dismiss', 'cgs-fashion-trend' ); ?>
            </a>
			<div class="notice_logo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/img/cgs-logo.png"></div>
            <p>
                <?php /* translators: 1: link */ ?>
                <?php // WPCS: sanitization ok. ?>
                <?php $arg_1 = '<a href="' . esc_url( admin_url( 'themes.php?page=cgs-fashion-trend-about' ) ) . '">Welcome Page</a>'; ?>
	            <?php esc_html(printf( 'Welcome! Thank you for choosing CGS Theme! Please visit our %1$s to take full advantage of our theme can offer.', $arg_1), 'cgs-fashion-trend'); ?>
            </p>
			<p><?php esc_html_e('Clicking the button below will install and activate the demo importer plugin.', 'cgs-fashion-trend'); ?></p>
            <p><?php esc_html_e('Please take a backup of your existing website before running importer plugin. It may remove your existing pages.', 'cgs-fashion-trend'); ?></p>
            <div class="spacer"></div>
            <p class="loading"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/img/loading1.gif"></p>
			<p><a href="#" id="get_started" class="button button-primary"><?php esc_html_e('Get started with demo importer', 'cgs-fashion-trend'); ?></a></p>
		</div>
<?php
		}
		public function cgs_fashion_trend_hide_notices(){
			if ( isset( $_GET['admin-welcome-notice-hide-notice'] ) && isset( $_GET['admin_welcome_notice_nonce'] ) ) {
				if ( ! current_user_can( 'manage_options' ) ) {
					wp_die( esc_html_e( 'Cheatin&#8217; huh?', 'cgs-fashion-trend' ) );
				}

				$hide_notice = sanitize_text_field( wp_unslash($_GET['admin-welcome-notice-hide-notice']));
				//update_option( 'welcome_notice_hide_' . $hide_notice, 1 );

				// Hide.
				/*if ( 'welcome' === $_GET['admin-welcome-notice-hide-notice'] ) {
					update_option( 'welcome_notice_hide_' . $hide_notice, 1 );
				} else { // Show.
					delete_option( 'welcome_notice_hide_' . $hide_notice );
				}*/
			}
        }
        public function cgs_fashion_trend_ajax_enqueue_scripts(){
	        wp_enqueue_script( 'cgs-admin-js', get_template_directory_uri() . '/js/admin.js', array('jquery'));
	        wp_localize_script( 'cgs-admin-js', 'cgsadminajax_obj', array( 'ajaxurl' => admin_url('admin-ajax.php')) );
        }
        public function cgs_fashion_trend_ajax_import_button_handler(){
	        update_option( 'welcome_notice_hide_welcome', 1 );
	        $state = '';
	        if ( is_plugin_active( 'cgs-demo-importer/cgs-demo-importer.php' ) ) {
		        $state = 'activated';
	        } elseif ( file_exists( WP_PLUGIN_DIR . '/cgs-demo-importer/cgs-demo-importer.php' ) ) {
		        $state = 'installed';
	        }


	        if ( 'activated' === $state ) {
		        $response['redirect'] = admin_url( '/themes.php?page=demo-importer&browse=all&admin-welcome-notice-hide-notice=welcome' );
	        } elseif ( 'installed' === $state ) {
		        $response['redirect'] = admin_url( '/themes.php?page=demo-importer&browse=all&admin-welcome-notice-hide-notice=welcome' );
		        if ( current_user_can( 'activate_plugin' ) ) {
			        $result = activate_plugin( 'cgs-demo-importer/cgs-demo-importer.php' );

			        if ( is_wp_error( $result ) ) {
				        $response['errorCode']    = $result->get_error_code();
				        $response['errorMessage'] = $result->get_error_message();
			        }
		        }
	        } else {
		        wp_enqueue_script( 'plugin-install' );
		        $response['redirect'] = admin_url( '/themes.php?page=demo-importer&browse=all&admin-welcome-notice-hide-notice=welcome' );

		        /**
		         * Install Plugin.
		         */
		        load_template(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
		        load_template(ABSPATH . 'wp-admin/includes/plugin-install.php');

		        $api = plugins_api( 'plugin_information', array(
			        'slug'   => sanitize_key( wp_unslash( 'wordpress-importer' ) ),
			        'fields' => array(
				        'sections' => false,
			        ),
                    'external' => true
		        ) );

		        $plugin_zip = 'https://github.com/gitCGSThmes/free_themes/raw/master/cgs-demo-importer.zip';

		        $skin     = new WP_Ajax_Upgrader_Skin();
		        $upgrader = new Plugin_Upgrader( $skin );
		        $result   = $upgrader->install( $plugin_zip );

		        // install Elementor plugin
		        $plugin_zip = 'https://downloads.wordpress.org/plugin/elementor.2.7.4.zip';
		        $result     = $upgrader->install( $plugin_zip );

		        // install Woocommerce plugin
		        $plugin_zip = 'https://downloads.wordpress.org/plugin/woocommerce.3.7.1.zip';
		        $result     = $upgrader->install( $plugin_zip );
		        activate_plugin( 'woocommerce/woocommerce.php' );

		        // install Contact Form 7 plugin
		        $plugin_zip = 'https://downloads.wordpress.org/plugin/contact-form-7.5.1.4.zip';
		        $result     = $upgrader->install( $plugin_zip );
		        activate_plugin( 'contact-form-7/wp-contact-form-7.php' );

		        /*#############################*/
		        // install Newsletter plugin
		        $plugin_zip = 'https://github.com/gitCGSThmes/free_themes/raw/master/newsletter.zip';
		        $result     = $upgrader->install( $plugin_zip );
		        activate_plugin( 'newsletter/plugin.php' );
		        /*#############################*/
		        // install Bootstrap plugin
		        $plugin_zip = 'https://github.com/gitCGSThmes/free_themes/raw/master/bootstrap-3-shortcodes.zip';
		        $result     = $upgrader->install( $plugin_zip );
		        activate_plugin( 'bootstrap-3-shortcodes/bootstrap-shortcodes.php' );
		        /*#############################*/

		        $response['result'] = $result;

		        if ( $result ) {
			        $response['installed'] = 'succeed';
		        } else {
			        $response['installed'] = 'failed';
		        }

		        // Activate plugin.
		        if ( current_user_can( 'activate_plugin' ) ) {
			        $result = activate_plugin( 'cgs-demo-importer/cgs-demo-importer.php' );
			        $result = activate_plugin( 'elementor/elementor.php' );
			        if ( is_plugin_active( 'cgs-demo-importer/cgs-demo-importer.php' ) ) {
				        $state = 'activated';
			        }
			        if ( is_plugin_active( 'elementor/elementor.php' ) ) {
				        $response['redirect'] = admin_url( '/themes.php?page=demo-importer&browse=all&admin-welcome-notice-hide-notice=welcome' );
			        }
			        if ( is_wp_error( $result ) ) {
				        $response['errorCode']    = $result->get_error_code();
				        $response['errorMessage'] = $result->get_error_message();
			        }
		        }
	        }

	        wp_send_json( $response );
		    die();
        }
	}
}
return new class_cgs_fashion_trend_admin();
