<?php

return [
	'projects' => [
		
		'single' => [
			'styles'  => [
			    'libs/lightslider/lightslider.min.css',
				'css/project-style.css'
			],
			'scripts' => [
			    'libs/lightslider/lightslider.min.js'
			]
		],
		
		'all'    => [
			'styles'  => [
				'libs/jcf/jcf.css',
				'css/projects-style.css'
			],
			'scripts' => [
				'libs/jcf/jcf.js',
				'libs/jcf/jcf.select.js',
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
		    'libs/jquery/jquery-3.2.0.min.js',
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
			'libs/bootstrap/js/bootstrap.min.js',
			'http://maps.google.com/maps/api/js?key=AIzaSyBED1xxwdz2aeMSXBDtJwItnDn7apYZjF8'
		]
	]
	
	
];