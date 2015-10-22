Athelas WP Base Template
==========================

**Requerimientos**

- npm
- bower
- foundation
- compass

**opcional**

- gulp

**Que trae**

- Conexión con sftp para trabajar en sublime

- compass settings

- foundation ready template

- funciones de WP de athelas

- gulpfile.js

- bower.json con slickslider

- bases para todos los archivos mínimos necesarios para wordpress

Como usarlo:
++++++++++++++++

Este template permite trabajar primero en estático y luego en Wordpress.

Instalación:
--------------

.. code-block:: bash

	$ git clone https://ondoheer@bitbucket.org/athelas/wordpress-base.git <nombre de projecto>
	$ rm -rf <nombre de proyecto>/.git


Activando compass con foundation
----------------------------------

aún sin entrar a la carpeta de proyecto generada

.. code-block:: bash
	
	$ foundation new <nombre del proyecto>


Uniendo mi repositorio a Este template
---------------------------------------

Asume que ya creaste el repositorio en bitbucket o similar

.. code-block:: bash
	
	$ cd <nombre de proyecto>
	$ git init
	$ git remote add origin <remote repo url>


Organización del proyecto
---------------------------

SFTP
*****

**sftp.json** trae todo preconfigurado para que solo agregues la ruta user y pass de tu servidor ftp.
Asegurate de tener la carpeta destino creada en el server para poder sincronizarla.
El ignore está preparado para manejar todos los archivos no necesarios del proyecto.

Compass
**********

para utilizar compass sencillamente entra a la carpeta raiz y ejecuta

.. code-block:: bash

	$ compass watch


Foundation & SCSS
*********************

*El css del proyecto se importa desde stylesheets/app.css, este archivo se genera con compass. style.css existe solo porque wordpress lo requiere. Y allí definimos solo el nombre del template.*

**foundation** viene listo para funcionar, pero como enm athelas creemos que no debes recargar tu proyecto con archivos innecesarios, en el archivo
*scss/app.scss* verás que organizamos los imports del proyecto en 3 áreas.

1. **foundation/components**: importa los componentes de foundation uno a uno. Intentamos solo usar foundation por su grid, de modo que solo verás pocos componentes importados. Si deseas importarlo todo, solo debes comentar este area y descomentar la línea superior que dice **//@import "foundation";**

2. **toolbox**: Aquí va todo el SCSS que **NO** genera código. Trae de por si los archivos para manejar mixins, fonts y colores.

3. **components**: Todos los demás archivos de SCSS. Por ahora solo trae el reset y los utilities.


Wordpress Files
****************
Todos los archivos necesarios para que WordPress funcione están listos y tiene sus propias instrucciones. Cuando un archivo funciona mejor con un custom loop, este ha sido agregado para que pases los parámetros que requieras.

Cuando un archivo tiene **base** en su nombre, es porque esta pensado en que lo copies y cambies de nombre para poder utilizarlo como template de pages o como archive o single de Custom Post Types.

**functions.php** importa todas las funciones que usamos regularmente en los proyectos, estas se encuentran en *include/functions*. También procesa los archivos de css y js para el header y el footer automáticamente.

**includes folder**

Aquí se encuentan dos carpetas. 

**functions** como mencionamos antes, incluye todas las funcionalidades extra de PHP que queremos agregar a WP. Custom Posttypes, image-sizes, athelas-specials y taxonomies.

**templates** es donde se deben generar todas las fracciones de template que se repetirán en varias secciones de la web, y que se usarán importándolas con *get_template_part()*.
Como base trae un template pasa sidebars, uno para el menu desktop, otro para menúes mobile y un archivo con el search-form.

static_site
************

Carpeta con plantilla base para desarrollar la versión estática del proyecto, utiliza los mismos archivos de SCSS y JS que el proyecto de WP


Gulpfile
**********

Esen, te toca










