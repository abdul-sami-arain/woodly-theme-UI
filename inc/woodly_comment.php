<?php
if ( ! function_exists( 'woodly_comments' ) ) :
    function woodly_comments( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;

        if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
            <div class="comment-body">
                <?php esc_html_e( 'Pingback:', 'woodly' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_attr__( 'Edit', 'woodly' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
            </li>
        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>

            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

                <div class="comment-meta">
                    <div class="comment-author vcard">
                        <?php echo get_avatar( $comment, 140 ); ?>
                        <div class="comment-title-meta">

                            <div class="comment-metadata">
                                <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                    <time datetime="<?php comment_time( 'c' ); ?>">
                                        <?php printf( esc_html__( '%1$s at %2$s', 'woodly' ), get_comment_date(), get_comment_time() ); ?>
                                    </time>
                                </a>
                            </div><!-- .comment-metadata -->

                            <?php printf( esc_html__( '%s', 'woodly' ), sprintf( '<h3 class="comment-author-title">%s</h3>', get_comment_author_link() ) ); ?>

                           



                        </div>

                    </div><!-- .comment-author-avatar -->
                    
                    
                     <div class="comment-content">

                                <?php if ( '0' == $comment->comment_approved ) : ?>
                                    <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'woodly' ); ?></p>
                                <?php endif; ?>



                                <div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->

                                <?php
                                comment_reply_link( array_merge( $args, array(
                                    'add_below' => 'div-comment',
                                    'depth'     => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before'    => '<span class="comment-reply">',
                                    'after'     => '</span>',
                                ) ) );
                                ?>

                                <?php edit_comment_link( esc_html__( 'Edit', 'woodly' ) ); ?>

                                <div class="comment-separator"></div>

                            </div><!-- .comment-content -->


                </div>
                
                



            </article><!-- .comment-body -->
        </li>
        <?php
        endif;
    }
endif; // ends check for woodly_comments()