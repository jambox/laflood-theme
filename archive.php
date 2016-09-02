<?php

get_header();

$queried_object = get_queried_object();

$queried_object_id = $queried_object->term_id; 
$prompt = $queried_object->description;
$guidelines = get_field('cat_guidelines', 'category_' . $queried_object_id );

?>

<?php if ( visitor_type() ): ?>
  <div class="col-md-12">
    <?php
      $term_parent = $queried_object->parent;
      if ( $term_parent > 0 ) {
        $parent = get_term($term_parent);
        echo '<div class="sub-cat-breadcrumbs">Back to <a href="/', visitor_type(), '/', $parent->slug, '">', $parent->name, '</a></div>';
      } ?><h1 class="inline"><?php echo $queried_object->name; ?></h1>
  </div>
<?php endif ?>

<?php

  if ( !is_client_page() && $queried_object ) :

    if( !empty($guidelines) ) :
      echo '<div class="intro col-md-9">', $guidelines, '</div>';
    endif;

    $items =  get_field('cat_items', 'category_' .$queried_object_id);
    if ( !empty($items) ) :

    ?>
    <ul class="priority-items">
      <h4 class="priority-items--title">When giving, please prioritize these things:</h4>
      <?php while(  have_rows('cat_items', 'category_' .$queried_object_id ) ) : the_row();?>
        <li class="priority-item"><?php the_sub_field('item'); ?></li>
      <?php endwhile; ?>
    </ul>
    <?php

    endif; 
  endif; // want-to-help
  ?>
  <?php get_template_part('partials/archive-list'); ?>

<?php get_footer(); ?>