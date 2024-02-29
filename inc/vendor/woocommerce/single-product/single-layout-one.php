<?php

$productglobalmeta = get_post_meta ( get_the_ID(), 'woo_Gallery_option_global', true );

if ($productglobalmeta == true ){
    $gallerytoption = get_post_meta ( get_the_ID(), 'meta_woo_thumb_style', true );
    
} else {
$gallerytoption = cs_get_option('single_product_gallery_main');
}

$cs_bcrumb_style = cs_get_option('single_woo_breadcrumb_style');
$video_url = get_post_meta( get_the_ID(), 'video_woo_single', true );

 $innercontainerclass="container";
$outercontainerclass="w-100";

if ($cs_bcrumb_style== true){
    $innercontainerclass="w-100";
     $outercontainerclass="container";
}
?>
<div class="<?php echo esc_html($outercontainerclass);?>">
<div class="woodly-product-container-bx-style-one">
	<div class="<?php echo esc_html($innercontainerclass);?>">
<?php woocommerce_output_all_notices();?>
<div class="row gx-6 flex-column-reverse  flex-md-row">
  
	<div class="col-12 col-md-6">
	    <div class="woodly-side-meta  medianimated medianimatedFadeInUp medi-fadein-up-one">

            <div class="woodly-single-profuct-breadcumb medianimated medianimatedFadeInUp medi-fadein-up-one">
                <?php woocommerce_breadcrumb();?>
            </div>

		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		if ( function_exists( 'woodly_single_social' ) ) {
		 woodly_single_social();
		}
		?>
		</div>
	</div>
	
	  <div class="pivoo-single-thumbs col-12 col-md-6 global-animated-hidden global-animated-up woodly-single-gallery-op-<?php echo esc_html($gallerytoption);?>">
        <?php if($video_url){?>
   <a href="<?php echo esc_url($video_url);?>" class="woodly-single-video-play-btn" data-lity><i class="isax icon-play"></i> <?php esc_html_e('Play Video','woodly');?></a>
   <?php } ?>
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
    	woocommerce_show_product_images();
	?>
	<div class="clearfix"></div>
    </div>
</div>


    </div>
    </div>
    </div>
    
    <div class="woodly-style-one-desc">
        <div class="container">
            	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
        </div>
    </div>
    
    
    