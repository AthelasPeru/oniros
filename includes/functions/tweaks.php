<?php 

/*** Remove Query String from Static Resources ***/
# as explained in http://technumero.com/internet/remove-query-strings-from-static-resources/2986
# This is better for SEO and performance reasons

function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );


// REMOVE WP EMOJI http://www.denisbouquet.com/remove-wordpress-emoji-code/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove JQuery MIgrate and JQuery if not admin
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
     	// removes Jquery (this disables jquery-migrate)
        $scripts->remove( 'jquery');
        // Adds just jQuery Core so migrate is excluded
        //$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}

// Remove WP Embedd
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );