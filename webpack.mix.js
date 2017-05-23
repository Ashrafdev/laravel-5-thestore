const {mix} = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

mix.combine([
    './public/css/bootstrap.min.css',
    './public/css/bootstrap-reset.css',
    './public/bower_components/components-font-awesome/css/font-awesome.min.css',
    './public/assets/bootstrap-fileupload/bootstrap-fileupload.css',
    './public/css/style.css',
    './public/css/style-responsive.css',
], 'public/css/app.min.css');