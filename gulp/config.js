// Set variables
var source = './source';
var dist = './dist';

module.exports = {
	path: {
		source: source,
		dist: dist
	},
	scss: {
		login: source + '/scss/login',
		admin: source + '/scss/admin',
		main: source + '/scss/main',
		html: ['./static_site/*.html'], // path to html files to compare with uncss		
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
		ico: source + '/img/favicon.png' //should be at least 75x75 px
	},
	fonts:{
		source: source + '/fonts',
		dist: dist
	},
	browserSync: {
		files: [dist + '/**/*'],
	    server: {
     		// Serve up our build folder
     		baseDir: "absolute_path_to_root/static_site/"
 		},
 		dist: dist
 	}

}