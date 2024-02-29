<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woodly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Woodly Hero Start -->
    <div id="woodly-hero-banner">
        <div class="row woodly-hero-banner">
            <div class="woodly-single-post-breadcumb text-center">
                <?php woodly_breadcrumbs();?>
            </div>
            <h2 class="best-medical-treatment-right-h2 woodly-heading text-center"><?php the_title();?>
            </h2>
        </div>
    
    

    </div>
   
    <!-- Woodly Hero End -->

    <?php woodly_post_thumbnail(); ?>
    <div class="container-woodly-full">
        <div class="post-content woodly-default-page-content">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'woodly' ),
                    'after'  => '</div>',
                )
            );
            ?>


            <?php if ( get_edit_post_link() ) : ?>
                <div class="post-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Edit <span class="screen-reader-text">%s</span>', 'woodly' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post( get_the_title() )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </div><!-- .post-footer -->
            <?php endif; ?>



            <div class="clearfix"></div>
            <div class="woodly-page-comment-section">
                <div class="container">
                    <?php	// If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                    ?>
                </div>

            </div>
        </div><!-- .post-content -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

