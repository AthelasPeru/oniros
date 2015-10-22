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

add_action( 'init', 'athelas_register_exhibition' );
function athelas_register_exhibition() {
	$labels = array(
		"name" => "Exhibition",
		"singular_name" => "Exhibition",
		"menu_name" => "Exhibitions / Conferences",
		"all_items" => "All Exhibitions",
		"add_new" => "Add new",
		"add_new_item" => "Add new Exhibition",
		"edit" => "Editar",
		"edit_item" => "Edit Exhibition",
		"new_item" => "New Product",
		"view" => "view",
		"view_item" => "See Exhibition",
		"search_items" => "Search Exhibitions",
		"not_found" => "Exhibition not found",
		"not_found_in_trash" => "Exhibitions not found in the trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Post type Exhibition",
		"public" => true,
		"show_ui" => true,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "exhibitions", "with_front" => true ),
		"query_var" => true,
						"supports" => array( 'title', 'post_tags' ),			
	);
	register_post_type( "exhibition", $args );

}// End of athelas_register_exhibition()


add_action( 'init', 'athelas_register_news' );
function athelas_register_news() {
	$labels = array(
		"name" => "News",
		"singular_name" => "News",
		"menu_name" => "News",
		"all_items" => "All news",
		"add_new" => "Add new",
		"add_new_item" => "Add new news",
		"edit" => "Editar",
		"edit_item" => "Edit news",
		"new_item" => "New Product",
		"view" => "view",
		"view_item" => "See news",
		"search_items" => "Search news",
		"not_found" => "news not found",
		"not_found_in_trash" => "news not found in the trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Post type news",
		"public" => true,
		"show_ui" => true,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "news", "with_front" => true ),
		"query_var" => true,
						"supports" => array( 'title', 'editor', 'post_tags' ),			
	);
	register_post_type( "news", $args );

}// End of athelas_register_news()


add_action( 'init', 'athelas_register_manufacturer' );
function athelas_register_manufacturer() {
	$labels = array(
		"name" => "Manufacturer",
		"singular_name" => "Manufacturer",
		"menu_name" => "Manufacturers",
		"all_items" => "All Manufacturers",
		"add_new" => "Add new",
		"add_new_item" => "Add new Manufacturer",
		"edit" => "Editar",
		"edit_item" => "Edit Manufacturer",
		"new_item" => "New Manufacturer",
		"view" => "view",
		"view_item" => "See Manufacturers",
		"search_items" => "Search Manufacturers",
		"not_found" => "Manufacturer not found",
		"not_found_in_trash" => "Manufacturers not found in the trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Post type Manufacturers",
		'taxonomies' => array('category_manufacturers'),
		"public" => true,
		"show_ui" => true,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "manufacturer", "with_front" => true ),
		"query_var" => true,
						"supports" => array( 'title', 'post_tags' ),			
	);
	register_post_type( "manufacturers", $args );

}// End of athelas_register_product()

add_action( 'init', 'athelas_register_main_slider' );
function athelas_register_main_slider() {
	$labels = array(
		"name" => "Main Sliders",
		"singular_name" => "Main Slider",
		"menu_name" => "Main Slider",
		"all_items" => "All Main Sliders",
		"add_new" => "Add new",
		"add_new_item" => "Add new Main Slider",
		"edit" => "Editar",
		"edit_item" => "Edit Main Slider",
		"new_item" => "New Main Slider",
		"view" => "view",
		"view_item" => "See Main Slider",
		"search_items" => "Search Main Sliders",
		"not_found" => "Main Sliders not found",
		"not_found_in_trash" => "Main Sliders not found in the trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Post Main Sliders",
		'taxonomies' => array('category_slider'),
		"public" => true,
		"show_ui" => true,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "main_slider", "with_front" => true ),
		"query_var" => true,
						"supports" => array( 'title' ),			
	);
	register_post_type( "main_slider", $args );

}// End of athelas_sec_slider()
add_action( 'init', 'athelas_register_sec_slider' );
function athelas_register_sec_slider() {
	$labels = array(
		"name" => "Sec. Sliders",
		"singular_name" => "Sec. Slider",
		"menu_name" => "Sec. Slider",
		"all_items" => "All Sec. Sliders",
		"add_new" => "Add new",
		"add_new_item" => "Add new Sec. Slider",
		"edit" => "Editar",
		"edit_item" => "Edit Sec. Slider",
		"new_item" => "New Sec. Slider",
		"view" => "view",
		"view_item" => "See Sec. Slider",
		"search_items" => "Search Sec. Sliders",
		"not_found" => "Sec. Sliders not found",
		"not_found_in_trash" => "Sec. Sliders not found in the trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Post type Sec Sliders",
		'taxonomies' => array('category_slider'),
		"public" => true,
		"show_ui" => true,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "sec_slider", "with_front" => true ),
		"query_var" => true,
						"supports" => array( 'title' ),			
	);
	register_post_type( "sec_slider", $args );

}// End of athelas_sec_slider()
?>