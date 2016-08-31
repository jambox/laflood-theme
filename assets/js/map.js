jQuery.fn.exists = function(){return this.length>0;}; var $ = jQuery;

/**
 *
 * This code was pulled from http://www.reginellis.com/locations/#/
 * All references to html elements and classes can be parsed from
 * the working website.
 *
 */


var the_layer; // add this var to the global scope

$(function () {
  //////////////    MapBox START     ////////////////////
    
  if ($('#map-elem').length > 0 && typeof L === 'object' ){
  
    // var mapArgs = {
    //   scrollWheelZoom : false
    // };

    var mapbox_token = 'pk.eyJ1IjoiY2FsaXBlciIsImEiOiJjaXNpZnVmMnUwMDRwMnpud3A2czJ6ZGJrIn0.Fi0qg4ZwI9FMAuxXL-SS1A';

    L.mapbox.accessToken = mapbox_token;

    var geocoder = L.mapbox.geocoder(mapbox_token);

    // var map = L.mapbox.map('map', mapbox_token, mapArgs) // original initialization

    // Element with id="map-wrap"
    var map = L.mapbox.map('map-elem', 'mapbox.streets')
                      .setView([30.4416034,-91.1787027], 11);
  
    var featureLayer = L.mapbox.featureLayer()
        .loadURL(laflood_globals.template_url + '/lib/maps/locations.geojson')
        .addTo(map);

    map.scrollZoom.disable();

    console.log( featureLayer );
        
    featureLayer.on('click', function( e ){
      show_store_details( e );
    });
    
    
    
    function show_store_details( e ) {
      var slug = e.layer.feature.properties.loc_slug;
      $('#loc-'+slug).click();
    } // END show_store_details
    
  
        
////////////////    MapBox END           /////////////////        

  var hash = window.location.hash,
      targetLink = hash.slice(1).replace('.go','');
      
  if (targetLink.length > 0) {
    if ( 'map' == targetLink ) {
      $(document).ready( function () { $.scrollTo('.locations-wrap', 1000, { axis : 'y' } ); });
    } else {
      $(document).ready( function () {
        var destination = 'region-names',
            top_offset = -39,
            is_mobile = !$('body').hasClass('breakpoint-480');
        
        // If this is mobile, scroll to location-details
        if( is_mobile ) {
          destination = 'locations-wrap';
          top_offset = 0;
        }
        $.scrollTo('.' + destination, 1000, {
          offset : {top : top_offset, left: 0},
          onAfter : function () {       
          
            var region = $('#loc-'+targetLink).attr('data-region');
  
            $('.region-name a').removeClass('active');

            $(".region-name [data-region='" + region + "']").click();
            $('#loc-'+targetLink).click().addClass('active'); 
                     
          },
          axis : 'y'
        });
  
      });
    } //end if #map

  }
  
  $('.selectpicker.locations-page-mobile').on('change', function(e) {
    
    if( window.location.pathname.match(/locations/) ) {
    
      var targetLink = $(this).find(':selected').attr('data-attr-slug');

      if (targetLink.length > 0) {
/*         debugger; */
        window.location.hash = targetLink;
        $('#loc-'+targetLink).click().parent('.region-name').find(' a').click();

        $(document).ready( function () {
          $.scrollTo('.location-details-wrap', 1000, {
            offset : {top : 0, left: 0},
            onAfter : function () {
            
              var region = $('#loc-'+targetLink).attr('data-region');
    
/*
              $('.region-name a').removeClass('active');
              $(".region-name [data-region='" + region + "']").click();
*/
              $('#loc-'+targetLink).click().addClass('active'); 
                       
            },
            axis : 'y'
          });
        });      
      } else {
        window.location = $(this).val();
      }
    }
    
    
    
  });


/////////////////////////////////        
        
        
        
  }
  
  $('.location-link').not('.active').on('click', function(e) {

    e.preventDefault();
    
    $('.location-link').removeClass('active');
    $(this).addClass('active');
    var locData = JSON.parse($(this).parent().find('.location-data-store').attr('data-location-details'));
    
    var wpID = parseInt( $(this).attr('data-wpID') );
    
    featureLayer.eachLayer(function (layer) {
      if( layer.feature.properties.wpID == wpID )
        the_layer = layer;
    });    
    
    
    if ($('.location-details-wrap').is('.hidden')){
      $('.location-details-wrap')
          .hide()
          .removeClass('hidden')
          .slideDown(
            400,
            function () {
            
              var destination = 'region-names',
                  top_offset = -39,
                  is_mobile = !$('body').hasClass('breakpoint-480');

              // If this is mobile, scroll to location-details
              if( is_mobile ) {
                destination = 'location-details';
                top_offset = 0;
              }
              $.scrollTo('.'+destination, 800, { offset : {top : top_offset, left: 0}, axis : 'y' });

              _setView(the_layer, false);

              
            });      
    } else {
        map.once('zoomend',function (e) {
          _setView(the_layer, false);
        });
        _setView(the_layer, false);
/*         map.setZoom(13); */
    }
    

    // Add data from select location into DOM
    var state_string = locData.address.state.length > 0 ? ', ' + locData.address.state : '',
          sanitizedPhone = locData.phone.replace(/-/g, '');

    $('.location-story .content').html(locData.story);
    $('.location-contact .phone .data').html('<a href="tel:+1'+sanitizedPhone+'" data-behavior="call">'+locData.phone+'</a>');
    $('.location-contact .address .street').html(locData.address.street);
    $('.location-contact .address .city').html(locData.address.city);
    $('.location-contact .address .state').html(state_string);
    $('.location-contact .address .zipcode').html(locData.address.zipcode);
    $('.location-story .header').html("<span class='loc-name'>"+locData.title + "</span><span class='loc-region'>" + locData.region + "</span>");
    
    // Map Interaction behaviors
    function _setView(layer, is_user_drag ) {
    
      if(typeof(is_user_drag)==='undefined') is_user_drag = true;
      
      map.once('zoomend',function (e) {
        layer.openPopup();
      });

      map.once('moveend',function (e) {
        if( ! is_user_drag )
          layer.openPopup();
      });

      map.setView(layer._latlng, 14,
        {
          pan : {
            animate : true,
            duration : 0.8
          },
          zoom : {
            animate : true
          }
        }
      );
      
    }          


    
  }); // end location-link.click  

  $('.region-name > a').on('click', function(e) {
    e.preventDefault();

    if( !$(this).is('.active') ) {
      var region = $(this).attr('data-region');
  
      $('.region-name > a').removeClass('active');
      $(this).addClass('active');
      
      $('.locations-list').hide();

      $('.'+region+'-locs').removeClass('hidden');

      // Only show if this is not on mobile
      if( $('body').hasClass('breakpoint-480') )
        $('.'+region+'-locs').show();

      // focus_on_first_location
      $('.'+region+'-locs .location:first-child .location-link').click();

    }
    
  });  

    
  //////////////////////////////////    
});


