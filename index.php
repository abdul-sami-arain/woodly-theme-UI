<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
            <div class="woodly--single--post--breadcumb text-center global-animated-hidden global-animated-up">
                <?php woodly_breadcrumbs();?>
            </div>
            <h2 class="woodly--breadcrumb--heading text-center global-animated-hidden global-animated-up" data-splitting><?php esc_html_e('Blog','woodly');?>
            </h2>
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

				if ( is_home() && ! is_front_page() ) :
					?>
					
					<?php
				endif;

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
			<div class="col-md-4 woodly-sidebar">
				<?php dynamic_sidebar( 'woodly-sidebar' ); ?>
			</div>
		<?php } ?>

		
	</div>
</div><!-- #container -->
</section>
<?php

get_footer();
