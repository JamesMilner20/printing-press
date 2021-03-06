const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');


mix.styles([

    'resources/css/bootstrap.min.css',
    'resources/css/all.min.css',
    'resources/css/owl.carousel.css',
    'resources/css/owl.carousel.min.css',
    'resources/css/owl.theme.default.min.css',
    'resources/css/simple-sidebar.css',
    'resources/css/star-rating.css',
    'resources/css/star-rating.min.css',
    'resources/css/theme.min.css',
    'resources/css/agency.css',
    // 'resources/css/styles.css'

],'public/css/libs.css');

mix.scripts([

    'resources/js/jquery-3.3.1.min.js',
    // 'resources/js/jquery.js',
    'resources/js/owl.carousel.js',
    'resources/js/owl.carousel.min.js',
    'resources/js/star-rating.js',
    'resources/js/star-rating.min.js',
    'resources/js/jqBootstrapValidation.js',
    'resources/js/contact_me.js',
    'resources/js/popper.js',
    'resources/js/jquery-ui.js',
    'resources/js/theme.min.js',
    'resources/js/bootstrap.min.js',
    'resources/js/scripts.js'



],'public/js/libs.js');