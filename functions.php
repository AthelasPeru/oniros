<?php 

// Add scripts and styles
// feel free to uncomment those you won't use.
function oniros_scripts(){
	/*
	We assume your development server has WP_DEBUG turned on and your production enviroment has it turned off
	*/

	// WP required stylesheet
	wp_enqueue_style('base', get_stylesheet_directory_uri().'/style.css' );
	
	if( !WP_DEBUG ) {
		
		// Our own stylesheet (minimized)
		wp_enqueue_style('app', get_stylesheet_directory_uri().'/dist/css/main.min.css');	
		
		// Own script (uglyfied)
		wp_enqueue_script('main',get_stylesheet_directory_uri().'/dist/js/app.min.js', array('jquery'), null, true);
		
		//Add other scripts here

	} else{
		
		// Our own stylesheet 
		wp_enqueue_style('app', get_stylesheet_directory_uri().'/dist/css/main.css');	
		
		// Own script 
		wp_enqueue_script('main',get_stylesheet_directory_uri().'/dist/js/app.js', array('jquery'), null, true);
		
		// Add other scripts here
	}
}
add_action( 'wp_enqueue_scripts', 'oniros_scripts');

// Adds Ajax functionality defined for the Ajax endpoint
require_once("includes/functions/ajax.php");

// Include Custom Post Types
// This has the basic setup to set new posttypes manually
require_once("includes/functions/posttypes.php");

// Include custom image sizes
// Define imagesizes the project needs to add to WP
require_once("includes/functions/image-sizes.php");

// Utilities
require_once("includes/functions/utilities.php");

// Include Taxonomies
require_once("includes/functions/taxonomies.php");

// Include Theme Tweaks
require_once("includes/functions/tweaks.php");

// Include Admin modifcations
require_once("includes/functions/admin-tweaks.php");

// Menus
require_once("includes/functions/menu.php");

// Translations
require_once("includes/functions/translation_strings.php");

// Security
require_once("includes/functions/security.php");