<?php get_header(); ?>
<div class="col-md-12">
  <header class="page-header">
  <?php if ( have_posts() ) : ?>
    <h1 class="page-title"><?php printf( __( 'Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
    <div class="row">
      <?php get_template_part('partials/search-list'); ?>
    </div>
  <?php else : ?>
    <h3><?php printf( __( "Sorry, we couldn't find any results for '%s'", 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h3>
    <p class="intro">Please try searching again or visit the <a href="<?php echo site_url() ?>">homepage</a> to browse through our services.</p>
  <?php endif; ?>
  </header>
</div>
<?php get_footer(); ?>