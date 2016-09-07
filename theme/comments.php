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

	<?php
  $fields =  array(
    'author' =>
      '<div class="form-group">
            <label for="author" class="col-sm-2 control-label">' . __( 'Name', 'edinburgh' ) . '</label>' .
            ( $req ? '<span class="required">*</span>' : '' ) .
            '<div class="col-sm-10">
              <input type="text" class="form-control" id="author" name="author" value="'. esc_attr( $commenter['comment_author'] ) .'" ' . $aria_req . '/>
            </div>
       </div>'
    ,
    'email' =>
      '<div class="form-group">
            <label for="email" class="col-sm-2 control-label">' . __( 'E-Mail', 'edinburgh' ) . '</label>' .
            ( $req ? '<span class="required">*</span>' : '' ) .
            '<div class="col-sm-10">
              <input type="email" aria-describedby="email-notes" class="form-control" id="email" name="email" value="'. esc_attr( $commenter['comment_author_email'] ) .'" ' . $aria_req . '/>
            </div>
       </div>'
    ,
    'url' =>
      '<div class="form-group">
            <label for="url" class="col-sm-2 control-label">' . __( 'Website', 'edinburgh' ) . '</label>' .
            '<div class="col-sm-10">
              <input type="text" class="form-control" id="url" name="url" value="'. esc_attr( $commenter['comment_author_url'] ) .'"/>
            </div>
       </div>'
  );
  $comment_field =
    '<div class="form-group">
            <div class="col-sm-12">
            <textarea rows="10" class="form-control" id="comment" class="form-control" name="comment"
                      placeholder="Your comment..."
                      aria-required="true"></textarea>
            </div>
          </div>';
  $submit_button = '<div class="form-group"><div class="col-sm-offset-2 col-sm-10">
            <input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />
        </div></div>';
  comment_form( $args = array(
    'title_reply'       => __( 'Leave a Comment' , 'edinburgh'),
    'title_reply_to'    => __( 'Leave a Reply to %s', 'edinburgh' ),
    'cancel_reply_link' => __( 'Cancel Reply', 'edinburgh' ),
    'label_submit'      => __( 'Post Comment', 'edinburgh' ),
    'comment_field' =>  $comment_field,
    'comment_notes_after' => '',
    'class_submit' => 'submit btn btn-primary',
    'class_form' => 'form-horizontal comment-form',
    'fields' => $fields,
    'submit_button' => $submit_button
	));
	?>
</div>
