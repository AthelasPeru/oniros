var config 		  = require('../config.js').browserSync,
	gulp    	  = require('gulp'),
	browserSync = require('browser-sync');

gulp.task('browserSync', function() {
	browserSync.init(config);
});