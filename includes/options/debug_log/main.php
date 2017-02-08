<?php 

// Add themeoptions page to the admin sidebar
function add_theme_debug_log_panel()
{
	add_menu_page("Logs Tool", "Logs Tool", "manage_options", "debug-log", "debug_log_panel", null, 99);
}

add_action("admin_menu", "add_theme_debug_log_panel");

// Define the page HTML
function debug_log_panel(){
	
	include_once("form.php");
}

include_once("log_file/input_fields.php");


// Attach and execute previously imported functions to create andregister
// the input fields to the form sections
add_action("admin_init", "display_theme_debug_log_panel");


// This is the way you can print any option value.
// get_option( $option, $default ) Example:
// echo get_option('phone', '456-44444');
