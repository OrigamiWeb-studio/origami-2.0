require('lightslider');
require('magnific-popup');

$(document).ready(function () {

    if($("#results-slider").length){
        $("#results-slider").lightSlider({
            item: 4,
            loop: true,
            controls: false,
            slideMargin: 30,
            onSliderLoad: function() {
                $('#results-slider').removeClass('cS-hidden');
            },
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        item: 3,
                        adaptiveHeight: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        item: 2,
                        adaptiveHeight: true
                    }
                },
                {
                    breakpoint: 410,
                    settings: {
                        item: 1,
                        adaptiveHeight: true
                    }
                }
            ]
        });

        $("#results-slider").magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function(element) {
                    return element.find('img');
                }
            }
        })

    }

});