<?php

// Add scripts and styles
// feel free to uncomment those you won't use.
function oniros_scripts(){

		/* loading specific scripts asynchronusly or deffered */
		function add_defer_attribute($tag, $handle) {
		   // add script handles to the array below
		   $scripts_to_defer = array();// pass in the script's handlers as arguments
		   
		   foreach($scripts_to_defer as $defer_script) {
		      if ($defer_script === $handle) {
		         return str_replace(' src', ' defer="defer" src', $tag);
		      }
		   }
		   return $tag;
		}
		// Uncomment next line to add deffered scripts to the enqueing
		//add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

		function add_async_attribute($tag, $handle) {
	   // add script handles to the array below
	   $scripts_to_async = array();// pass in the script's handlers as arguments
	   
	   foreach($scripts_to_async as $async_script) {
		      if ($async_script === $handle) {
		         return str_replace(' src', ' async="async" src', $tag);
		      }
		   }
		   return $tag;
		}
		// Uncomment next line to add deffered scripts to the enqueing
		// add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
	/*
	We assume your development server has WP_DEBUG turned on and your production enviroment has it turned off
	*/

	// WP required stylesheet
	wp_enqueue_style('base', get_stylesheet_directory_uri().'/style.css' );
	
	if( !WP_DEBUG ) {
		
		// Our own stylesheet (minimized)
		wp_enqueue_style('main', get_stylesheet_directory_uri().'/dist/css/main/main.min.css');	
		
		// Own script (uglyfied)
		wp_enqueue_script('main',get_stylesheet_directory_uri().'/dist/js/main.min.js', array('jquery'), null, true);
		
		//Add other scripts here

	} else{
		
		// Our own stylesheet 
		wp_enqueue_style('main', get_stylesheet_directory_uri().'/dist/css/main/main.css');	
		
		// Own script 
		wp_enqueue_script('main',get_stylesheet_directory_uri().'/dist/js/main.js', array('jquery'), null, true);
		
		// Add other scripts here
	}
}
add_action( 'wp_enqueue_scripts', 'oniros_scripts');