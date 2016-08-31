// .noConflict()
(function($) {

////////////////    FUNCTIONS    ////////////////

  // $.preloadImages = function() {
  //   for (var i = 0; i < arguments.length; i++) {
  //     $("<img />").attr("src", arguments[i]);
  //   }
  // }

  // $.preloadImages( laflood_globals.template_url + "/assets/images/loading-image.svg" );

  //////
  // Google Map for Single Pages
  //

  mapZoom = 12;

  // new_map
  function new_map( $el ) {
    var $markers = $el.find('.marker');
    var args = {
      zoom        : mapZoom,
      center      : new google.maps.LatLng(0, 0),
      mapTypeId   : google.maps.MapTypeId.ROADMAP,
      scrollwheel : false,
      draggable   : false
    };
    // create map           
    var map = new google.maps.Map( $el[0], args);
    // add a markers reference
    map.markers = [];
    // add markers
    $markers.each(function(){
      add_marker( $(this), map );  
    });
    // center map
    center_map( map );
    // keep map centered on window resize
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 
    });
    // return map
    return map;
  }


  // add_marker
  function add_marker( $marker, map ) {
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
      position  : latlng,
      map       : map
    });

    // add to array
    map.markers.push( marker );

    // open location in Google Maps when marker is clicked
    google.maps.event.addListener(marker, 'click', function() {
      window.open('https://maps.google.com?q=' + $marker.text(), '_blank');
    });
  }

  // center_map
  function center_map( map ) {
    var bounds = new google.maps.LatLngBounds();
    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){
      var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
      bounds.extend( latlng );
    });

    // only 1 marker?
    if( map.markers.length == 1 ) {
      // set center of map
      map.setCenter( bounds.getCenter() );
      map.setZoom( mapZoom );
    } else {
      // fit to bounds
      map.fitBounds( bounds );
    }
  }

  // global var
  var map = null;

////////////////    EVENTS    ////////////////

  // document.ready
  $( document ).ready(function() {

    // Google Map
    //
    // only call map on org single pages
    if ($('body').hasClass('single-lfr_org') ) {
      $('.single-map').each(function(){
        map = new_map( $(this) );
      });
    }

    // $('.preload-image')
    //   .imagesLoaded( { background: true }, adios_loader )
    //   .progress( function( instance, image ) {
    //     var result = image.isLoaded ? 'loaded' : 'broken';
    //     console.log( 'image is ' + result + ' for ' + image.img.src );
    //   });

    // Initialize Offcanvas Menu
    // Engine.ui.offcanvas();

  });

  // window.onload
  $(window).load(function(){
    // Wait till modernizr adds classes to <html> so fade/transform transition isn't triggered visibly
    // $('#offcanvas-content').removeClass('no-show');
  });

})(jQuery);
