<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$csdmeta = get_post_meta( get_the_ID(), 'single_style_m', true );

if ($csdmeta== true){
    $stylesingle = get_post_meta( get_the_ID(), 'single_product_style', true );
} else {
$stylesingle = cs_get_option('single_product_style_main');
}
?>
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="pivoo-single-product-box">
    <div class="woodly-product-container">

    
<?php

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}


?>


	
	<?php 
	if ($stylesingle=="style-two"){
	
	 wc_get_template_part( 'single-product/single-layout', 'two' );
	 
	} elseif ($stylesingle=="style-three"){
	
	 wc_get_template_part( 'single-product/single-layout', 'three' );
	 
	} else {
	    
	     wc_get_template_part( 'single-product/single-layout', 'one' );
	}
      ?>

</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
</div>
</div>
<div class="clearfix"></div>
