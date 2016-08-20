<?php
add_action( 'init', 'bolt_add_custom_taxonomies', 0 );

function bolt_add_custom_taxonomies() {

  $custom_taxonomies = array(
    'organization' => array(
      'plural' => 'Organizations',
      'singular' => 'Organization'
    )
  );


  // Register Custom Taxonomy
  foreach ( $custom_taxonomies as $key => $tax ) :

    $db_tax_name = $key;

    $singular = $tax['singular'];
    $plural = $tax['plural'];


    $labels = array(
      'name'                       => _x( $plural, 'Taxonomy General Name', 'text_domain' ),
      'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'text_domain' ),
      'menu_name'                  => __( $plural, 'text_domain' ),
      'all_items'                  => __( 'All ' . $plural, 'text_domain' ),
      'parent_item'                => __( 'Parent ' . $singular . '', 'text_domain' ),
      'parent_item_colon'          => __( 'Parent ' . $singular . ':', 'text_domain' ),
      'new_item_name'              => __( 'New ' . $singular . ' Name', 'text_domain' ),
      'add_new_item'               => __( 'Add New ' . $singular . '', 'text_domain' ),
      'edit_item'                  => __( 'Edit ' . $singular . '', 'text_domain' ),
      'update_item'                => __( 'Update ' . $singular . '', 'text_domain' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
      'search_items'               => __( 'Search ' . $plural, 'text_domain' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
      'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
      'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => false,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
    );
    register_taxonomy( $db_tax_name , array('post',THEME_PREFIX . '_' . RESOURCE_CPT_NAME ), $args );

  endforeach;

} // END bolt_add_custom_taxonomies() 

?>