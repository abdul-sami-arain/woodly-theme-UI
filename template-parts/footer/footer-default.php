<?php
$copyright = cs_get_option('copyright_text');
?>
<section class="woodly-copyright">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
				<div class="site-info">
				    <?php echo maybe_unserialize($copyright);?>
				</div><!-- .site-info -->
		
		</div>
	</div>
</div>
</section>