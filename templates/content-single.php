  
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="col-md-8">
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="single-entry-content col-md-8">
      <?php the_content(); ?>
    </div>
    <div class="single-sidebar col-md-3"></div>
    <div class="single-footer col-md-8"></div>
  </article>
<?php endwhile; ?>
