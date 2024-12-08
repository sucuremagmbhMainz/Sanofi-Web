var gulp = require('gulp'),
    postcss = require('gulp-postcss'),
    watch = require('gulp-watch'),
    autoprefixer = require('autoprefixer'),
    sass = require('gulp-sass'),
    plumber = require('gulp-plumber'),
    cleanCSS = require('gulp-clean-css'),
    rigger = require('gulp-rigger'),
    uglify = require('gulp-uglifyjs')
    sourcemaps = require('gulp-sourcemaps');



gulp.task('sass', function () {
    gulp.src('wp-content/themes/aspegic/library/css/style.scss')
      .pipe(plumber())
      .pipe(sourcemaps.init())
      .pipe(sass({
        outputStyle: 'compressed',
        sourceMap: true,
        errLogToConsole: true
      }))
      .pipe(postcss([ autoprefixer({ browsers: ['last 2 versions'] }) ]))
      .pipe(cleanCSS({compatibility: 'ie8'}))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('wp-content/themes/aspegic/library/css'));
});

gulp.task('js:min', function () {
    gulp.src('wp-content/themes/aspegic/library/js/script.js')
        .pipe(plumber())
        //.pipe(rigger())
        .pipe(uglify('script.min.js', {
            outSourceMap: true
        }))
        .pipe(gulp.dest('wp-content/themes/aspegic/library/js'));
});

gulp.task('watch', function () {
    gulp.watch('wp-content/themes/aspegic/library/css/**/*.scss', ['sass']);
    gulp.watch('wp-content/themes/aspegic/library/js/script.js', ['js:min']);
});


gulp.task('default', [
    'sass',
    'js:min'
]);
