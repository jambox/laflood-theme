<?php
 /**
 * Automatically include all PHP files within another directory while avoiding adding an unnecessary
 * global just to determine a path that is already available everywhere via WP core functions:
 */

foreach ( glob( plugin_dir_path( __FILE__ ) . "widgets/*.php" ) as $file ) {
  include_once $file;
}
