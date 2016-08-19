var Engine = {
  ui : {
    offcanvas : function() {
      $('#offcanvas-trigger').click(function() {
        $('html').toggleClass('is-offcanvas');
        // if($(this).text() === 'Menu') {
        //     $(this).text('Close');
        // } else {
        //   $(this).text('Menu');
        // }
      });
    }
  }
};
