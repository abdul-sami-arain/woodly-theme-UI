<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woodly
 */
$post_id = get_the_ID();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="tctz-default-thm-blog woodly__post_arcive_main_wrrape">
        <div class="tctz-default-thm-blog-inner woodly__post_arcive_wrrape row">

            <?php if (has_post_thumbnail()) { ?>
                <div class="tctz-default-thumbnail woodly__post_arcive_thumbnail  global-animated-hidden global-animated-left col-12 col-md-6">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a>
                </div>
            <?php } ?>

            <?php if (has_post_thumbnail()) { ?>
            <div class="col-12 col-md-6">
                <?php } else { ?>
                <div class="col-12">
                    <?php } ?>
                    
                    <div class="tctz-default-meta tetz-meta-padding-top woodly__post_arcive_content ">
                    <?php
                    if (is_sticky($post_id)) {
                        echo '<span class="sticky-post-label"><i class="ticon-bookmark"></i></span>';
                    }
                    ?>
                    <div class="woodly_catagories" data-splitting>
                        <?php if (get_the_category_list()) { ?>
                             <?php woodly_post_cat(); ?><?php } ?>
                    </div>
                    <div class="woodly_post_title">
                        <h1 data-splitting><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    </div>

                    <div class="woodly_meta_post_on" data-splitting>
                        <?php woodly_posted_on(); ?>
                    </div>


                    <div class="tctz-post-excerpt" data-splitting>
                        <?php echo  wp_trim_words( get_the_excerpt(), 17, '...' ); ?>
                    </div>
                    <div class="woodly_continue_readmore_button" data-splitting>
                        <a href="<?php the_permalink(); ?>">Continue reading...</a>
                    </div>
                    
                    </div>

                </div>

            </div>
        </div>
</article>