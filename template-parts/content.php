<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woodly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="woodly_default_blog <?php if(!is_singular()){ echo "woodly-post-grid-thumbnail"; }?>">
		<?php if (has_post_thumbnail()) { ?>
			<div class="woodly_post_thumbnail">
				<?php the_post_thumbnail('woodly-grid-alt-post'); ?>
			</div>
		<?php } ?>
		<div class="woodly_blog_content">
			<header class="post-header">
				<?php
				if (is_singular()) :
					the_title('<h1 class="post-title">', '</h1>');
				else :
					the_title('<h2 class="post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				endif;

				if ('post' === get_post_type()) :
				?>
					<div class="post-meta">
						<i class="zil zi-user"></i> <?php woodly_posted_by(); ?>
						<?php if (get_the_category_list()) { ?>
							<i class="zil zi-archive"></i> <?php woodly_post_cat(); ?>
						<?php } ?>
						<i class="zil zi-clock"></i> <?php woodly_posted_on(); ?>

					</div><!-- .post-meta -->
				<?php endif; ?>
			</header><!-- .post-header -->

			<div class="post-content">
				<?php
				if (is_front_page() || is_home() || is_archive()) {
					echo woodly_get_excerpt(200);
				} else {

					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'woodly'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post(get_the_title())
						)
					);
				}

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'woodly'),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .post-content -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->