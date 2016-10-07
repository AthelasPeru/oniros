<?php 

/*
Most theme support actions get initialized in their corresponding file,
such as menus, image-thumbnails and so on.
Here we initialize the ones we think should be in any theme but have no asociated 
extra functionality

*/
// https://codex.wordpress.org/Function_Reference/add_theme_support
add_theme_support( 'automatic-feed-links' );

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

// add_theme_support( 'woocommerce' );