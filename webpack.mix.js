let mix = require('laravel-mix').mix;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/home-scripts.js', 'public/js')
    .js('resources/assets/js/projects-scripts.js', 'public/js')
    .js('resources/assets/js/project-scripts.js', 'public/js')
    .js('resources/assets/js/about-scripts.js', 'public/js')
    .js('resources/assets/js/contact-scripts.js', 'public/js')
    .js('resources/assets/js/common.js', 'public/js');
