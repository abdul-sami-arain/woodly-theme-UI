<?php
global $product;
global $post;
$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

?>
<div class="woodly_home_four_product-content">
    <div class="card h-100">
        <div class="woodly__home_four-carousel-img woodly__product__style-three-product-img">
             <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" class="card-img-top" alt="<?php echo esc_html($image_alt); ?>"></a>
            
            <div class="woodly__product-additional-hover-info-top">
                 <?php

                if (class_exists('YITH_WCWL')) {
                    ?>

                    <?php
                    $wishNonce = wp_create_nonce("add_to_wishlist");
                    $like_link = admin_url('admin-ajax.php?nonce=' . $wishNonce);
                    $status = '';
                    $like_classes = 'text-body-default2 text-light-opacity-7';
                    global $yith_wcwl;
                    if (empty($yith_wcwl->details['user_id'])) {
                        $yith_wcwl->details['user_id'] = '';
                    }
                    if ($yith_wcwl->is_product_in_wishlist($post->ID)) {
                        $status = 'remove-item';
                        $like_classes = 'text-red';
                    }
                    ?>
                    <a href="#" data-wishlist-link="<?php echo esc_url($like_link); ?>" data-id="<?php echo esc_attr($post->ID); ?>" class="woodly-add-to-wishlist <?php echo esc_attr($status); ?>"><span class="btn-icon <?php echo esc_attr($like_classes); ?> isax icon-heart1 align-self-center"></span></a>
                    <?php
                }
                ?>
            </div>
            <div class="woodly__product-additional-hover-info">
                <?php //woodly_wishlist_icon_in_product_grid(); ?>
               
                <?php woodly_add_quick_view_card(); ?>
                <div class="woodly-stl04_hvr_cart">
                     <?php woocommerce_template_loop_add_to_cart(); ?>
                </div>
                
            </div>
        </div>
     
        <div class="woodly__home_four-carousel-content align-items-start">
                  <div class="futureDate">
            <?php
            if ( is_shop() || is_product_category() || is_product() ) {

                echo '<div class="tagBox" style="background-color: #f5a831; padding: 4px; width:120px; display: flex; align-items: center; justify-content: center; margin-bottom: 4px;">
                          <div class="custom-line" style="font-family: Poppins, sans-serif; font-size: 13px; color: #ffffff; font-weight: bold;">Tax Refund Sale</div>
                      </div>';
        
                // Add media query for larger screens
                echo '<style>
                          @media screen and (max-width: 600px) {
                              .custom-line {
                                  font-size: 10px !important;
                              }
                              .tagBox {
                                  padding: 5px !important;
                                  width:100px !important;
                              }
                          }
                      </style>';
            }
            ?>
        </div>

         <div class="gridSwatches2">
           <span style="color: ; font-size: 12px; font-weight: 400; padding-top: 10px; padding-bottom: 10px; ">SKU: <?php echo $product->get_sku(); ?></span>
        </div>
       
            <p class="woodly__home_four-carousel-title woodly__product__style-three-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </p>
            <div class="woodly__home_four-carousel-price">
                <?php echo maybe_unserialize($product->get_price_html()); ?>
            </div>
            
             <div class="gridSwatches">
            <?php
            do_action('emerce_swatches_grid_action');
            ?>

        </div>
  
         <div class="futureDate">
             <?php
                if ( is_shop() || is_product_category() || is_product() ) {
                    // Calculate the future date (3 days from today)
                    $future_date = date_i18n( 'M j, Y', strtotime( '+3 days' ) );
            
            
                    // Output the "Get it by" text, the future date, and the icon with styling
                    echo '<p class="custom-archive-widget-content" style="font-family: Poppins; font-weight: 500; padding-top: 20px; color: #e29505; font-size: 14px;">Get it by ' . $future_date . '</a></p>';
                }
                ?>
        </div>
        </div>

    </div>
</div>
