require('lightslider');


$(document).ready(function(){
    if($("#projects-slider").length){
        $("#projects-slider").lightSlider({
            item: 4,
            loop: true,
            controls: false,
            pager: false,
            onSliderLoad: function() {
                $('#projects-slider').removeClass('cS-hidden');
            },
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        item: 3,
                        pager: true
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        item: 2,
                        pager: true
                    }
                },
                {
                    breakpoint: 440,
                    settings: {
                        item: 1,
                        pager: true
                    }
                }
            ]
        });
    }
});