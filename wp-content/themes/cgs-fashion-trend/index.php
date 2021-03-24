<?php get_header(); ?>
<div class="main-content-wrapper home-content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<?php if(have_posts()){ ?>
                    <div class="row">
					<?php while(have_posts()) : the_post(); ?>
                        <?php get_template_part( 'content' ); ?>
					<?php endwhile; ?>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="nav-previous alignleft"><?php next_posts_link( esc_html__('Older posts', 'cgs-fashion-trend') ); ?></div>
                            <div class="nav-next alignright"><?php previous_posts_link( esc_html__('Newer posts', 'cgs-fashion-trend' )); ?></div>
                        </div>
                    </div>
				<?php } else { ?>
					<h5><?php esc_html_e( 'Posts not found', 'cgs-fashion-trend' ); ?></h5>
					<?php get_search_form(); ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
