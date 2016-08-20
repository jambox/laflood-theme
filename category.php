<?php get_header(); ?>

<?php 
if( is_page() ) {
  $prompt = get_the_title();
} elseif ( is_category() ) {
  $prompt = get_queried_object()->description;
}

?>

<div class="row-fluid">
  <div class="page-prompt col-md-6 col-md-offset-3"><?php echo $prompt; ?></div>
</div>

<?php get_template_part('partials/resource-list' ); ?>

<?php get_footer(); ?>