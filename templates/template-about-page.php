<?php
/**
 * Template Name: About Page
 */
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
  <div class="page-wrap row-fluid">
    <div class="about-page--content col-md-8">
      <?php the_content() ?>
    </div>
    <div class="about-page--sidebar col-md-4">
      <p>Please do not contact us directly about getting assistance or volunteering. If you have a general question for our team, email <a href="mailto:info@lafloodrecovery.org">info@lafloodrecovery.org</a>.</p>
      <hr>
      <p>See something missing from our lists? Please help us expand this directory by <a href="<?php permalink_by_title('Add An Organization'); ?>">sharing a resource here</a>.</p>
      <hr>
      <p><a href="<?php permalink_by_title('About'); ?>">Learn more</a> about the people behind LA Flood Recovery.</p>
      <hr>
    </div>

  </div>
<?php endwhile; ?>

<?php get_footer(); ?>