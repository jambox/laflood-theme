<?php
$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id;
$queried_object_tax = $queried_object->taxonomy;

$children = get_term_children( $queried_object_id, $queried_object_tax);

if (is_array($children) && count($children) > 0) {
	echo '<ul>';
	foreach ( $children as $child ) {
		$term = get_term( $child, $queried_object_tax );
		$parent = get_term( $term->parent, $queried_object_tax );
		echo '<li><a href="/', visitor_type(), '/', $parent->slug, '/', $term->slug, '">', $term->name, '</a></li>';
	}
	echo '</ul>';
}

if( have_posts() ) :

if ( archive_layout_type($queried_object_id) === 'short' && $queried_object->slug !== 'recovery-resources' && !is_client_page() ) : ?>
  <h3 class="top-orgs-header">Some highly recommended ways to give in this category are listed below:</h3>
<?php endif; ?>
<ul class="org-list">
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