<?php 

// Add themeoptions page to the admin sidebar
function add_theme_debug_log_panel()
{
	add_menu_page("Logs Tool", "Logs Tool", "manage_options", "debug-log", "debug_log_panel", null, 99);
}

add_action("admin_menu", "add_theme_debug_log_panel");

// Define the page HTML
function debug_log_panel(){
	
	include_once("panel.php");
}


