(function($) {

  $('.add-org-btn').on('click', function(e) {
    e.preventDefault();
    $('.org-modal').modal();
  });

  // acf.validation.fetch_complete = function( $form ) {

  //   // set busy
  //   this.busy = 0;
    
    
  //   // unlock so WP can publish form
  //   this.toggle( $form, 'unlock' );
    
    
  //   // bail early if validationw as not valid
  //   if( !this.valid ) {
      
  //     return;
      
  //   }
    
    
  //   // update ignore (allow form submit to not run validation)
  //   this.ignore = 1;
      
      
  //   // remove previous error message
  //   var $message = $form.children('.acf-error-message');
    
  //   if( $message.exists() ) {
      
  //     $message.addClass('-success');
  //     $message.children('p').html( acf._e('validation_successful') );
      
      
  //     // remove message
  //     setTimeout(function(){
        
  //       acf.remove_el( $message );
        
  //     }, 2000);
      
  //   }
    
  
  //   // remove hidden postboxes (this will stop them from being posted to save)
  //   $form.find('.acf-postbox.acf-hidden').remove();
    
    
  //   // action for 3rd party customization
  //   acf.do_action('submit', $form);
    
  //   if( $form[0].offsetParent.className == "modal-content" ) {

  //     // Submit the form via ajax and capture the new post id
  //     var form_data = getFormData( $(this) );
  //     // ajax
  //     $.ajax({
  //       url: laflood_globals.ajaxurl,
  //       data: {
  //         form   : {'data_thing':'yo'},
  //         action : 'acf_save_new_org'
  //       },
  //       type: 'post',
  //       dataType: 'json',
  //       success: function( json ){
          
  //       },
  //       complete: function(){
      
  //       }
  //     });

  //   }


  //   // submit form again
  //   if( this.$trigger ) {
      
  //     this.$trigger.click();
    
  //   } else {
      
  //     $form.submit();
    
  //   }
    
    
  //   // lock form
  //   this.toggle( $form, 'lock' );
  // };


  // $('.org-form').on('submit', function(e) {
  //     e.preventDefault();

  //     var form_data = getFormData( $(this) );

  //     // Keep form height and replace with spinner
  //     var $form_fields = $(this).find('.form-fields');
  //     $form_fields.height( $form_fields.height());
  //     $form_fields.find('.form-field').fadeOut('fast',function() {
  //         $('.contact-form .in-progress-anim').show();
  //     });
  //     $('.contact-form .form-buttons')
  //       .height( $('.contact-form .form-buttons').height() )
  //       .find('button').fadeOut();

  //     $('.modal-title').text('Submitting...');


  //     $.ajax({
  //         url: laflood_globals.ajaxurl,
  //         type: 'post',
  //         dataType: 'json',
  //         data: {
  //           form   : form_data,
  //           action : 'submit_contact_form'
  //         },
  //         complete: function (data, status) {


  //           var response = data.responseJSON;
  //           $('.contact-form .in-progress-anim').fadeOut('normal', function() {
  //             if( response.code == 200 ) {
  //               $('.contact-form .error').fadeOut();
  //               $('.contact-form .success').fadeIn();
  //               $('.modal-title-caliper').text('Thanks!');
  //             } else {
  //               contact_form_error(response);
  //             }
  //           });
            
  //         }
  //       });
  //   }); // .contact-form.onSubmit

})(jQuery);


function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}
