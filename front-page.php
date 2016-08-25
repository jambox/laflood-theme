<?php get_header(); ?>
<?php
	// Dynamically display top-level Categories by category visitor type.
	$args = array(
		'hide_empty' => false,
		'parent'=>0
	);

	$cats = get_terms('category', $args);
	if( !empty($cats) ){

		$services = [];
		foreach ( $cats as $cat ) {
			// Skip 'uncategorized' term
			if( $cat->term_id == 1) continue;
			$visitor_types = get_field('cat_visitor_type', $cat);
			if ( !is_array($visitor_types) ) continue;

			foreach ( $visitor_types as $visitor_type ) {
				$slug = $visitor_type['value'];
				$services[$slug]['title'] = $visitor_type['label'];
				$services[$slug]['cat'][] = $cat;
			}
		}

	}

	foreach ( $services as $service => $service_details ) :
		?>
		<section class="home-page-section <?php echo sprintf('home-page-section--%s', $service); ?> col-md-8">
			<h2 class="home-page-section--title"><a href="<?php echo site_url($service) ?>"><?php
			 $title_array = explode(' ', esc_attr($service_details['title'])); 
			 if (count($title_array) > 1 ) { 
			   $title_array[count($title_array)-1] = '<span class="nowrap">'.($title_array[count($title_array)-1]).'.<i class="fa fa-fw fa-chevron-right"></i></span>'; 
			   echo implode(' ', $title_array);  
			 } ?></a></h2>
			<div class="home-page-ctas--wrap">
				<div class="home-page-ctas--list">
					<span><?php echo $service == 'need-help' ? 'Find ' : 'Give '; ?></span>
					<?php
					$top_level_cat_objs = $service_details['cat'];
					$cat_list = array_map(
						function($cat_obj) use ($service ) {
							$cat_url = $service . '/' . $cat_obj->slug;
							return '<a class="large-link" href="' . site_url($cat_url) . '/' . '">'. strtolower($cat_obj->name) .'</a>';
						},
					$top_level_cat_objs );

					$more = $service == 'want-to-help' ? 'much more' : 'other services';

					$cat_list[] = sprintf('or <a class="large-link" href="%s">%s</a>.', site_url( 'explore/' . $service ), $more );

					echo implode(', ', $cat_list); ?>
	
				</div>
			</div>
		</section>
		<?php
  endforeach;?>
<?php get_footer(); ?>
