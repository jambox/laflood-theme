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
		<section class="home-page-section <?php echo sprintf('home-page-section--%s', $service);  ?> col-md-8">
			<h2 class="home-page-section--title"><?php echo esc_attr($service_details['title']) ?>.</h2>
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

					$more = $service == 'want-to-help' ? 'more' : 'other services';

					$cat_list[] = sprintf('or <a class="large-link" href="%s">%s</a>.', site_url( $service . '#something-else' ), $more );

					echo implode(', ', $cat_list); ?>
	
				</div>
			</div>
		</section>
		<?php if ($service == 'want-to-help'): ?>
			
		<section class="col-md-8"><p>This is a living directory of ways you can help the people and families that have been affected by the August 2016 flood disaster. All types of contributions are helpful, but please keep in mind that <a href="">money</a> and <a href="">bulk goods</a> provide the biggest impact for the affected areas.</p></section>
		<?php endif ?>
		<?php
  endforeach;?>

<?php get_footer(); ?>
