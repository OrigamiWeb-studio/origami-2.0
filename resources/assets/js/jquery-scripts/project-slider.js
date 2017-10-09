require('lightslider');
require('magnific-popup');

$(document).ready(function () {

    let mfpOpen = true;

    if($("#results-slider").length){
        $("#results-slider").lightSlider({
            item: 4,
            loop: false,
            controls: false,
            slideMargin: 30,
            onSliderLoad: function() {
                $('#results-slider').removeClass('cS-hidden');
            },
            onBeforeSlide: function(){
              mfpOpen = false;
            },
            onAfterSlide: function(){
              mfpOpen = true;
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
            delegate: '.results-slider__link',
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
            },
            disableOn: function() {
                return mfpOpen;
            }
        })

    }

});