<div class="col-md-12">
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