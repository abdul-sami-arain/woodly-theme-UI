 <?php
 global $product;
$product_id = get_the_ID();

 ?>
<div class="trending-products-st1">
                            <div class="trending-product-st1-img">
                                <a href="<?php the_permalink();?>" class="woodly-hover-thumb-woo"> 
                                <?php
						/**
						 *
						 * @hooked woodly_woo_thumbnail - 11
						 */
						do_action( 'woodly_woocommerce_shop_loop_images' );
					?>
                                
                                </a>
                            </div>
                            <div class="onesale">
                                <?php pivoo_woo_sale_hook();?>
                            </div>
                            <?php woodly_out_of_stock();?>
                            <div class="producticons-st3">
                               <?php woodly_product_cart_card();?>
                               <?php woodly_add_quick_view_card();?>
                                <?php woodly_wishlist_icon_in_product_grid(); ?>
                                 <?php woodly_compare_icon_in_product_card();?>
                            </div>
                            <div class="product-content">

                                <div class="gridSwatches">
                                  <?php 
                                  do_action('woodly_swatches_grid_action');
                                  ?>
                                 
                                </div>

                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="sell-pro-price">
                                    <?php echo maybe_unserialize($product->get_price_html()); ?>
                                </div>
                            </div>
                        </div>
                        
    