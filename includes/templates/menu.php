<?php 
/**
 * Add the menu code here, it should be called from with
 * get_template_part( "includes/templates/menu" );
 *
 * If you want to remove templates, 
 * just delete the templates folder and 
 * replace the function get_template_part with the contents 
 * of the this file.
 */
?>
<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">

<?php 
	wp_nav_menu(array(
		'container' => false,                          		// remove nav container
		'container_class' => 'main-menu',              		// class of container (should you choose to use it)
		'menu' => __( 'The Main Menu', 'athelas_theme' ), 	// nav name
		'menu_class' => 'nav top-nav',              		// adding custom nav class
		'theme_location' => 'main-menu',                	// where it's located in the theme
		'before' => '',                                		// before the menu
		'after' => '',                                 		// after the menu
		'link_before' => '',                           		// before each link
		'link_after' => '',                            		// after each link
		'depth' => 0,                                  		// limit the depth of the nav
		'fallback_cb' => ''                            		// fallback function (if there is one)
	)); 
 ?>
 
 </nav>