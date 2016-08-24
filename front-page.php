<?php get_header(); ?>
<?php
	// Dynamically display top-level Categories by category visitor type.
	$args = array(
		'hide_empty' => false,
		'parent'=>0
	);
	$cats = get_terms('category', $args);
	if( !empty($cats) ){
		$services = [];
		foreach ( $cats as $cat ) {
			$visitor_types = get_field('cat_visitor_type', $cat);
			foreach ( $visitor_types as $visitor_type ) {
				$services[$visitor_type][] = $cat;
			}
		}
	}

	foreach ( $services as $service => $cat_obj ) {
		echo '<h2>', esc_attr($service), '.</h2>';
		echo '<p>', $service == 'I need help' ? 'Find ' : 'Give ';
		foreach ( $cat_obj as $cat ) {
			echo '<a href="#">', strtolower($cat->name), '</a>, ';
		}
		echo 'or <a href="#">something else</a>.</p>';
	}

?>
<?php get_footer(); ?>
