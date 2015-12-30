var gutil       = require('gulp-util'),
    log         = require('fancy-log');

var isProduction = (gutil.env.env === 'production') ? true : false;

(function () {
  var currentEnv = (isProduction) ? 'Production' : 'Development';
  log( gutil.colors.blue( 'ENV: ' +  currentEnv) );
})();

module.exports = isProduction;