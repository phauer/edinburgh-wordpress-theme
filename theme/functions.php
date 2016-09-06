<?php
remove_filter ('the_content', 'wpautop'); //remove <p> around "Continue Reading..."

function eb_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Custom Widget Area', 'edinburgh' ),
    'id'            => 'widget-area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'eb_widgets_init' );
?>
