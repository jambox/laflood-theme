<?php
/**
 * Template Name: Map Page
 */
?>
<?php

get_header();

$organizations = cpt_query( get_org_cpt_name() );
?>
<div class="col-md-12">
	<?php create_map(); ?>
</div>

<div class="col-md-12">
<?php
		  get_template_part('partials/archive-list');
?>
</div>
<?php get_footer(); ?>