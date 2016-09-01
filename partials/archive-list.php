<?php
$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id; 

if( have_posts() ) :

if ( archive_layout_type($queried_object_id) === 'short' && $queried_object->slug !== 'recovery-resources' && !is_client_page() ) : ?>
  <h3 class="top-orgs-header">Some highly recommended ways to give in this category are listed below:</h3>
<?php endif; ?>
<ul class="org-list">
  <?php    
  while ( have_posts() ) : the_post();
    get_template_part('partials/archive-list-item');
  endwhile;?>
<?php endif; ?>
</ul>
<?php the_posts_pagination([
  'prev_text' => '<i class="fa fa-chevron-left"></i> Previous',
  'next_text' => 'Next <i class="fa fa-chevron-right"></i>'
])
?>