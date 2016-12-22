<?php
if (function_exists( 'add_theme_support')) {
  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');
  add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
}

//mind, that svgs are handled differently. set the size in _content.scss in the rule with "[src$=".svg"]"
function add_custom_sizes() {
  add_image_size($name = 'eb-thumb', $width = 200, $height = 200, $crop = false);
}
add_action('after_setup_theme','add_custom_sizes');

// increase excerpt length in feed
function custom_excerpt_length( $length ) {
  return 70;//default: 55
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999);

//when I insert a image in the backend, generate markdown instead of html.
//I use the caption for both the alt text and the caption below the image.
function markdown_insert_image( $html, $id, $caption, $title, $align, $url, $size, $alt){
  list( $img_src, $width, $height ) = wp_get_attachment_image_src( $id, $size );
  return "![{$caption}]({$img_src})\n*{$caption}*";
}
add_filter( 'image_send_to_editor', 'markdown_insert_image', 10, 8);

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

add_action('init', 'head_cleanup');
function head_cleanup() {
  remove_action( 'wp_head', 'wp_generator' );// WP version
  if (!is_admin()) {
    wp_deregister_script('jquery');                  // De-Register jQuery
    wp_register_script('jquery', '', '', '', true);  // Register as 'empty', because we manually insert our script in header.php
  }
}

// remove WP version from RSS
add_filter('the_generator', 'no_wordpress_version_in_rss');
function no_wordpress_version_in_rss() { return ''; }


require get_template_directory() . '/comments-entries.php';
