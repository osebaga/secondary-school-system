const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset 
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

/*mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);*/
    
    mix.sass('resources/sass/dashboard/app.scss', 'public/assets/dashboard/css/app.css')
    .sass('resources/sass/dashboard/custom.scss', 'public/assets/dashboard/css/custom.css')
    .js(['resources/js/dashboard/app.js'], 'public/assets/dashboard/js/app.js');
