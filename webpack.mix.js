// const mix = require('laravel-mix');

// const tailwindcss = require('tailwindcss');

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .options({
//         processCssUrls: false,
//         postCss: [tailwindcss('./tailwind.config.js')],
//     });
const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const glob = require('glob-all');
const path = require('path');
require('laravel-mix-purgecss');


mix
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        cssNano: {
            calc: false,
        },
        postCss: [
            tailwindcss('./tailwind.config.js'),
        ],
    })
    .purgeCss({
        enabled: true,
        paths: () => glob.sync([
            path.join(__dirname, 'resources/views/**/*.blade.php'),
            path.join(__dirname, 'resources/js/**/*.vue'),
        ]),
        extensions: ['html', 'js', 'php', 'vue'],
        extractorPattern: /[\w-/:]+(?<!:)/g,
        whitelist: ['pagination', 'page-link', 'page-item disabled', 'page-item active']
    });
