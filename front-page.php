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
			// Skip 'uncategorized' term
			if( $cat->term_id == 1) continue;
			$visitor_types = get_field('cat_visitor_type', $cat);
			if ( !is_array($visitor_types) ) continue;

			foreach ( $visitor_types as $visitor_type ) {
				$slug = $visitor_type['value'];
				$services[$slug]['title'] = $visitor_type['label'];
				$services[$slug]['cat'][] = $cat;
			}
		}

	}

	foreach ( $services as $service => $service_details ) {
		echo '<h2>', esc_attr($service_details['title']), '.</h2>';
		echo '<p>', $service == 'need-help' ? 'Find ' : 'Give ';

		$cat_obj = $service_details['cat'];
		foreach ( $cat_obj as $cat ) {
			$cat_url = $service . '/' . $cat->slug;
			echo '<a href="', site_url($cat_url), '/' ,'">', strtolower($cat->name), '</a>, ';
		}

		echo 'or <a href="',site_url($service),'">something else</a>.</p>';
	}

?>
<?php get_footer(); ?>
