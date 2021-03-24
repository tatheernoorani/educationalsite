<?php
/**
 * The default template for displaying content
 *
 * Used for single, index, archive, and search contents.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="thumbnail-img-wrapper">

		<?php if ( has_post_thumbnail() ) : ?>

			<?php if ( is_single() ) : ?>

					<?php the_post_thumbnail(); ?>

			<?php else : ?>

					<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>

			<?php endif; ?>

		<?php endif; ?>

		<div class="before-content-line">
			<span class="icon author-icon">
				<?php the_author_posts_link(); ?>
			</span><!-- .author-icon -->
		</div>

		<div class="before-content-line">
			<?php if ( !is_single() && get_the_title() === '' ) : ?>

					<span class="icon clock-icon">
						<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
							<time datetime="<?php the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time>
						</a>
					</span><!-- .clock-icon -->
		
			<?php else : ?>

					<span class="icon clock-icon">
						<time datetime="<?php the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time>
					</span><!-- .clock-icon -->
				
			<?php endif; ?>
		</div>

		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

				<div class="before-content-line">
					<span class="icon comments-icon">
						<?php comments_popup_link(__( 'No Comments', 'ftravel' ), __( '1 Comment', 'ftravel' ), __( '% Comments', 'ftravel' ), '', __( 'Comments are closed.', 'ftravel' )); ?>
					</span><!-- .comments-icon -->
				</div>
		
		<?php endif; ?>

	</div>

	<div class="content-column-2">

		<?php if ( is_single() ) : ?>

				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>

		<?php else : ?>
		
				<h1 class="entry-title">
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h1>
		
		<?php endif; ?>

		<?php if ( is_single() ) : ?>

				<div class="content">
					<?php
						the_content( __( 'Read More &hellip;', 'ftravel') );

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ftravel' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						  ) );
					?>
				</div><!-- .content -->

		<?php else : ?>

				<div class="content">
					<?php
						  the_content( __( 'Read More', 'ftravel') );
					?>
				</div><!-- .content -->

		<?php endif; ?>

		<?php if ( ! post_password_required() ) : ?>

					<?php if ( has_category() ) : ?>
							<div class="before-content-line">
								<span class="icon category-icon">
									<?php esc_html_e('Categories:', 'ftravel'); ?>
								</span><!-- .category-icon -->
								<?php the_category( ' ' ) ?>
							</div><!-- .before-content-line -->						
					<?php endif; ?>
				
					<?php if ( has_tag() ) : ?>
							<div class="before-content-line">
								<span class="icon tags-icon">
									<?php esc_html_e('Tags:', 'ftravel'); ?>
								</span><!-- .tags-icon -->
								<?php the_tags('', _x( ', ', 'Used between list items, there is a space after the comma.', 'ftravel' ), ''); ?>
							</div><!-- .before-content-line -->				
					<?php endif; ?>

		<?php endif; // ! post_password_required() ?>

		<div class="before-content-line">
			<?php edit_post_link( __( 'Edit', 'ftravel' ), '<span class="edit-icon">', '</span>' ); ?>
		</div><!-- .before-content-line -->

	</div><!-- .content-column-2 -->
	
	<?php if ( !is_single() ) : ?>
			<div class="separator">
			</div>
	<?php endif; ?>
</article><!-- #post-## -->
