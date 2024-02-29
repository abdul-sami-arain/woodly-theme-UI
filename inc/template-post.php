<?php
if ( ! function_exists( 'woodly_post_style_list_sidebar' ) ) {
	function woodly_post_style_list_sidebar() { ?>
		<li class="sidebar-post-list-item row items-center">
			<div class="list-post-image col-12 col-md-4">
              <div class="woodly_post_thumbnail_inner">
				<a href="<?php the_permalink();?>"> <?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('woodly-blog-side-square');
					} ?></a>
              </div>
			</div>
			<div class="list-post-meta col-12 col-md-8 ">
                <?php if (get_the_category_list()) { ?>
                    <?php woodly_post_cat(); ?><?php } ?>
				<h4 ><a  href="<?php the_permalink();?>"><?php echo woodly_title_trim($maxchar= 38); ?></a></h4>
				<div class="sidebar-post-meta ">
                    <?php woodly_posted_on(); ?>
				</div>

			</div>
		</li>
	<?php } }