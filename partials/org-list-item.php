<?php

$queried_object = get_queried_object();

$org_category = get_field('org_category');
$org_parent_org = get_field('org_parent_org');
$org_services = get_field('org_services');
$org_visitor_type = get_field('org_visitor_type');
$org_location = get_field('org_location');
$org_handles_goods = get_field('org_handles_goods');

$org_location_type_object = get_field_object('field_57ba96f045dad');  
$org_location_type = get_field('org_location_type');
$org_location_type_label = !empty( $org_location_type ) ? $org_location_type_object['choices'][ $org_location_type ] : false;

$org_website = get_field('org_website');
$org_main_phone = get_field('org_main_phone');
$org_main_email = get_field('org_main_email');
$org_contacts = get_field('org_contacts');

$is_recovery_resource = is_recovery_resource();

$item_link = get_permalink();
// $item_link = $is_recovery_resource ? $org_website : get_permalink();

?>
<li class="org-item col-md-4">
  <header>
    <h2 class="org-title"><?php
    echo '<a href="', $item_link, '">',
    /* if (!empty($org_website) ) {
      '<a href="', esc_url($org_website), '">';
    } */
    str_no_wrap( get_the_title() );
    echo '</a>'; ?></h2>
  </header>
  <ul class="list-unstyled list-inline meta-list contact-list"><?php
    if( !$is_recovery_resource ) :

      if ($org_website && !$is_recovery_resource ):
        ?><li><a href="<?php echo $org_website ?>" onclick="trackOutboundLink($(this));" data-behavior="archive.website" target="_blank">Website</a></li><?php
      endif?><?php
      // Middle Dot (map link type a)
      if ( !empty( $org_location['address'] ) ): echo $org_website ? '&middot;' : '';
      $mapUrl = 'https://www.google.com/maps/?q=' . get_the_title() . '%20' . $org_location['address'];
      ?><li><a href="<?php echo $mapUrl ?>" onclick="trackOutboundLink(this);" data-behavior="archive.map" target="_blank">Map</a></li><?php
      // Middle Dot (map link type b)
      elseif (!empty( $org_location['lat'] ) ): echo $org_website ? '&middot;' : '';
      $mapUrl = 'https://www.google.com/maps/?q=' . get_the_title() . '%20' . $org_location['lat'] . ',%20' . $org_location['lng'];
      ?><li><a href="<?php echo $mapUrl ?>" onclick="trackOutboundLink(this);" data-behavior="archive.map" target="_blank">Map</a></li><?php
      endif ?><?php
      // Middle Dot (phone)
      if ($org_main_phone): echo $org_website || isset( $org_location['lat'] ) ? '&middot;' : '';
      $phoneUrl = 'tel:+1' . preg_replace('/[^\d+]/', '', $org_main_phone);
      ?><li><a href="<?php echo $phoneUrl ?>" onclick="trackOutboundLink(this); return false;" data-behavior="archive.phone"><?php echo $org_main_phone; ?></a></li><?php
      endif;
      
    endif;
 ?></ul>
  <div>
    <?php the_excerpt(); ?>
  </div>
  <div class="org-meta">
  <?php

    $terms = get_the_terms( null, 'lfr_service' );
    if( !empty($terms) ) : ?>
    <div class="services-list">
      <ul class="list-unstyled list-inline">
        <?
          echo '<h5>', $queried_object && $queried_object->slug == 'recovery-resources' ? 'Available information' : 'Services offered', ':</h5>';

          $term_list = [];
          foreach ( $terms as $term ) {
            $term_string = '<li>';
            //$term_string .= '<a href="' . site_url(visitor_type() . '/service/' . $term->slug) . '" rel="tag">';
            $term_string .= $term->name;
            //$term_string .= '</a>';
            $term_string .= '</li>';

            $term_list[] = $term_string;
          }
          echo implode(",", $term_list);
      ?></ul>
    </div>
    <?php endif; ?>
  </div>
</li>
