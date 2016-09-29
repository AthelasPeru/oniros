
add_action( 'init', 'athelas_register_fdf' );
function athelas_register_fdf() {
	$labels = array(
		"name" => "fdfs",
		"singular_name" => "fdf",
		"menu_name" => "fdfs",
		"all_items" => "All fdfs",
		"add_new" => "Add new fdf",
		"add_new_item" => "Add new fdf",
		"edit" => "Edit",
		"edit_item" => "Edit fdf",
		"new_item" => "new fdf",
		"view" => "view",
		"view_item" => "view fdf",
		"search_items" => "Search fdfs",
		"not_found" => "fdfs not found",
		"not_found_in_trash" => "fdfs not found in trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Post type fdfs",
		'taxonomies' => array(),
		"public" => ,
		"show_ui" => true,
		"has_archive" => ,
		"show_in_menu" => ,
		"show_in_nav_menus"=>
		"exclude_from_search" => false,
		"capability_type" => "",
		"map_meta_cap" => ,
		"hierarchical" => ,
		"rewrite" => array( "slug" => "fdfs", "with_front" => true ),
		"query_var" => true,
		"show_in_rest" => ,
		"supports" => array(
					'title',
					'editor',
		),	
	);
	register_post_type( "fdf", $args );

}// End of athelas_register_fdf()

add_action( 'init', 'athelas_register_Bers' );
function athelas_register_Bers() {
	$labels = array(
		"name" => "Berss",
		"singular_name" => "Bers",
		"menu_name" => "Berss",
		"all_items" => "All Berss",
		"add_new" => "Add new Bers",
		"add_new_item" => "Add new Bers",
		"edit" => "Edit",
		"edit_item" => "Edit Bers",
		"new_item" => "new Bers",
		"view" => "view",
		"view_item" => "view Bers",
		"search_items" => "Search Berss",
		"not_found" => "Berss not found",
		"not_found_in_trash" => "Berss not found in trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Post type Berss",
		'taxonomies' => array(),
		"public" => ,
		"show_ui" => true,
		"has_archive" => ,
		"show_in_menu" => ,
		"show_in_nav_menus"=>
		"exclude_from_search" => false,
		"capability_type" => "",
		"map_meta_cap" => ,
		"hierarchical" => ,
		"rewrite" => array( "slug" => "berss", "with_front" => true ),
		"query_var" => true,
		"show_in_rest" => ,
		"supports" => array(
					'title',
					'author',
		),	
	);
	register_post_type( "Bers", $args );

}// End of athelas_register_Bers()

add_action( 'init', 'athelas_register_dsds' );
function athelas_register_dsds() {
	$labels = array(
		"name" => "dsdss",
		"singular_name" => "dsds",
		"menu_name" => "dsdss",
		"all_items" => "All dsdss",
		"add_new" => "Add new dsds",
		"add_new_item" => "Add new dsds",
		"edit" => "Edit",
		"edit_item" => "Edit dsds",
		"new_item" => "new dsds",
		"view" => "view",
		"view_item" => "view dsds",
		"search_items" => "Search dsdss",
		"not_found" => "dsdss not found",
		"not_found_in_trash" => "dsdss not found in trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Post type dsdss",
		'taxonomies' => array(),
		"public" => ,
		"show_ui" => true,
		"has_archive" => ,
		"show_in_menu" => ,
		"show_in_nav_menus"=>
		"exclude_from_search" => false,
		"capability_type" => "",
		"map_meta_cap" => ,
		"hierarchical" => ,
		"rewrite" => array( "slug" => "dsdss", "with_front" => true ),
		"query_var" => true,
		"show_in_rest" => ,
		"supports" => array(
					'title',
					'editor',
					'author',
		),	
	);
	register_post_type( "dsds", $args );

}// End of athelas_register_dsds()

add_action( 'init', 'athelas_register_dsds' );
function athelas_register_dsds() {
	$labels = array(
		"name" => "dsdss",
		"singular_name" => "dsds",
		"menu_name" => "dsdss",
		"all_items" => "All dsdss",
		"add_new" => "Add new dsds",
		"add_new_item" => "Add new dsds",
		"edit" => "Edit",
		"edit_item" => "Edit dsds",
		"new_item" => "new dsds",
		"view" => "view",
		"view_item" => "view dsds",
		"search_items" => "Search dsdss",
		"not_found" => "dsdss not found",
		"not_found_in_trash" => "dsdss not found in trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Post type dsdss",
		'taxonomies' => array(),
		"public" => ,
		"show_ui" => true,
		"has_archive" => ,
		"show_in_menu" => ,
		"show_in_nav_menus"=>
		"exclude_from_search" => false,
		"capability_type" => "",
		"map_meta_cap" => ,
		"hierarchical" => ,
		"rewrite" => array( "slug" => "dsdss", "with_front" => true ),
		"query_var" => true,
		"show_in_rest" => ,
		"supports" => array(
		),	
	);
	register_post_type( "dsds", $args );

}// End of athelas_register_dsds()
