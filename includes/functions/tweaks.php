<?php 
/**
 * Remove Query String from Static Resources
 * as explained in http://technumero.com/internet/remove-query-strings-from-static-resources/2986
 * This is better for SEO and performance reasons
 */

function remove_cssjs_ver( $src ) {
	if( strpos( $src, '?ver=' ) )
	$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );