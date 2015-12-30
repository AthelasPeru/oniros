var gutil       = require('gulp-util'),
    log         = require('fancy-log');

onError = function(err) {
    gutil.beep();
    log( gutil.colors.yellow( '\n\n' + err.message + '\n') );
};

module.exports = onError;