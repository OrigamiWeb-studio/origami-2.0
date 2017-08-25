require('lightslider');


$(document).ready(function(){
    if($("#ourclients-slider").length){
        $("#ourclients-slider").lightSlider({
            item: 6,
            loop: true,
            controls: false,
            pager: false,
            onSliderLoad: function() {
                $('#ourclients-slider').removeClass('cS-hidden');
            },
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        item: 4,
                        pager: true
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        item: 3,
                        pager: true
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        item: 2,
                        pager: true
                    }
                },
                {
                    breakpoint: 380,
                    settings: {
                        item: 1,
                        pager: true
                    }
                }
            ]
        });
    }
});