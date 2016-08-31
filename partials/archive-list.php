<?php
$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id; 

if( have_posts() ) :

if ( archive_layout_type($queried_object_id) === 'short' && $queried_object->slug !== 'recovery-resources' && !is_client_page() ) : ?>
  <h3 class="top-orgs-header">Some highly recommended ways to give in this category are listed below:</h3>
<?php endif; ?>
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
        <h2 class="org-title"><?php
        echo '<a href="', the_permalink(), '">',
        /* if (!empty($org_website) ) {
          '<a href="', esc_url($org_website), '">';
        } */
        the_title();
        echo '</a>'; ?></h2>
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
            <?
              echo '<h5>', $queried_object->slug == 'recovery-resources' ? 'Available information' : 'Services offered', ':</h5>';

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
        <ul class="list-unstyled list-inline contact-list"><?php
          if ($org_website):
            ?><li><a href="<?php echo $org_website ?>" target="_blank">Website</a></li><?php
          endif?><?php
          if ( !empty( $org_location['address'] ) ): echo $org_website ? '&middot;' : ''; ?><li><a href="https://www.google.com/maps/?q=<?php echo get_the_title() . ' ' . $org_location['address'] ?>" target="_blank">Map</a></li><?php
          elseif (!empty( $org_location['lat'] ) ): echo $org_website ? '&middot;' : ''; ?><li><a href="https://www.google.com/maps/?q=<?php echo get_the_title() . ' ' . $org_location['lat'] . ', ' . $org_location['lng'] ?>" target="_blank">Map</a></li><?php
          endif ?><?php
          if ($org_main_phone): echo $org_website || $org_location['lat'] ? '&middot;' : '' ?><li><a href="tel:+1<?php echo preg_replace('/[^\d+]/', '', $org_main_phone) ?>"><?php echo $org_main_phone; ?></a></li><?php
          endif
       ?></ul>
      </div>
    </li>
  <?php endwhile;?>
<?php endif; ?>
</ul>
<?php the_posts_pagination([
  'prev_text' => '<i class="fa fa-chevron-left"></i> Previous',
  'next_text' => 'Next <i class="fa fa-chevron-right"></i>'
])
?>