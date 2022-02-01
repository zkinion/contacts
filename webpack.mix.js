const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

const NodePolyfillPlugin = require("node-polyfill-webpack-plugin")

module.exports = {
    // Other rules...
    plugins: [
        new NodePolyfillPlugin()
    ]
}

/*
mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
*/
mix.js([
    'resources/js/app.js',
    'resources/js/bootstrap',
], 'public/js/app.js');
/*mix.js('resources/js/hamburger.js', 'public/js');
mix.js('resources/js/ethers.min.js', 'public/js');*/


/*
mix.css('resources/css/app.css', 'public/css', [
        //
    ]);*/


mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

/*mix.css('resources/css/galleryNew.css', 'public/css');
mix.css('resources/css/responsive.css', 'public/css');
mix.css('resources/css/buyPage.css', 'public/css');*/
/*
mix.react('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
*/
