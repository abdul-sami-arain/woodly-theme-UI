<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Woodly
 */

get_header();

?>
<!-- Woodly Hero Start -->
                                <div id="woodly-hero-banner">
                                    <div class="row woodly-hero-banner">
                                        
                                     
                                        
                                         <?php
			if ( have_posts() ) {

					?>
				
         <h1 class="page_title_single woodly-heading text-center"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'woodly' ), '<span>' . get_search_query() . '</span>' );
					?></h1>
      <?php } else { ?>
       <h1 class="page_title_single woodly-heading text-center"><?php esc_html_e('Nothing Found','woodly');?></h1>
      <?php } ?>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Woodly Hero End -->

<section class="woodly-page-main-content woodly-blog-main-content">
<div class="container woodly-condensed-container">
	<div class="row gx-8">
		<?php if ( is_active_sidebar( 'woodly-sidebar' ) ) { ?>
			<div class="col-md-8">
		<?php }else{ ?>
			<div class="col-md-12">
		<?php } ?>

			<?php
			if ( have_posts() ) :

			

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
</div><!-- #container -->
</section>

<?php

get_footer();
