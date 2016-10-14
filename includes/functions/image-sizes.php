<?php 
// featured image activation and then sizing

add_action( 'init', 'oniros_image_support' );
function oniros_image_support(){

	

	// Just add an image name, the width, the height, and a boolean that defines if WP should crop the images or not
	// add as many as the project might require
	// smaller images do not get resized, but largeones will get cropped.

	//                name             width height crop?
	add_image_size( 'image_size_name', 400, 400, true);
}