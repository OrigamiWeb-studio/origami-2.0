require('jcf/dist/js/jcf');
require('jcf/dist/js/jcf.select');
// require('jcf/dist/js/jcf.scrollable');

$(document).ready(function(){

    // jcf.setOptions('Scrollable', {
    //   alwaysShowScrollbars: true,
    //   alwaysPreventMouseWheel: false,
    //   handleResize: false
    // });
    //
    jcf.setOptions('Select', {
      wrapNative: false,
      wrapNativeOnMobile: false,
      maxVisibleItems: 5,
      useCustomScroll: true,
      fakeDropInBody: false
    });

    jcf.replaceAll();

});