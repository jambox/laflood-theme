<?php get_header(); ?>
  
<?php while (have_posts()) : the_post();

		// Organizations Meta
		$org_category = get_field('org_category');
		$org_parent_org = get_field('org_parent_org');
		$org_services = get_field('org_services');
		$org_visitor_type = get_field('org_visitor_type');
		$org_location = get_field('org_location');
		$org_handles_goods = get_field('org_handles_goods');
		
		$org_location_type_object = get_field_object('field_57ba96f045dad');	
		$org_location_type = get_field('org_location_type');
		$org_location_type_label = $org_handles_goods ? $org_location_type_object['choices'][ $org_location_type ] : false;

		$org_website = get_field('org_website');
		$org_main_phone = get_field('org_main_phone');
		$org_main_email = get_field('org_main_email');
		$org_contacts = get_field('org_contacts');

    // Link to categories
    // if( $org_category ) {
    //   echo $org_category->name;
    // }
	?>
  <article <?php post_class(); ?>>
    <header class="col-md-8">
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php if( $org_parent_org ) {
        echo '<h2>', $org_parent_org->name, '</h2>';
      } ?>
    </header>
    <div class="single-entry-content col-md-8">
      <?php the_content(); ?>
    </div>
    <div class="single-sidebar col-md-3">
      <h3>Contact Info</h3>
    <?php
      echo '<ul class="org-location list-unstyled">';
    if( !empty($org_location) ) {
      //$address = preg_replace('/[,]/', '<br>', $org_location['address'], 1);
      $address_array = explode(',', $org_location['address']);
      echo '<li>';
      $i = 0;
      foreach ($address_array as $address_line) {
        echo $address_line;
        if ($i == 1) {
          echo ', ';
        } else {
          echo '<br>';
        }
        $i++;
      }
      echo '</li>';
    }

    if( !empty($org_main_phone) || !empty($org_main_email) ) {
      echo '<ul class="list-unstyled list-inline">';
      if( !empty($org_main_email) ) {
        echo '<li><a href="mailto:', $org_main_email, '">email</a></li>';
      }
      if ( !empty($org_main_phone) ) {
        if ( !empty($org_main_email) ) echo '&middot;';
        $org_main_phone =  preg_replace('/[^\d+]/', '', $org_main_phone); // Remove non-int chars
        $org_main_phone_formatted =  "(".substr($org_main_phone, 0, 3).") ".substr($org_main_phone, 3, 3)."-".substr($org_main_phone,6); // Re-format

        echo '<li><a href="tel:+1' . $org_main_phone . '">', $org_main_phone_formatted, '</a></li>';
      }
      echo '</ul>';
    }

    if( !empty($org_website) || !empty($org_location['address']) ) {
      echo '<li><ul class="list-unstyled list-inline">';
      if ( !empty($org_website) ) {
        echo '<li><a href="', $org_website, '">Website</a></li>';
      }
      if ( !empty($org_location) ) {
        if ( !empty($org_website) ) echo '&middot;';
        print_r($org_location['address']);
        echo '<li><a href="https://maps.google.com?q=', urlencode($org_location['address']), '" target="_blank">Map</a></li>';
      }
      echo '</ul></li>';
    }
    echo '</ul>'; // /org_location, org_main_phone, org_website

    if( have_rows('org_contacts') ) {
      echo '<ul class="org-contacts list-unstyled">',
           '<h3>Additional Contact</h3>';

      while ( have_rows('org_contacts') ) { the_row(); 

        $org_contact_name = get_sub_field('org_contact_name');
        $org_contact_title = get_sub_field('org_contact_title');
        $org_contact_email = get_sub_field('org_contact_email');
        $org_contact_phone = get_sub_field('org_contact_phone');
        $org_contact_phone =  preg_replace('/[^\d+]/', '', $org_contact_phone); // Remove non-int chars
        // Re-format        
        $org_contact_phone_formatted =  "(".substr($org_contact_phone, 0, 3).") ".substr($org_contact_phone, 3, 3)."-".substr($org_contact_phone,6);

        echo '<ul><li><ul class="list-unstyled">';
        if ( !empty($org_contact_name) ) {
          echo '<li class="org-contacts--name">',
          $org_contact_name  ? '<span>' . $org_contact_name . '</span>' : '',
          $org_contact_title ? ', <em>' . $org_contact_title . '</em>' : '',
          '</li>';
        }
        if ( !empty($org_contact_email) || !empty($org_contact_phone) ) {
          $pipe = $org_contact_email && $org_contact_phone ? ' | ' : '';
          echo '<li class="org-contacts--details">',
          $org_contact_email ? '<a href="mailto:' . $org_contact_email . '"><em>Email</em></a>' : '',
          $pipe,
          $org_contact_phone ? '<a href="tel:+1' . $org_contact_phone . '">' . $org_contact_phone_formatted . '</a>' : '',
          '</li>';
        }

        echo '</ul></li></ul>';
      } // endwhile

      echo '</ul>';
    } // endif org_contacts

    if( !empty($org_services) ) {
      echo '<h3>Services Offered</h3>',
           '<ul class="org-services">';

      foreach( $org_services as $org_services_term ) {
        $term_url = get_term_link($org_services_term, get_service_tax_name());
        echo '<li>',
          /* '<a href="', $term_url, '">', */
             esc_attr($org_services_term->name),
          /* '</a>', */
             '</li>';
      }
      echo '</ul>';
    } // endif org_services

    //if( !empty($org_visitor_type) ) {
    //  echo '<ul>';
    //  foreach( $org_visitor_type as $org_visitor_type_term ) {
    //    echo '<li>', $org_visitor_type_term->name, '</li>';
    //  }
    //  echo '</ul>';
    //}

    if( !empty($org_handles_goods) ) {
      echo '<ul class="org-handles-goods list-inline">';
      if ( $org_location_type == 'both') {
        $choices = $org_location_type_object['choices'];
        $both = array_pop($choices);
        echo '<li>', implode( ' &amp; ', $choices ), "</li>";
      } else {
        echo  '<li>', $org_location_type_label, ' Only</li>';
      }
      echo '</ul>';
    }

    ?>
    </div>
    <div class="single-footer col-md-8"><h5>
    <?php
    if( !empty($org_category) ) {
      $html = '<strong>More:</strong> Find organizations in ';
      $orgs = array();
      foreach( $org_category as $org_cat ) {
        $orgs[] = '<a href="/want-to-help/' . $org_cat->slug . '">' . $org_cat->name . '</a>';   
      }
      $html .= implode(', ', $orgs);
      $html .= '.';
      echo $html;
    }
    ?>
    </h5></div>
  </article>
<?php endwhile; ?>

<?php get_footer(); ?>