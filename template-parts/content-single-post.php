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

    <div id="woodly__single_hero-banner">
        <div class="row woodly-hero-banner">
            <div class="woodly__single_hero_content ">
                  <div class="woodly-single-post-breadcumb text-center medianimated medianimatedFadeInUp medi-fadein-up-one">
                <?php woodly_breadcrumbs();?>
            </div>
              
                <div class="woodly_post_title global-animated-hidden global-animated-up">
                    <h2 data-splitting><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
                
                <ul class="woodly_single-meta-post">
                    
                

                <li class="woodly_meta_post_on global-animated-hidden global-animated-up">
                    <?php woodly_posted_on(); ?>
                </li>
                <span class="pivoo-rating-dot"><span class="woddly-woo-cirle-seps"></span></span>
                  <li class="woodly_catagories global-animated-hidden global-animated-up">
                    <?php if (get_the_category_list()) { ?>
                        <?php woodly_post_cat(); ?><?php } ?>
                </li>
                </ul>
                
            </div>
        </div>
    </div>


    <!-- Woodly Hero End -->

    <section class="woodly-single-post-content">
        <div class="container woodly-condensed-container">
            <div class="row gx-8">
                                 <?php if ( is_active_sidebar( 'woodly-sidebar' ) ) { ?>
                                    <div class=" col-lg-8 col-md-12 col-sm-12 single-main-content single-main-content-sidebar">
                                 <?php } else { ?>
                                <div class="col-12 col-md-12 single-main-content single-main-content-sidebar">
                                    <?php } ?>



                <div class="woodly__med-single-content-mds">
                        <?php if ( has_post_thumbnail() ) : ?>
	<div class="woodly-single-post-thumbnail global-animated-hidden global-animated-up">
	    <?php the_post_thumbnail(); ?>
	</div>
		

<?php endif; ?>

<div class="global-animated-hidden global-animated-up">
      <?php the_content(); ?>
</div>

