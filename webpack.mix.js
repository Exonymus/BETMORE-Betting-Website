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
    .js('resources/js/bootstrap.js', 'public/js/bootstrap.js')
    .js('resources/js/counter.mjs', 'public/js/counter.mjs')
    .copyDirectory('resources/img', 'public/img')
    .css('resources/css/global.css', 'public/css/global.css')
    .css('resources/css/withdraw.css', 'public/css/withdraw.css')
    .css('resources/css/sorry__screen.css', 'public/css/sorry__screen.css')
    .css('resources/css/deposit.css', 'public/css/deposit.css')
    .css('resources/css/about.css', 'public/css/about.css')
    .css('resources/css/home.css', 'public/css/home.css')
    .css('resources/css/signin.css', 'public/css/signin.css')
    .css('resources/css/signup.css', 'public/css/signup.css')
    .css('resources/css/bets__carousel-module.css', 'public/css/bets__carousel-module.css')
    .css('resources/css/loading__screen.css', 'public/css/loading__screen.css')
    .css('resources/css/chat-module.css', 'public/css/chat-module.css')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
