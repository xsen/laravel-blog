var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	
	mix.styles([
		'bootstrap.min.css',
		'clean-blog.min.css',
		'prism.css'
	]);



	mix.scripts([
		'jquery.min.js',
		'bootstrap.min.js',
		'clean-blog.min.js',
		'prism.js'
	])

	mix.version(['css/all.css', 'js/all.js']);
});
