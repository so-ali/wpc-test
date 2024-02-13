// webpack.mix.js

let mix = require('laravel-mix');

mix.js('assets/app.js', 'assets/compiled/scripts.js').setPublicPath('assets/compiled');
mix.sass('assets/index.scss','assets/compiled/styles.css').setPublicPath('assets/compiled');