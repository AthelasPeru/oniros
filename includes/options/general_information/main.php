<?php 

// Add themeoptions page to the admin sidebar
function add_theme_general_info_panel()
{
	add_menu_page("General Information", "General Information", "manage_options", "general-info", "general_information_page", null, 99);
}

add_action("admin_menu", "add_theme_general_info_panel");

// Define the page HTML
function general_information_page(){
	
	include_once("form.php");
}

// Include_once Field creating functions
include_once("social_links/input_fields.php");
include_once("location/input_fields.php");

// Attach and execute previously imported functions to create andregister
// the input fields to the form sections
add_action("admin_init", "display_theme_panel_social_links");
add_action("admin_init", "display_theme_panel_location");


// This is the way you can print any option value.
// get_option( $option, $default ) Example:
// echo get_option('phone', '456-44444');
