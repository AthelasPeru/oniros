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
function display_phone_number_element()
{
    ?>
        <input type="text" name="phone" id="phone" value="<?php echo get_option('phone'); ?>" />
    <?php

function display_google_maps_element()
{
	?>
    	<input type="url" name="google_maps_url" id="google_maps_url" value="<?php echo get_option('google_maps_url'); ?>" />
    <?php
}
}

function display_theme_panel_location()
{   
    // add_settings_section( $id, $title, $callback, $page );
    // go to this link for more information https://codex.wordpress.org/Function_Reference/add_settings_section
	add_settings_section("location-links", "Location", "display_location_section_instructions", "general-info-location");

	// add_settings_field( $id, $title, $callback, $page, $section, $args );
    // go to this link for more information https://codex.wordpress.org/Function_Reference/add_settings_field

	add_settings_field("address", "Address", "display_address_element", "general-info-location", "location-links");
	add_settings_field("district", "District", "display_district_element", "general-info-location", "location-links");
	add_settings_field("postal_code", "Postal Code", "display_postal_code_element", "general-info-location", "location-links");
	add_settings_field("city", "City", "display_city_element", "general-info-location", "location-links");
	add_settings_field("country", "Country", "display_country_element", "general-info-location", "location-links");
    add_settings_field("phone", "Phone", "display_phone_number_element", "general-info-location", "location-links");
    add_settings_field("google_maps_url", "Google Map Url", "display_google_maps_element", "general-info-location", "location-links");

    // You should use the last parameter of the "add_settings_field" as the first parameter of the "register_setting"
    // You should use the first parameter of the "add_settings_field" as the second parameter of the "register_setting"
    register_setting("location-links", "address");
    register_setting("location-links", "district");
    register_setting("location-links", "postal_code");
    register_setting("location-links", "city");
    register_setting("location-links", "country");
    register_setting("location-links", "phone");
    register_setting("location-links", "google_maps_url");
    
}

// This function will display the desired text on the top of the card in the general information panel
function display_location_section_instructions(){

?>
    <p class="description">Your Business Information. It will be used to show your business address and compose direct links to your location on the website and schema markups.</p>

<?php  } ?>