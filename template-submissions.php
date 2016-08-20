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

				<?php acf_form(array(
					'id'           => 'resource-submission-form',
					'post_id'      => 'new_post',
					'new_post'     => array(
						'post_type'   =>  get_resource_cpt_name(),
						'post_status' => 'draft'
					),
					'field_groups' => array(71),
					'submit_value' => 'Submit a resource'
				)); ?>

			<?php endwhile; ?>

		</main><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>