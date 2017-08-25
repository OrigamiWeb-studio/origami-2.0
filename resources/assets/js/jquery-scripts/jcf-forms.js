require('jcf/dist/js/jcf');
require('jcf/dist/js/jcf.select');

$(document).ready(function(){
    if($('select').length || $('input[type=range]').length){
        jcf.setOptions('Select', {
            wrapNative: false,
            wrapNativeOnMobile: false,
            maxVisibleItems: 5
        });

        jcf.replace('select');
    }
});