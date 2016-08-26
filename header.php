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
<?php
  // Add classes to body
  $body_classes = [];

  $visitor_type = visitor_type();

  $body_classes[] = $visitor_type;

?>
<body <?php body_class($body_classes); ?>>
  <div class="app-wrap">
    <header class="flex">
      <nav class="header nav flex-box">
        <div class="container">
          <div class="site-title--wrap">
            <div class="site-title">
            <?php echo is_front_page() ? '<h1>' : ''; ?>
              <a class="site-title--link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo str_replace( ' ', '<br>', get_bloginfo( 'name' ) ) ?></a>
            <?php echo is_front_page() ? '</h1>' : ''; ?>
              <hr>
            </div>
            <p class="site-tagline"><?php bloginfo( 'description' ) ?></p>
          </div>
        </div>
      </nav>
    </header>

   <div class="content-wrap container">
      <main class="content row main" role="main">

      <?php
      if ( !is_front_page() && function_exists('breadcrumb_trail') ) {
           breadcrumb_trail();
      }
      ?>
  
