<?php

return [
  'projects' => [

    'single' => [
      'styles' => [
        'css/project-style.css'
      ],
      'scripts' => [
        'libs/lightslider/lightslider.min.js',
        'libs/magnific-popup/jquery.magnific-popup.min.js',
        'js/common-vue.js'
      ]
    ],

    'all' => [
      'styles' => [
        'css/projects-style.css'
      ],
      'scripts' => [
        'libs/jcf/jcf.range.js',
        'js/projects-vue.js'
      ]
    ],

    'edit' => [
      'styles' => [

      ],
      'scripts' => [

      ]
    ],

    'add' => [
      'styles' => [

      ],
      'scripts' => [

      ]
    ]
  ],


  'home' => [
    'styles' => [
      'css/home-style.css'
    ],
    'scripts' => [
        'js/home-vue.js',
        'libs/lightslider/lightslider.min.js',
    ]
  ],


  'about' => [
    'styles' => [
      'css/about-style.css'
    ],
    'scripts' => [
        'libs/lightslider/lightslider.min.js',
        'js/common-vue.js'
    ]
  ],


  'contacts' => [
    'styles' => [
      'css/contacts-style.css'
    ],
    'scripts' => [
        'http://maps.google.com/maps/api/js?key=AIzaSyBED1xxwdz2aeMSXBDtJwItnDn7apYZjF8',
        'js/common-vue.js'
    ]
  ]


];