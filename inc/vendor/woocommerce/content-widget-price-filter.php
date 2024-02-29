<?php
/**
 * The template for displaying product price filter widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-price-filter.php
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.1
 */

defined( 'ABSPATH' ) || exit;

?>
<?php do_action( 'woocommerce_widget_price_filter_start', $args ); ?>

<form method="get" action="<?php echo esc_url( $form_action ); ?>">
	<div class="price_slider_wrapper">
	    
		<div class="price_slider" style="display:none;"></div>
		
		<div class="price_slider_amount" data-step="<?php echo esc_attr( $step ); ?>">
		    <div class="price_label" style="display:flex;">
				<?php echo esc_html__( '', 'woodly' ); ?> <span  class="from" style="  display: flex;align-items:center;justify-content:center;width: 105px;height: 55px;background-color: white;border-radius: 8px;border: 1px solid red;"></span>  <span  class="to" style=" display: flex;align-items:center;justify-content:center; width: 105px;height: 55px;background-color: white;border-radius: 8px;border: 1px solid red;"></span>
			</div>	
			<input type="text" id="min_price" name="min_price" value="<?php echo esc_attr( $current_min_price ); ?>" data-min="<?php echo esc_attr( $min_price ); ?>" placeholder="<?php echo esc_attr__( 'Min price', 'woodly' ); ?>" />
			<input type="text" id="max_price" name="max_price" value="<?php echo esc_attr( $current_max_price ); ?>" data-max="<?php echo esc_attr( $max_price ); ?>" placeholder="<?php echo esc_attr__( 'Max price', 'woodly' ); ?>" />
			<?php /* translators: Filter: verb "to filter" */ ?>
			
			<button type="submit" class="button"><?php echo esc_html__( 'Filter', 'woodly' ); ?></button>
		
			<?php echo wc_query_string_form_fields( null, array( 'min_price', 'max_price', 'paged' ), '', true ); ?>
			<div class="clear"></div>
		    <div onclick="logPrices()">abc</div>
		</div>
	</div>
</form>
<script>
  // Function to log the price values to the console
  function logPrices() {
    var minPrice = document.getElementById('min_price').value;
    var maxPrice = document.getElementById('max_price').value;
    console.log('Min price:', minPrice);
    console.log('Max price:', maxPrice);
  }

  // Add event listener to the inputs
  document.getElementById('min_price').addEventListener('change', logPrices);
  document.getElementById('max_price').addEventListener('change', logPrices);
</script>
<script>
    function name() {
        console.log("name");
    }
</script>
<script>
 
 document.addEventListener('DOMContentLoaded', function() {
  const slider = document.querySelector('.price_slider');
  
  slider.addEventListener('change', function() {
    this.closest('form').submit();
  });
});

</script>

<?php do_action( 'woocommerce_widget_price_filter_end', $args ); ?>
