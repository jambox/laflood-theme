<?php
$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id;
$queried_object_tax = $queried_object->taxonomy;

$children = get_terms( array(
      'child_of' => $queried_object_id,
      'taxonomy' => $queried_object_tax,
      'hide_empty' => true
) );

if (is_array($children) && count($children) > 0) : ?>
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

if( have_posts() ) :

if ( archive_layout_type($queried_object_id) === 'short' && $queried_object->slug !== 'recovery-resources' && !is_client_page() ) : ?>
  <h3 class="top-orgs-header">Some highly recommended ways to give in this category are listed below:</h3>
<?php endif; ?>
<ul class="org-list col-md-12">
  <?php    
  while ( have_posts() ) : the_post();
    get_template_part('partials/archive-list-item');
  endwhile;?>
<?php endif; ?>
</ul>
<?php the_posts_pagination([
  'prev_text' => '<i class="fa fa-chevron-left"></i> Previous',
  'next_text' => 'Next <i class="fa fa-chevron-right"></i>'
])
?>