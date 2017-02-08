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


function ratio_validator($image, $ratio, $range){
	$current_ratio = $image[0] / $image[1];
	$low_boundary = $ratio - $range;
	$top_boundary = $ratio + $range;
	if($current_ratio >= $low_boundary && $current_ratio <= $top_boundary){
		return true;	
	} else {
	return false;
	}
}





add_filter('wp_handle_upload_prefilter','mdu_validate_image_size');
function mdu_validate_image_size( $file ) {
	// Write function that handles general theme max and min sizes
	// write function that handles specific post type ratios
	
	$image = getimagesize($file['tmp_name']);
	if($image){
		
		$minimum = array(
		    'width' => '100',
		    'height' => '100'
		);
		$maximum = array(
		    'width' => '2500',
		    'height' => '2500'
		);
		$image_width = $image[0];
		$image_height = $image[1];

		$too_small = "Image dimensions are too small. Minimum size is {$minimum['width']} by {$minimum['height']} pixels. Uploaded image is $image_width by $image_height pixels.";
		$too_large = "Image dimensions are too large. Maximum size is {$maximum['width']} by {$maximum['height']} pixels. Uploaded image is $image_width by $image_height pixels.";

		if ( $image_width < $minimum['width'] || $image_height < $minimum['height'] ) {
		    // add in the field 'error' of the $file array the message 
		    $file['error'] = $too_small; 
		    return $file;
		}
		elseif ( $image_width > $maximum['width'] || $image_height > $maximum['height'] ) {
		    //add in the field 'error' of the $file array the message
		    $file['error'] = $too_large; 
		    return $file;
		}
		// validate for specific custom post types
		if(isset($_REQUEST["post_id"])){
			$type = get_post_type($_REQUEST['post_id']); // $_REQUEST['post_id'] post id the image uploads to
			// for custom post types we define a valid image ratio
			if($type == "post"){
				$ratio = 1.5;
				$range = 0.02;
				if(!ratio_validator($image, $ratio, $range)){
					$min = $ratio - $range;
					$max = $ratio + $range;
					$file["error"] = "Wrong image ratio, ratio (width / height) should be between: " . $min . " - " . $max;
					return $file;
				} 
				return $file; // return valid ratio file
			}
		}
		else
		    return $file; // returns valid image file that did not meet any other criteria
	} else 
		return $file; // returns non image files
	
    
}

