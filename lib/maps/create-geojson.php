<?php
$organizations = cpt_query( get_org_cpt_name() );

$geoJSON = array(
  "type" => "FeatureCollection",
  "features" => array()
);

if (have_posts()) :
  while (have_posts()) : the_post();

    $address_obj = get_field("org_location");
    if( !isset( $address_obj['lat'] ) || empty( $address_obj['lat'] ) )  {
      continue;
    }
    // $address_obj = get_field("org_location", post->ID );
    $address = ucwords(strtolower($address_obj["address"]));
    $sanitizedPhone = str_replace( '-', '', get_field("org_main_phone") ); 
    
    // if ( has_post_thumbnail() ) :
    //   $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
    //   $image = '<img src="'.$image[0].'" title="'.ucwords(strtolower(get_the_title())).'"><br />';
    // else:
    //   $image = '';
    // endif;
    
    $description = get_the_content();

    if( is_user_logged_in() ) {
      $description .= "<h4><a href='". get_edit_post_link() ."' target='_blank'>Edit Org</a></h4>";
    }

    $geoJSON["features"][] = array(
      "type" => "Feature",
      "geometry" => array(
        "type" => "Point",
        "coordinates" => array( (float)$address_obj['lng'], (float)$address_obj['lat'] ),
      ),
      "properties" => array(
        "wpID" => get_the_ID(),
        "loc_slug" => the_slug(),
        "loc_address" => $address_obj["address"],
        "title" => ucwords(strtolower(get_the_title())),
        "marker-color"  => "#f63a39",
        "marker-size"   => "large",
        "marker-symbol" => "circle",
        "description" => $description
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