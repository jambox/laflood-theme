<?php

function permalink_li_by_title( $title, $class ) {
  
  $id = get_page_by_title( $title );
  
  echo "<li class='" . join(' ', $class) . "'><a href='".get_permalink( $id )."' title='$title'>$title</a></li>";
}



function list_args($numargs, $arg_list) {
    echo "<pre>";
    for ($i = 0; $i < $numargs; $i++) {
        if (is_array($arg_list[$i])) {
          echo "Argument $i is: \n" . print_r($arg_list[$i], TRUE) . "\n";
        } else {
          echo "Argument $i is: [" . $arg_list[$i] . "]\n";
        }
    }
    echo "</pre>";  
}


function responsive_thumb( $size = 'thumbnail', $attr = array(), $before = 0, $after = 0) {
  global $post;

  $defaults = array('class' => "img-responsive");

  if ( has_post_thumbnail() ): 

    if( $before && $after ) echo $before;

    $attr = array_merge( $defaults, $attr );
    the_post_thumbnail($size, $attr);

    if( $before && $after ) echo $after;

  endif;

} // END responsive_thumb()


function responsive_acf_image( $acf_field = 0, $args ) {
  
  if( !$acf_field ) return false;

  global $post;

  $r = '';

  $before = isset( $args['before'] ) ? $args['before'] : '';
  $after = isset( $args['after'] ) ? $args['after'] : '';

  $defaults = array(
    'class' => 'img-responsive',
    'size' => 'thumb'
  );

  $args = array_merge( $defaults, $args );

  if ( get_field( $acf_field ) ):

    $acf_image = get_field( $acf_field );
    // If ACF returns an array, grab the right size.
    // Else, it should be returning the raw URL so grab that
    $url = isset( $acf_image['sizes'] ) ? $acf_image['sizes'][ $args['size'] ] : $acf_image;

    $height = isset( $acf_image['height'] ) && $acf_image['height'] !== 0  ? "height='" . $acf_image['height'] . "'" : "";
    $width = isset( $acf_image['width'] ) && $acf_image['width'] !== 0 ? "width='" . $acf_image['width'] . "'" : "";

    $args['class'] .= ' wp-image-' . $acf_image['ID'];

    $r = sprintf( '%s<img src="%s" alt="%s" class="%s" %s %s %s />%s',
                  $before, $url, get_the_title(), $args['class'], $args['img_attr'], $height, $width, $after
                );
    
  elseif( has_post_thumbnail() ):
    $image_id = get_post_thumbnail_id();
    $image_obj = wp_get_attachment_image_src( get_post_thumbnail_id(), $args['size'], true);
    $url = $image_obj[0];
    $img_h = $image_obj[1];
    $img_w = $image_obj[2];

    $args['class'] .= ' wp-image-' . $image_id;


    $r = sprintf( '%s<img src="%s" alt="%s" class="%s" %s %s %s />%s',
                  $before, $url, get_the_title(), $args['class'], $args['img_attr'], $img_h, $img_w, $after
                );
  endif;

  // Make sure to return bool
  if ( !empty($r) ) :
    echo wp_make_content_images_responsive( $r );
    return true;
  else :
    return false;
  endif;


} // END responsive_acf_image()


function get_category_link_by_slug( $slug = 0 ) {
  if( !$slug ) return false;
  $idObj = get_category_by_slug( $slug ); 
  return get_category_link( $idObj->term_id );
}


function laflood_org_archive_query( $query ) {
  if ( is_org_archive() && $query->is_main_query() && !is_admin() ) {
    set_query_var('post_parent', 0 );
    set_query_var('post_status', array('publish') );
    set_query_var('orderby', 'menu_order' );
  }
} // END laflood_org_archive_query()

add_action('pre_get_posts','laflood_org_archive_query');


function laflood_add_org_category_archive( $query ) {
  if( is_category() && $query->is_main_query() ) {
    $post_type = get_query_var('post_type');
    $proj_cpt = get_org_cpt_name();
    $post_type = $post_type ? array($post_type, $proj_cpt) : array($proj_cpt);
    $query->set('post_type',$post_type);
  }
    return $query;   

} // END laflood_add_org_category_archive()

add_action('pre_get_posts','laflood_add_org_category_archive');


function laflood_only_allow_search_for_org( $query ) {
  if ($query->is_search) {
      $query->set( 'post_type', get_org_cpt_name() );
  };
  return $query;   

} // END laflood_add_org_category_archive()
add_action('pre_get_posts','laflood_only_allow_search_for_org');


function visitor_type() {
  global $wp_query;
  if( is_page('want-to-help') || is_page('need-help') ) {
    return $wp_query->query_vars['name'];
  } else {
    return isset( $wp_query->query_vars['lfr_visitor_type'] ) ? $wp_query->query_vars['lfr_visitor_type'] : false ;
  }
  return;
} // END visitor_type()


function is_client_page() {
  return visitor_type() == 'need-help';
} // is_client_page()


/*===================================
=            CPT Helpers            =
===================================*/


function get_lfr_cpt_names_array() {
  return array(
    get_org_cpt_name(),
    get_resource_cpt_name()
  );
} // get_lfr_cpt_names_array


function is_laflood_cpt_archive( $cpt_name = 0 ) {
  if( !$cpt_name ) return false;

  return is_post_type_archive( THEME_PREFIX . "_" . $cpt_name );

} // END is_laflood_cpt_archive()


