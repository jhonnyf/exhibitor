const mix = require('laravel-mix');

mix.sass('./resources/scss/console/bootstrap.scss', './public/css/console/bootstrap.css');

/**
 * VENDOR
 */
mix.combine([
    './public/css/console/bootstrap.css',
    './node_modules/@fortawesome/fontawesome-free/css/all.css',
    './node_modules/dropzone/dist/dropzone.css',
], './public/css/console/vendor.css').minify('./public/css/console/vendor.css');

mix.combine([
    './node_modules/jquery/dist/jquery.js',
    './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    './node_modules/dropzone/dist/dropzone.js'
], './public/js/console/vendor.js').minify('./public/js/console/vendor.js');

/**
 * Main
 */

mix.sass('./resources/scss/console/main.scss', './public/css/console/main.css');

mix.js([
    './resources/js/app.js'
], './public/js/console/main.js').minify('./public/js/console/main.js');


/**
 * COPY
 */

mix.copyDirectory('./node_modules/@fortawesome/fontawesome-free/webfonts', 'public/css/webfonts');