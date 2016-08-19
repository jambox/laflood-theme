<?php


/**
 * Used for PHP console logging
 *
 * If configured properly can be used with
 * Log Viewer WP plugin : http://wordpress.org/plugins/log-viewer/
 */
if( !function_exists( '_log' ) ) {

  function _log( $data , $label = null , $backtrace = false ) {

    // Stop execution and log to ChromePhp if the class exists
    if( class_exists('ChromePhp') ) {

      if( $label ) {
        $r = array(
          'label' => $label,
          'data' => $data
        );

        return ChromePhp::log( $r );
      }

      return ChromePhp::log( $data );
    }


    $output = '';
    
    switch (gettype($data)) {
      case "array":
      case "object":
        $output .= print_r($data, TRUE);
        
        if ( $label !== null )
          $output .= "\n\n---^^^^^^^ END $label ^^^^^^^---";    
        
        break;
      case "integer":
      case "float":
      case "string":
        $output .= $data;
        break;
      case "boolean":
        $converted_data = ($data) ? 'true' : 'false';
        $output .= $converted_data;
        break;
      default:
        $output .= "ERROR: tried to log bad type [".gettype($data)."]";
        break;
         
    }
    
    if ( $backtrace )      
      _backtrace( $label );
    
    if ( !empty( $label ) ) {
      $output = "\t--- [ $label ] ---\n\n" . $output . "\n";
    }
    
    error_log($output);
    
  }

}


if( !function_exists( '_backtrace' ) ) {
  function _backtrace( $label = '' ) {
    ob_start();
    if ( phpversion() >= 5.4 ) {
      debug_print_backtrace( 0 , 5); 
    } else {
      debug_print_backtrace();   
    }
    $trace = ob_get_contents(); 
    ob_end_clean();   
      
    _log( $trace, 'backtrace '. $label );
    _log("\t---^^^^^^^ END backtrace ^^^^^^^---");
  }
}

if( !function_exists( '_backtrace_files' ) ) {
  function _backtrace_files() {
    $backtrace = debug_backtrace();
    foreach( $backtrace as $key => $trace ) {
      if( isset( $trace['file'] ) )
        _log($trace['file']);
    }
  }
}
?>