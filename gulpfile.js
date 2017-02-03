const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js')
       .scripts('resources/assets/js/header.js', 'public/js/header.js');
    mix.sass('main.scss', 'public/css/main.css');
    mix.copy('vendor/bower_components/jquery/dist/jquery.js', 'public/js/jquery/jquery.js');
    mix.sass('bootstrap-social.css');
    mix.scripts('form-delete.js')
});
