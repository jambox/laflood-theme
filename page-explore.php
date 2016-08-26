<?php get_header(); ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="page-wrap row-fluid">
      <div class="explore-page--content col-md-8 col-md-offset-2">
        <h1>Other Services</h1>
        <?php $oppportunities_prompt = is_client_page() ? "find help" : "volunteer"; ?>
        <?php $action_prompt = is_client_page() ? "explore" : "consider giving"; ?>
        <p class="intro">A directory of other oppportunities to <?php echo $oppportunities_prompt; ?> will be available soon. In the meantime, please <?php echo $action_prompt; ?> in one of the following areas.</p>
        <hr>
        <ul class="main-cats-list"><?php echo lfr_main_cats(); ?></ul>
      </div>
    </div>
  <?php endwhile; ?>

<?php get_footer(); ?>