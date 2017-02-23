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

add_action( 'admin_post_clear_log', 'clear_log_file' );
function clear_log_file()
{
    // Do your stuff here
    $log_file = get_home_path() . "wp-content/debug.log";
	if(file_exists($log_file)){
		file_put_contents($log_file, "Log cleared --- " . date('m/d/Y h:i:s a', time()) . " --- Log cleared");
	}
    wp_redirect( $_SERVER['HTTP_REFERER'] );
    exit();
}
