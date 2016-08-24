<div class="col-md-12">
  <h3 class="resource-category-list--title">I'd like to contribute...</h3>
  <ul class="resource-category-list">
    <?php
    $cats = get_terms( 'category', array('hide_empty' => false, 'parent'=>0 ) );
    foreach( $cats as $cat ) :
      if ( $cat->term_id == 1 ) continue;
    ?>
      <li class="resource-category col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <a href="<?php echo get_term_link( $cat->term_id ); ?>" class="resource-category--link btn btn-default"><?php echo $cat->name; ?></a>
      </li>
    <?php endforeach; ?>
  </ul> 
</div>
