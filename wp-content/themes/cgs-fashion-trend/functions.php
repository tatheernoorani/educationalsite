<?php
/* ==========================================================================
 *  Theme settings
 * ========================================================================== */
if ( ! function_exists( 'cgs_fashion_trend_setup' ) ) :
	function cgs_fashion_trend_setup() {
		if ( ! isset( $content_width ) ) {
			$content_width = 725;
		}

		load_theme_textdomain( 'cgs-fashion-trend', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );
		add_theme_support( 'bbpress' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'img_348_201', 348, 201, true );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		add_theme_support( 'custom-background', apply_filters( 'basic_custom_background_args', array( 'default-color' => 'ffffff' ) ) );
		add_theme_support( 'custom-header', array(
			'width'       => 1080,
			'height'      => 190,
			'flex-height' => true,
			'flex-width' => true,
		) );

	
		// logo
		$args = array();
		$lpos = esc_html(get_theme_mod( 'display_logo_and_title' ));
		if ( false === $lpos || 'image' == $lpos ) {
			$args['header-text'] = array( 'blog-name' );
		}
		add_theme_support( 'custom-logo', $args );
	}
endif;
add_action( 'after_setup_theme', 'cgs_fashion_trend_setup' );
register_nav_menus( array(
	'primary'    => __( 'Main Menu', 'cgs-fashion-trend' )
) );

/* ==========================================================================
 *  Load scripts and styles
 * ========================================================================== */
if ( ! function_exists( 'cgs_fashion_trend_enqueue_style_and_script' ) ) :
	function cgs_fashion_trend_enqueue_style_and_script() {

		global $post, $wp_query;

		// STYLES
		wp_enqueue_style( 'cgs-fashion-trend-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Playfair+Display:400,700,900|Poppins:400,500,600,700', array(), true );
		wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), true );
		wp_enqueue_style( 'cgs-fashion-trend-style', get_stylesheet_uri(), array(), true );
		wp_style_add_data( 'cgs-fashion-trend-style', 'rtl', 'replace' );

		// SCRIPTS
		wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', false, '3.7.3', true );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ), true, true );

		if(is_singular()){
			if(comments_open() && get_option('thread_comments')){
				wp_enqueue_script( 'comment-reply', false, true, true );
			}
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'cgs_fashion_trend_enqueue_style_and_script' );
/* =========================================================================== */
add_action( 'widgets_init', 'cgs_fashion_trend_widgets_init' );
function cgs_fashion_trend_widgets_init() {
	/* translators: %s: search term */
	register_sidebar( array(
		'name' => __('Primary Sidebar', 'cgs-fashion-trend'),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget_box %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="side_title">',
		'after_title' => '</h3>',
	) );
}
add_image_size( 'team-thumb', 350, 265, true );

add_action( 'admin_init', 'cgs_fashion_trend_add_editor_styles' );
function cgs_fashion_trend_add_editor_styles() {
	add_editor_style('editor-style.css');
}
function cgs_fashion_trend_footer_copyright(){
	$CGS_Default = '<a href="'.esc_url(CGS_DEFAULT).'" target="_blank" >'.__('CGS Default','cgs-fashion-trend').'</a>';
	$CGS_Themes = '<a href="'.esc_url(CGS_THEMES).'" target="_blank" >'.__('CGS Themes','cgs-fashion-trend').'</a>';
	$wp_link = '<a href="'.esc_url(WORDPRESS_URL).'" target="_blank" >'.__('WordPress','cgs-fashion-trend').'</a>';

	/* translators: 1: Current Year, 2: Site Name, 3: Theme Name. 4: WordPress */
	$footer_copyright = sprintf( esc_html__( 'Copyright &copy; %1$s CGS Themes. All rights reserved. Theme: %2$s By %3$s. Powered by %4$s.', 'cgs-fashion-trend' ), esc_attr( date( 'Y' ) ), $CGS_Default, $CGS_Themes, $wp_link);

	return $footer_copyright;
}

require_once get_template_directory() . '/bs4navwalker.php';
/* =========================================================================== */
require( get_template_directory() . '/customizer.php' );

define('CGS_FASHION_TREND_URL','https://www.cgsthemes.com/');
define('CGS_FASHION_TREND_PRO_THEME_URL','https://www.cgsthemes.com/product/lite-default/');
define('CGS_FASHION_TREND_FREE_THEME_URL','https://www.cgsthemes.com/product/lite-default/');
define('CGS_FASHION_TREND_THEME_DOC','https://www.cgsthemes.com/documentation/lite-theme-documentation/');
define('CGS_FASHION_TREND_LIVE_DEMO','https://www.cgsthemes.com/product/lite-default/');
define('CGS_FASHION_TREND_THEMES_BUY_NOW','https://www.cgsthemes.com/cart/?add-to-cart=2817');
define('CGS_FASHION_TREND_THEMES_ALL_FREE_THEMES','https://www.cgsthemes.com/product-category/free-wordpress-themes/');
define('WORDPRESS_URL','https://wordpress.org');
define('CGS_FASHION_TREND_THEME_LINK','https://www.cgsthemes.com/product/lite-default/');
define('CGS_DEFAULT','https://cgsthemesdemo.com/cgs-lite-pro/fashion/');
define('CGS_THEMES','https://www.cgsthemes.com');
function cgs_fashion_trend_admin_theme_style() {
	wp_enqueue_style('cgs-theme-admin-style', get_template_directory_uri() . '/css/admin_style.css');
}
add_action('admin_enqueue_scripts', 'cgs_fashion_trend_admin_theme_style');
require get_template_directory() . '/about-themes.php';
require get_template_directory() . '/inc/admin/class_cgs_fashion_trend_admin.php';
require_once get_template_directory().'/inc/metaboxes/metaboxes.php';
add_action( 'admin_init', function() {
	if ( did_action( 'elementor/loaded' ) ) {
		remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
	}
}, 1 );
add_filter( 'woocommerce_helper_suppress_admin_notices', '__return_true' );
add_filter( 'woocommerce_helper_suppress_admin_notices', 'filter_function_name_3027' );
function filter_function_name_3027( $false ){
	return $false;
}
add_filter( 'woocommerce_prevent_automatic_wizard_redirect', 'wc_subscriber_auto_redirect', 20, 1 );
function wc_subscriber_auto_redirect( $boolean ) {
    return true;
}