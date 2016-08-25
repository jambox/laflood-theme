<div class="col-md-10">
  <h1>Give <?php echo get_queried_object()->name; ?>.</h1>
  <?php if ( get_queried_object()->name !== 'Funds' ): ?>
    <p class="intro">All types of contributions are helpful, but please keep in mind that money and bulk goods provide the biggest impact for the affected areas.</p>
  <?php endif ?>
  <h3 class="top-orgs-header">Some highly recommended ways to give in this category are listed below:</h3>
  <?php if( have_posts() ) : ?>
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
          <h2 class="org-title"><a href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h2>
        </header>
        <div>
          <?php the_content(); ?>
        </div>
        <div class="org-meta">

          <div class="tag-list">
            <h5>Services Offered:</h5>
            <?php echo get_the_tag_list(); ?>
          </div>

          <?php if ($org_website): ?>
            <a href="<?php echo $org_website ?>" target="_blank" class="btn btn-default">Website</a>
          <?php endif ?>
  
          <?php if ( !empty( $org_location['lat'] ) ): ?>
            <a href="<?php echo $org_location['lat'] . ', ' . $org_location['lng'] ?>" class="btn btn-default">Map</a>
          <?php endif ?>

          <?php if ($org_main_phone): ?>
            <a href="tel:<?php echo $org_main_phone ?>" class="btn btn-default">Call</a>
          <?php endif ?>

        </div>
      </li>
    <?php endwhile;?>
  </ul>
  <?php endif; ?>
  </ul> 
</div>