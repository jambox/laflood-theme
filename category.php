<?php get_header(); ?>

<?php 
if( is_page() ) {
  $prompt = get_the_title();
} elseif ( is_category() ) {
  $prompt = get_queried_object()->description;
}

?>

<h2 class="page-prompt"><?php echo $prompt; ?></h2>

<?php get_template_part('partials/resource-list' ); ?>

<?php get_footer(); ?>