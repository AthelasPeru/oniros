<?php 

function display_debug_log_element()
{
		
 
	$log_file = get_home_path() . "wp-content/debug.log";
	if(file_exists($log_file)){
		$log_content = file_get_contents($log_file);
	} else {
		$log_content = "There isn't a log yet.";
	}

	?>
    	
    	<div rows="50" cols="50" name="debug-log" id="debug-log">
    		<?php echo $log_content; ?>
    	</div>
    	
    <?php
}


function display_theme_debug_log_panel()
{   
    // add_settings_section( $id, $title, $callback, $page );
    // go to this link for more information https://codex.wordpress.org/Function_Reference/add_settings_section
	add_settings_section("debug-log", "", "", "debug-log-section");

	// add_settings_field( $id, $title, $callback, $page, $section, $args );
    // go to this link for more information https://codex.wordpress.org/Function_Reference/add_settings_field

	add_settings_field("debug-log", "", "display_debug_log_element", "debug-log-section", "debug-log");
	

    // You should use the last parameter of the "add_settings_field" as the first parameter of the "register_setting"
    // You should use the first parameter of the "add_settings_field" as the second parameter of the "register_setting"
    register_setting("debug-log", "debug-log");
    
    
}


