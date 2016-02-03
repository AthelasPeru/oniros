<?php 
function my_ajax_query() {
	/*
	* Makes a custom query and builds an array to return as json with the required information
	* with parameters set in the JS ajax function
	* @ $_POST["post_type"] Post type to filter or query
	* @ $_POST["category"] Category to filter or query
	*/
	$query = new WP_Query(
		array(
			"post_type"=>$_POST["post_type"],
			'category_name' => $_POST["category"],
			"posts_per_page"=> isset($_POST["posts_per_page"])? $_POST["posts_per_page"] : -1
			)
	);

	$toReturn = [];

	// we build our custom structure to return.
	foreach ($query->posts as $post) {
		
		$post_data = array(
			"title"=>$post->post_title,
			"url"=>get_permalink($post->ID),
			"excerpt"=>get_the_excerpt($post->ID),
			// This is an example on how to access a custom image size for a custom field of type
			// gallery created using ACF. http://www.advancedcustomfields.com/resources/gallery/
			"custom_img"=>get_field("gallery", $post->ID)[0]["sizes"]["archive_thumb"], 
			"date" =>get_the_date($post->ID)

		);
		array_push($toReturn, $post_data);
	}
	// we return the data as JSON, we echo it so it reaches the client
	echo json_encode($toReturn); 
   
    die(); // It's important to kill each ajax process after it's being executed or if it fails
}
// gives access to the ajax endpoint to not logged in users
// https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_nopriv_(action)
add_action( 'wp_ajax_nopriv_ajax_query', 'my_ajax_query' );
// gives access to the ajax endpoint to logged in users
// https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_(action)
add_action( 'wp_ajax_ajax_query', 'my_ajax_query' );