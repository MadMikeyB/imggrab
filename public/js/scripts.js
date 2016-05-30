(function($) {
  // click function
  $('.image img').click(function(event) {
    // detect data-id for later
    var id = $(this).data('id');
    // grab src to replace #featured
    var src = $(this).attr('src');
    // set featured image
    var img = $('#featured img');
    // change the src
    // img.attr({src: src});												 
    img.fadeOut('fast', function() {
      // change the src to the image we just clicked
      $(this).attr({
        src: src
      });
      $('#featured a').attr('href', src);
      // fade the new image in
      $(this).fadeIn('fast');
    });
    // no js fallback
    event.preventDefault();
  });

  $('.gallery-images').isotope({
    itemSelector: '.image img',
    resizesContainer : false,
    fitColumns: true,
  });

  if ($.cookie('welcome') == null) {
    $('#welcome').modal('show');
    $.cookie('welcome', '7');
  }

  $('a[href^="#"]').on('click',function (e) {
      e.preventDefault();

      var target = this.hash;
      var $target = $(target);

      $('html, body').stop().animate({
          'scrollTop': $target.offset().top
      }, 900, 'swing');
  });
})(jQuery);