<?php
/**
 * Template Name: New Org Form
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
					$form_object =  get_page_by_title( 'Organization Fields', null, 'acf-field-group' );
					$form_ID = $form_object->ID;

					if( $form_ID ) {
						acf_form(array(
							'id'           => 'org-submission-form',
							'post_id'      => 'new_post',
							'post_title'   => true,
							'post_content' => true,
							'new_post'     => array(
								'post_type'   =>  get_org_cpt_name(),
								'post_status' => 'draft'
							),
							'field_groups' => array($form_ID),
							'submit_value' => 'Add New Organization',
							'updated_message' => 'Thank you for your submission',
							'return'       => '?success=true'
						));
					}
				?>

			<?php endwhile; ?>

		</main>
	</div>

<?php get_footer(); ?>