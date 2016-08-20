<?php
/**
 * This is for things like CPT generation
 * where we need to namespace stuff
 */
define('THEME_PREFIX', 'laflood');

/**
 * Bolt includes
 *
 * The $bolt_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$bolt_includes = array(
  'lib/utils.php',             // Helper Functions
  'lib/init.php',              // Initial theme setup and constants
  'lib/logging.php',           // Debugging / Kenny loggins stuff
  'lib/scripts-styles.php',    // JS & CSS Enqueuing for WP
  'lib/nav-menu-walker.php',   // Custom Nav Walker
  'lib/custom-post-types.php', // Define Custom Post Types
  'lib/custom-taxonomies.php', // Custom Taxonomies
  '/lib/relative-urls.php',    // Root relative URLs
  'lib/theme-functions.php',   // Theme-specific functions
  // 'lib/widgets.php',           // Theme-specific widgets
  // 'lib/shortcodes.php',        // Theme-specific shortcodes
);

foreach ($bolt_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'bolt'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

?>
