require('../../../../public/libs/jquery-ui/datepicker/jquery-ui');
// require('magnific-popup');


$(document).ready(function(){

  $(".origami-form__input_datepicker").datepicker({
    dateFormat: "dd.mm.yy",
    firstDay: 1
  });

  // $('.project-screens').magnificPopup({
  //   delegate: '.project-screens__magnific-link',
  //   type: 'image',
  //   tLoading: 'Loading image #%curr%...',
  //   mainClass: 'mfp-img-mobile',
  //   gallery: {
  //     enabled: true,
  //     navigateByImgClick: true,
  //     preload: [0,1]
  //   },
  //   image: {
  //     tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
  //   }
  // });

});