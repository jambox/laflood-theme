<?php

function only_top_level_cats_for_orgs( $args, $field, $post_id ) {
    
    if( $field['name'] !== 'org_category' ) { return $args; }

    $args['parent'] = 0;
    $args['exclude'] = array(1); // Hide "uncategorized" cat
    return $args;

}

add_filter('acf/fields/taxonomy/query', 'only_top_level_cats_for_orgs', 10, 3);

?>