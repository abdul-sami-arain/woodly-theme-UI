<?php
 global $product;
$product_id = get_the_ID();
 ?>


                <div class="unevent-grid-trending-product product-style-eight">
                    <div class="stl-seven-thumb-set">
                        
                   
                    <a href="<?php the_permalink();?>" class="woodly-hover-thumb-woo">
                                <?php
						/**
						 *
						 * @hooked woodly_woo_thumbnail - 11
						 */
						do_action( 'woodly_woocommerce_shop_loop_images' );
					?>
                                
                                </a>
                    <div class="onesale">
                        <?php pivoo_woo_sale_hook();?>
                    </div>
                    <?php woodly_out_of_stock();?>
                     <div class="gridSwatches">
                                  <?php 
                                  do_action('woodly_swatches_grid_action');
                                  ?>
                                 
                                </div>
                     </div>
                    <div class="sell-pro-price">
                    <?php echo maybe_unserialize($product->get_price_html()); ?>
                    </div>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <div class="unevent-grid-trending-icons">
                        <?php woodly_add_quick_view_card();?>
                        <?php woodly_wishlist_icon_in_product_grid(); ?>
                        <?php woodly_compare_icon_in_product_card();?>
                    </div>
                    <div class="unevent-trending-pro-content">
                        <div class="pro-review">
                            <?php woodly_get_star_rating('(' . $product->get_review_count() . ')'); ?>
                        </div>
                        <div class="unevent-grid-trending-cart-btn">
                            <?php 
                            if ( function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {
			woocommerce_template_loop_add_to_cart();
		}
                            ?>
                            
                        </div>
                    </div>
                </div>
                