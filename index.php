<?php get_header(); ?>

  <div class="row-fluid main-page-wrap">
    <section class="main-page-section col-md-6 col-sm-6 col-xs-12">
      <h2><a href="<?php echo get_category_link_by_slug('what-you-need') ; ?>" class="main-page-link btn btn-default btn-lg">I need help</a></h2>
    </section>
    <section class="main-page-section col-md-6 col-sm-6 col-xs-12">
      <h2><a href="<?php echo get_category_link_by_slug('what-you-have') ; ?>" class="main-page-link btn btn-default btn-lg">I want to help</a></h2>
    </section>
  </div>


<?php get_footer(); ?>