<?php
if ( ! function_exists( 'edinburgh_comment' ) ) :
function edinburgh_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media' ); ?>>
		<div class="comment-body">
			<p class="pingback-header">
        <?php _e( 'Pingback', 'edinburgh' ); ?>
      </p>
      <div class="pingback-body">
      <p>
        <time datetime="<?php comment_time( 'c' ); ?>">
          <?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'edinburgh' ), get_comment_date(), get_comment_time() ); ?>
        </time>
        <?php edit_comment_link( __( '<span style="margin-left: 5px;" class="glyphicon glyphicon-edit"></span> Edit', 'edinburgh' ), '<span class="edit-link">', '</span>' ); ?>
      </p>
      <p>
        <?php comment_author_link(); ?>
      </p>
      </div>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body media">
			<a class="pull-left" href="#">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</a>

			<div class="media-body">
				<div class="media-body-wrap eb-comment-test-area">

					<p class="comment-meta">
            <?php printf( __( '%s. ', 'edinburgh' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'edinburgh' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php edit_comment_link( __( '<span style="margin-left: 5px;" class="glyphicon glyphicon-edit"></span> Edit', 'edinburgh' ), '<span class="edit-link">', '</span>' ); ?>
					</p>

					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'edinburgh' ); ?></p>
					<?php endif; ?>

					<div class="comment-content">
						<?php comment_text(); ?>
					</div>

					<footer class="comment-reply">
						<?php comment_reply_link( array_merge( $args, array(
						  'add_below' => 'div-comment',
              'depth' => $depth,
              'max_depth' => $args['max_depth'],
              'reply_text' => "<span class=\"glyphicon glyphicon-share-alt\"></span> Reply"
            ) ) ); ?>
					</footer>
				</div>
			</div>
		</article>
	<?php endif;
}
endif;


