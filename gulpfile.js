var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    livereload = require('gulp-livereload'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify');

var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
})};

gulp.task('sass', function () {
    gulp.src('theme/*.scss')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sass())
        .pipe(gulp.dest('theme'));
  livereload.reload();
});

gulp.task('php', function () {
    livereload.reload();
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('theme/**/*.php', ['php']);
    gulp.watch('theme/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'watch'], function () {

});
