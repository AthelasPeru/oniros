<?php

add_action( 'init', 'athelas_register_product' );
function athelas_register_product() {
	$labels = array(
		"name" => "Products",
		"singular_name" => "Product",
		"menu_name" => "Products",
		"all_items" => "All Products",
		"add_new" => "Add new",
		"add_new_item" => "Add new Product",
		"edit" => "Editar",
		"edit_item" => "Edit Product",
		"new_item" => "New Product",
		"view" => "view",
		"view_item" => "See Product",
		"search_items" => "Search Products",
		"not_found" => "Products not found",
		"not_found_in_trash" => "Products not found in the trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Post type Products",
		'taxonomies' => array('category_products'),
		"public" => true,
		"show_ui" => true,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "product", "with_front" => true ),
		"query_var" => true,
						"supports" => array( 'title', 'editor','post_tags' ),			
	);
	register_post_type( "products", $args );

}// End of athelas_register_product()

