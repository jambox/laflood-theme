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
<?php

  if ( $organizations->have_posts() ) :
  	?>
    <ul class="organizations">
  	<?php
  	while ( $organizations->have_posts() ): $organizations->the_post();
    ?>
        <li class="org-item"><?php the_title(); ?></li>
    <?php
    endwhile;
    ?>
    </ul>
    <?php
  endif;


?>
</div>

<?php get_footer(); ?>