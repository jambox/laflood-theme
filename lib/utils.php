<?php


/**
 * Shorthand for custom post type query
 * 
 * Accepts the following params:
 * Custom Post Type - (string) $cptName
 * Limit for number of posts - (int) $posts_per_page
 * [Optional] Array of args used in WP_Query
 */
if( !function_exists( 'cpt_query' ) ) {
  function cpt_query($cptName, $posts_per_page=-1, $args=NULL) {
    $defaults = array(
      'post_type' => $cptName,
      'posts_per_page' => $posts_per_page
    );
    $args = wp_parse_args($args, $defaults);
    
    $cptQuery = new WP_Query($args);

    return $cptQuery;
  }
}

// Shorthand to get image url with stylesheet_directory prepended
function theme_image($image_name) {
  return get_bloginfo('stylesheet_directory') . "/assets/images/$image_name";
}


function get_category_link_list( $class='' ) {
  global $post;

  if( !$post ) return false;

  $loc_parent_cat = get_category_by_slug('resource');

  $post_categories = wp_get_post_categories( $post->ID );
  $cats = array();
    
  foreach($post_categories as $cat_id ){
    $cat = get_category( $cat_id );
    
    // Exclude Resource Cats
    if( cat_is_ancestor_of( $loc_parent_cat, $cat_id ) ) continue;

    $cats[] = array(
      'name' => $cat->name,
      'link' => get_category_link( $cat_id ),
      'class' => " {$class}"
    );
  }

  $links = array_map('get_category_link_li', $cats );

  return implode('', $links);

} // END get_category_link_list()


function get_category_link_li( $cat_obj ) {
  extract( $cat_obj );

  return sprintf('<li class="category-link--el%3$s"><a class="category-link" href="%2$s">%1$s</a></li>', $name, $link, $class );
} // get_category_link


function get_child_categories( $parent_cat_id = 0 ) {
  if( !$parent_cat_id ) return false;

  $args = array(
    'parent' => $parent_cat_id,
    'hide_empty' => false
    // 'post_type' => get_org_cpt_name()
  );

  $child_cats = get_categories( $args );
  return $child_cats;

} // END get_child_categories()



function get_category_items_from_parent_name( $parent_cat_name = 0 ) {
  if( !$parent_cat_name ) return false;

  $child_cats = get_child_categories_from_parent_name( $parent_cat_name );

  if( empty($child_cats) ) return false;
  ?>
  <li class="client--category-wrap">
    <span class="client--category-title"><?php echo $parent_cat_name; ?></span>
    <ul class="client--category-children list-inline">
      <?php echo $child_cats; ?>
    </ul>
  </li>
  <?php

} // END get_category_items_from_parent_name()


function get_child_categories_from_parent_name( $parent_cat_name = 0, $class= '' ) {
  if( !$parent_cat_name ) return false;

  $child_cats = get_child_categories_in_post( get_cat_ID( $parent_cat_name ) );

  if( empty( $child_cats ) ) return false;

  foreach($child_cats as $cat_obj ){

    $cats[] = array(
      'name' => $cat_obj->name,
      'link' => get_category_link( $cat_obj->term_id ),
      'class' => " {$class}"
    );
  }

  $links = array_map('get_category_link_li', $cats );

  return implode('', $links);


} // END get_child_categories_from_parent_name() 


function get_child_categories_in_post( $parent_cat_id = 0 ) {
  if( !$parent_cat_id ) return false;

  global $post;

  // Get the child categories we're searching for
  $child_cats = get_child_categories( $parent_cat_id );

  // Get all the post categories
  $post_cats = wp_get_post_categories( $post->ID );

  $cats = array();

  foreach( $post_cats as $c ){
    $cat = get_category( $c );
    // If this category is a sub category of the parent, add to cats array
    if( cat_is_ancestor_of( $parent_cat_id, $c ) )
      $cats[] = $cat;
  }

  return $cats;

} // END get_child_categories_in_post() 


/*
 * Return or echo post permalink by title
 */
function permalink_by_title($title, $echo=true) {
  
  $id = get_page_by_title( $title );
  
  $link = get_permalink( $id );
  
  if (!$echo)
    return $link;
    
  echo $link;
}


