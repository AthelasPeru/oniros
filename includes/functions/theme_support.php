<?php 

/*
Most theme support actions get initialized in their corresponding file,
such as menus, image-thumbnails and so on.
Here we initialize the ones we think should be in any theme but have no asociated 
extra functionality

*/
// https://codex.wordpress.org/Function_Reference/add_theme_support
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

// https://codex.wordpress.org/Post_Formats
// add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );
// add_theme_support( 'woocommerce' );
// add_theme_support( 'custom-logo' );
// add_theme_support( 'custom-header-uploads' );
// add_theme_support( 'custom-header' );
// add_theme_support( 'custom-background' );