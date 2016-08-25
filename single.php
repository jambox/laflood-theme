<?php get_header(); ?>
	
<?php while (have_posts()) : the_post(); ?>
	<?php 
		// Organizations Meta
		$org_category = get_field('org_category');
		$org_parent_org = get_field('org_parent_org');
		$org_services = get_field('org_services');
		$org_visitor_type = get_field('org_visitor_type');
		$org_location = get_field('org_location');
		$org_handles_goods = get_field('org_handles_goods');
		
		$org_location_type_object = get_field_object('field_57ba96f045dad');	
		$org_location_type = get_field('org_location_type');
		$org_location_type_label = $org_location_type_object['choices'][ $org_location_type ];

		$org_website = get_field('org_website');
		$org_main_phone = get_field('org_main_phone');
		$org_main_email = get_field('org_main_email');
		$org_contacts = get_field('org_contacts');
	?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php if( $org_parent_org ): ?>
		<h2><?php echo $org_parent_org->name; ?></h2>
	  <?php endif; ?>
    </header>
    <div class="entry-content">
    	<?php if( $org_services ): ?>
    		<ul>
      		<?php foreach( $org_services as $org_services_term ): ?>
				<li><?php echo $org_services_term->name; ?></li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?> 

      	<?php the_content(); ?>
    </div>
    <div class="entry-meta">
		<?php if( $org_category ): ?>
			<?php echo $org_category->name; ?>
	  	<?php endif; ?>
	  	<?php if( $org_visitor_type ): ?>
    		<ul>
      		<?php foreach( $org_visitor_type as $org_visitor_type_term ): ?>
				<li><?php echo $org_visitor_type_term->name; ?></li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?> 
    	<?php if( $org_location ):?>
    	 	<?php echo $org_location['address']; ?>
    	<?php endif; ?> 

    	<?php if( $org_handles_goods ):?>
    		<?php echo $org_location_type_label; ?>
    	<?php endif; ?>

    	<?php if( $org_website ):?> 
			<a href="<?php echo $org_website; ?>">Website</a>
		<?php endif; ?>

		<?php if( $org_main_phone ):?>
			<?php echo $org_main_phone; ?> 
		<?php endif; ?>

		<?php if( $org_main_email ):?> 
			<a href="mailto:<?php echo $org_main_email; ?>"><?php echo $org_main_email; ?></a>
		<?php endif; ?> 


		<?php if( have_rows('org_contacts') ): ?>

			<div class="org-contacts">

			<?php while ( have_rows('org_contacts') ) : the_row(); 

			        $org_contact_name = get_sub_field('org_contact_name');
			        $org_contact_title = get_sub_field('org_contact_title');
			        $org_contact_email = get_sub_field('org_contact_email');
			        $org_contact_phone = get_sub_field('org_contact_phone');
			    ?>    
			    <div class="org-contact">
				    <?php if( $org_contact_name ): ?> 
				    	<?php echo $org_contact_name; ?>
				    <?php endif;?> 
				    <?php if( $org_contact_title ): ?> 
				    	<?php echo $org_contact_title; ?>
				    <?php endif;?> 
				    <?php if( $org_contact_email ): ?> 
				    	<a href="<?php echo $org_contact_email; ?>"><?php echo $org_contact_email; ?></a>
				    <?php endif;?> 
				    <?php if( $org_contact_phone ): ?> 
				    	<?php echo $org_contact_phone; ?>
				    <?php endif;?> 

			    </div>

			<?php endwhile; ?>
			

			</div>
			

			    

			<?php endif; ?>



    </div>

  </article>
<?php endwhile; ?>

<?php get_footer(); ?>