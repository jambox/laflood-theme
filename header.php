<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

  <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
  <!-- <link rel="icon" href="<?php bloginfo('template_url'); ?>/assets/images/favicon.png" type="image/x-icon"> -->

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="app-wrap">
    <header class="flex">
      <nav class="header nav flex-box">
        <a class="site-title--link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><h1 class="site-title"><?php bloginfo( 'name' ) ?></h1></a>
        <p class="site-tagline">How to contribute to the Louisiana flood relief effort</p>
      </nav>
    </header>

   <div class="content-wrap container">
      <main class="content row main" role="main">
      <?php
      if ( !is_front_page() && function_exists('yoast_breadcrumb') ) {
           yoast_breadcrumb('<p id="breadcrumbs">','</p>');
      }

      $title = get_queried_object()->name;
      ?>
      <?php
      if ( !is_front_page() ) {
        if( is_category() ): 
          $title = "How to Provide $title"; 
        endif; ?>
        <h1 class="page-title"><?php echo $title; ?></h1>
      <?php } ?>
