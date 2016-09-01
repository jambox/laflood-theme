<?php get_header(); ?>
<?php

  $visitor_types = array(
  	array(
  		'label' => 'I need help',
  		'value' => 'need-help'
		),
  	array(
  		'label' => 'I want to help',
  		'value' => 'want-to-help'
		)
  );


	foreach ($visitor_types as $type ) :
		$title = $type['label'];
		$slug = $type['value'];
		?>
		<section class="home-page-section <?php echo sprintf('home-page-section--%s', $slug); ?> col-md-8">
			<h2 class="home-page-section--title"><a href="<?php echo site_url($slug) ?>"><?php echo str_no_wrap( $title, '.'); ?></a></h2>
			<div class="home-page-ctas--wrap">
				<div class="home-page-ctas--list">
					<span><?php echo $slug == 'need-help' ? 'Find ' : 'Give '; ?></span>
					<?php
					$cat_list = get_main_cat_list( $type );

					$more = $slug == 'want-to-help' ? 'much more' : 'other services';

					$cat_list[] = sprintf('or <a class="large-link" href="%s">%s</a>.', site_url( 'explore/' . $slug ), $more );

					echo implode(', ', $cat_list); ?>
	
				</div>
			</div>
      <?php if ( $slug == 'need-help' ): ?>
        <div class="home-page-resources-cta">
          <p class="intro">For next steps and help with long term recovery,</p>
          <h4><a href="<?php echo site_url( $slug . '/recovery-resources' ); ?>">view our recovery resources<i class="fa fa-fw fa-arrow-right"></i></a></h4>
        </div>
        
      <?php endif ?>
		</section>
	<?php
  endforeach;?>
<?php get_footer(); ?>
