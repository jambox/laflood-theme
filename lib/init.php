<?php
/**
 * Bolt initial setup and constants
 */

define('GOOGLE_MAPS_API_KEY', 'AIzaSyDUC_JWLxIKRQbQbDJlV8qIYxLts0FGx2c');


function bolt_setup() {
  // Make theme available for translation
  // @TODO add correct .pot file n stuff
  load_theme_textdomain('bolt', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'bolt'),
    'footer_navigation' => __('Footer Navigation', 'bolt')
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  add_image_size('grid-thumb', 480 * 1.7, 480 * 1.7, true); // ~ 816px

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/dist/styles/laflood.css');
}
add_action('after_setup_theme', 'bolt_setup');

/**
 * Register sidebars
 */
function bolt_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'bolt'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'bolt'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'bolt_widgets_init');



function my_acf_init() {
  
  acf_update_setting('google_api_key', GOOGLE_MAPS_API_KEY);
}

add_action('acf/init', 'my_acf_init');
