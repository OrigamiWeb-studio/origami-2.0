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

	if($('select').length || $('input[type=range]').length){
		jcf.setOptions('Select', {
			wrapNative: false,
			wrapNativeOnMobile: false,
			maxVisibleItems: 5
		});

		jcf.replace('select');
		jcf.replace('input[type=range]');
	}


	var headerMenu = new Vue({
		el: ".main_header",
		data: {
			headerActive: false,
			langDropdown: false
		},
		methods: {
			mobileMenu: function(){
				this.headerActive = !this.headerActive;
				var bodyEl = document.querySelector('body');
				bodyEl.classList.toggle('opened');
			},
			closeDropDown: function(){
				this.langDropdown = false;
			}
		},
		mounted: function(){
			var self = this;
			window.addEventListener('click', function(e){
				if(!e.target.parentNode.classList.contains('lang-dropdown'))
					self.closeDropDown();
			})
		}
	});

	var scrollDown = new Vue({
		el: '.s_hero'
	});


	if($("#map").length){
		function initMap() {
			var myLatLng = {lat: 48.689353, lng: 26.570980};

			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 16,
				center: myLatLng
			});

			var image = document.location.origin+"/img/map-point.png";

			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: 'Столовка',
				icon: image
			});
		}
		initMap();
	}

});