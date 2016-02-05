The Workflow
===============

**Oniros** was build with a particular workflow in sight, but we think it's flexible enough for front/wordpress developers 
that want to use customizable tools and a `Gulp workflow <http://gulpjs.com/>`_.

The goal is to help developers deliver the best product they can without having to spend hours configuring basic 
stuff every *top notch* Wordpress template should have.

With **Oniros** developers can focus on complex tasks the client might require, like custom plugins, integrations, etc. Organization of your files and frontend building tools shouldn't bother you on a per project basis!


We usually worrk on a remote server


Steps
--------

There are a few steps we follow when working with Oniros, maybe they help you too.

1. Build/copy the static version of the site in/to the **static_site** folder
2. If you are building your static site here, you can use **gulp watch** to autoreload your scss changes
3. Comment/Uncomment includes in the **functions.php** file
4. If you need a slider run bower install and comment/uncomment the respective pages in the athelas_scripts function in **functions.php**
5. Define our Custom post types in includes/functions/posttypes.php
6. Define our menus in includes/functions/menu.php
7. Create specific Page/Archive/Single/Category/Taxonomy/etc pages in the root folder
8. Decide if Google Analitycs will go in the header or footer
