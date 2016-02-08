Gulp
========

The gulp folder contains everything we use to work with Gulp.
Since we are modifying the basic `Frontend Starter Kit <https://github.com/beatpixel/Frontend-StarterKit>`_ gulp processes, we are following it's great structure.

The **gulpfile.js** on the root folder of our project is there just to import
all of our gulpo tasks and helpers, allowing us to keep them organized and *manageable*.

The **gulp/** folder contains two subfolders, **tasks/** and **helpers/**, and a file. **config.js**.


Enviroment
+++++++++++++

`Frontend Starter Kit <https://github.com/beatpixel/Frontend-StarterKit>`_ gulp process asumes you don't want do be dealing with time consuming tasks while developing your website, many things can change, so why bother? By default the gulp processes asume you are working on a development environment and won't run expensive tasks.

Production enviroment
***********************

to activate the production environment, just run the same gulp task with the **--production** flag. for example

.. code-block:: bash

	$ gulp styles --production




config.js
++++++++++++

This file is the heart of our task manager. Here we configure *per task* variables
that we need to access while building the tasks.

There are some parts that recquire manual configuration, though:

Remove unused css
**********************

If you want to run the **uncss** task, it will look for the html files in the static_site folder. **But** you can use it to check for all of your dinamic content too. Just pass the array all of the required endpoints/addresses you want to check. 

*for example*:

.. code-block:: javascript

	scss: {
		login: source + '/scss/login',
		admin: source + '/scss/admin',
		main: source + '/scss/main',
		html: [
			'http://localhost/wp_project',
			'http://localhost/products',
			'http://localhost/contact',
			'http://localhost/about-us'
		], // path to html files to compare with uncss		
		dist: dist + '/css'
	},


Configure Browsersync
************************

`Browsersync <https://www.browsersync.io/>`_ is a brilliant tool for syncronizing
a website accross multiple devices and livereloading your code amongst all of them simultaneously.

We use it during our Markup (HTML/SCSS) building process, and you need to 
configure the absolute path to your static_site folder.


Tasks
-------
browsersync
++++++++++++++

**to run:** *command*

**what it does:** Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


default
++++++++++++++

This task

favicon
++++++++++++++

**to run:** *gulp favicon*

**what it does:** It searches for a *favicon.png* file in the soruce/img directory, and connects it with the `RFG <http://realfavicongenerator.com>`_ API. it builds all the necesary versions of the favicon, the *manifest.ini* file and the *faviconData.json* file. All of these favicon versions are already referenced in the *header.php* file.

images
++++++++++++++

**to run:** *gulp images*

**what it does:** It groups three different tasks, ['images:jpg', 'images:png', 'images:svg']. It basically optimizes the images in the *source/img* folder. Each task can be configred independently. Eventually this configurations will be moved to the *config.js* file.


javascript
++++++++++++++

**to run:** *gulp scripts*

**what it does:** It concatenates all the scripts in the *source/js* folder, then it uglifies it.


styles
++++++++++++++

This task

watch
++++++++

This task