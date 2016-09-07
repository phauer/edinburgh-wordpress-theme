<?php
if (function_exists( 'add_theme_support')) {
  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');
  add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
}

add_image_size( 'mythumbnails', 150, 9999 ); //300 pixels wide (and unlimited height)

// increase excerpt length in feed
function custom_excerpt_length( $length ) {
  return 70;//default: 55
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999);

function eb_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Before Comments Widget Area', 'edinburgh' ),
    'id'            => 'before-comments-widget-area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'After Comments Widget Area', 'edinburgh' ),
    'id'            => 'after-comments-widget-area',
    'before_widget' => '<aside id="%1$s" class="col-md-4 widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'eb_widgets_init' );


require get_template_directory() . '/includes/template-tags.php';
