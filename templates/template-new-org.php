<?php
/**
 * Template Name: New Org Form
 */
?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

	<div class="row-fluid">
		<main class="col-md-9">

			<?php if( isset( $_GET['updated'] ) ): ?>
				<h1 class="page-title">Thank You</h1>
				<p class="intro">We appreciate your contribution. If you need to change or update the information you submitted, please email us at <a href="mailto:info@lafloodrecovery.org">info@lafloodrecovery.org</a></p>
				<hr>
			<?php else: ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<h1 class="page-title"><?php the_title(); ?></h1>

					<?php the_content(); ?>

					<div class="org-search-form--wrap">
					<?php
						$form_object =  get_page_by_title( 'Organization Search', null, 'acf-field-group' );
						$form_ID = $form_object->ID;

						if( $form_ID ) {
							acf_form(array(
								'id'           => 'org-search-form',
								'post_id'      => 'new_post',
								'new_post'     => array(
									'post_type'   =>  get_org_cpt_name(),
									'post_status' => 'draft'
								),
								'field_groups' => array($form_ID),
								'submit_value' => 'Add New Organization',
								'updated_message' => 'Thank you for your submission',
							));
						}
					?>
					</div>
					<?php

						$form_object =  get_page_by_title( 'Organization Fields', null, 'acf-field-group' );
						$form_ID = $form_object->ID;

						if( $form_ID ) {
							acf_form(array(
								'id'           => 'org-submission-form',
								'post_id'      => 'new_post',
								'post_title'   => true,
								'new_post'     => array(
									'post_type'   =>  get_org_cpt_name(),
									'post_status' => 'draft'
								),
								'field_groups' => array($form_ID),
								'submit_value' => 'Add New Organization',
								'updated_message' => 'Thank you for your submission',
							));
						}
					?>

				<?php endwhile; ?>
			<?php endif; ?>

		</main>
	</div>

<?php get_footer(); ?>