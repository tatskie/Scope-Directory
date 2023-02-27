const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix
//   .js('resources/js/app.js', 'public/js')
//   .postCss('resources/css/app.css', 'public/css', [
//     require('postcss-import'),
//     require('tailwindcss'),
//     require('postcss-nested'),
//     require('autoprefixer'),
//   ]);

mix.js('resources/assets/js/app.js', 'public/assets/js').vue()
	.js('resources/assets/js/corporate.js', 'public/assets/js').vue()
	.js('resources/assets/js/teacher.js', 'public/assets/js').vue()
    .js('resources/assets/js/editor.js', 'public/assets/js').vue()
	.js('resources/assets/js/academia.js', 'public/assets/js').vue()
	.js('resources/assets/js/submit.js', 'public/assets/js').vue()
	.js('resources/assets/js/hamburger.js', 'public/assets/js').vue()
  .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps()
    .sass('resources/assets/sass/app.scss', 'public/assets/css').options({
         processCssUrls: false,
     })
    .sass('resources/assets/sass/admin.scss', 'public/assets/css')
    .options({
         processCssUrls: false,
     })
    .sass('resources/assets/sass/submit.scss', 'public/assets/css')
    .options({
         processCssUrls: false,
     })
	.copy('resources/assets/images', 'public/assets/images');
    // .copyDirectory('node_modules/tinymce/skins', 'public/assets/skins');



if (mix.inProduction()) {
  mix
    .version();
}
mix.webpackConfig({
    stats: {
        children: true,
    },
});
// const mix = require('laravel-mix');

// let src_path = 'resources/js/';

// mix.webpackConfig({
// 	resolve: {
// 		extensions: ['.js', '.vue', '.json'],
// 		alias: {
// 			'vue$': 'vue/dist/vue.esm.js',
// 			'@': path.resolve(__dirname, src_path),
// 		}
// 	}
// });
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/assets/js')
// 	.js('resources/assets/js/corporate.js', 'public/assets/js')
// 	.js('resources/assets/js/teacher.js', 'public/assets/js')
// 	.js('resources/assets/js/academia.js', 'public/assets/js')
// 	.js('resources/assets/js/submit.js', 'public/assets/js')
// 	.js('resources/assets/js/hamburger.js', 'public/assets/js')
//     .sass('resources/assets/sass/app.scss', 'public/assets/css')
//     .sass('resources/assets/sass/admin.scss', 'public/assets/css')
//     .sass('resources/assets/sass/submit.scss', 'public/assets/css')
// 	.copy('resources/assets/images', 'public/assets/images')
//     .copyDirectory('node_modules/tinymce/skins', 'public/assets/skins');

