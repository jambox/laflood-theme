<?php

if( have_posts() ) : ?>
  <ul class="org-list col-md-12">
    <?php    
    while ( have_posts() ) : the_post();
      get_template_part('partials/org-list-item');
    endwhile;?>
  <?php endif; ?>
  </ul>
<?php the_posts_pagination([
  'prev_text' => '<i class="fa fa-chevron-left"></i> Previous',
  'next_text' => 'Next <i class="fa fa-chevron-right"></i>'
])
?>