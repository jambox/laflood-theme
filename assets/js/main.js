/*=========================================================================

Inline includes for CodeKit:

Prepends
------------------------

// @codekit-prepend 'vendor/modernizr.js';
// @codekit-prepend '../vendor/imagesloaded-packaged/imagesloaded.pkgd.min.js';
// @codekit-prepend '../vendor/bootstrap/js/modal.js';
// @codekit-prepend '../vendor/parsleyjs/dist/parsley.min.js';
// @codekit-prepend 'plugins/offcanvas-menu.js';

=========================================================================*/


jQuery.fn.exists = function(){return this.length>0;};
var $ = jQuery;

// $.preloadImages = function() {
//   for (var i = 0; i < arguments.length; i++) {
//     $("<img />").attr("src", arguments[i]);
//   }
// }

// $.preloadImages( laflood_globals.template_url + "/assets/images/loading-image.svg" );

$(function () {

  $(window).load(function(){

    // Wait till modernizr adds classes to <html> so fade/transform transition isn't triggered visibly
    // $('#offcanvas-content').removeClass('no-show');

  });

  // $('.preload-image')
  //   .imagesLoaded( { background: true }, adios_loader )
  //   .progress( function( instance, image ) {
  //     var result = image.isLoaded ? 'loaded' : 'broken';
  //     console.log( 'image is ' + result + ' for ' + image.img.src );
  //   });

  // Initialize Offcanvas Menu
  Engine.ui.offcanvas();




}); // jQuery document ready


function reset_contact_form () {
} // reset_contact_form

