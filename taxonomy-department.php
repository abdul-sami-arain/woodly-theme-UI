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
                                     <img class="bottom-smiley-one" src="<?php echo get_template_directory_uri();?>/assets/images/smiley-icon.svg" />
                                    
                                      <img class="bottom-frill-one" src="<?php echo get_template_directory_uri();?>/assets/images/frill-icon.svg" />
                                      
                                      
                                      <img class="bottom-heart-one" src="<?php echo get_template_directory_uri();?>/assets/images/heart_icons.svg" />
                                      
                                       <img class="bottom-sun-one" src="<?php echo get_template_directory_uri();?>/assets/images/sun-icon.svg" />
                                       
                                        <img class="bottom-capsule-one" src="<?php echo get_template_directory_uri();?>/assets/images/capsule-icon.svg" />
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Woodly Hero End -->
<section class="woodly-page-main-content woodly-archive-main-content">
	<div class="container woodly-condensed-container">
		<div class="row">
		
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
					get_template_part( 'template-parts/content', 'department' );

				endwhile;

					woodly_page_navs();

				else :

				get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
		

		
		
		</div>
	</div>
</section>
<?php

get_footer();
