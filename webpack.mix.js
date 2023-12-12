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
    .js('resources/js/sorry-screen.js', 'public/js/sorry-screen.js')
    .js('resources/js/counter.js', 'public/js/counter.js')
    .copyDirectory('resources/img', 'public/img')
    .css('resources/css/global.css', 'public/css/global.css')
    .css('resources/css/withdraw.css', 'public/css/withdraw.css')
    .css('resources/css/sorry-screen.css', 'public/css/sorry-screen.css')
    .css('resources/css/deposit.css', 'public/css/deposit.css')
    .css('resources/css/about.css', 'public/css/about.css')
    .css('resources/css/index.css', 'public/css/index.css')
    .css('resources/css/index-animations.css', 'public/css/index-animations.css')
    .css('resources/css/signin.css', 'public/css/signin.css')
    .css('resources/css/signup.css', 'public/css/signup.css')
    .css('resources/css/bets-carousel.css', 'public/css/bets-carousel.css')
    .css('resources/css/bet-card.css', 'public/css/bet-card.css')
    .css('resources/css/loading-screen.css', 'public/css/loading-screen.css')
    .css('resources/css/chat-module.css', 'public/css/chat-module.css')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
