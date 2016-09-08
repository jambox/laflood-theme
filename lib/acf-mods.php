<?php

function only_top_level_cats_for_orgs( $args, $field, $post_id ) {
    
    if( $field['name'] !== 'org_category' ) { return $args; }

    // $args['parent'] = 0;
    $args['exclude'] = array(1); // Hide "uncategorized" cat
    return $args;

}

add_filter('acf/fields/taxonomy/query', 'only_top_level_cats_for_orgs', 10, 3);

// filter the taxonomy shown in the admin area to children of a specific parent
function laflood_limit_acf_taxonomies( $args, $field ) {
  $args['parent'] = 0;
  return $args;
}
add_filter('acf/fields/taxonomy/wp_list_categories', 'laflood_limit_acf_taxonomies', 10, 2);

?>