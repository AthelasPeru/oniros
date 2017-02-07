<?php 

// Add themeoptions page to the admin sidebar
function add_theme_menu_item()
{
	add_menu_page("General Information", "General Information", "manage_options", "general-info", "general_information_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

// Define the page HTML
function general_information_page(){
	
	include("form.php");
}

// Include Field creating functions
include("social_links/input_fields.php");
include("location/input_fields.php");

// Attach and execute previously imported functions to create andregister
// the input fields to the form sections
add_action("admin_init", "display_theme_panel_social_links");
add_action("admin_init", "display_theme_panel_location");



