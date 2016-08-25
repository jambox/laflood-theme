<?php 

/**
 * This is for things like CPT generation
 * where we need to namespace stuff
 */
define('THEME_PREFIX', 'lfr');
define('THEME_URL', get_bloginfo('stylesheet_directory').'/');


/**
 * Bolt initial setup and constants
 */

define('GOOGLE_MAPS_API_KEY', 'AIzaSyDUC_JWLxIKRQbQbDJlV8qIYxLts0FGx2c');


/*=========================================
=            Custom Post Types            =
=========================================*/

define('RESOURCES_CPT_NAME', 'resource');
define('ORG_CPT_NAME', 'org');


/*=========================================
=            Custom Taxonomies            =
=========================================*/

define('PARENT_ORG_TAX', 'parent_org');
define('SERVICE_TAX_NAME', 'service');
define('VISITOR_TYPE_TAX_NAME', 'visitor_type');

define('RESOURCE_TYPE_TAX_NAME', 'resource_type');


/*===============================
=            WP AJAX            =
===============================*/

define( 'AJAX', 'wp_ajax_');
define( 'AJAX_PUBLIC', 'wp_ajax_nopriv_');




?>