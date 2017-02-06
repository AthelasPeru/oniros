<?php 

function display_address_element()
{
	?>
    	<input type="text" name="address" id="address" value="<?php echo get_option('address'); ?>" />
    <?php
}


function display_district_element()
{
	?>
    	<input type="text" name="district" id="district" value="<?php echo get_option('district'); ?>" />
    <?php
}

function display_postal_code_element()
{
	?>
    	<input type="text" name="postal_code" id="postal_code" value="<?php echo get_option('postal_code'); ?>" />
    <?php
}

function display_city_element()
{
	?>
    	<input type="text" name="city" id="city" value="<?php echo get_option('city'); ?>" />
    <?php
}

function display_country_element()
{
	?>
    	<input type="text" name="country" id="country" value="<?php echo get_option('country'); ?>" />
    <?php
}
function display_google_maps_element()
{
	?>
    	<input type="url" name="google_maps_url" id="google_maps_url" value="<?php echo get_option('google_maps_url'); ?>" />
    <?php
}

function display_theme_panel_location()
{
	add_settings_section("location-links", "Location", "display_location_section_instructions", "theme-options-location");
	
	add_settings_field("address", "Address", "display_address_element", "theme-options-location", "location-links");
	add_settings_field("district", "District", "display_district_element", "theme-options-location", "location-links");
	add_settings_field("postal_code", "Postal Code", "display_postal_code_element", "theme-options-location", "location-links");
	add_settings_field("city", "City", "display_city_element", "theme-options-location", "location-links");
	add_settings_field("country", "Country", "display_country_element", "theme-options-location", "location-links");
    add_settings_field("google_maps_url", "Google Map Url", "display_google_maps_element", "theme-options-location", "location-links");

    register_setting("location-links", "address");
    register_setting("location-links", "district");
    register_setting("location-links", "postal_code");
    register_setting("location-links", "city");
    register_setting("location-links", "country");
    register_setting("location-links", "google_maps_url");
    
}


function display_location_section_instructions(){

?>
    <p class="description">Your Business Information. It will be used to show your business address and compose direct links to your location on the website and schema markups.</p>

<?php  } ?>