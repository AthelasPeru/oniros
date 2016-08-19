<?php 

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function oniros_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'oniros' ),
		'description' => __( 'The first (primary) sidebar.', 'oniros' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
  
	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'oniros' ),
		'description' => __( 'The second (secondary) sidebar.', 'oniros' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'oniros_register_sidebars' );
 ?>