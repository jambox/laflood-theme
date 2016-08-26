<?php
$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id; 

if ( archive_layout_type($queried_object_id) === 'short' ) : ?>
  <h3 class="top-orgs-header">Some highly recommended ways to give in this category are listed below:</h3>
<?php endif;

if( have_posts() ) : ?>
<ul class="org-list">
  <?php    
  while ( have_posts() ) : the_post();
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

  ?>
    <li class="org-item">
      <header>
        <h2 class="org-title"><?php echo /*'<a href="', the_permalink(), '">',*/ the_title() /*, '</a>'; */?></h2>
      </header>
      <div class="small">
        <?php the_content(); ?>
      </div>
      <div class="org-meta">
      <?php

        $terms = get_the_terms( null, 'lfr_service' );
        if( !empty($terms) ) : ?>
        <div class="tag-list">
          <ul class="list-unstyled list-inline">
            <h5>Services offered:</h5><?php
              $term_list = [];
              foreach ( $terms as $term ) {
                $term_list[] = '<li><a href="' . site_url(visitor_type() . '/service/' . $term->slug) . '" rel="tag">' . $term->name . '</a></li>';
              }
              echo implode(",", $term_list);
          ?></ul>
        </div>
        <?php endif; ?>

        <?php if ($org_website): ?>
          <a href="<?php echo $org_website ?>" target="_blank">Website</a>
        <?php endif ?>

        <?php if ( !empty( $org_location['lat'] ) ): ?>
          <a href="<?php echo $org_location['lat'] . ', ' . $org_location['lng'] ?>">Map</a>
        <?php endif ?>

        <?php if ($org_main_phone): ?>
          <a href="tel:<?php echo $org_main_phone ?>">Call</a>
        <?php endif ?>

      </div>
    </li>
  <?php endwhile;?>
<?php endif; ?>
</ul>