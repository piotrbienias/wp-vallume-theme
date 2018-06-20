var minify      = require('gulp-minify'),
    gulp        = require('gulp');
    cleanCss    = require('gulp-clean-css');
    watch       = require('gulp-watch');
    src         = 'web/app/themes/vallume/src/'
    dest        = 'web/app/themes/vallume/dist/';


gulp.task('minify-js', function() {
    gulp.src('web/app/themes/vallume/src/js/*.js')
        .pipe(minify({
            noSource: true
        }))
        .pipe(gulp.dest(dest + 'js'));
});

gulp.task('minify-css', function() {
    gulp.src('web/app/themes/vallume/src/css/*.css')
        .pipe(cleanCss())
        .pipe(gulp.dest(dest + 'css'));
});


gulp.task('watch', function() {
    gulp.watch('web/app/themes/vallume/src/**/*.*', ['minify-js', 'minify-css']);
})

gulp.task('default', ['minify-js', 'minify-css', 'watch']);