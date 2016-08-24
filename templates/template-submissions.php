<?php
/**
 * Template Name: Submissions Form
 */
?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

	<div class="row-fluid">
		<main class="col-md-8 col-md-offset-2">

			<?php while ( have_posts() ) : the_post(); ?>

				<h1><?php the_title(); ?></h1>

				<?php the_content(); ?>

				<?php
					$form_object =  get_page_by_title( 'Organizations Fields', null, 'acf-field-group' );
					$form_ID = $form_object->ID;

					if( $form_ID ) {
						acf_form(array(
							'id'           => 'org-submission-form',
							'post_id'      => 'new_post',
							'new_post'     => array(
								'post_type'   =>  get_org_cpt_name(),
								'post_status' => 'draft'
							),
							'field_groups' => array($form_ID),
							'submit_value' => 'Add This Organization'
						));
					}
				?>

			<?php endwhile; ?>

		</main>
	</div>

	<?php get_template_part('partials/org-modal'); ?>
<?php get_footer(); ?>