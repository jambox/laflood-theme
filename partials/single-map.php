<?php global $post;

	$location_array = get_field('org_location', $post);
	if ( is_array($location_array) ) {
		$lat = $location_array['lat'];
		$lng = $location_array['lng'];
	}

