<?php
$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id;
$queried_object_tax = $queried_object->taxonomy;
$children = get_terms( array(
  'child_of' => $queried_object_id,
  'taxonomy' => $queried_object_tax,
  'hide_empty' => true
) );

if ( is_array($children) && count($children) > 0) : ?>
  <ul class="sub-cat-list list-inline list-unstyled col-md-12">
    <h5>Choose from one of the categories below to refine your search:</h5>
    <?php
    $subcat_list = array();
  	foreach ( $children as $child ) {
  		$term = get_term( $child, $queried_object_tax );
  		$parent = get_term( $term->parent, $queried_object_tax );
      $subcat_list[] = '<li><a class="sub-cat-link" href="/' . visitor_type() . '/' . $parent->slug . '/' . $term->slug . '">' . $term->name . '</a></li>';
  	}
    echo implode('', $subcat_list);
    ?>
  </ul>
<?php endif;

$do_not_duplicate = array();

$featured_query = featured_organizations();
if( $featured_query->have_posts() ) :
  ?>
  <ul class="org-list featured-list col-md-12">
    <?php
    while( $featured_query->have_posts() ) : $featured_query->the_post();
      $do_not_duplicate[] = get_the_ID();
      get_template_part('partials/featured-org-list-item');
    endwhile;
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

if( $reggy_orgs->have_posts() ) :
  if ( archive_layout_type($queried_object_id) === 'short' && $queried_object->slug !== 'recovery-resources' && !is_client_page() ) : ?>
    <h3 class="top-orgs-header col-md-12">Some highly recommended ways to give in this category are listed below:</h3>
  <?php endif; ?>

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