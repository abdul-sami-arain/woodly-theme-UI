<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Woodly
 */
$backtotop = cs_get_option('back-top-top-enable');
?>
 <?php woodly_footer_builder();?>

<?php if ($backtotop == "enabled") { ?>
	

	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
  

<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
