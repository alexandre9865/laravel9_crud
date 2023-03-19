let mix = require('laravel-mix');

mix.js(['resources/js/app.js', 'resources/js/bootstrap.js'], 'public/js')
    .postCss('resources/css/app.css', 'public/css', []);

mix.js(['resources/views/report/report.js'], 'public/js');
mix.js(['resources/views/profile/profile.js'], 'public/js');