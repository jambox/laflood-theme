<div class="col-md-12">
  <h4 class="resource-list--title">Ways to contribute <?php echo get_queried_object()->name; ?> to the Louisiana relief effort.</h4>
  <ul class="resource-list">
    <?php
    if( have_posts() ) :
      while ( have_posts() ) : the_post();
         get_template_part('partials/resource', 'card'); 
      endwhile;
    endif;
    ?>
  </ul> 
</div>