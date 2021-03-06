<?php


function theme_setup() {
  // Register menus
  register_nav_menus(array(
    'footer_navigation' => 'Footer Navigation'
  ));

  // Add post thumbnails
  add_theme_support('post-thumbnails');
  add_image_size('grid-thumb', 480 * 1.7, 480 * 1.7, true); // ~ 816px

  // Add HTML5 markup for captions
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/dist/styles/laflood.css');
}
add_action('after_setup_theme', 'theme_setup');

// Register sidebars
function theme_widgets_init() {
  register_sidebar(array(
    'name'          => 'Primary',
    'id'            => 'primary-sidebar',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
  ));
}
add_action('widgets_init', 'theme_widgets_init');

// Set google map API key for ACF
function laflood_acf_init() { 
  acf_update_setting('google_api_key', GOOGLE_MAPS_API_KEY);
}
add_action('acf/init', 'laflood_acf_init');

// Create custom rewrite tags & rules
function laflood_custom_rewrite_tags() {
  add_rewrite_tag( '%want-to-help%', '([^&]+)' );
  add_rewrite_tag( '%need-help%', '([^&]+)' );
  add_rewrite_tag( '%explore%', '([^&]+)' );
}
add_action('init', 'laflood_custom_rewrite_tags', 10, 0);

function laflood_custom_rewrite_rule() {
  add_rewrite_rule( '^want-to-help/(.+?)/page/?([0-9]{1,})/?$', 'index.php?lfr_visitor_type=want-to-help&category_name=$matches[1]&paged=$matches[2]', 'top' );
  add_rewrite_rule( '^want-to-help/(.+?)/?$', 'index.php?lfr_visitor_type=want-to-help&category_name=$matches[1]', 'top' );
  add_rewrite_rule( '^need-help/(.+?)/page/?([0-9]{1,})/?$', 'index.php?lfr_visitor_type=need-help&category_name=$matches[1]&paged=$matches[2]', 'top' );
  add_rewrite_rule( '^need-help/(.+?)/?$', 'index.php?lfr_visitor_type=need-help&category_name=$matches[1]', 'top' );
  add_rewrite_rule( '^explore/(.+?)/?$', 'index.php?pagename=explore&lfr_visitor_type=$matches[1]', 'top' );
}
add_action('init', 'laflood_custom_rewrite_rule', 10, 0);


// Fix conflict with ACF & Relevanssi
function rlv_acf_related_search($search_ok) {
    if (DOING_AJAX) $search_ok = false;
    return $search_ok;
}
add_filter('relevanssi_admin_search_ok', 'rlv_acf_related_search');