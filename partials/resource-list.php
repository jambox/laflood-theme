
<ul class="resource-list">
  <?php
  $cat = get_term_by('slug', 'ways-to-help', 'category');
  $child_cats = get_child_categories( $cat->term_id );  
  foreach( $child_cats as $cat ) :
  ?>
    <li class="resource-tile offering col-md-4 col-sm-6 col-xs-12"><a href="<?php echo get_term_link( $cat->term_id ); ?>" class="resource-tile--link btn btn-default"><?php echo $cat->name; ?></a></li>
  <?php endforeach; ?>
</ul> 
