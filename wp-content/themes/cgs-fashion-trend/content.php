<?php if(is_home()){ ?>
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <div class="featured-img"><?php if(has_post_thumbnail()){ the_post_thumbnail('img_348_201'); } ?></div>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="post-meta"><?php esc_html_e( 'by', 'cgs-fashion-trend' ); ?> <span class="author vcard"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>" title="<?php esc_attr_e('Posts by admin','cgs-fashion-trend') ?>" rel="author"><?php the_author(); ?></a></span>  |  <span class="published"><?php the_date(); ?></span></p>
        <div class="post-content"><?php the_excerpt(); ?></div>
	</div>
</div>
<?php } ?>
<?php if(is_single()){ ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <p class="post-meta"><?php esc_html_e( 'by', 'cgs-fashion-trend' ); ?> <span class="author vcard"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>" title="<?php esc_attr_e('Posts by admin','cgs-fashion-trend'); ?>" rel="author"><?php the_author(); ?></a></span>  |  <span class="published"><?php the_date(); ?></span></p>
            <div class="post-content"><?php the_content(); ?></div>
        </div>
    </div>
<?php } ?>
<?php if(is_page() && !is_front_page()){ ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <div class="post-content"><?php the_content(); ?></div>
        </div>
    </div>
<?php } ?>
<?php if(is_front_page()){ ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-content"><?php the_content(); ?></div>
        </div>
    </div>
<?php } ?>
