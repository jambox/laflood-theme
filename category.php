<?php get_header(); ?>

  <h4 class="resource-list--title">Ways to contribute <?php echo get_queried_object()->name; ?> to the Louisiana relief effort.</h4>

<?php 
$queried_object = get_queried_object(); 
$prompt = $queried_object->description;

if( $prompt ) : ?>
<div class="row-fluid">
  <div class="page-prompt col-md-6 col-md-offset-3"><?php echo $prompt; ?></div>
</div>
<?php endif; ?>

<?php
$items =  get_field('items', 'category_' .$queried_object->term_id);

if ( $items ): ?>
  
<div class="row-fluid">
  <div class="col-md-10 col-md-offset-1">
    <ul class="priority-items">
      <h4 class="priority-items--title">When giving, please prioritize these things:</h4>
      <?php while(  have_rows('items', 'category_' .$queried_object->term_id ) ) : the_row();?>
        <li class="priority-item"><?php the_sub_field('item'); ?></li>
      <?php endwhile; ?>
    </ul>

  </div>
</div>

<?php endif; ?>

<?php get_template_part('partials/resource-list' ); ?>

<?php get_footer(); ?>