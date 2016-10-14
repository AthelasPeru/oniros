<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */

// Define where the widgets show if it's only on certain websites
// otherwise just register them. This example only shows on the Home Screen
function example_widget( $content ) {
	if ( is_home()  && is_active_sidebar( 'example' ) && is_main_query() ) {
		dynamic_sidebar('example');
	}
	return $content;
}
add_filter( 'widgets_init', 'example_widget' );

register_sidebar( array(
	'id'          => 'example',
	'name'        => 'Example Widget',
	'description' => __( "here I explaign the widget's purpose", 'text_domain' ),
	// HTML
	'before_widget' => '', 
	'after_widget'  => '',
	'before_title'  => '',
	'after_title'   => '',
) );


// We import the Custom Widget Class
require_once(get_template_directory() . "/includes/widgets/example.php");
// Register the Custom Widget Class
add_action( 'widgets_init', function(){
	register_widget( 'ExampleWidget' );
});

