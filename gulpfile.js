var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps   = require('gulp-sourcemaps');

gulp.task('sass', function(){
    return gulp.src('./public/sass/**/*.sass')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 15 version'],
            cascade: false
        }))
        .pipe(sourcemaps.write("../maps"))
        .pipe(gulp.dest('./public/css'))
});

gulp.task('watch', ['sass'], function() {
    gulp.watch('./public/sass/**/*.sass', ['sass']);
});

gulp.task('default', ['watch']);