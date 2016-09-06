<nav role="navigation" id="nav-below" class="eb-paging-navigation">
  <h1 class="eb-screen-reader-text">Post navigation</h1>
  <div class="nav-previous"> <a href="#">← Older posts</a> </div>
  <div class="nav-next"><a href="#">Newer posts →</a></div>
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
