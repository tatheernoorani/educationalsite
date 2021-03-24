<?php
/**
 * fTravel functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'FTRAVEL_MIN_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'ftravel_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function ftravel_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, FTRAVEL_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'ftravel_min_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function ftravel_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'ftravel' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'ftravel' ),
				PHP_VERSION,
				FTRAVEL_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}


if ( ! function_exists( 'ftravel_setup' ) ) :
	/**
	 * fTravel setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 */
	function ftravel_setup() {

		/*
		 * Make theme available for translation.
		 *
		 * Translations can be filed in the /languages/ directory
		 *
		 * If you're building a theme based on fTravel, use a find and replace
		 * to change 'ftravel' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ftravel', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'editor-styles' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
	 	 */
		add_editor_style( array( 'css/editor-style.css', 
								 get_template_directory_uri() . '/css/font-awesome.css',
								 ftravel_fonts_url()
						  ) );

		/*
		 * Set Custom Background
		 */				 
		add_theme_support( 'custom-background', array ('default-color'  => '#ffffff') );

		// Set the default content width.
		$GLOBALS['content_width'] = 900;

		// This theme uses wp_nav_menu() in header menu
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'ftravel' ),
			'footer'    => __( 'Footer Menu', 'ftravel' ),
		) );

		$defaults = array(
	        'flex-height' => false,
	        'flex-width'  => false,
	        'header-text' => array( 'site-title', 'site-description' ),
	    );
	    add_theme_support( 'custom-logo', $defaults );

	    // Define and register starter content to showcase the theme on new sites.
		$starter_content = array(

			'widgets' => array(
				'sidebar-widget-area' => array(
					'search',
					'recent-posts',
					'categories',
					'archives',
				),

				'homepage-widget-area' => array(
					'text_business_info'
				),

				'footer-widget-area' => array(
					'text_about'
				),
			),

			'posts' => array(
				'home',
				'blog',
				'about',
				'contact'
			),

			// Default to a static front page and assign the front and posts pages.
			'options' => array(
				'show_on_front' => 'page',
				'page_on_front' => '{{home}}',
				'page_for_posts' => '{{blog}}',
			),

			// Set the front page section theme mods to the IDs of the core-registered pages.
			'theme_mods' => array(
				'ftravel_slider_display' => 1,
				'ftravel_slide1_image' => esc_url( get_template_directory_uri() . '/img/1.jpg' ),
				'ftravel_slide1_content' => _x( '<h2>Slide 1 Title</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a href="#" class="btn" title="Read more">Read more</a>', 'Theme starter content', 'ftravel' ),
				'ftravel_slide2_image' => esc_url( get_template_directory_uri() . '/img/2.jpg' ),
				'ftravel_slide2_content' => _x( '<h2>Slide 2 Title</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a href="#" class="btn" title="Read more">Read more</a>', 'Theme starter content', 'ftravel' ),
				'ftravel_slide3_image' => esc_url( get_template_directory_uri() . '/img/3.jpg' ),
				'ftravel_slide3_content' => _x( '<h2>Slide 3 Title</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a href="#" class="btn" title="Read more">Read more</a>', 'Theme starter content', 'ftravel' ),
			),

			'nav_menus' => array(

				// Assign a menu to the "primary" location.
				'primary' => array(
					'name' => __( 'Primary Menu', 'ftravel' ),
					'items' => array(
						'link_home',
						'page_blog',
						'page_contact',
						'page_about',
					),
				),

				// Assign a menu to the "footer" location.
				'footer' => array(
					'name' => __( 'Footer Menu', 'ftravel' ),
					'items' => array(
						'link_home',
						'page_about',
						'page_blog',
						'page_contact',
					),
				),
			),
		);

		$starter_content = apply_filters( 'ftravel_starter_content', $starter_content );
		add_theme_support( 'starter-content', $starter_content );
	}
endif; // ftravel_setup
add_action( 'after_setup_theme', 'ftravel_setup' );

