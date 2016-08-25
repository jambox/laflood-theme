<?php get_header(); ?>
<?php
$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id; 
$prompt = $queried_object->description;
$guidelines = get_field('guidelines', 'category_' . $queried_object_id );
$archive_layout = get_field('cat_archive_display', 'category_' . $queried_object_id );

if ( $guidelines ): ?>
  <div class="row-fluid">
    <div class="col-md-8 col-md-offset-2">
      <h3>Please Give Thoughtfully</h3>
      <p><?php the_field('guidelines', 'category_' .$queried_object_id ) ?></p>
    </div>
  </div>  
<?php endif; ?>
<?php 

if( $prompt ) : ?>
<div class="row-fluid">
  <div class="page-prompt col-md-6 col-md-offset-3"><?php echo $prompt; ?></div>
</div>
<?php endif; ?>

<?php
$items =  get_field('items', 'category_' .$queried_object_id);

if ( $items ): ?>
  
<div class="row-fluid">
  <div class="col-md-10 col-md-offset-1 priorities--wrap">
    <ul class="priority-items">
      <h4 class="priority-items--title">When giving, please prioritize these things:</h4>
      <?php while(  have_rows('items', 'category_' .$queried_object_id ) ) : the_row();?>
        <li class="priority-item"><?php the_sub_field('item'); ?></li>
      <?php endwhile; ?>
    </ul>

  </div>
</div>

<?php endif; ?>

<?php
  if ( $archive_layout === 'list' ) {
    get_template_part('partials/archive-list-short' );
  } else {
    get_template_part('partials/archive-list-cards' );
  }


?>

<?php get_footer(); ?>