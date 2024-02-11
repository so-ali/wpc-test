// webpack.mix.js

let mix = require('laravel-mix');

mix.js('src/app.js', 'dist/scripts.js').setPublicPath('dist');
mix.sass('src/index.scss','dist/styles.css').setPublicPath('dist');