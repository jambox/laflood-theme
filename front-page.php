<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
  <div class="front-page-wrap row-fluid">
    <div class="intro--wrap col-md-8 col-md-offset-2">
      <div class="intro">
        <h2>Thank you for your effort towards Louisiana's unified recovery.</h2>
        <p>This is a living directory of ways you can help the people and families that have been affected by the August 2016 flood disaster.</p>

        <h3>All types of contributions are helpful, but <a href="<?php echo get_category_link_by_slug('funds'); ?>">Funding</a> will provide the biggest impact for the affected areas.</h3>
        <p>If you'd like to help, choose from one of the following options:</p>
      </div>
    </div>

    <div class="row-fluid">
      <?php get_template_part('partials/resource-category-list'); ?>
    </div>

    <div class="row-fluid">
      <?php get_template_part('partials/search-bar'); ?>
    </div>

  </div>
<?php endwhile; ?>

<?php get_footer(); ?>