<?php
/**
 * Template Name: About Style Page
 */
?><?php get_header(); ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="page-wrap row-fluid">
      <div class="about-page--content col-md-7">
        <?php the_content(); ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  <?php endwhile; ?>

<?php get_footer(); ?>