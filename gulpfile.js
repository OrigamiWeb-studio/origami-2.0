var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps   = require('gulp-sourcemaps'),
    pump         = require('pump');


gulp.task('sass', function(cb){
    pump(
        [
            gulp.src('./resources/assets/sass/**/*.sass'),
            sourcemaps.init(),
            sass({outputStyle: 'compressed'}).on('error', sass.logError),
            autoprefixer({
                browsers: ['last 15 version'],
                cascade: false
            }),
            sourcemaps.write("../maps"),
            gulp.dest('./public/css')
        ],
        cb
    )
});

gulp.task('watch', ['sass'], function() {
    gulp.watch('./resources/assets/sass/**/*.sass', ['sass']);
});

gulp.task('default', ['watch']);