npm Scripts
==============

What?? npm scripts?? how about **Gulp**, **broccoli**, **grunt**, **<insert yopur favorite building tool here>**???

Well, if you look at our `tags <https://github.com/AthelasPeru/oniros/releases>`_, you will see version **v0.5**. It was build with a brilliant gulp process. So, what happened? Well, it was more than one thing, some of our programmers had problems with gulp running flawlessly on their machines, others where used to grunt, and this made then resistant to try oniros. 

Then the whole `npm scripts <https://css-tricks.com/why-npm-scripts/>`_ movement started catching our attention, and having started as a sysadmin, `ondoheer <http://www.ondoheer.com>`_ decided it was easier to mantain and teach plain shell commands than other build tools.

The time it took to build these scripts was **significantly** lower than the time it took to build our gulp process, and it was quickly tested on all of our programmers machines without a problem (only Linux and OSX so far). We are just scratiching the surface of what npm scripts can do, but we wanted to start using it and improving it as we rolled.

How to use them
++++++++++++++++++

If you have used any build tool before, it's as simple as that. just run::
    
    npm run <scriptname>

and thats all!

Scripts
----------


    "main:scss": 
    "main:scss:min": 
    "main:autoprefixer": 
    "main:build:css": 
    "main:uncss":
    "admin:scss": 
    "admin:scss:min": 
    "admin:autoprefixer": 
    "admin:build:css": 
    "login:scss": 
    "login:scss:min": 
    "login:autoprefixer": 
    "login:build:css": 
    "all:build:css": 
    "main:uglify": 
    "head:uglify": 
    "imagemin": 
    "sprite:svg": 
    "favicon": 
    "serve": 
    "watch:js": 
    "watch:headjs": 
    "watch:css": 
    "watch:all": 
  },