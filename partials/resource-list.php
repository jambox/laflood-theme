
<ul class="resource-list">
  <?php
  $cat_ID = get_queried_object()->term_id;
  $child_cats = get_child_categories( $cat_ID );  
  foreach( $child_cats as $cat ) :
  ?>
    <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default"><?php echo $cat->name; ?></a></li>
  <?php endforeach; ?>
</ul> 
