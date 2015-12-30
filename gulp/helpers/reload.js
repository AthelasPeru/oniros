var browserSync = require('browser-sync');

function reload() {

  return browserSync.reload({ stream: true });

}

module.exports = reload;