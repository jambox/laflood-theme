<?php
$visitor_type = visitor_type();
$visitor_type_term = get_term_by('slug', $visitor_type, 'lfr_visitor_type');
$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id;
$queried_object_tax = $queried_object->taxonomy;

$do_not_duplicate = array();

$featured_query = featured_organizations();
if( $featured_query->have_posts() ) :
  ?>
  <ul class="org-list featured-list col-md-12">
    <?php
<<<<<<< HEAD
    $subcat_list = array();
  	foreach ( $children as $child ) {
      global $wpdb;
      $result = $wpdb->get_var("
        SELECT COUNT(*) FROM $wpdb->posts p
        JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
        JOIN $wpdb->term_relationships tr2 ON p.ID = tr2.object_id
        WHERE ( tr.term_taxonomy_id = $child->term_id AND tr2.term_taxonomy_id = $visitor_type_term->term_id )
        AND p.post_status = 'publish'
        LIMIT 1
      ");
      if ( intval($result) > 0 ){
        $term = get_term( $child, $queried_object_tax );
        $parent = get_term( $term->parent, $queried_object_tax );
        $subcat_list[] = '<li><a class="sub-cat-link" href="/' . visitor_type() . '/' . $parent->slug . '/' . $term->slug . '">' . $term->name . '</a></li>';
      }
  	}
    echo implode('', $subcat_list);
=======
    while( $featured_query->have_posts() ) : $featured_query->the_post();
      $do_not_duplicate[] = get_the_ID();
      get_template_part('partials/featured-org-list-item');
    endwhile;
    wp_reset_postdata();
>>>>>>> origin/master
    ?>
  </ul>
  <?php
endif;

// TODO : Figure out how to do this with pre_get_posts or something...
$args = array(
  'lfr_visitor_type' => get_query_var('lfr_visitor_type', ''),
  'post__not_in' => $do_not_duplicate,
  'paged' => get_query_var( 'paged', 0 ),
  'category_name' => get_query_var( 'category_name', '' )
);
$reggy_orgs = new WP_Query( $args );

if( $reggy_orgs->have_posts() ) :?>
  <ul class="org-list col-md-12">
    <?php    
    while ( $reggy_orgs->have_posts() ) : $reggy_orgs->the_post();
      if( in_array( get_the_ID(), $do_not_duplicate ) ) continue;
      get_template_part('partials/org-list-item');
    endwhile;?>
  <?php endif; ?>
</ul>
<div class="col-md-12">
  <?php the_posts_pagination([
    'prev_text' => '<i class="fa fa-chevron-left"></i> Previous',
    'next_text' => 'Next <i class="fa fa-chevron-right"></i>'
  ])
  ?>
</div>