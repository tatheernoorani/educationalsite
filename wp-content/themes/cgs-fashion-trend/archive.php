<?php get_header(); ?>
<div class="main-content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>
					<?php if ( is_day() ) : ?>
						<?php /* translators: %s: string */ ?>
						<?php printf('<strong>'.esc_html_e('Daily Archives:', 'cgs-fashion-trend').'</strong> %s', get_the_date() ); ?>
					<?php elseif ( is_month() ) : ?>
						<?php /* translators: %s: string */ ?>
						<?php printf('<strong>'.esc_html_e('Monthly Archives:', 'cgs-fashion-trend').'</strong> %s', get_the_date( _x( 'F Y', 'monthly archives date format', 'cgs-fashion-trend' ) )); ?>
					<?php elseif ( is_year() ) : ?>
						<?php /* translators: %s: string */ ?>
						<?php printf('<strong>'.esc_html_e('Yearly Archives:', 'cgs-fashion-trend').'</strong> %s', get_the_date( _x( 'Y', 'yearly archives date format', 'cgs-fashion-trend' ) )); ?>
					<?php else : ?>
						<?php esc_html_e( 'Blog Archives', 'cgs-fashion-trend' ); ?>
					<?php endif; ?>
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-9">
				<?php if(have_posts()){ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="row">
							<div class="col-lg-12 matchheight2">
								<div class="sing_post">
									<div class="post_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumb'); ?></a></div>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
                    <div class="row">
                        <div class="col-xl-12">
	                        <?php
	                        the_posts_pagination( array(
		                        'mid_size' => 2,
		                        'prev_text' => esc_html__( 'Back', 'cgs-fashion-trend' ),
		                        'next_text' => esc_html__( 'Next', 'cgs-fashion-trend' ),
		                        'screen_reader_text' => esc_html__( 'Posts', 'cgs-fashion-trend' )
	                        ) );
	                        ?>
                        </div>
                    </div>
				<?php } ?>
			</div>
			<div class="col-xl-3"><?php get_sidebar(); ?></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
