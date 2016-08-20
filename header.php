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
      <div class="header-msg-wrap flex-box">If this is an emergency please call 911 – <a class="btn btn-default" href="tel:911">Click to call 911</a></div>
    </header>
    <div class="content-wrap container">
      <main class="content row main" role="main">
      <?php
      if ( !is_front_page() && function_exists('yoast_breadcrumb') ) {
           yoast_breadcrumb('<p id="breadcrumbs">','</p>');
      }

      $title = get_queried_object()->name;
      ?>
      <?php if ( !is_front_page() ) {?>
        <h1 class="page-title"><?php echo $title; ?></h1>
      <?php } ?>