function is_resource_archive() {
  return is_laflood_cpt_archive( RESOURCES_CPT_NAME );
} // is_resource_archive()

function get_resource_cpt_name() {
  return THEME_PREFIX . '_' . RESOURCES_CPT_NAME;
} // END get_resource_cpt_name()



function is_org_archive() {
  return is_laflood_cpt_archive( ORG_CPT_NAME );
} // is_org_archive()

function get_org_cpt_name() {
  return THEME_PREFIX . '_' . ORG_CPT_NAME;
} // END get_org_cpt_name()



/*========================================
=            Taxonomy Helpers            =
========================================*/


function get_visitor_type_tax_name() {
  return THEME_PREFIX . '_' . VISITOR_TYPE_TAX_NAME;
} // END get_visitor_type_tax_name()


function get_parent_org_tax_name() {
  return THEME_PREFIX . '_' . PARENT_ORG_TAX;
} // END get_parent_org_tax_name()


function get_resource_type_tax_name() {
  return THEME_PREFIX . '_' . RESOURCE_TYPE_TAX_NAME;
} // END get_resource_type_tax_name()


function get_service_tax_name() {
  return THEME_PREFIX . '_' . SERVICE_TAX_NAME;
} // END get_service_tax_name()


function loader_title() {
 $titles = array('Loading', 'One sec', 'Hold on', 'One Moment');
 shuffle( $titles );
 echo $titles[0];

} // END loader_title()


function ajax_acf_save_new_org() {
  $data = $_POST;
  return json_encode($_POST);
} // END ajax_acf_save_new_org()


add_action( AJAX_PUBLIC . 'acf_save_new_org', 'ajax_acf_save_new_org' );
add_action( AJAX . 'acf_save_new_org', 'ajax_acf_save_new_org' );


/**
 * Provides a standard format for the page title depending on the view. This is
 * filtered so that plugins can provide alternative title formats.
 *
 * @param       string    $title    Default title text for current view.
 * @param       string    $sep      Optional separator.
 * @return      string              The filtered title.
 * @package     mayer
 * @subpackage  includes
 * @version     1.0.0
 * @since       1.0.0
 */
function bolt_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() ) {
    return $title;
  } // end if

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title = "$title $sep $site_description";
  } // end if

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 ) {
    $title = sprintf( __( 'Page %s', 'bolt' ), max( $paged, $page ) ) . " $sep $title";
  } // end if


  return $title;

} // end bolt_wp_title
add_filter( 'wp_title', 'bolt_wp_title', 10, 2 );


function get_sub_categories_by_name( $cat_name = 0 ) {
  if( !$cat_name ) return false;

  $r = '';

  $subcats = get_child_categories( $cat_name );
  $subcat_links = array();

  if ( !$subcats ) return false; 

  foreach ( $subcats as $cat ) {
    $parent_cat_slug = sanitize_title( $cat_name );
    $subcat_links[] = $cat->name;
  }

  foreach( $subcat_links as $link ) {
    
  }

  $r .= "<span class='parent-cat-name'>{$cat_name}: </span>";
  $r .= "<span class='subcats'>" . implode( ', ', $subcat_links ) . "</span>";
  $r = "<li class='top-level-cat'>{$r}</li>";

  return $r;

} // END get_sub_categories_by_name()


function my_kses_post( $value ) {
  if( is_array($value) ) {
    return array_map('my_kses_post', $value);
  }
  return wp_kses_post( $value );
}

add_filter('acf/update_value', 'my_kses_post', 10, 1);


function get_visitor_type_cats( $type = 0, $cats = 0 ) {
  if( !$type || !$cats ) return false;

  // Loop through all the cats and unset the ones that
  // aren't set to this vistor type
  foreach( $cats as $i => $cat ) {
    $visitor_types_from_cat = get_field('cat_visitor_type', $cat);

    if( !$visitor_types_from_cat ) unset( $cats[$i] );

    if ( !is_array($visitor_types_from_cat) ) continue;

    $visitor_type_slugs = [];
    foreach( $visitor_types_from_cat as $term_obj ) {
      $visitor_type_slugs[] = $term_obj['value'];      
    }

    if( !in_array( $type, $visitor_type_slugs ) ) {
      unset( $cats[$i] );
    }

  }

  return $cats;

} // END get_visitor_type_cats()



function get_main_cat_list( $visitor_type, $after_link = '' ) {
  
  // Allow for a type term obj and slug to be passed
  $visitor_type = is_array( $visitor_type ) ? $visitor_type['value'] : $visitor_type;

  // Dynamically display top-level Categories by category visitor type.
  $args = array(
    // 'hide_empty' => false,
    'parent'=>0
  );

  $cats = get_terms('category', $args);

  $visitor_type_cats = get_visitor_type_cats( $visitor_type, $cats );

  $cat_list = array_map(
    function($cat_obj) use ( $visitor_type, $after_link ) {
      $cat_url = $visitor_type . '/' . $cat_obj->slug;
      return '<a class="large-link" href="' . site_url($cat_url) . '/' . '">'. strtolower($cat_obj->name) . $after_link . '</a>';
    },
  $visitor_type_cats );
  return $cat_list;
    
} // get_main_cat_list




?>