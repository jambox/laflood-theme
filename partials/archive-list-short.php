<div class="col-md-12">
  <p class="top-five-header">The <strong>TOP 5</strong> ways to give in this category are listed below:</p>
  <ul class="resource-list">
  <?php if( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
    <h2><a href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h2>
    <?php the_content(); ?>
<?php endwhile;
    endif; ?>
  </ul> 
</div>