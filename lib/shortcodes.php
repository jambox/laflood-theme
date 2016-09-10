<?php 
function lfr_main_cats() {
  $type = visitor_type();

  $cat_list = get_main_cat_list( $type, right_chevron() );
    
  ob_start();

  if( empty( $cat_list ) ) {
    return false;
  }
  ?>
  <ul class="main-cats-list">
  <?php

  foreach ($cat_list as $cat_link) :
    ?>
      <li><?php echo $cat_link; ?></li>
    <?php
  endforeach;
  ?>
  </ul>
  <?php
  
  $o = ob_get_contents();
  ob_end_clean();

  return $o;
}
add_shortcode( 'main_cats', 'lfr_main_cats' );


?>