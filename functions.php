<?php 

// Add scripts and styles We have added many styles and scripts that are ussually used,
// feel free to uncomment those you won't use.

function athelas_scripts(){

	/***** STYLES *****/
	// WP required stylesheet
	wp_enqueue_style('base', get_stylesheet_directory_uri().'/style.css' );
	// Our own compass stylesheet
	wp_enqueue_style('app', get_stylesheet_directory_uri().'/stylesheets/app.css');	
	// slick slider stylesheet. Comment it if slick won't be used
	wp_enqueue_style('slick_style', get_stylesheet_directory_uri().'/bower_components/slick-carousel/slick/slick.css');
	


	/******* SCRIPTS *******/

	// jquery
	wp_enqueue_script('jquery', get_template_directory_uri().'/bower_components/jquery/dist/jquery.min.js', null, null, true );
	// Foundation
	wp_enqueue_script('foundation',get_stylesheet_directory_uri().'/bower_components/foundation/js/foundation.min.js', array('jquery'), null, true);
	// Foundation equalizer 
	wp_enqueue_script('foundaton-equal',get_stylesheet_directory_uri().'/bower_components/foundation/js/foundation/foundation.equalizer.js', array('jquery'), null, true);	
	// Slick
	wp_enqueue_script('slick', get_stylesheet_directory_uri().'/bower_components/slick-carousel/slick/slick.min.js', array('jquery'), null, true );
	// Own script
	wp_enqueue_script('main',get_stylesheet_directory_uri().'/js/app.js', array('jquery'), null, true);

}
add_action( 'wp_enqueue_scripts', 'athelas_scripts');


// Include Custom Post Types
// This has the basic setup to set new posttypes manually
 include("includes/functions/posttypes.php");

 // Include custom image sizes
 //  Define imagesizes the project needs to add to WP
 include("includes/functions/image-sizes.php");

 // Athelas specials
 // Special house functions
 include("includes/functions/athelas-specials.php");

// Include Taxonomies
 // Esen please explain this
 include("includes/functions/taxonomies.php");


// menu
 include("includes/functions/menu.php");

 //translations
 include("includes/functions/translation_strings.php");