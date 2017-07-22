<?php

return [
	'projects' => [
		
		'single' => [
			'styles'  => [
			    'libs/lightslider/lightslider.min.css',
                'libs/magnific-popup/magnific-popup.css',
				'css/project-style.css'
			],
			'scripts' => [
			    'libs/lightslider/lightslider.min.js',
                'libs/magnific-popup/jquery.magnific-popup.min.js'
			]
		],
		
		'all'    => [
			'styles'  => [
				'css/projects-style.css'
			],
			'scripts' => [
				'libs/jcf/jcf.range.js',
				'libs/vue/vue-resource.min.js',
				'js/filters.js'
			]
		],
		
		'edit'   => [
			'styles'  => [
			
			],
			'scripts' => [
			
			]
		],
		
		'add'    => [
			'styles'  => [
			
			],
			'scripts' => [
			
			]
		]
	],
	
	
	'home' => [
		'styles'  => [
			'libs/lightslider/lightslider.min.css',
			'css/home-style.css'
		],
		'scripts' => [
			'libs/vue/vue-scrollto.min.js',
			'libs/lightslider/lightslider.min.js'
		]
	],
	
	
	'about' => [
		'styles'  => [
			'css/about-style.css'
		],
		'scripts' => [
		
		]
	],
	
	
	'contacts' => [
		'styles'  => [
			'css/contacts-style.css'
		],
		'scripts' => [
			'http://maps.google.com/maps/api/js?key=AIzaSyBED1xxwdz2aeMSXBDtJwItnDn7apYZjF8'
		]
	]
	
	
];