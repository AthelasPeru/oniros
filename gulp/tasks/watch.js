var config 	  = require('../config.js'),
    gulp 	    = require('gulp');

gulp.task('watch', function() {

    // gulp.watch( config.iconfont.source + '/**/*.svg', ['iconfont', 'scss'] );
    // gulp.watch( config.sprite.source + '/**/*.{jpg,gif,png}', ['sprite', 'scss'] );
    gulp.watch( config.images.source + '/**/*', ['images', 'styles'] );

    gulp.watch( 
      [
        config.scss.source + '/**/*.scss'
      ],

      ['styles'] 
    );

    gulp.watch( config.javascript.source + '/**/*.js', ['scripts'] );
    

});