<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
  <link href="<?php bloginfo('template_url'); ?>/includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/edinburgh.min.css">
</head>
<body <?php body_class(); ?>>

<div class="container">
  <header class="eb-header">
    <div class="row">
      <div class="col-md-8 col-sm-7 col-xs-9">
        <h1 class="text-muted eb-title">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
          </a>
        </h1>
        <p class="text-muted eb-subtitle"><?php bloginfo( 'description' ); ?></p>
      </div>
      <div class="col-md-4 col-sm-5 col-xs-3">
        <nav class="navbar navbar-default eb-navbar-default" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <?php wp_nav_menu( array(
                  'container' => false, //remove div
                  'items_wrap' => '%3$s' //remove ul
                )); ?>
                <?php get_search_form(); ?>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
