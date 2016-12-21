<?php if ( ! is_single() ) : ?>
  <nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="eb-navigation eb-navigation-paging">
    <h1 class="eb-screen-reader-text"><?php _e( 'Post navigation', 'edinburgh' ); ?></h1>
    <?php if ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : ?>
      <?php if ( get_next_posts_link() ) : ?>
        <div class="nav-previous"><?php next_posts_link( __( '<span class="glyphicon glyphicon-menu-left eb-small-icon" aria-hidden="true"></span> Older posts', 'edinburgh' ) ); ?></div>
      <?php endif; ?>
      <?php if ( get_previous_posts_link() ) : ?>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="glyphicon glyphicon-menu-right eb-small-icon" aria-hidden="true"></span>', 'edinburgh' ) ); ?></div>
      <?php endif; ?>
    <?php endif; ?>
  </nav>
<?php endif; ?>

<?php
//supposed to be author widget
if ( is_active_sidebar( 'before-comments-widget-area' ) ) {
  dynamic_sidebar( 'before-comments-widget-area' );
}
?>

<?php
if ( comments_open() || '0' != get_comments_number() ) {
  comments_template();
}
?>

<?php if ( is_single() ) : ?>
  <nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="eb-navigation eb-navigation-posts">
    <h1 class="eb-screen-reader-text"><?php _e( 'Post navigation', 'edinburgh' ); ?></h1>
      <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="glyphicon glyphicon-menu-left eb-small-icon" aria-hidden="true"></span> %title' ); ?>
      <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="glyphicon glyphicon-menu-right eb-small-icon" aria-hidden="true"></span>' ); ?>
  </nav>
<?php endif; ?>

<!--supposed to be other widgets like recent posts, recent comments, categories-->
<?php if ( is_active_sidebar( 'after-comments-widget-area' ) ) : ?>
  <div class="row">
    <?php dynamic_sidebar( 'after-comments-widget-area' ); ?>
  </div>
 <?php endif; ?>

<footer class="eb-footer">
  <div class="row eb-imprint">
    <p><a href="/legal/">Imprint, Contribution, Privacy Policy</a></p>
  </div>
</footer>
</div>

<script src="<?php bloginfo('template_url'); ?>/final/js/mergedScripts.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<?php wp_footer(); ?>
<?php include_once("cookie-consent-plugin.php") ?>

</body>
</html>
