<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="eb-paging-navigation">
  <h1 class="eb-screen-reader-text"><?php _e( 'Post navigation', 'jokkmokk' ); ?></h1>
  <?php if ( is_single() ) : // navigation links for single posts ?>
    <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'jokkmokk' ) . '</span> %title' ); ?>
    <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'jokkmokk' ) . '</span>' ); ?>
  <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
    <?php if ( get_next_posts_link() ) : ?>
      <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'jokkmokk' ) ); ?></div>
    <?php endif; ?>
    <?php if ( get_previous_posts_link() ) : ?>
      <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'jokkmokk' ) ); ?></div>
    <?php endif; ?>
  <?php endif; ?>
</nav>

<footer class="eb-footer">
  <?php
  dynamic_sidebar( 'widget-area' );
  ?>
  <div class="row eb-imprint">
    <p><a href="/legal/">Imprint, Contribution, Privacy Policy</a></p>
  </div>
</footer>
</div>

<script src="<?php bloginfo('template_url'); ?>/includes/jquery-3.1.0.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/includes/bootstrap/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>
<?php include_once("cookie-consent-plugin.php") ?>

</body>
</html>
