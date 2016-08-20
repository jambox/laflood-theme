<?php get_header(); ?>

  <div class="front-page-wrap row-fluid">
    <div class="intro--wrap col-md-8 col-md-offset-2">
      <div class="intro"><?php the_content(); ?></div>
    </div>

    <div class="row-fluid">
      <?php get_template_part('partials/resource-list'); ?>
    </div>
  </div>


<?php get_footer(); ?>