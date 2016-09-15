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
    del = require('del');
var themeFolder = 'edinburgh/';

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
        .pipe(gulp.dest(themeFolder + 'css'))
        .pipe(rename({suffix: '.min'}))
        .pipe(cleanCSS())
        .pipe(gulp.dest(themeFolder + 'css'));
  livereload.reload();
});

gulp.task('refresh', function () {
    livereload.reload();
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch(themeFolder + '**/*.php', ['refresh']);
    gulp.watch(themeFolder + '**/*.html', ['refresh']);
    gulp.watch(themeFolder + 'sass/*.scss', ['sass']);
});

gulp.task('dist', ['clean', 'sass'], function() {
  const sassFilter = filter(['**/*', '!**/*.scss', '!**/sass']);
  gulp.src(themeFolder + '**/*')
    .pipe(sassFilter)
    .pipe(gulp.dest('dist/edinburgh'))
    .pipe(zip('edinburgh.zip'))
    .pipe(gulp.dest('dist'));
});

gulp.task('clean', function(){
  return del(['dist']);
});

gulp.task('default', ['sass', 'watch'], function () {
});
