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
  concat = require('gulp-concat'),
  merge = require('merge-stream');

var themeFolder = 'edinburgh/';
var resFolder = themeFolder + 'res/';
var jsFolder = resFolder + 'js/';
var cssFolder = resFolder + 'css/';
var fontsFolder = resFolder + 'fonts/';
var imgFolder = resFolder + 'img/';

var plumberErrorHandler = {
  errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};

gulp.task('createCss', function () {
  var sassStream = gulp.src(themeFolder + 'sass/*.scss')
    .pipe(plumber(plumberErrorHandler))
    .pipe(sass())
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(gulp.dest(cssFolder))
    .pipe(rename({suffix: '.min'}))
    .pipe(cleanCSS());

  var additionalCssFiles = gulp.src([themeFolder + 'deps/bootstrap/css/bootstrap.min.css']);

  //bootstrap needs to be before edinburgh, because edinburgh overrides bootstrap's styles.
  //But merge-streams doesn't allow to define the order.
  //Fortunately, the order is correct. But keep an eye on it.
  merge(additionalCssFiles, sassStream)
    .pipe(concat('mergedStyles.min.css'))
    .pipe(gulp.dest(cssFolder));

  livereload.reload();
});

gulp.task('refresh', function () {
  livereload.reload();
});

gulp.task('watch', function () {
  livereload.listen();
  gulp.watch(themeFolder + '**/*.php', ['refresh']);
  gulp.watch(themeFolder + 'sass/*.scss', ['createCss']);
});

gulp.task('createAll', ['clean', 'createCss', 'concatJs', 'copyBootstrapFonts', 'copyImages']);

gulp.task('dist', ['createAll'], function () {
  const sassFilter = filter([
    resFolder + '**/*',
    themeFolder + '*.php',
    themeFolder + '*.ico',
    themeFolder + '*.css',
    themeFolder + '*.png',
    '!' + cssFolder + 'edinburgh*.css'
  ]);
  gulp.src(themeFolder + '**/*')
    .pipe(sassFilter)
    .pipe(gulp.dest('dist/edinburgh'))
    .pipe(zip('edinburgh.zip'))
    .pipe(gulp.dest('dist'));
});

gulp.task('clean', function () {
  return del(['dist']);
});

gulp.task('concatJs', function () {
  return gulp.src([
    themeFolder + 'deps/jquery-3.1.0.min.js', //first jquery, then bootstrap
    themeFolder + 'deps/bootstrap/js/bootstrap.js',
    themeFolder + 'deps/highlightjs/highlight.pack.js'
  ])
    .pipe(concat('mergedScripts.min.js'))
    .pipe(gulp.dest(jsFolder));
});

gulp.task('copyBootstrapFonts', function () {
  return gulp.src(themeFolder + 'deps/bootstrap/fonts/*')
    .pipe(gulp.dest(fontsFolder));
});

gulp.task('copyImages', function () {
  return gulp.src(themeFolder + 'images/*')
    .pipe(gulp.dest(imgFolder));
});

gulp.task('default', ['createCss', 'watch'], function () {
});
