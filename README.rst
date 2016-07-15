Documentation
+++++++++++++++++

`READ THE DOCUMENTATION HERE <http://www.athelas.pe/oniros>`_

What is Oniros?
++++++++++++++++++

Oniros is our base template for building really good wordpress templates.
It was build to optimize our workflow and ensure best practices and similar patterns on our projects.
We try to cover most usecases we encounter on a daily basis, so we don't have to be searching on old folders for the solution or way to implement
something we build for a project 2 months ago. 

What does it include/require to work?
+++++++++++++++++++++++++++++++++++++++++++++

**Includes**

- Sass structure
- Sass Mixins
- Npm Scripts workflow
- Slick Slider

**Requires**

- npm
- bower (to install slick slider)
- sass


Why Oniros?
+++++++++++++++

We know there are a lot of other **Wordpress Templates** out there. For example, many of our developers worked with `Bones <http://themble.com/bones/>`_ template in the past. But we found ourselves erasing most of it's markup and modifying the way they did some stuff.
Also, we thought it be pretty nice to add our **npm scripts build system** created for our **static** and `WordPress <http://wordpress.orgm/>`_ projects inspired on the great `Frontend Starter Kit <https://github.com/beatpixel/Frontend-StarterKit>`_. (we used to use gulp up until version 0.5)

Oh, you meant the name? Well, first, we are **huge** `The Sandman <http://www.vertigocomics.com/characters/the-sandman>`_ fans, second, our native tongue is spanish so we preffer the *spanification* of the name **Oneiros**. That's really it! Well and the fact that **Oniros** is the builder of dreams, and that's just awesome!

What can Oniros do for me?
++++++++++++++++++++++++++++++

In Wordpress
****************

- Quickly start a WP template
- Easily add WP Custom Post Types
- Easily add WP Menus
- Easily add custom image sizes to WP
- Ajax configurarion and guide included
- Easily add custom taxonomies
- Polylang multilanguage site prepared
- Help you reduce the use of external plugins
- Allow you to use javascript files on specific pages
- Follow good practices

In general
****************

- Automatically generate all favicons with realfavicongenerator.com
- Optimize your images
- Process and minimize your sass files
- Create an svg spritesheet with it's scss classes directly embedded into your sass files
- uncss your css files if you want to
- Separate Admin/Login and Main theme WP css and js files
- Minimize and concatenate your javascript files, differentiating between your head and footer scripts
- Work with browsersync live reloading all of your scss and js changes



Why share it?
+++++++++++++++

Why, isn't it obvious???? We have learned so much from the **open source** community, and wouldn't have been able to build this tool without it. It's only reasonable to give back, wouldn't you agree?

Who is Oniros for?
+++++++++++++++++++++++

Oniros is for WP developers that want to build any kind of website with **Wordpress**, use Custom Post Types regularly and doesn't necesarily build Blog like websites.
It's also for Wordpress Developers that tend to work with Frontend developers that deliver static code to them.

Recommended Plugins
=======================

We try to use as few plugins as posible, but from time to time a plugin is so good and minimal, or just so time-helping effective, we use it all the time.

Here is a small list of all the plugins we sometimes install with our projects and we know play great with **Oniros**.

Forms
********

- **Contact-Form-7**: Free and Flexible, `CF7 <https://wordpress.org/plugins/contact-form-7/>`_ has never failed us. It lacks a pseudo CRM like other form plugins, but that's easily solved with **Flamingo**
- **Flamingo**: `Manage <https://wordpress.org/plugins/flamingo/>`_ your contacts list and website messages 
- **Contact-Form-DB**: `CRM <https://es.wordpress.org/plugins/contact-form-7-to-database-extension/>`_ for CF7

Security
**********

- **wp-password-bcrypt**: Build by `roots agency <https://roots.io>`_ changes the default ussage of MD5 to encript password to bcrypt.
- **Limit Login Attempts**: `Limit <https://wordpress.org/support/view/plugin-reviews/limit-login-attempts>`_ your login attempts


Content
***********

- **Advanced Custom Fields**: The best `custom fields manager <https://wordpress.org/plugins/advanced-custom-fields/>`_ , it's flexibility allows you to really model content and User interface in almost any way. Your customers will thank you for it's usability

Maintenance
***************

- **Maintenance**: `The WP Maintenance plugin <https://wordpress.org/plugins/wp-maintenance/>`_ allows you to put your website on the waiting time for you to do maintenance or launch your website. Personalize this page with picture and countdown

Migrations
*************

- **WP Clone By WP Academy**: `WP Clone <https://wordpress.org/plugins/wp-clone-by-wp-academy/>`_ is the easiest, fastest and most secure way to move or copy a WordPress site to another domain or hosting server. You can also use it to move your site to/from local server hosting, to create copies of your site for development or testing purposes, to backup your site, and to install pre-configured versions of WordPress.

Media
**********

- `Optimize Images Resizing <https://wordpress.org/plugins/optimize-images-resizing/>`_

Backup
*********

- **BackWPup**: The backup plugin `BackWPup <https://wordpress.org/plugins/backwpup/>`_ can be used to save your complete installation including /wp-content/ and push them to an external Backup Service, like Dropbox, S3, FTP and many more, see list below. With a single backup .zip file you are able to easily restore an installation

SEO
*****

- **Yoast SEO**: `Yoast SEO <https://yoast.com/wordpress/plugins/seo/>`_ (formerly known as WordPress SEO by Yoast) is the most complete WordPress SEO plugin that exists today for WordPress.org users. It incorporates everything from a snippet editor and real time page analysis functionality that helps you optimize your pages content, images titles, meta descriptions and more to XML sitemaps, and loads of optimization options in between.

SSL
**********

- **WP Force SSL**: Redirect all traffic from HTTP to HTTPS to all pages of your WordPress website. The main purpose of `this plugin <https://wordpress.org/plugins/wp-force-ssl/>`_ is to fix a problem that occurred on some websites that while everything was served over HTTPS (even while navigating), if you specifically tried to access a page via HTTP (via url) it won't redirect to HTTPS.

Changelog
+++++++++++++

v0.7
*******

- Renamed functions