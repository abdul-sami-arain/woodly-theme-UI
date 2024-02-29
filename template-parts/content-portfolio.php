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

<div class="col-md-4 mb-4">
    <div class="portfolio-item">
        <div class="portfolio-img">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('woodly-blog-sthome-one'); ?>
            </a>
        </div>
        <div class="portfolio-content">
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <span class="dr-available"><?php echo get_post_meta(get_the_ID(), 'number_of_doctor_available', TRUE); ?></span>
        </div>
    </div>
</div>