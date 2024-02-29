<div class="woodly-single-blog">
                       <?php if(has_post_thumbnail()){?>
                          <a href="<?php the_permalink(); ?>" class="woodly-post-thumbnail">
                             <?php the_post_thumbnail('woodly-default-post-st-one'); ?>
                          </a>
                          <?php } ?>
                          <div class="woodly-blog-meta">
                            <span class="meta-name"> <i class="zil zi-tag"></i>
                             <?php echo woodly_post_cat(); ?></span>
                            <span class="meta-date"> <i class="zil zi-clock"></i>
                             <?php woodly_posted_on(); ?></span>
                          </div>
                          
                             <h2 class="woodly-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                          
                          <a href="<?php the_permalink(); ?>" class="readmore-btn"><?php echo esc_html( 'Read More', 'woodly' )?></a>
                    </div>