if ( ! function_exists( 'ftravel_fonts_url' ) ) :
	/**
	 *	Load google font url used in the fTravel theme
	 */
	function ftravel_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Karla, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'Karla font: on or off', 'ftravel' );

	    if ( 'off' !== $questrial ) {
	        $font_families = array();
	 
	        $font_families[] = 'Karla';
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // ftravel_fonts_url

if ( ! function_exists( 'ftravel_load_scripts' ) ) :
	/**
	 * the main function to load scripts in the fTravel theme
	 * if you add a new load of script, style, etc. you can use that function
	 * instead of adding a new wp_enqueue_scripts action for it.
	 */
	function ftravel_load_scripts() {

		// load main stylesheet.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( ) );
		wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
		wp_enqueue_style( 'ftravel-style', get_stylesheet_uri(), array() );
		
		wp_enqueue_style( 'ftravel-fonts', ftravel_fonts_url(), array(), null );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js',
            array( 'jquery' ) );
		
		// Load Utilities JS Script
		wp_enqueue_script( 'ftravel-utilities-js',
			get_template_directory_uri() . '/js/utilities.js',
			array( 'jquery', 'viewportchecker' ) );

		$data = array(
	        'loading_effect' => ( get_theme_mod('ftravel_animations_display', 1) == 1 ),
	    );
	    wp_localize_script('ftravel-utilities-js', 'ftravel_options', $data);

	    // Load script for the slider
		wp_enqueue_script( 'unslider', get_template_directory_uri() . '/js/unslider.js', array( 'jquery' ) );
	}
endif; // ftravel_load_scripts
add_action( 'wp_enqueue_scripts', 'ftravel_load_scripts' );

if ( ! function_exists( 'ftravel_widgets_init' ) ) :
	/**
	 *	widgets-init action handler. Used to register widgets and register widget areas
	 */
	function ftravel_widgets_init() {
		
		// Register Sidebar Widget.
		register_sidebar( array (
							'name'	 		 =>	 __( 'Sidebar Widget Area', 'ftravel'),
							'id'		 	 =>	 'sidebar-widget-area',
							'description'	 =>  __( 'The sidebar widget area', 'ftravel'),
							'before_widget'	 =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
							'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
						) );

		/**
		 * Add Homepage Widget areas
		 */
		register_sidebar( array (
								'name'			 =>  __( 'Homepage Widget', 'ftravel' ),
								'id' 			 =>  'homepage-widget-area',
								'description'	 =>  __( 'The Homepage widget area', 'ftravel' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="sidebar-title">',
								'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
							) );

		// Register Footer Widget
		register_sidebar( array (
								'name'			 =>  __( 'Footer Content Area', 'ftravel' ),
								'id' 			 =>  'footer-widget-area',
								'description'	 =>  __( 'The Footer Content widget area', 'ftravel' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
	}
endif; // ftravel_widgets_init
add_action( 'widgets_init', 'ftravel_widgets_init' );

if ( ! function_exists( 'ftravel_custom_header_setup' ) ) :
  /**
   * Set up the WordPress core custom header feature.
   *
   * @uses ftravel_header_style()
   */
  function ftravel_custom_header_setup() {

  	add_theme_support( 'custom-header', array (
                         'default-image'          => '',
                         'flex-height'            => true,
                         'flex-width'             => true,
                         'uploads'                => true,
                         'width'                  => 900,
                         'height'                 => 100,
                         'default-text-color'     => '#434343',
                         'wp-head-callback'       => 'ftravel_header_style',
                      ) );
  }
endif; // ftravel_custom_header_setup
add_action( 'after_setup_theme', 'ftravel_custom_header_setup' );

if ( ! function_exists( 'ftravel_header_style' ) ) :

  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see ftravel_custom_header_setup().
   */
  function ftravel_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( ! has_header_image()
          && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) ) {

          return;
      }

      $headerImage = get_header_image();
  ?>
      <style id="ftravel-custom-header-styles" type="text/css">

          <?php if ( has_header_image() ) : ?>

                  #header-main-fixed {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

          <?php endif; ?>

          <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                      && 'blank' !== $header_text_color ) : ?>

                  #header-main-fixed, #header-main-fixed h1.entry-title {color: #<?php echo sanitize_hex_color_no_hash( $header_text_color ); ?>;}

          <?php endif; ?>
      </style>
  <?php
  }
endif; // End of ftravel_header_style.

if ( class_exists('WP_Customize_Section') ) {
	class ftravel_Customize_Section_Pro extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'ftravel';

		// Custom button text to output.
		public $pro_text = '';

		// Custom pro button URL.
		public $pro_url = '';

		// Add custom parameters to pass to the JS via JSON.
		public function json() {
			$json = parent::json();

			$json['pro_text'] = $this->pro_text;
			$json['pro_url']  = esc_url( $this->pro_url );

			return $json;
		}

		// Outputs the template
		protected function render_template() { ?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<h3 class="accordion-section-title">
					{{ data.title }}

					<# if ( data.pro_text && data.pro_url ) { #>
						<a href="{{ data.pro_url }}" class="button button-primary alignright" target="_blank">{{ data.pro_text }}</a>
					<# } #>
				</h3>
			</li>
		<?php }
	}
}

