<?php
add_action( 'init', 'bolt_add_custom_taxonomies', 0 );

function bolt_add_custom_taxonomies() {

  $custom_taxonomies = array(
    PARENT_ORG_TAX => array(
      'plural' => 'Parent Orgs',
      'singular' => 'Parent Org',
      'post_types' => array( get_org_cpt_name() ),
    ),
    VISITOR_TYPE_TAX_NAME => array(
      'plural' => 'Visitor Types',
      'singular' => 'Visitor Type',
      'post_types' => array( get_org_cpt_name() ),
      'hierarchical' => true,
    ),
    SERVICE_TAX_NAME => array(
      'plural' => 'Services',
      'singular' => 'Service',
      'post_types' => array( get_org_cpt_name() ),
      'hierarchical' => true,
    ),
    FEATURE_TAX_NAME => array(
      'plural' => 'Feautured Orgs',
      'singular' => 'Featured Org',
      'post_types' => array( get_org_cpt_name() ),
      'show_ui' => false,
      'show_admin_column' => false,
    ),
    RESOURCE_TYPE_TAX_NAME => array(
      'plural' => 'Resource Types',
      'singular' => 'Resource Type',
      'post_types' => array( get_resource_cpt_name() )
    ),
  );


  // Register Custom Taxonomy
  foreach ( $custom_taxonomies as $key => $tax ) :

    $db_tax_name = THEME_PREFIX . "_$key";

    $singular = $tax['singular'];
    $plural = $tax['plural'];
    $post_types = $tax['post_types'];

    $hierarchical = isset($tax['hierarchical']) ? $tax['hierarchical'] : false;
    $show_ui = isset($tax['show_ui']) ? $tax['show_ui'] : true;
    $show_admin_column = isset($tax['show_admin_column']) ? $tax['show_admin_column'] : true;


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
      'hierarchical'               => $hierarchical,
      'public'                     => true,
      'show_ui'                    => $show_ui,
      'show_admin_column'          => $show_admin_column,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'rewrite'                    => array( 'slug' => $key, 'with_front' => false, 'hierarchical' => $hierarchical ),
    );

    register_taxonomy( $db_tax_name , $post_types, $args );

  endforeach;

} // END bolt_add_custom_taxonomies() 

?>