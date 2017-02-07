<?php 

function display_twitter_element()
{
	?>
    	<input type="url" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element()
{
	?>
    	<input type="url" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_youtube_element()
{
	?>
    	<input type="url" name="youtube_url" id="youtube_url" value="<?php echo get_option('youtube_url'); ?>" />
    <?php
}

function display_instagram_element()
{
	?>
    	<input type="url" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" />
    <?php
}

function display_google_element()
{
	?>
    	<input type="url" name="google_url" id="google_url" value="<?php echo get_option('google_url'); ?>" />
    <?php
}

function display_theme_panel_social_links()
{
	add_settings_section("social-links", "Social Links", "display_social_section_instructions", "general-info-social");
	
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "general-info-social", "social-links");
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "general-info-social", "social-links");
	add_settings_field("youtube_url", "Youtube Profile Url", "display_youtube_element", "general-info-social", "social-links");
	add_settings_field("instagram_url", "Instagram Profile Url", "display_instagram_element", "general-info-social", "social-links");
	add_settings_field("google_url", "Google+ Profile Url", "display_google_element", "general-info-social", "social-links");

    register_setting("social-links", "twitter_url");
    register_setting("social-links", "facebook_url");
    register_setting("social-links", "youtube_url");
    register_setting("social-links", "instagram_url");
    register_setting("social-links", "google_url");
}


// Instructions for the section
function display_social_section_instructions(){

?>
    <p class="description">Copy the link to your company/business social networks pages. 
    This will be used to configure the social icons linksof your website.</p>

<?php  } ?>