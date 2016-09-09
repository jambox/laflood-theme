<?php

get_header();

$queried_object = get_queried_object();
$queried_object_id = $queried_object->term_id; 
$prompt = $queried_object->description;
$guidelines = get_field('cat_guidelines', 'category_' . $queried_object_id );
$need_help_subheader = get_field('cat_need_help_subheader', 'category_' . $queried_object_id );

$visitor_type = visitor_type();
?>
<div class="archive-list-header col-md-12">
  <div class="row">
    <div class="col-md-8">
      <?php if ( $visitor_type ): ?>
          <?php
            $term_parent = $queried_object->parent;
            if ( $term_parent > 0 ) {
              $parent = get_term($term_parent);
              echo '<div class="sub-cat-breadcrumbs">Back to <a href="/', $visitor_type, '/', $parent->slug, '">', $parent->name, '</a></div>';
            }
            $find_or_give = is_client_page() ? "Find " : "Give ";
            ?>
            <h1 class="inline"><?php echo $find_or_give . $queried_object->name; ?></h1>
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

      if ( is_client_page() && $queried_object && !get_query_var('paged', 0) ) :
        if( !empty($need_help_subheader) ) :
          echo '<div class="intro">', $need_help_subheader, '</div>';
        endif;
      endif;      
      ?>
    </div>
    <?php
    $queried_object_tax = $queried_object->taxonomy;
    $children = get_terms( array(
      'child_of' => $queried_object_id,
      'taxonomy' => $queried_object_tax,
      'hide_empty' => true
    ) );

    if ( is_array($children) && count($children) > 0 && $visitor_type ) : ?>
      <ul class="sub-cat-list col-md-12">
        <h5 class="list-header">Choose a category to refine your search:</h5>

        <?php
        $visitor_type_term = get_term_by('slug', $visitor_type, 'lfr_visitor_type');
        $subcat_list = array();
        foreach ( $children as $child ) {
          global $wpdb;
          $filtered_count = $wpdb->get_var(" SELECT COUNT(*) FROM $wpdb->posts p
            JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id JOIN $wpdb->term_relationships tr2 ON p.ID = tr2.object_id
            WHERE ( tr.term_taxonomy_id = $child->term_id AND tr2.term_taxonomy_id = $visitor_type_term->term_id ) AND p.post_status = 'publish'
            LIMIT 1 ");
          if ( intval($filtered_count) > 0 ){
            $term = get_term( $child, $queried_object_tax );
            $parent = get_term( $term->parent, $queried_object_tax );
            $subcat_list[] = '<li><a class="sub-cat-link" href="/' . $visitor_type . '/' . $parent->slug . '/' . $term->slug . '">' . $term->name . '</a></li>';
          }
        }
        echo implode('', $subcat_list);
        ?>
      </ul>
    <?php endif;?>
  </div>
</div> <!-- archive list header -->
  <?php get_template_part('partials/archive-list'); ?>

<?php get_footer(); ?>