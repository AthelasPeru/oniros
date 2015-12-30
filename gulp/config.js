// Set variables
var source = './source';
var dist = './dist';

module.exports = {
	path: {
		source: source,
		dist: dist
	},
	scss: {
		source: source + '/scss',
		dist: dist + '/css'
	},
	javascript: {
		source: source + '/js',
		headscripts: source + '/js/headscripts',
		dist: dist + '/js'
	},
	images:{
		source: source + '/img',
		dist: dist + '/img',
		jpg: source + '/img/*.jpg',
		png: source + '/img/*.png',
		svg: source + '/img/*.svg',
		ico: source + '/img/*.ico'
	},
	fonts:{
		source: source + '/fonts',
		dist: dist
	},
	browserSync: {
		files: [dist + '/**/*'],
	    server: {
     		// Serve up our build folder
     		baseDir: dist
 		},
 		dist: dist
 	}

}