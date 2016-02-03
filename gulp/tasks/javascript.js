var config         = require('../config.js').javascript,
    errorHandler   = require('../helpers/errorHandler.js'),
    isProduction   = require('../helpers/isProduction.js'),
    reload         = require('../helpers/reload.js'),
    gulp           = require('gulp'),
    uglify         = require('gulp-uglify'),
    rename         = require('gulp-rename'),
    browserify     = require('browserify'),
    source         = require('vinyl-source-stream'),
    buffer         = require('vinyl-buffer'),
    sourcemaps     = require('gulp-sourcemaps'),
    gutil          = require('gulp-util'),
    watchify       = require('watchify'),
    plumber        = require('gulp-plumber'),
    changed        = require('gulp-changed'),
    concat         = require('gulp-concat'),
    assign 		   = require('lodash.assign');

// add custom browserify options here
var customOpts = {
  entries: [config.source + '/app.js'],
  debug: true
};

var opts = assign({}, watchify.args, customOpts);

gulp.task('scripts', function() {
    // list here all the js files you want to concatenate, NOT the ones that should run in just one particular page
    // unless you create a safeguard so it doen't try to run where it will throw an error (check the app.js slider function for an example)
  return gulp.src([     
    'source/js/app.js',
    'source/js/ajax-query.js',
    'source/js/main-slider.js'
    ]) 
    .pipe(concat('app.js')) 
    .pipe(gulp.dest('dist/js'))
}); 

var b = watchify(browserify(opts));

function bundle() {
  return b.bundle()
    .on('error', errorHandler)
    .pipe(source('app.js'))
    // optional, remove if you don't need to buffer file contents
    .pipe(buffer())
    .pipe( isProduction === true ? uglify() : gutil.noop() )
    .pipe(sourcemaps.init({loadMaps:true}))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(config.dist))
}

gulp.task('javascriptOnHead', function () {
  return gulp.src(config.headscripts + '/**/*.js')
    .pipe(plumber({
        errorHandler: errorHandler
    }))
    .pipe(changed(config.dist))
    .pipe(isProduction === true ? uglify() : gutil.noop() )
    .pipe(rename({
        basename: 'head'
    }))
    .pipe(plumber.stop())
    .pipe(gulp.dest(config.dist))
    .pipe( reload() )
});

gulp.task('scripts', ['javascriptOnHead', 'scripts']);

b.on('log', gutil.log);
