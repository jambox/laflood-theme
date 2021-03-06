<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label>
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'twentysixteen' ); ?></span>
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Start typing to search ...', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
  </label>
  <?php if ( $type = visitor_type() && false ): ?>
    <input type="hidden" name="lfr_visitor_type" value="<?php echo $type; ?>" />
  <?php endif ?>
  <button type="submit" class="search-submit">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-search fa-stack-1x fa-inverse"></i>
    </span>
    <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'twentysixteen' ); ?></span>
  </button>
</form>