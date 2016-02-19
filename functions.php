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
		wp_enqueue_style('app', get_stylesheet_directory_uri().'dist/css/main.min.css');	
		
		// here we add the slick js as a dependcy to the frontpage so we ensure it always loads first on the homescreen
		$dependencies = is_front_page() ? array("jquery", "slick") :  array("jquery"); 
		// Own script
		wp_enqueue_script('main',get_stylesheet_directory_uri().'dist/js/app.min.js', $dependencies, null, true);


		// We load the slick assets only if we need them, change this to any other page where you might need it
		if(is_front_page()){
			// slick slider stylesheet. Comment it if slick won't be used
			wp_enqueue_style('slick_style', get_stylesheet_directory_uri().'/bower_components/slick-carousel/slick/slick.min.css');
			// Slick
			wp_enqueue_script('slick', get_stylesheet_directory_uri().'/bower_components/slick-carousel/slick/slick.min.js', array('jquery'), null, true );
		}
		
	} else{
		// Our own stylesheet
		wp_enqueue_style('app', get_stylesheet_directory_uri().'source/css/main.css');	
		// Own script
		wp_enqueue_script('main',get_stylesheet_directory_uri().'source/js/app.js', array('jquery'), null, true);

		// We load the slick assets only if we need them, change this to any other page where you might need it
		if(is_front_page()){
			// slick slider stylesheet. Comment it if slick won't be used
			wp_enqueue_style('slick_style', get_stylesheet_directory_uri().'/bower_components/slick-carousel/slick/slick.css');
			// Slick
			wp_enqueue_script('slick', get_stylesheet_directory_uri().'/bower_components/slick-carousel/slick/slick.js', array('jquery'), null, true );
		}
	}


	
	
	




}
add_action( 'wp_enqueue_scripts', 'athelas_scripts');

function set_ajax_vars(){
	/* This is an example, here we are making PHP WP data avaliable to our
	* main script. 
	* https://codex.wordpress.org/Function_Reference/wp_localize_script
	* @'ajaxurl' defines the endpoint availiable for ajax so the JS file can access it.
	* @'wp_query' if a user defined variable which can contain ANY WP data you want to send, I chose to send WP query here just because.
	*/
	global $wp_query;
	    wp_localize_script( 'main', 'ajaxquery', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
	    	'wp_query' => json_encode($wp_query->query)
	    	)
		);
}
add_action( 'wp_enqueue_scripts', 'set_ajax_vars');

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