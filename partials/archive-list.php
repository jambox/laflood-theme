<?php
$visitor_type = visitor_type();
$visitor_type_term = get_term_by('slug', $visitor_type, 'lfr_visitor_type');
$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id;
$queried_object_tax = $queried_object->taxonomy;

$do_not_duplicate = array();

$featured_posts = isset( $queried_object_id )
                ? get_field( 'cat_features', 'category_' . $queried_object_id )
                : false;

if( $featured_posts ) :
  ?>
  <ul class="org-list featured-list col-md-12">
    <?php
    foreach( $featured_posts as $post ) : setup_postdata( $post );
      // Ignore non publicly-published posts
      if( get_post_status() !== 'publish' ) continue;

      $do_not_duplicate[] = get_the_ID();
      get_template_part('partials/featured-org-list-item');
    endforeach;
    wp_reset_postdata();
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