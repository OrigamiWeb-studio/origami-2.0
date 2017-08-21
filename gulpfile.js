var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps   = require('gulp-sourcemaps'),
    webpack      = require('webpack-stream'),
    uglify       = require('gulp-uglify'),
    pump         = require('pump'),
    named        = require('vinyl-named');

gulp.task('sass', function(){
    return gulp.src('./resources/assets/sass/**/*.sass')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 15 version'],
            cascade: false
        }))
        .pipe(sourcemaps.write("../maps"))
        .pipe(gulp.dest('./public/css'))
});

gulp.task('scripts', function(cb){
    pump(
        [
            gulp.src('./resources/assets/js/*.js'),
            named(),
            webpack({
               module:{
                   rules: [
                       {
                           test: /\.js$/,
                           loader: 'babel-loader',
                           options: {
                               presets: ['es2015'],
                               // plugins: ['transform-runtime']
                           }
                       }
                   ]
               }
            }),
            // uglify(),
            gulp.dest('./public/js/')
        ],
        cb
    )
});

gulp.task('watch', ['sass'], function() {
    gulp.watch('./resources/assets/sass/**/*.sass', ['sass']);
});

gulp.task('default', ['watch']);