let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .setPublicPath('public');
mix.scripts('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js/adminlte.js')
   .styles('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css/adminlte.css');
