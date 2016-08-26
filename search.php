<?php get_header(); ?>
    <?php if ( have_posts() ) : ?>
      <div class="col-md-8 col-md-offset-2">
        <header class="page-header">
          <h1 class="page-title"><?php printf( __( 'Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
        </header>
      </div>
      <?php include('archive.php') ?>
    <?php else : ?>
    <div>Sorry we couldn't find any results for your search</div>
  <?php endif; ?>
<?php get_footer(); ?>