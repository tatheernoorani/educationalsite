<?php get_header(); ?>
<div class="main-content-wrapper">
	<div class="container">
		<?php $cgs_fashion_trend_page_layout = esc_html(get_post_meta(get_the_ID(), 'cgs_fashion_trend_page_layout', true)); ?>
        <?php if($cgs_fashion_trend_page_layout == 'right_sidebar'){ ?>
        <div class="row">
            <div class="col-xl-9">
				<?php if(have_posts()){ ?>
                    <div class="row">
						<?php while(have_posts()) : the_post(); ?>
							<?php get_template_part( 'content' ); ?>
                            <div class="row">
                                <div class="col-xl-12">
									<?php previous_post_link(); ?> | <?php next_post_link(); ?>
                                </div>
                            </div>
						<?php endwhile; ?>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
							<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
								<?php comments_template( '', true ); ?>
							<?php endif; ?>
                        </div>
                    </div>
				<?php } else { ?>
                    <h5><?php esc_html_e( 'Posts not found', 'cgs-fashion-trend' ); ?></h5>
					<?php get_search_form(); ?>
				<?php } ?>
            </div>
            <div class="col-xl-3"><?php get_sidebar(); ?></div>
        </div>
		<?php } elseif($cgs_fashion_trend_page_layout == 'left_sidebar') { ?>
        <div class="row">
            <div class="col-xl-3"><?php get_sidebar(); ?></div>
            <div class="col-xl-9">
				<?php if(have_posts()){ ?>
                    <div class="row">
						<?php while(have_posts()) : the_post(); ?>
							<?php get_template_part( 'content' ); ?>
                            <div class="row">
                                <div class="col-xl-12">
									<?php previous_post_link(); ?> | <?php next_post_link(); ?>
                                </div>
                            </div>
						<?php endwhile; ?>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
							<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
								<?php comments_template( '', true ); ?>
							<?php endif; ?>
                        </div>
                    </div>
				<?php } else { ?>
                    <h5><?php esc_html_e( 'Posts not found', 'cgs-fashion-trend' ); ?></h5>
					<?php get_search_form(); ?>
				<?php } ?>
            </div>
        </div>
		<?php } elseif($cgs_fashion_trend_page_layout == 'no_sidebar_full_width') { ?>
        <div class="row">
            <div class="col-xl-12">
				<?php if(have_posts()){ ?>
                    <div class="row">
						<?php while(have_posts()) : the_post(); ?>
							<?php get_template_part( 'content' ); ?>
                            <div class="row">
                                <div class="col-xl-12">
									<?php previous_post_link(); ?> | <?php next_post_link(); ?>
                                </div>
                            </div>
						<?php endwhile; ?>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
							<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
								<?php comments_template( '', true ); ?>
							<?php endif; ?>
                        </div>
                    </div>
				<?php } else { ?>
                    <h5><?php esc_html_e( 'Posts not found', 'cgs-fashion-trend' ); ?></h5>
					<?php get_search_form(); ?>
				<?php } ?>
            </div>
        </div>
		<?php } elseif($cgs_fashion_trend_page_layout == 'no_sidebar_content_centered') { ?>
            <div class="row">
                <div class="col-xl-1"></div>
                <div class="col-xl-10">
					<?php if(have_posts()){ ?>
                        <div class="row">
							<?php while(have_posts()) : the_post(); ?>
								<?php get_template_part( 'content' ); ?>
                                <div class="row">
                                    <div class="col-xl-12">
										<?php previous_post_link(); ?> | <?php next_post_link(); ?>
                                    </div>
                                </div>
							<?php endwhile; ?>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
								<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
									<?php comments_template( '', true ); ?>
								<?php endif; ?>
                            </div>
                        </div>
					<?php } else { ?>
                        <h5><?php esc_html_e( 'Posts not found', 'cgs-fashion-trend' ); ?></h5>
						<?php get_search_form(); ?>
					<?php } ?>
                </div>
                <div class="col-xl-1"></div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-xl-9">
					<?php if(have_posts()){ ?>
                        <div class="row">
							<?php while(have_posts()) : the_post(); ?>
								<?php get_template_part( 'content' ); ?>
                                <div class="row">
                                    <div class="col-xl-12">
										<?php previous_post_link(); ?> | <?php next_post_link(); ?>
                                    </div>
                                </div>
							<?php endwhile; ?>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
								<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
									<?php comments_template( '', true ); ?>
								<?php endif; ?>
                            </div>
                        </div>
					<?php } else { ?>
                        <h5><?php esc_html_e( 'Posts not found', 'cgs-fashion-trend' ); ?></h5>
						<?php get_search_form(); ?>
					<?php } ?>
                </div>
                <div class="col-xl-3"><?php get_sidebar(); ?></div>
            </div>
        <?php } ?>
	</div>
</div>
<?php get_footer(); ?>