<?php if($tag_list){?>
                  
                    <div class="woodly_tag_social_section">
                        <div class="woodly_social-left">
<?php
                                     if (class_exists( 'Woodly_Core_Public' )) { ?>
                            <ul class="woodly-single-social-button">
                                <li class="social-share facebook"><a ><i class=" isax icon-facebook"></i></a></li>
                                <li class="social-share twitter"><a ><i class="ticon-twitter"></i></a></li>
                                <li class="social-share linkedin"><a ><i class="ticon-linkedin"></i></a></li>
                            </ul>
<?php } ?>
                        </div>
                        <div class="woodly_tag_right">
                            <span class="tags-label"> </span> <?php echo maybe_unserialize($tag_list); ?>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>

<?php
                                     if (class_exists( 'Woodly_Core_Public' )) { ?>
                <div class="woodly_author_information_single global-animated-hidden global-animated-up">
                    <div class="woodly_author_content">
                        <?php
                        global $current_user, $post;

                        $authorid = get_the_author_meta('ID');
                        $address = get_user_meta($authorid, 'user_address', true);
                        $website = get_the_author_meta('user_url');
                        $facebook = get_user_meta($authorid, 'user_facebook', true);
                        $twitter = get_user_meta($authorid, 'user_twitter', true);
                        $instagram = get_user_meta($authorid, 'user_instagram', true);
                        $linkedin = get_user_meta($authorid, 'user_linkedin', true);
                        $usercover = get_user_meta($authorid, 'user_cover', true);
                        ?>
                        <!--                        <a href="--><?php //echo get_author_posts_url($author); ?><!--">-->
                        <?php //echo get_avatar($author, 300) ?><!--</a>-->
                        <?php echo get_avatar(get_the_author_meta('ID'), '100'); ?>
                        <p data-splitting class="woodly_author_name splitting"><?php echo esc_html(get_the_author_meta('display_name')); ?></p>
                        <p data-splitting class="woodly_author_decription splitting"><?php echo esc_html(get_the_author_meta('description')); ?></p>


                        <div class="woodly-at--scoial-items">
                                <?php if ($website) { ?>
                                    <a href="<?php echo esc_html($website); ?>" target="_blank"><i class="elementor-icons-manager__tab__item__icon isax icon-global"></i> </a>
                                <?php } ?>
                                <?php if ($facebook) { ?>
                                   <a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="elementor-icons-manager__tab__item__icon isax icon-facebook"></i></a>
                                <?php } ?>
                                <?php if ($twitter) { ?>
                                   <a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="elementor-icons-manager__tab__item__icon fab fa-twitter"></i></a>
                                <?php } ?>
                                <?php if ($instagram) { ?>
                                    <a href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="elementor-icons-manager__tab__item__icon isax icon-instagram1"></i></a>
                                <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                $previouspost = get_previous_post();
                $nextpost = get_next_post();
                ?>
                <?php
                if (!empty($nextpost)) {
                    $next_url = get_the_permalink($nextpost->ID);
                    $next_thumb = get_the_post_thumbnail_url($nextpost->ID, 'woodly-navigation-image');
                }
                if (!empty($previouspost)) {
                    $prev_url = get_the_permalink($previouspost->ID);
                    $prev_thumb = get_the_post_thumbnail_url($previouspost->ID, 'woodly-navigation-image');
                }
                ?>

                <div class="woodly-post-nav row justify-between items-center md:-mx-2 global-animated-hidden global-animated-up">
                    <?php if (!empty($previouspost)): ?>
                        <div class="woodly-post-nav-left woodly-post-nav-ds col-12 col-md-6">
                            <a href="<?php echo esc_url($prev_url); ?>" class="d-flex space-x-5">
                                <?php if ($prev_thumb) { ?>
                                    <div class="woodly-previous-recipe-image w-40">
                                        <img src="<?php echo esc_url($prev_thumb); ?>" alt="previous thumbnail">
                                    </div>
                                <?php } ?>
                                <div class="woodly-previous-recipe-text-meta w-2/3">
                                    <span class="woodly-nav-text-sib"> <i class="isax icon-arrow-left-11"></i><?php esc_html_e(' Previous Post', 'woodly'); ?></span>
                                    <h5 data-splitting class="splitting" ><?php echo get_the_title($previouspost); ?></h5>
                                </div>

                            </a>

                        </div>
                    <?php endif; ?>
                    <?php if (!empty($nextpost)): ?>
                        <div class="woodly-post-nav-right woodly-post-nav-ds col-12 col-md-6">
                            <a href="<?php echo esc_url($next_url); ?>" class="d-flex space-x-5">
                                <div class="woodly-next-recipe-text-meta w-2/3">
                                    <span class="woodly-nav-text-sib"><?php esc_html_e(' Next Post', 'woodly'); ?> <i class=" isax icon-arrow-right-11"></i> </span>
                                    <h5 data-splitting class="splitting"><?php echo get_the_title($nextpost); ?></h5>
                                </div>
                                <?php if ($next_thumb) { ?>
                                    <div class="woodly-next-recipe-image w-40">
                                        <img src="<?php echo esc_url($next_thumb); ?>" alt="next thumbnail">
                                    </div>
                                <?php } ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
                                     if (class_exists( 'Woodly_Core_Public' )) { ?>
                <div class="woodly_related_post_wrappe global-animated-hidden global-animated-up">
                    <div class="related_post_top_title">
                        <p data-splitting class="splitting">You Might Also Like</p>
                    </div>
                    <?php woodly_cats_related_post() ?>
                </div>
                <?php } ?>
                <div data-splitting class="woodly-single-post-comment-box global-animated-hidden global-animated-up">
                    <?php

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>

            </div>
                            <div class=" col-lg-4 col-md-12 col-sm-12 single-sidebar-content">
                                <?php if ( is_active_sidebar( 'woodly-sidebar' ) ) { ?>

                                    <?php dynamic_sidebar( 'woodly-sidebar' ); ?>

                                <?php } ?>
                            </div>
        </div>
        </div>
    </section>
</article>