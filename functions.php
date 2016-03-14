<?php 

// Add scripts and styles We have added many styles and scripts that are ussually used,
// feel free to uncomment those you won't use.

function athelas_scripts(){
	/*
	We assume your development server has WP_DEBUG turned on and your production enviroment has it turned off
	*/

	
	// WP required stylesheet
	wp_enqueue_style('base', get_stylesheet_directory_uri().'/style.css' );
	if(!WP_DEBUG){
		// Our own stylesheet
		wp_enqueue_style('app', get_stylesheet_directory_uri().'/dist/css/main.min.css');	
		// Slick
		wp_enqueue_script('slick', get_stylesheet_directory_uri().'/bower_components/slick-carousel/slick/slick.min.js', array('jquery'), null, true );
		
		// Own script
		wp_enqueue_script('main',get_stylesheet_directory_uri().'/dist/js/app.min.js', array('jquery', "slick"), null, true);

		
		// slick slider stylesheet. Comment it if slick won't be used
		wp_enqueue_style('slick_style', get_stylesheet_directory_uri().'/bower_components/slick-carousel/slick/slick.min.css');	
		
		
	} else{
		// Our own stylesheet
		wp_enqueue_style('app', get_stylesheet_directory_uri().'/dist/css/main.css');	
		// Slick
		wp_enqueue_script('slick', get_stylesheet_directory_uri().'/bower_components/slick-carousel/slick/slick.js', array('jquery'), null, true );
		// Own script
		wp_enqueue_script('main',get_stylesheet_directory_uri().'/dist/js/app.js', array('jquery', 'slick'), null, true);
		
		// slick slider stylesheet. Comment it if slick won't be used
		wp_enqueue_style('slick_style', get_stylesheet_directory_uri().'/bower_components/slick-carousel/slick/slick.css');
		
		
		
	}


	
	
	




}
add_action( 'wp_enqueue_scripts', 'athelas_scripts');



// Adds Ajax functionality defined for the Ajax endpoint
require_once("includes/functions/ajax.php");


// Include Custom Post Types
// This has the basic setup to set new posttypes manually
 require_once("includes/functions/posttypes.php");

 // Include custom image sizes
 //  Define imagesizes the project needs to add to WP
 require_once("includes/functions/image-sizes.php");

 // Athelas specials
 require_once("includes/functions/athelas-utilities.php");

// Include Taxonomies
 require_once("includes/functions/taxonomies.php");

// Include Admin modifcations
 require_once("includes/functions/admin-tweaks.php");

// menus
 require_once("includes/functions/menu.php");

 //translations
 require_once("includes/functions/translation_strings.php");

 // security
 require_once("includes/functions/security.php");