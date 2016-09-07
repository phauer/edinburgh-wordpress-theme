var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cleanCSS = require('gulp-clean-css'), //minify css
    rename = require('gulp-rename'),
    livereload = require('gulp-livereload'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify');

var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
})};

gulp.task('sass', function () {
    gulp.src('theme/sass/*.scss')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sass())
        .pipe(autoprefixer({
          browsers: ['last 2 versions'],
          cascade: false
        }))
        .pipe(gulp.dest('theme'))
        .pipe(rename({suffix: '.min'}))
        .pipe(cleanCSS())
        .pipe(gulp.dest('theme'));
  livereload.reload();
});

gulp.task('php', function () {
    livereload.reload();
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('theme/**/*.php', ['php']);
    gulp.watch('theme/sass/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'watch'], function () {

});
