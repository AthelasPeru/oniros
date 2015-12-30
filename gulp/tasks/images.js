var config 		    	= require('../config.js').images,
    errorHandler   		= require('../helpers/errorHandler.js'),
    isProduction   		= require('../helpers/isProduction.js'),
    reload         		= require('../helpers/reload.js'),
	gulp   				= require('gulp'),
    gutil          		= require('gulp-util'),
	changed     		= require('gulp-changed'),
	imagemin    		= require('gulp-imagemin'),
	pngmin       		= require('gulp-pngmin'),
	plumber     		= require('gulp-plumber');


gulp.task('images:jpg', function() {
  return gulp.src(config.jpg)
    .pipe(plumber({
        errorHandler: errorHandler
    }))
    .pipe(changed(config.dist))
    .pipe(isProduction === true ? imagemin() : gutil.noop() )
    .pipe(plumber.stop())
    .pipe(gulp.dest(config.dist))
});

gulp.task('images:png', function() {
  return gulp.src(config.png)
      .pipe(plumber({
          errorHandler: errorHandler
      }))
      .pipe(changed(config.dist))
      .pipe( isProduction === true ? pngmin() : gutil.noop() )
      .pipe(plumber.stop())
      .pipe(gulp.dest(config.dist))
});

gulp.task('images:svg', function() {
  return gulp.src(config.svg)
      .pipe(plumber({
          errorHandler: errorHandler
      }))
      .pipe(changed(config.dist))
      .pipe( isProduction === true ? pngmin() : gutil.noop() )
      .pipe(plumber.stop())
      .pipe(gulp.dest(config.dist))
});

gulp.task('images:fav', function() {
  return gulp.src(config.ico)
  	.pipe(changed(config.dist))
    .pipe(gulp.dest(config.dist))
});


gulp.task('images', ['images:jpg', 'images:png', 'images:svg', 'images:fav'] );
