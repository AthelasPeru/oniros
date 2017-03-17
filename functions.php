<?php 

// theme support
require_once("includes/functions/theme_support.php");
//  Enque scripts and styles
require_once("includes/functions/scripts_styles_loader.php");
// Custom options panel
require_once("includes/options/general_information/main.php");
require_once("includes/options/debug_log/main.php");

// Adds Ajax functionality defined for the Ajax endpoint
require_once("includes/functions/ajax.php");

// Include Custom Post Types
// This has the basic setup to set new posttypes manually
require_once("includes/functions/posttypes.php");

// Include custom image sizes
// Define imagesizes the project needs to add to WP
require_once("includes/functions/image-sizes.php");

// frequently visited posts
require_once("includes/functions/track_post_views.php");

// Custom Gallery template
require_once("includes/functions/gallery_custom.php");

// Include Taxonomies
require_once("includes/functions/taxonomies.php");

// Include Theme Tweaks
require_once("includes/functions/tweaks.php");

// Include Admin modifcations
require_once("includes/functions/admin-tweaks.php");

// Menus
require_once("includes/functions/menu.php");

// Widgets
require_once("includes/functions/widgets.php");

// Translations
require_once("includes/functions/translation_strings.php");

// Security
require_once("includes/functions/security.php");

// Utilities
require_once("includes/functions/utilities.php");

//Handle upload
require_once( 'includes/options/options.php' );