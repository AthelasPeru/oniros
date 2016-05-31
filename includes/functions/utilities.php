<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

/**
 * Oniros Utils class
 *
 * This class contains several functions maybe you need to use.
 *
 * @package Oniros
 * @subpackage Includes
 * @author Elnato
 *
 * @since 1.0.0
 */
class Oniros_Utils {

	
	/**
	 * Función para convertir un custom_field('xx') en un excerpt de n palabras
	 * @param  [type] $field_name 
	 * @param  [type] $num_words  
	 * @return [type]             
	 */
	function get_oniros_custom_field_excerpt($field_name, $num_words) 
	{
		global $post;
		$text = get_field($field_name);
		if ( !empty($text) ) {
			$text = strip_shortcodes( $text );
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]>', $text);
			$excerpt_more = apply_filters('excerpt_more', ' ' . '...');
			$text = wp_trim_words( $text, $num_words, $excerpt_more );
		}
		return apply_filters('the_excerpt', $text);
	}
	
	/**
	 * [the_excerpt_max_charlength description]
	 * @param  [type] $charlength [description]
	 * @return [type]             [description]
	 * 
	 * @link https://codex.wordpress.org/Function_Reference/get_the_excerpt
	 */
	function the_excerpt_max_charlength($charlength) 
	{
		$excerpt = get_the_excerpt();
		$charlength++;

		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				echo $subex;
			}
			echo '[...]';
		} else {
			echo $excerpt;
		}
	}
	
	/**
	 * 
	 * @param  [type] $postID [description]
	 * @return [type]         [description]
	 */
	function oniros_set_post_views($postID) 
	{
	    $count_key = 'oniros_post_views_count';
	    $count = get_post_meta($postID, $count_key, true); //return the value
	    if ( empty($count) ){
	        $count = 1;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, $count);
	    } else {
	    	$count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
	//To keep the count accurate, lets get rid of prefetching
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	function oniros_track_post_views($post_id) 
	{
	    if (!is_single()) return;
	    if (empty($post_id)) {
	        global $post;
	        $post_id = $post->ID;    
	    }
	    oniros_set_post_views($post_id);
	}
	add_action( 'wp_head', 'oniros_track_post_views');

	function oniros_get_post_views($postID)
	{
	    $count_key = 'oniros_post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if ($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return __("0 Views");
	    }
	    return $count.' '.__('Views');
	}
}