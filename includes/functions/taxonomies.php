<?php 
/*
function athelas_themes_taxonomy() {

	// taxonomy for Products
	$labels = array(
			        'name' => _x( 'Fitness Types', 'taxonomy general name' ),
			        'singular_name' => _x( 'Fitness Type', 'taxonomy singular name' ),
			        'search_items' => __( 'Search Fitness Types' ),
			        'all_items' => __( 'All Fitness Types' ),
			        'parent_item' => __( 'Parent Fitness Type' ),
			        'parent_item_colon' => __( 'Parent Fitness Type:' ),
			        'edit_item' => __( 'Edit Fitness Type' ),
			        'update_item' => __( 'Update Fitness Type' ),
			        'add_new_item' => __( 'Add New Fitness Type' ),
			        'new_item_name' => __( 'New Fitness Type Name' ),
			        'menu_name' => __( 'Fitness Type' ),
			 );
	register_taxonomy(
		'product_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'products',   		 //post type name
		array(
			'hierarchical' 		=> true,
			'labels' 			=> $labels,  //Display name
			'query_var' 		=> true,
			'show_ui' 			=> true,
        	'show_admin_column' => true,
			'rewrite'			=> array(
					'slug' 			=> 'products', // This controls the base slug that will display before each term
					'with_front' 	=> false // Don't display the category base before
					)
			)
		);
}
add_action( 'init', 'athelas_themes_taxonomy');
*/