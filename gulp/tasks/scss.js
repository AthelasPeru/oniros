var config         = require('../config.js').scss,
    errorHandler   = require('../helpers/errorHandler.js'),
    isProduction   = require('../helpers/isProduction.js'),
    reload         = require('../helpers/reload.js'),
    gulp           = require('gulp'),
    gutil          = require('gulp-util'),
    compass        = require('gulp-compass'),
    changed        = require('gulp-changed'),
    sourcemaps     = require('gulp-sourcemaps'),
    cssnano      = require('gulp-cssnano'),
    autoprefixer   = require('gulp-autoprefixer'),
    rename         = require('gulp-rename'),
    del            = require('del'),
    plumber        = require('gulp-plumber');

gulp.task('main', function () {
  return gulp.src(config.main + '/main.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber({
        errorHandler: errorHandler
    }))
    .pipe(changed(config.dist))
    .pipe(compass({
            config_file: "config.rb", // ruta al archivo config.rb
            css: "source/css/main",  // carpeta de salida del scss
            sass: "source/scss/main",
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
    .pipe(isProduction === true ? rename({suffix: '.min'}) : gutil.noop())
    .pipe(gulp.dest(config.dist))
    .pipe( reload() )
});

gulp.task('login', function () {
  return gulp.src(config.login + '/login.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber({
        errorHandler: errorHandler
    }))
    .pipe(changed(config.dist))
    .pipe(compass({
            config_file: "config.rb", // ruta al archivo config.rb
            css: "source/css/login",  // carpeta de salida del scss
            sass: "source/scss/login",
            import_path: ['bower_components/'],
            //sourcemap: true
            
        }))
    .pipe( isProduction === true ? autoprefixer(): gutil.noop() )
    .pipe( isProduction === true ? cssnano() : gutil.noop() )
    .pipe(rename({
        basename: 'login'
    }))
    .pipe(sourcemaps.write('./'))
    .pipe(plumber.stop())
    .pipe(gulp.dest(config.dist))
    .pipe(isProduction === true ? rename({suffix: '.min'}) : gutil.noop())
    .pipe(gulp.dest(config.dist))
    .pipe( reload() )
});


gulp.task('admin', function () {
  return gulp.src(config.admin + '/admin.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber({
        errorHandler: errorHandler
    }))
    .pipe(changed(config.dist))
    .pipe(compass({
            config_file: "config.rb", // ruta al archivo config.rb
            css: "source/css/admin",  // carpeta de salida del scss
            sass: "source/scss/admin",
            import_path: ['bower_components/'],
            //sourcemap: true
            
        }))
    .pipe( isProduction === true ? autoprefixer(): gutil.noop() )
    .pipe( isProduction === true ? cssnano() : gutil.noop() )
    .pipe(rename({
        basename: 'admin'
    }))
    .pipe(sourcemaps.write('./'))
    .pipe(plumber.stop())
    .pipe(gulp.dest(config.dist))
    .pipe(isProduction === true ? rename({suffix: '.min'}) : gutil.noop())
    .pipe(gulp.dest(config.dist))
    .pipe( reload() )
});

gulp.task('mvsourcemap', ["main", "login", "admin"], function(){
    return gulp.src("source/css/main.css.map")
        .pipe(gulp.dest(config.dist))       
});

gulp.task("styles", ["mvsourcemap"], function(){
    
});


gulp.task('uncss', ["styles"], function(){
    return gulp.src(config.toUncss)
        .pipe(uncss({html: config.html}))
        .pipe(gulp.dest(config.dist))
});