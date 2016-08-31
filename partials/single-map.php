<?php global $post;

	$location_array = get_field('org_location', $post);
	if ( is_array($location_array) ) {
		$adr = $location_array['address'];
		$lat = $location_array['lat'];
		$lng = $location_array['lng'];

		// Google map will be injected here
		echo '<div class="single-map"><span class="marker" data-lat="', $lat, '" data-lng="', $lng, '" aria-hidden="true">', $adr, '</span></div>';
	}

