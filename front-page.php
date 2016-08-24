<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	  <section class="page-content--wrap">
	    <div class="page-content"><?php the_content(); ?></div>
	  </section>

<?php endwhile; ?>

<?php get_footer(); ?>
