const mix = require('laravel-mix');

mix.options({
    postCss: [
        require('autoprefixer')({
            grid: true,
        })
    ]
});

mix.js('js/app.js', './')
    .sass('sass/style.scss', './');

