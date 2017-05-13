$(document).ready(function(){
	if($("#projects-slider").length){
		$("#projects-slider").lightSlider({
			item: 4,
			loop: true,
			controls: false,
			pager: false,
			onSliderLoad: function() {
	            $('#projects-slider').removeClass('cS-hidden');
	        }
		});
	}
	if($("#reviews-slider").length){
		$("#reviews-slider").lightSlider({
			item: 1,
			loop: true,
			controls: false,
			adaptiveHeight: true,
			onSliderLoad: function() {
			    $('#reviews-slider').removeClass('cS-hidden');
			}
		});
	}
});