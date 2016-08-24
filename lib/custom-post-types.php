<?php

// Define array of Custom Post Types and register each

add_action( 'init', 'bolt_custom_post_types' );

function bolt_custom_post_types() {

  $cpts = array(
    ORG_CPT_NAME => array(
      'singular' => 'Organization',
      'plural' => 'Organizations',
      'show_in_menu' => true,
      'supports' => array('excerpt', 'page-attributes'),
      'taxonomies' => array('post_tag','category', get_visitor_type_tax_name(), get_parent_org_tax_name(), get_service_tax_name() ),
      'has_archive' => true,
      'public' => true,
      'hierarchical' => true,
      'rewrite_slug' => 'orgs'
    ),
    RESOURCES_CPT_NAME => array(
      'singular' => 'Resource',
      'plural' => 'Resources',
      'show_in_menu' => true,
      'supports' => array('excerpt', 'page-attributes'),
      'taxonomies' => array( get_resource_type_tax_name() ),
      'has_archive' => true,
      'public' => true,
      'hierarchical' => true,
      'rewrite_slug' => 'resources'
    )

  );


  foreach ( $cpts as $key => $cpt ) {
    $db_cpt_name = THEME_PREFIX . "_$key";
    $singular = $cpt['singular'];
    $plural = $cpt['plural'];
    $show_in_menu = $cpt['show_in_menu'];   
    $passed_supports_args = (isset($cpt['supports']) ? (array) $cpt['supports'] : array() );
    $passed_taxonomies = (isset($cpt['taxonomies']) ? (array) $cpt['taxonomies'] : array() );
    
    $supports_defaults = array( 'title', 'editor', 'thumbnail', 'custom-fields' );
    $supports_array = array_merge($supports_defaults, $passed_supports_args);
    
    $taxonomies_defaults = array();
    $taxonomies_array = array_merge($taxonomies_defaults, $passed_taxonomies);
    
    $hasArchive = isset($cpt['has_archive']) ? $cpt['has_archive'] : true;
    $exclude_from_search = isset($cpt['exclude_from_search']) ? $cpt['exclude_from_search'] : false;

    $public = isset($cpt['public']) ? $cpt['public'] : false;
    
    $rewrite_slug = isset($cpt['rewrite_slug']) ? $cpt['rewrite_slug'] : sanitize_title( $cpt['plural'] );

    $hierarchical = isset( $cpt['hierarchical'] ) ? $cpt['hierarchical'] : false;


    register_post_type( $db_cpt_name,
      array(
          'labels' => array(
              'name' => $plural,
              'singular_name' => $singular,
              'add_new' => 'Add New',
              'add_new_item' => 'Add New '. $singular,
              'edit' => 'Edit',
              'edit_item' => 'Edit '. $singular,
              'new_item' => 'New '. $singular,
              'view' => 'View',
              'view_item' => 'View '. $singular,
              'search_items' => 'Search '. $plural,
              'not_found' => 'No '. $plural .' found',
              'not_found_in_trash' => 'No '. $plural .' found in Trash',
              'parent' => 'Parent '. $singular
          ),
          'public' => $public,
          'menu_position' => 15,
          'supports' => $supports_array,
          'taxonomies' => $taxonomies_array,
          // 'menu_icon' => get_bloginfo('stylesheet_directory') . '/images/'.strtolower($plural).'.png',
          'has_archive' => $hasArchive,
          'rewrite' => array( 'slug' => $rewrite_slug ),
          // 'rewrite' => true,
          'hierarchical' => $hierarchical,
          'show_in_menu' => $show_in_menu,
          // 'exclude_from_search' => $exclude_from_search, 
          
      )
    );


    // Add Front End Editor Support
    // add_post_type_support( $db_cpt_name, 'front-end-editor' );


  } // end foreach cpt

} // END create_post_types() 


?>