var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cleanCSS = require('gulp-clean-css'), //minify css
    rename = require('gulp-rename'),
    livereload = require('gulp-livereload'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify'),
    zip = require('gulp-zip'),
    filter = require('gulp-filter'),
    del = require('del'),
    concat = require('gulp-concat');

var themeFolder = 'edinburgh/';
var finalFolder = themeFolder + 'final/';
var finalJsFolder = themeFolder + 'final/js/';
var finalCssFolder = themeFolder + 'final/css/';
var finalFontsFolder = themeFolder + 'final/fonts/';
var finalImgFolder = themeFolder + 'final/img/';

var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
})};

gulp.task('sass', function () {
    gulp.src(themeFolder + 'sass/*.scss')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sass())
        .pipe(autoprefixer({
          browsers: ['last 2 versions'],
          cascade: false
        }))
        .pipe(gulp.dest(finalCssFolder))
        .pipe(rename({suffix: '.min'}))
        .pipe(cleanCSS())
        .pipe(gulp.dest(finalCssFolder));
  livereload.reload();
});

gulp.task('refresh', function () {
    livereload.reload();
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch(themeFolder + '**/*.php', ['refresh']);
    gulp.watch(themeFolder + 'sass/*.scss', ['sass']);
});

gulp.task('createFinal', ['clean', 'sass', 'concatCss', 'concatJs', 'copyBootstrapFonts', 'copyImages']);

gulp.task('dist', ['createFinal'], function() {
  const sassFilter = filter([
    themeFolder + 'final/**/*',
    themeFolder + '*.php',
    themeFolder + '*.ico',
    themeFolder + '*.css',
    themeFolder + '*.png'
  ]);
  gulp.src(themeFolder + '**/*')
    .pipe(sassFilter)
    .pipe(gulp.dest('dist/edinburgh'))
    .pipe(zip('edinburgh.zip'))
    .pipe(gulp.dest('dist'));
});

gulp.task('clean', function(){
  return del(['dist']);
});

gulp.task('concatJs', function () {
  return gulp.src([
    themeFolder+'deps/jquery-3.1.0.min.js', //first jquery, then bootstrap
    themeFolder+'deps/bootstrap/js/bootstrap.js',
    themeFolder+'deps/highlightjs/highlight.pack.js'
  ])
    .pipe(concat('mergedScripts.min.js'))
    .pipe(gulp.dest(finalJsFolder));
});

gulp.task('copyBootstrapFonts', function () {
  return gulp.src(themeFolder+'deps/bootstrap/fonts/*')
    .pipe(gulp.dest(finalFontsFolder));
});

gulp.task('copyImages', function () {
  return gulp.src(themeFolder+'images/*')
    .pipe(gulp.dest(finalImgFolder));
});

gulp.task('concatCss', ['sass'], function () {
  return gulp.src([
    themeFolder+'deps/bootstrap/css/bootstrap.min.css',
    finalCssFolder+'edinburgh.min.css' //include edinburgh last to override bootstrap!
  ])
    .pipe(concat('mergedStyles.min.css'))
    .pipe(gulp.dest(finalCssFolder));
});

gulp.task('default', ['sass', 'watch'], function () {
});
