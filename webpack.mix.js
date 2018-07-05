let mix = require('laravel-mix');

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

mix.react('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.react('app/Modules/Admin/Resources/Assets/js/admin.js' , 'public/js/modules/admin')
    .js('app/Modules/Admin/Resources/Assets/js/theme.js', 'public/js/modules/admin')
    .sass('app/Modules/Admin/Resources/Assets/scss/theme.scss', 'public/css/modules/admin');