<?php
$organizations = cpt_query( get_org_cpt_name() );

$geoJSON = array(
  "type" => "FeatureCollection",
  "features" => array()
);

if ($organizations->have_posts()) :
  while ($organizations->have_posts()) : $organizations->the_post();
    $locationMap = get_field('address');
    $address = ucwords(strtolower($locationMap["address"]));
    $coords = explode(',',$locationMap["coordinates"]);
    $sanitizedPhone = str_replace( '-', '', get_field("phone_number") ); 
    
    if ( has_post_thumbnail() ) :
      $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
      $image = '<img src="'.$image[0].'" title="'.ucwords(strtolower(get_the_title())).'"><br />';
    else:
      $image = '';
    endif;
    
    $geoJSON["features"][] = array(
      "type" => "Feature",
      "geometry" => array(
        "type" => "Point",
        // "coordinates" => array( (float)$coords[1], (float)$coords[0] ),
      ),
      "properties" => array(
        "wpID" => get_the_ID(),
        "loc_slug" => the_slug(),
        // "loc_address" => $locationMap["address"],
        "title" => ucwords(strtolower(get_the_title())),
        "marker-color"  => "#f63a39",
        "marker-size"   => "large",
        "marker-symbol" => "circle",
        "description" => get_the_content()
        // "description"   => "<p class='location-details'>".$address."<br/>"."<a href='tel:+1$sanitizedPhone' data-behavior='call' >".get_field("phone_number")."</a>"."</p><a class='marker-link' href='".permalink_by_title('locations', false). "#".the_slug().".go'>View This Location</a>",
      )
    );
    
  endwhile;
endif;

wp_reset_postdata();

$fp = fopen(dirname(__FILE__).'/locations.geojson', 'w');
fwrite($fp, json_encode($geoJSON));
fclose($fp);
?>