if ( ! function_exists( 'ftravel_show_copyright_text' ) ) :
	/**
	 *	Displays the copyright text.
	 */
	function ftravel_show_copyright_text() {
		
		$footerText = get_theme_mod('ftravel_footer_copyright', null);

		if ( !empty( $footerText ) ) {

			echo esc_html( $footerText ) . ' | ';		
		}
	}
endif; // end of ftravel_show_copyright_text

if ( ! function_exists( 'ftravel_display_slider' ) ) :
	/**
	 * Displays the slider
	 */
	function ftravel_display_slider() {

	?>
		
		<div class="slider">
			<a href="#" id="unslider-arrow-prev" class="unslider-arrow prev"></a>
			<a href="#" id="unslider-arrow-next" class="unslider-arrow next"></a>
			<ul>
			<?php
				// display slides
				for ( $i = 1; $i <= 3; ++$i ) {
						
					$defaultSlideImage = get_template_directory_uri().'/img/' . $i .'.jpg';

					$slideContent = get_theme_mod( 'ftravel_slide'.$i.'_content' );
					$slideImage = get_theme_mod( 'ftravel_slide'.$i.'_image', $defaultSlideImage );

	?>					
					<li <?php if ( $slideImage != '' ) : ?>

								style="background-image: url('<?php echo $slideImage; ?>');"

						<?php endif; ?>>
						<?php if ( $slideContent ) : ?>
								<div class="slider-content-wrapper">
									<div class="slider-content-container">
										<div class="slide-content">
											<?php echo $slideContent; ?>
										</div>
									</div>
								</div>
						<?php endif; ?>
					</li>				
	<?php
				} /**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function ftravel_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ftravel_skip_link_focus_fix' );

?>
			</ul>
		</div>
	<?php 
	}
endif; // end of ftravel_display_slider

if ( ! function_exists( 'ftravel_sanitize_checkbox' ) ) :
	/**
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function ftravel_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif; // end of ftravel_sanitize_checkbox

if ( ! function_exists( 'ftravel_sanitize_html' ) ) :

	function ftravel_sanitize_html( $html ) {
		return wp_kses_post( $html );
	}

endif; // ftravel_sanitize_html

if ( ! function_exists( 'ftravel_sanitize_url' ) ) :

	function ftravel_sanitize_url( $url ) {
		return esc_url_raw( $url );
	}

endif; // ftravel_sanitize_url

/**
 * Singleton class for handling the theme's customizer integration.
 */
final class ftravel_Customize {

	// Returns the instance.
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	// Constructor method.
	private function __construct() {}

	// Sets up initial actions.
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	// Sets up the customizer sections.
	public function sections( $manager ) {

		// Register custom section types.
		$manager->register_section_type( 'ftravel_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new ftravel_Customize_Section_Pro(
				$manager,
				'ftravel',
				array(
					'title'    => esc_html__( 'tTravel', 'ftravel' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'ftravel' ),
					'pro_url'  => esc_url( 'https://tishonator.com/product/ttravel' )
				)
			)
		);

		// Load custom sections.

		/**
	     * Add Animations Section
	     */
	    $manager->add_section(
	        'ftravel_animations_display',
	        array(
	            'title'       => __( 'Animations', 'ftravel' ),
	            'capability'  => 'edit_theme_options',
	        )
	    );

	    // Add display Animations option
	    $manager->add_setting(
	            'ftravel_animations_display',
	            array(
	                    'default'           => 1,
	                    'sanitize_callback' => 'ftravel_sanitize_checkbox',
	            )
	    );

	    $manager->add_control( new WP_Customize_Control( $manager,
	                        'ftravel_animations_display',
	                            array(
	                                'label'          => __( 'Enable Animations', 'ftravel' ),
	                                'section'        => 'ftravel_animations_display',
	                                'settings'       => 'ftravel_animations_display',
	                                'type'           => 'checkbox',
	                            )
	                        )
	    );

	    /**
		 * Add Slider Section
		 */
		$manager->add_section(
			'ftravel_slider_section',
			array(
				'title'       => __( 'Slider', 'ftravel' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display slider option
		$manager->add_setting(
				'ftravel_slider_display',
				array(
						'default'           => 0,
						'sanitize_callback' => 'ftravel_sanitize_checkbox',
				)
		);

		$manager->add_control( new WP_Customize_Control( $manager, 'ftravel_slider_display',
								array(
									'label'          => __( 'Display Slider on a Static Front Page', 'ftravel' ),
									'section'        => 'ftravel_slider_section',
									'settings'       => 'ftravel_slider_display',
									'type'           => 'checkbox',
								)
							)
		);

	    for ($i = 1; $i <= 3; ++$i) {
		
			$slideContentId = 'ftravel_slide'.$i.'_content';
			$slideImageId = 'ftravel_slide'.$i.'_image';
			$defaultSliderImagePath = get_template_directory_uri().'/img/'.$i.'.jpg';
		
			// Add Slide Content
			$manager->add_setting(
				$slideContentId,
				array(
					'sanitize_callback' => 'ftravel_sanitize_html',
				)
			);
			
			$manager->add_control( new WP_Customize_Control( $manager, $slideContentId,
										array(
											'label'          => sprintf( esc_html__( 'Slide #%s Content', 'ftravel' ), $i ),
											'section'        => 'ftravel_slider_section',
											'settings'       => $slideContentId,
											'type'           => 'textarea',
											)
										)
			);
			
			// Add Slide Background Image
			$manager->add_setting( $slideImageId,
				array(
					'default' => $defaultSliderImagePath,
					'sanitize_callback' => 'ftravel_sanitize_url'
				)
			);

			$manager->add_control( new WP_Customize_Image_Control( $manager, $slideImageId,
					array(
						'label'   	 => sprintf( esc_html__( 'Slide #%s Image', 'ftravel' ), $i ),
						'section' 	 => 'ftravel_slider_section',
						'settings'   => $slideImageId,
					) 
				)
			);
		}

	    /**
		 * Add Footer Section
		 */
		$manager->add_section(
			'ftravel_footer_section',
			array(
				'title'       => __( 'Footer', 'ftravel' ),
				'capability'  => 'edit_theme_options',
			)
		);

	    // Add footer copyright text
		$manager->add_setting(
			'ftravel_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$manager->add_control( new WP_Customize_Control( $manager, 'ftravel_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'ftravel' ),
	            'section'        => 'ftravel_footer_section',
	            'settings'       => 'ftravel_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);
	}

	// Loads theme customizer CSS.
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ftravel-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ftravel-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
	}
}

// Doing this customizer thang!
ftravel_Customize::get_instance();
