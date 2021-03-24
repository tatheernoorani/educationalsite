<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "body-content-wrapper" div and all content after.
 *
 */
?>
			<a href="#" class="scrollup"></a>

			<footer id="footer-main">

				<div id="footer-content-wrapper">

					<?php get_sidebar( 'footer' ); ?>

					<nav id="footer-menu">
                        <?php wp_nav_menu( array( 'theme_location' => 'footer', ) ); ?>
                    </nav>

					<div class="clear">
					</div>
					
				</div><!-- #footer-content-wrapper -->

			</footer>
			<div id="footer-bottom-area">
				<div id="footer-bottom-content-wrapper">
					<div id="copyright">
						<p>
						 	<?php ftravel_show_copyright_text(); ?> <a href="<?php echo esc_url( 'https://tishonator.com/product/ftravel' ); ?>"
						 		title="<?php esc_attr_e( 'fTravel Theme', 'ftravel' ); ?>">
								<?php esc_html_e('fTravel Theme', 'ftravel'); ?>
							</a> 
							<?php
								/* translators: %s: WordPress name */
								printf( __( 'Powered by %s', 'ftravel' ), 'WordPress' ); ?>
						</p>
					</div><!-- #copyright -->
				</div>
			</div><!-- #footer-main -->

		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>