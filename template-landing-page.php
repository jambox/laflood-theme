<?php
/**
 * Template Name: Landing Page
 */
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
  <div class="front-page-wrap row-fluid">
    <div class="intro--wrap col-md-8 col-md-offset-2">
      <div class="intro"><?php the_content() ?></div>
    </div>

    <div class="row-fluid">
      <?php get_template_part('partials/category-list'); ?>
    </div>

    <div class="row-fluid">
      <?php get_template_part('partials/search-bar'); ?>
    </div>

  </div>
<?php endwhile; ?>

<?php get_footer(); ?>