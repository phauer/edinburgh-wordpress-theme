<?php
if (function_exists( 'add_theme_support')) {
  //Add default posts and comments RSS feed links to head
  add_theme_support('automatic-feed-links');
  //Enable support for Post Thumbnails on posts and pages
  //@link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
  add_theme_support('post-thumbnails');
  add_image_size( 'mythumbnails', 150, 9999 ); //300 pixels wide (and unlimited height)
  //Enable support for Post Formats
  add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
  //Setup the WordPress core custom background feature.
  add_theme_support('custom-background', apply_filters('jokkmokk_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  )));
}
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
