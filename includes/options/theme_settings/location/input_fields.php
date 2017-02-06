<?php 

function display_google_maps_element()
{
	?>
    	<input type="url" name="google_maps_url" id="google_maps_url" value="<?php echo get_option('google_maps_url'); ?>" />
    <?php
}

function display_theme_panel_location()
{
	add_settings_section("location-links", "Location", "display_location_section_instructions", "theme-options-location");
	
    add_settings_field("google_maps_url", "Google Map Url", "display_google_maps_element", "theme-options-location", "location-links");
	

    register_setting("location-links", "google_maps_url");
    
}


function display_location_section_instructions(){

?>
    <p class="description">Copy the link to a google maps location. This will be used to direct the website visitors to that link when clicking on your address.</p>

<?php  } ?>