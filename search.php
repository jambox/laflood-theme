<?php get_header(); ?>
  <section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <?php if ( have_posts() ) : ?>
      <header class="page-header">
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
      </header>
      <?php include('archive.php') ?>
      <?php endif; ?>
    </main>
  </section>
<?php get_footer(); ?>