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

define('RESOURCE_CPT_NAME', 'resource');
define('SERVICES_CPT_NAME', 'service');


/*=========================================
=            Custom Taxonomies            =
=========================================*/

define('ORG_TAX_NAME', 'organization');


/*===============================
=            WP AJAX            =
===============================*/

define( 'AJAX', 'wp_ajax_');
define( 'AJAX_PUBLIC', 'wp_ajax_nopriv_');




?>