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
    'resources/css/bootstrap.css',
    'resources/css/jquery-ui.min.css',
    'resources/css/bootstrap-grid.css',
    'resources/css/bootstrap-reboot.css',
    'resources/css/all.min.css',
    'resources/css/agency.css',
    'resources/css/simple-sidebar.css'
    // 'resources/css/styles.css'

],'public/css/libs.css');

mix.scripts([

    // 'resources/js/jquery.js',
    // 'resources/js/jquery.slim.min.map',
    // 'resources/js/jquery.min.map',
    'resources/js/jquery-3.3.1.min.js',
    'resources/js/jquery-ui.js',
    // 'resources/js/jquery.slim.js',
    'resources/js/bootstrap.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/js/jqBootstrapValidation.js',
    'resources/js/jquery.easing.min.js'
    // 'resources/js/agency.js'
    // 'resources/js/scripts.js'



],'public/js/libs.js');