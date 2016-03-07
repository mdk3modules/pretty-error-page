var gulp = require('gulp'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),

    autoprefixer = require('autoprefixer'),
    comments = require('postcss-discard-comments'),
    cssnano = require('cssnano');

gulp.task('styles', function() {
    return gulp.src('src/sass/error.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([
            autoprefixer(),
            comments(),
            cssnano()
        ]))
        .pipe(gulp.dest('public'));
});

gulp.task('watch', ['default'], function() {
    gulp.watch(['src/sass/**/*'], ['styles']);
});

gulp.task('default', ['styles']);
