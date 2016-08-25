<div class="col-md-12">
  <h4 class="top-five-header">The <strong>TOP 5</strong> ways to give in this category are listed below:</h4>
  <ul class="resource-list">
  <?php if( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
<?php endwhile;
    endif; ?>
  </ul> 
</div>