<div class="woodly-product-container-bx woodly-single-layout-2">
	<div class="container">
<?php woocommerce_output_all_notices();?>

<div class="woodly-single-layout-2-topbox">
<div class="row gx-8 align-center">
    <div class="pivoo-single-thumbs col-12 col-md-6">
        <div class="position-relative">
   
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
    	woocommerce_show_product_images();
	?>
	</div>
	<div class="clearfix"></div>
    </div>
	<div class="col-12 col-md-6 woodly-side-meta-main woodly-side-meta-style2-main">
	    <div class="theiaStickySidebar">
	    <div class="woodly-side-meta">
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
		
	</div>
</div>
</div>

    </div>
    
    
    <div class="clearfix"></div>
    
<div class="woodly-style-two-items">
    <?php  woocommerce_output_product_data_tabs();?>
</div>
<div class="clearfix"></div>
<?php  woocommerce_upsell_display();?>
<?php  woocommerce_output_related_products();?>
    </div>