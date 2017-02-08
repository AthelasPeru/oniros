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

// Add new image sizes to WP media selector
add_filter('image_size_names_choose', 'new_image_sizes');
 
function new_image_sizes($sizes) {
	$addsizes = array(
		"image_size_name" => 'Image size description',
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}

// Unregister native WP image sizes, comment those you want to keep
add_filter('intermediate_image_sizes_advanced', 'unset_image_sizes');

function unset_image_sizes( $def_sizes) {
	unset( $def_sizes['thumbnail']); // turn off thumbnail size
	unset( $def_sizes['medium']); // turn off medium size
	unset( $def_sizes['large']); // turn off large size
	unset( $def_sizes['medium_large']);
	return $def_sizes;
}
 


/*
 * this hook will be fired while you uploading a picture
 */
add_filter( 'intermediate_image_sizes', 'limit_image_sizes' );
 
function limit_image_sizes( $sizes ){
	/*
	 * $sizes - all image sizes array Array ( [0] => thumbnail [1] => medium [2] => large [3] => post-thumbnail )
	 * get_post_type() to get post type
	 */
	if(isset($_REQUEST['post_id'])){
		write_log(array(
			"type" => "REQUEST",
			"action" => "intermediate_image_sizes",
			"data" => $_REQUEST
		));
		$type = get_post_type($_REQUEST['post_id']); // $_REQUEST['post_id'] post id the image uploads to
			
		foreach( $sizes as $key => $value ){
	 
			/*
			 * use switch if there are a lot of post types
			 */
			if( $type == 'page' ) {
				if( $value == 'imagesize1' ){ // turn off 'imagesize1' for pages
	    				unset( $sizes[$key] );
	    			}
			} else if ( $type == 'custom_post_type' ) {
				if( !in_array( $value, array('imagesize1','imagesize2') ) ){ // for regions turn off everyting except 'imagesize1' and 'imagesize2'
	    				unset( $sizes[$key] );
	    			}
			} else {
				if( $value != 'thumbnail' ){ // turn off everything except thumbnail
	    				unset( $sizes[$key] );
	    			}
			}
		}
		return $sizes;
	} else {
 		return $sizes;
	}
	
}


