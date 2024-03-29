<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woodly
 */

$title_hide_wd = cs_get_option('x_sbl_width_set');

$tag_list = get_the_tag_list('<ul><li>', '</li><li>', '</li></ul>');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- Woodly Hero Start -->

    <div id="woodly-hero-banner">
        <div class="row woodly-hero-banner">
            <div class="woodly-single-post-breadcumb text-center medianimated medianimatedFadeInUp medi-fadein-up-one">
                <?php woodly_breadcrumbs(); ?>
            </div>

        </div>

    </div>


    <!-- Woodly Hero End -->

    <section class="woodly-single-post-content">
        <div class="container woodly-condensed-container">
            <div class="row gx-8">
                <div class="col-12 col-md-8 single-main-content single-main-content-sidebar">

                    <?php
                    // display featured image?
                    if (has_post_thumbnail()) : ?>
                        <div class="post-thumb-single">

                            <?php woodly_post_thumbnail('full', array('class' => 'img-responsive')); ?>

                        </div>
                    <?php endif; ?>
                    <h2 class="portfolio-single-title"><?php the_title(); ?></h2>


                    <div class="med-single-content-mds">
                        <?php the_content(); ?>
                    </div>
                    <?php if ($tag_list) { ?>
                        <div class="woodly-single-post-tag-bar">

                            <div class="woodly-tags-sgl">
                                <?php echo maybe_unserialize($tag_list); ?>
                            </div>

                        </div>

                    <?php } ?>


                    <div class="accordion woodly-cs" id="accordionExample">

                    

                        <?php
                        if( get_field('faq_title') ){ ?>
                            <h2><?php the_field('faq_title'); ?></h2>
                        <?php }
                      
                        if (get_field('general_questions')) : $i = 0;

                            while (has_sub_field('general_questions')) : $i++; 
                        ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-<?php echo esc_html($i); ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo esc_html($i); ?>" aria-expanded="true" aria-controls="collapse-<?php echo esc_html($i); ?>">
                                            <?php the_sub_field('faq'); ?>
                                        </button>
                                    </h2>
                                    <div id="collapse-<?php echo esc_html($i); ?>" class="accordion-collapse collapse <?php if( 1 == $i ){ echo 'show'; }?>" aria-labelledby="heading-<?php echo esc_html($i); ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php the_sub_field('faq_answer'); ?>
                                        </div>
                                    </div>
                                </div>


                        <?php

                            endwhile;
                        endif;
                        ?>

                    </div>



                    <div class="woodly-single-post-comment-box">
                        <?php

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>

                </div>

                <div class="col-12 col-md-4 single-sidebar-content">
                    <?php if (is_active_sidebar('woodly-cs-sidebar')) { ?>

                        <?php dynamic_sidebar('woodly-cs-sidebar'); ?>

                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</article>