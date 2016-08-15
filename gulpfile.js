var elixir = require('laravel-elixir');

elixir(function(mix) {
    var bpath = 'node_modules/bootstrap-sass/assets';
    var jqueryPath = 'resources/assets/vendor/jquery';

    mix.sass('app.scss')
        .copy(jqueryPath + '/dist/jquery.min.js', 'public/js')
        .copy(bpath + '/fonts', 'public/fonts')
        .copy(bpath + '/javascripts/bootstrap.min.js', 'public/js');
});

