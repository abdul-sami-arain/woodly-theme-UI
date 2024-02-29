<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woodly
 */

get_header();

?>

<!-- Woodly Hero Start -->
                                <div id="woodly-hero-banner">
                                    <div class="row woodly-hero-banner">
                                         <div class="woodly-single-post-breadcumb text-center">
                                           <?php woodly_breadcrumbs();?>
                                         </div>
                                       <?php
					the_archive_title( '<h1 class="page-title woodly-heading text-center">', '</h1>' );
					the_archive_description( '<div class="archive-description text-center">', '</div>' );
					?>
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Woodly Hero End -->
<section class="woodly-page-main-content woodly-archive-main-content">
	<div class="container woodly-condensed-container">
		<div class="row gx-6">
		<?php if ( is_active_sidebar( 'woodly-sidebar' ) ) { ?>
			<div class="col-md-8">
		<?php }else{ ?>
			<div class="col-md-8 offset-md-2">
		<?php } ?>
				<?php if ( have_posts() ) : ?>

				

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'post' );

				endwhile;

					woodly_page_navs();

				else :

				get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>

		
			<?php if ( is_active_sidebar( 'woodly-sidebar' ) ) { ?>
			<div class="col-md-4">
				<?php dynamic_sidebar( 'woodly-sidebar' ); ?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php

get_footer();
