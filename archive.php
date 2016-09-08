<?php

get_header();

$queried_object = get_queried_object();

$queried_object_id = $queried_object->term_id; 
$prompt = $queried_object->description;
$guidelines = get_field('cat_guidelines', 'category_' . $queried_object_id );

?>
<div class="archive-list-header">
  <div class="col-md-6">
    <?php if ( visitor_type() ): ?>
        <?php
          $term_parent = $queried_object->parent;
          if ( $term_parent > 0 ) {
            $parent = get_term($term_parent);
            echo '<div class="sub-cat-breadcrumbs">Back to <a href="/', visitor_type(), '/', $parent->slug, '">', $parent->name, '</a></div>';
          } ?><h1 class="inline"><?php echo $queried_object->name; ?></h1>
    <?php endif ?>

    <?php

    if ( !is_client_page() && $queried_object && !get_query_var('paged', 0) ) :

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
    ?>
  </div>
  <?php
  $queried_object_tax = $queried_object->taxonomy;
  $children = get_terms( array(
    'child_of' => $queried_object_id,
    'taxonomy' => $queried_object_tax,
    'hide_empty' => true
  ) );

  if ( is_array($children) && count($children) > 0) : ?>
    <ul class="sub-cat-list col-md-4 col-md-offset-2">
      <p>Choose from one of the categories below to refine your search:</p>

      <?php if ( isset( $queried_object->cat_name ) ): ?>
        <h5 class="list-header">Types of <?php echo $queried_object->cat_name; ?></h5>
      <?php endif ?>
      <?php
      $subcat_list = array();
      foreach ( $children as $child ) {
        $term = get_term( $child, $queried_object_tax );
        $parent = get_term( $term->parent, $queried_object_tax );
        $subcat_list[] = '<li><a class="sub-cat-link" href="/' . visitor_type() . '/' . $parent->slug . '/' . $term->slug . '">' . $term->name . '</a></li>';
      }
      echo implode('', $subcat_list);
      ?>
    </ul>
  <?php endif;?>
</div>
  <?php get_template_part('partials/archive-list'); ?>

<?php get_footer(); ?>