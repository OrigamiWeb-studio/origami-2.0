require('jcf/dist/js/jcf');
require('jcf/dist/js/jcf.select');
// require('jcf/dist/js/jcf.scrollable');

$(document).ready(function(){

    // jcf.setOptions('Scrollable', {
    //   alwaysShowScrollbars: false,
    //   alwaysPreventMouseWheel: true,
    //   handleResize: true
    // });

    jcf.setOptions('Select', {
      wrapNative: false,
      wrapNativeOnMobile: false,
      maxVisibleItems: 5,
      useCustomScroll: false
    });

    jcf.replace('select');

});