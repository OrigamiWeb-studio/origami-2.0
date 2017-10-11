require('magnific-popup');

$(document).ready(function(){

  $("#project-screens").magnificPopup({
    delegate: '.project-screens__magnific-link',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true,
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return '<a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">'+item.el.attr('data-source-text')+'</a>';
      }
    },
    gallery: {
      enabled: true,
      preload: [0,1]
    }
  })

});