// Replace last occurence of a string within string
function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}


/**
 * Return bootstrap 3 columns by specifying column width
 * ( Based on 12 column Grid )
 */
function bootstrap_col( $col = 0, $col_sm = 0, $col_xs = 0, $col_lg = 0, $offset = 0 ) {
  if( !$col ) return false;

  if( !$col_sm )
    $col_sm = $col;

  if( !$col_xs )
    $col_xs = 12;

  if( !$col_lg )
    $col_lg = $col;

  $r = "col-md-$col col-sm-$col_sm col-xs-$col_xs col-lg-$col_lg";

  if( gettype( $offset ) == 'array' ) {
    $offset_md = $offset[0];
    $offset_sm = $offset[1];
    $offset_xs = $offset[2];
    $offset_lg = isset( $offset[3] ) ? 'col-lg-offset-'.$offset[3] : 0;

    $offset_classes = array();

    if( $offset_xs !== 0 )
      $offset_classes[] = "col-xs-offset-$offset_xs";

    if( $offset_sm !== 0 )
      $offset_classes[] = "col-sm-offset-$offset_sm";

    if( $offset_md !== 0 )
      $offset_classes[] = "col-md-offset-$offset_md";

    if( $offset_lg !== 0 )
      $offset_classes[] = $offset_lg;

    $r .= " " . implode(' ', $offset_classes);
    
  } elseif( $offset ) {
    $r .= " col-md-offset-$offset";
  }

  return $r;

} // END bootstrap_col()


function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

/**
 * Add page slug to body_class() classes if it doesn't exist
 */
function roots_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }
  return $classes;
}
add_filter('body_class', 'roots_body_class');


/**
 * Compare url against relative url. Returns boolean.
 */
function roots_url_compare($url, $rel) {
  $url = trailingslashit($url);
  $rel = trailingslashit($rel);

  if ((strcasecmp($url, $rel) === 0) || roots_root_relative_url($url) == $rel) { 
    return true; 
  } else {
    return false;
  }
}

/**
 * Returns / Echoes an inline CSS 'background' declaration
 * Specify the image, bg position, thumbnail size, and CSS 'background-size' style
 */
function bg_image( $args = array(), $echo = true ) {
  global $post;

  if( gettype( $args ) == "string" ) {
    // If we're just passed a string, that's presumably an image so set it as such
    $args = array( 'image' => $args );
  }

  $defaults = array(
    'image'         => 0,
    'bg_pos'        => "center center",
    'bg_repeat'     => "no-repeat",
    'thumb_size'    => "medium",
    'bg_size'       => "cover"
  );

  $args = array_merge( $defaults, $args );

  extract( $args );

  $url = "";

  $image_or_acf_key = $image;

  if( $image_or_acf_key ) {

    if ( gettype( $image_or_acf_key ) == 'string' && get_field( $image_or_acf_key ) ) {
      // the function has been passed an ACF field name
      $imageObj = get_field( $image_or_acf_key );
      $url = isset( $imageObj['sizes'] ) ? $imageObj['sizes'][ $thumb_size ] : '';
    } elseif ( gettype( $image_or_acf_key ) == 'string' ) {
      // If the string is a filename
      $url = theme_image( $image_or_acf_key );
    } elseif ( isset( $image_or_acf_key['sizes'][ $thumb_size ] ) ){
      // the function has been passed an image object
      $url = $image_or_acf_key['sizes'][ $thumb_size ];
    } else {
      //the function has been passed an attachment source obj
      $url = $image_or_acf_key[0];
    }
  } else {
    
    if ( !has_post_thumbnail() ) return false;
    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumb_size, true);
    $url = $image_url[0];
  }

  $bg_attachment = isset( $bg_attachment ) ? "background-attachment:$bg_attachment;" : '';

  $r = "background-image: url('$url');background-position:$bg_pos;background-repeat:$bg_repeat;background-size: $bg_size;$bg_attachment";

  if ($echo)
    echo $r;

  return $r;
  
} // end bg_image


?>