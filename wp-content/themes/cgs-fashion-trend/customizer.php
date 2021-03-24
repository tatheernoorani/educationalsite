<?php
function cgs_fashion_trend_customize_register( $wp_customize ) {
	get_template_part( 'class-cgs-image-radio-control' );
	function cgs_fashion_trend_select_sanitize( $input, $setting ){
		$input = sanitize_key($input);
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	/* Customizer "Design" */
	$wp_customize->add_panel( 'cgs_fashion_trend_design_options', array(
		'capabitity' => 'edit_theme_options',
		'priority'   => 505,
		'title'      => esc_html__( 'Design', 'cgs-fashion-trend' ),
	) );
	$wp_customize->add_section( 'cgs_fashion_trend_page_layout_setting', array(
		'priority' => 1,
		'title'    => esc_html__( 'Default layout for pages only', 'cgs-fashion-trend' ),
		'panel'    => 'cgs_fashion_trend_design_options',
	) );
	$wp_customize->add_setting( 'cgs_fashion_trend_pages_default_layout', array(
		'default'           => 'left_sidebar',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cgs_fashion_trend_select_sanitize',
	) );
	$wp_customize->add_control( new Cgs_Fashion_Trend_Image_Radio_Control( $wp_customize,'cgs_fashion_trend_pages_default_layout', array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Select default layout for pages. This layout will be reflected in all pages unless unique layout is set for specific page.', 'cgs-fashion-trend' ),
		'section'  => 'cgs_fashion_trend_page_layout_setting',
		'settings' => 'cgs_fashion_trend_pages_default_layout',
		'choices'  => array(
			'right_sidebar' => get_template_directory_uri(). '/images/right-sidebar.png',
			'left_sidebar' => get_template_directory_uri(). '/images/left-sidebar.png',
			'no_sidebar_full_width' => get_template_directory_uri(). '/images/no-sidebar-full-width-layout.png',
		),
	) ) );
}
add_action( 'customize_register', 'cgs_fashion_trend_customize_register' );
