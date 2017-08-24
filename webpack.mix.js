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

mix.js('resources/assets/js/home-vue.js', 'public/js')
    .js('resources/assets/js/projects-vue.js', 'public/js')
    .js('resources/assets/js/common-vue.js', 'public/js');