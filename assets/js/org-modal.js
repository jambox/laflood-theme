(function($) {

  $('.add-org-btn').on('click', function(e) {
    e.preventDefault();
    $('.org-modal').modal();
  });

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
