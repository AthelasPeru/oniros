var config         = require('../config.js').scss,
    errorHandler   = require('../helpers/errorHandler.js'),
    isProduction   = require('../helpers/isProduction.js'),
    reload         = require('../helpers/reload.js'),
    gulp           = require('gulp'),
    gutil          = require('gulp-util'),
    compass        = require('gulp-compass'),
    changed        = require('gulp-changed'),
    sourcemaps     = require('gulp-sourcemaps'),
    minifycss      = require('gulp-minify-css'),
    autoprefixer   = require('gulp-autoprefixer'),
    rename         = require('gulp-rename'),
    del            = require('del'),
    plumber        = require('gulp-plumber');

gulp.task('scss', function () {
  return gulp.src(config.source + '/app.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber({
        errorHandler: errorHandler
    }))
    .pipe(changed(config.dist))
    .pipe(compass({
            config_file: "config.rb", // ruta al archivo config.rb
            css: "stylesheets",  // carpeta de salida del scss
            sass: "source/scss",
            import_path: ['bower_components/'],
            //sourcemap: true
            
        }))
    .pipe( isProduction === true ? autoprefixer(): gutil.noop() )
    .pipe( isProduction === true ? cssnano() : gutil.noop() )
    .pipe(rename({
        basename: 'style'
    }))
    .pipe(sourcemaps.write('./'))
    .pipe(plumber.stop())
    .pipe(gulp.dest(config.dist))
    .pipe( reload() )
});

gulp.task('mvsourcemap', ["scss"], function(){
    return gulp.src("stylesheets/app.css.map")
        .pipe(gulp.dest(config.dist))       
});

gulp.task('del_temp', ['mvsourcemap'], function(){
    del("stylesheets")
});

gulp.task("styles", ["del_temp"], function(){
    
});