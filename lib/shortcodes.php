<?php 
function lfr_ways_to_help() {
  $type = visitor_type();

  $cat_list = get_main_cat_list( $type );
  
  return implode(', ', $cat_list);
}
add_shortcode( 'ways_to_help', 'lfr_ways_to_help' );


?>