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

mix.js('resources/js/app.js', 'public/js/app.js')
    .js('resources/js/auth.mjs', 'public/js/auth.mjs')
    .js('resources/js/bootstrap.js', 'public/js/bootstrap.js')
    .js('resources/js/global.mjs', 'public/js/global.mjs')
    .js('resources/js/index.js', 'public/js/index.js')
    .copyDirectory('resources/img', 'public/img')
    .css('resources/css/global.css', 'public/css/global.css')
    .css('resources/css/index.css', 'public/css/index.css')
    .css('resources/css/signin.css', 'public/css/signin.css')
    .css('resources/css/signup.css', 'public/css/signup.css')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
