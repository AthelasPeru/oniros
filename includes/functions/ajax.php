<?php 

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


function my_ajax_custom_function() {
	/*
	* Makes a custom query and builds an array to return as json with the required information
	* with parameters set in the JS ajax function
	* @ $_POST["post_type"] Post type to filter or query
	* @ $_POST["category"] Category to filter or query
	*/
	$query = new WP_Query(
		array(
			"post_type"=>$_POST["post_type"],			
			"posts_per_page"=> isset($_POST["posts_per_page"])? $_POST["posts_per_page"] : -1
			)
	);

	$toReturn = [];

	// we build our custom structure to return.
	foreach ($query->posts as $post) {
		
		$post_data = array(
			"title"=>$post->post_title,
			"url"=>get_permalink($post->ID)
		);
		array_push($toReturn, $post_data);
	}
	// we return the data as JSON, we echo it so it reaches the client
	echo json_encode($toReturn); 
   
    die(); // It's important to kill each ajax process after it's being executed or if it fails
}
// gives access to the ajax endpoint to not logged in users
// https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_nopriv_(action)
add_action( 'wp_ajax_nopriv_custom_endpoint_name', 'my_ajax_custom_function' );
// gives access to the ajax endpoint to logged in users
// https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_(action)
add_action( 'wp_ajax_custom_endpoint_name', 'my_ajax_custom_function' );