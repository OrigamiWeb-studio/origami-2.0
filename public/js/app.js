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

	$(".search-form>.btn").click(function(e){
		e.preventDefault();
		var searchForm = $(this).parent();
		if(searchForm.hasClass('opened')){
			searchForm.removeClass('opened');
		}else{
			searchForm.addClass('opened');
		}
	});

	if($('select').length || $('input[type=range]').length){
		jcf.setOptions('Select', {
			wrapNative: false,
			wrapNativeOnMobile: false,
			maxVisibleItems: 5
		});

		jcf.replace('select');
		jcf.replace('input[type=range]');
	}
});