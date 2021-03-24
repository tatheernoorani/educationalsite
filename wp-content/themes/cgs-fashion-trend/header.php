<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="header-wrapper">
    <a class="skip-link screen-reader-text" href="#skip_content"><?php esc_html_e( 'Skip to content', 'cgs-fashion-trend' ); ?></a>
    <nav class="navbar navbar-expand-md navbar-light" role="navigation">
        <div class="container">
            <a class="navbar-brand logo" href="<?php echo esc_url(get_site_url()); ?>">
				<?php
				if (display_header_text()==true){
					echo '<h1>'.esc_html(get_bloginfo( 'name' )).'</h1>';
					echo '<h2>'.esc_html(get_bloginfo('description')).'</h2>';
				} else {
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<img src="'. esc_url( $logo[0] ) .'" alt="logo">';
					} else {
						echo '<h1>'.esc_html(get_bloginfo( 'name' )).'</h1>';
                    }
				}
				?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cgsnavmenu" aria-controls="cgsnavmenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
			<?php
			wp_nav_menu( [
				'theme_location'  => 'primary',
				'container'       => 'div',
				'container_id'    => 'cgsnavmenu',
				'container_class' => 'collapse navbar-collapse',
				'menu_id'         => false,
				'menu_class'      => 'navbar-nav ml-auto',
				'depth'           => 2,
				'fallback_cb'     => 'bs4navwalker::fallback',
				'walker'          => new bs4navwalker()
			] );
			?>
        </div>
    </nav>
</div>
<?php $cgs_fashion_trend_header_bg_img = get_header_image(); ?>
<?php $cgs_fashion_trend_setting_small_img = get_theme_mod('cgs_fashion_trend_setting_small_img'); ?>
<?php $cgs_fashion_trend_slider_shortcode = get_theme_mod('cgs_fashion_trend_slider_setting'); ?>
<?php $show_theme_banner = get_option('show_theme_banner'); ?>
<?php if($show_theme_banner != 1){ ?>
    <?php if(empty($cgs_fashion_trend_slider_shortcode)){ ?>
        <?php if(is_home() || is_front_page()){ ?>
            <?php if(!empty($cgs_fashion_trend_header_bg_img)){ ?>
                <div class="banner-wrapper" style="background-image: url('<?php echo esc_url($cgs_fashion_trend_header_bg_img); ?>')">
                    <div class="container">
                        <div class="banner-height"></div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    <?php } else { ?>
        <?php if(is_home()){ ?>
            <div class="slider_shortcode">
                <?php echo do_shortcode($cgs_fashion_trend_slider_shortcode); ?>
            </div>
        <?php } ?>
    <?php } ?>
<?php } ?>
<div id="skip_content"></div>
