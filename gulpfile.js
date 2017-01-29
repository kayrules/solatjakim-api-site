const elixir = require('laravel-elixir');

// require('laravel-elixir-vue-2');

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

elixir((mix) => {

    /*
    |-----------------------------------------------------------------------
    | -- styles
    |-----------------------------------------------------------------------
    |
    */

	// apps
	mix.sass('common.scss');

    // general
    mix.styles([
        'bootstrap-3.3.7.min.css',
        'animate.css',
        'font-awesome.min.css',
        'font.css',
        'app.css',
		'datepicker.css'
    ], 'public/css/core.css');

    /*
    |-----------------------------------------------------------------------
    | -- scripts
    |-----------------------------------------------------------------------
    |
    */

    // ie compatible
    mix.scripts([
        'ie/html5shiv.js',
        'ie/respond.min.js',
        'ie/excanvas.js'
    ], 'public/js/ie.js');

    // core
    mix.scripts([
        'jquery-1.11.2.min.js',
        'bootstrap-3.3.7.min.js',
        'jquery.appear.js',
		'bootstrap-datepicker.js',
		'app.js',
        'common.js'
    ], 'public/js/core.js');


    /*
    |-----------------------------------------------------------------------
    | -- compile build
    |-----------------------------------------------------------------------
    |
    */

    mix.version([
        // styles
		'public/css/core.css',
        'public/css/common.css',
        // scripts
        'public/js/ie.js',
        'public/js/core.js',
    ]);

});
