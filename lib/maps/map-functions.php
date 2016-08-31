<?php 
// Map helper functions go here

/**
 *
 * Call this function to create the geojson file that
 * mapbox will reference
 *
 */

function create_map() {
  require_once 'create-geojson.php'; // Create geoJSON file
  global $post;
  ?>
  <div iclass="map-wrap map-wrap center-column">
    <div id="map-elem" class="dark map-div"></div>
  </div>
  <?php
} // end home_map()


/**
 * Get post slug (only works in the Loop)
 */
function the_slug() {
    global $post;
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}

?>