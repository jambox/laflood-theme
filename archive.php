<?php

get_header();

$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id; 
$prompt = $queried_object->description;
$guidelines = get_field('cat_guidelines', 'category_' . $queried_object_id );

?>
<div class="col-md-8">

<?php if ( is_client_page() ): ?>
  <h1><?php echo $queried_object->name; ?></h1>
<?php endif ?>

<?php

  if ( !is_client_page() ) :

    if( !empty($guidelines) ) :
      echo '<div class="intro">', $guidelines, '</div>';
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

  get_template_part('partials/archive-list');

?>
</div>

<?php get_footer(); ?>