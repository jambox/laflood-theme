<?php


function client_scripts($hook) {

    // Main Client Script
    wp_enqueue_script(
      THEME_PREFIX .'-main-js',
      THEME_URL . 'dist/scripts/main.js',
      array('jquery','underscore'),
      $ver = get_bloginfo('version'),
      $in_footer = true
    );

    wp_localize_script(
      THEME_PREFIX .'-main-js',
      'laflood_globals',
      array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'template_url' => get_bloginfo('template_url')
      )
    );

    if( is_page_template('templates/template-map.php') ) {
      // Main Client Script
      wp_enqueue_script(
        THEME_PREFIX .'-map-js',
        THEME_URL . 'dist/scripts/map.js',
        array(THEME_PREFIX .'-main-js', 'jquery','underscore'),
        $ver = get_bloginfo('version'),
        $in_footer = true
      );

      wp_localize_script(
        THEME_PREFIX .'-main-js',
        'laflood_map_globals',
        array(
          'ajaxurl' => admin_url( 'admin-ajax.php' ),
          'template_url' => get_bloginfo('template_url')
        )
      );
      
    }

    // wp_enqueue_script( THEME_PREFIX .'-google-maps', "https://maps.googleapis.com/maps/api/js?" . GOOGLE_MAPS_API_KEY );

    
}
add_action( 'wp_enqueue_scripts', 'client_scripts' );


function client_styles() {

    global $wp_styles;

    // Main Stylesheet
    wp_register_style( THEME_PREFIX . '-theme', THEME_URL . 'dist/styles/laflood.css' );
    wp_enqueue_style( THEME_PREFIX . '-theme' );

    // Icomoon
    // wp_register_style( 'icomoon-css', THEME_URL . 'assets/fonts/icomoon/style.css', false, '1.0.0' );
    // wp_enqueue_style( 'icomoon-css' );

    // wp_enqueue_style( THEME_PREFIX . '-ie', THEME_URL . "assets/css/ie.css", array( THEME_PREFIX . '-theme' )  );
    // $wp_styles->add_data( THEME_PREFIX . '-ie', 'conditional', 'IE' );

}
add_action( 'wp_enqueue_scripts', 'client_styles' );


/*----------  Typekit  ----------*/

function laflood_typekit() {
    wp_enqueue_script( 'laflood_typekit', '//use.typekit.net/ekj1nib.js', '', false);
}
add_action( 'wp_enqueue_scripts', 'laflood_typekit' );


function laflood_typekit_inline() {
  if ( wp_script_is( 'laflood_typekit', 'done' ) ) { ?>
    <script>try{Typekit.load();}catch(e){}</script>
  <?php }
}
add_action( 'wp_head', 'laflood_typekit_inline' );



function laflood_admin_styles() {
    wp_register_style( 'admin',  THEME_URL . '/dist/styles/admin.css', false );
    wp_enqueue_style( 'admin' );
}
add_action('admin_enqueue_scripts', 'laflood_admin_styles');


function load_ga_script() {
  // Don't track wp-admin behaviors or admin-level users
  if(
    is_admin() ||
    ( is_user_logged_in() && current_user_can('administrator') )
  ) {
   return false;
  }
  ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-82872344-1', 'auto');
    ga('send', 'pageview');

  </script> 
<?php
}
add_action('wp_head', 'load_ga_script',1,  10);

