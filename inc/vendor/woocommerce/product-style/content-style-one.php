<?php
 global $product;
$product_id = get_the_ID();
 ?>
 <div class="woodly__product-style woodly__product-style-one">
     <div class="woodly__product_img">
         <div class="woodly__product_img-add-to-cart">
             <?php woocommerce_template_loop_add_to_cart();?>
         </div>
         <a href="<?php the_permalink();?>" class="woodly-hover-thumb-woo">
             <?php
             /**
              *
              * @hooked woodly_woo_thumbnail - 11
              */
             do_action( 'woodly_woocommerce_shop_loop_images' );
             ?>
            <div class="woodly__product_img-quick-view-and-wishlist">
                <?php woodly_add_quick_view_card();?>
                <?php woodly_wishlist_icon_in_product_grid(); ?>
            </div>
         </a>
     </div>
     <div class="woodly__product_content">
         <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
         <div class="sell-pro-price">
             <?php echo maybe_unserialize($product->get_price_html()); ?>
         </div>
     </div>
 </div>
