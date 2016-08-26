<?php

get_header();

$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id; 
$prompt = $queried_object->description;
$guidelines = get_field('cat_guidelines', 'category_' . $queried_object_id );

?>
<div class="col-md-8 col-md-offset-2">
<h1><?php echo visitor_type() == 'want-to-help' ? 'Give ' : '', $queried_object->name; ?></h1>
<?php

  if ( visitor_type() == 'want-to-help' ) :

    if( !empty($guidelines) ) :
      echo '<div class="intro">', $guidelines, '</div>';
    endif;

    $items =  get_field('cat_items', 'category_' .$queried_object_id);
    if ( !empty($items) ) :

    ?>
    <div class="row-fluid">
      <div class="col-md-10 col-md-offset-1 priorities--wrap">
        <ul class="priority-items">
          <h4 class="priority-items--title">When giving, please prioritize these things:</h4>
          <?php while(  have_rows('cat_items', 'category_' .$queried_object_id ) ) : the_row();?>
            <li class="priority-item"><?php the_sub_field('item'); ?></li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
    <?php

    endif; 
  endif; // want-to-help

  get_template_part('partials/archive-list');

?>
</div>

<?php get_footer(); ?>