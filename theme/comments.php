<?php
if ( post_password_required() )
	return;
?>
	<div id="comments" class="eb-comments-area">

	<?php if ( have_comments() ) : ?>
		<header class="page-header">
			<h2 class="comments-title">
				<?php
					printf( _nx( 'One Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'edinburgh' ),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>
			</h2>
		</header>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h5 class="screen-reader-text"><?php _e( 'Comment navigation', 'edinburgh' ); ?></h5>
			<ul class="pager">
				<li class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'edinburgh' ) ); ?></li>
				<li class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'edinburgh' ) ); ?></li>
			</ul>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list media-list">
			<?php
				wp_list_comments( array( 'callback' => 'edinburgh_comment', 'avatar_size' => 50 ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'edinburgh' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'edinburgh' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'edinburgh' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'edinburgh' ); ?></p>
	<?php endif; ?>

	<?php comment_form( $args = array(
			  'id_form'           => 'commentform',
			  'id_submit'         => 'commentsubmit',
			  'title_reply'       => __( 'Leave a Reply' , 'edinburgh'),
			  'title_reply_to'    => __( 'Leave a Reply to %s', 'edinburgh' ),
			  'cancel_reply_link' => __( 'Cancel Reply', 'edinburgh' ),
			  'label_submit'      => __( 'Post Comment', 'edinburgh' ),
			  'comment_field' =>  '<p><textarea placeholder="Type your comment here..." id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
			  'comment_notes_after' => ''
	));
	?>
</div>
