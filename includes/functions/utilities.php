<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

/**
 * Oniros Utils class
 *
 * This class contains several functions maybe you need to use.
 *
 * @package Oniros
 * @subpackage Includes
 * @author athelas
 *
 * @since 1.0.0
 */
class Oniros_Utils {

	
	/**
	 * generate an excerpt for a  custom_field('xx') with n length
	 * @param  [type] $field_name 
	 * @param  [type] $num_words  
	 * @return [type]             
	 */
	function get_custom_field_excerpt($field_name, $num_words) 
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
	

	public static function pagination_numeric_posts_nav() {

		if( is_singular() )
			return;

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );

		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

						// <li><a href="" class=""><i class="fa fa-chevron-right"></i></a></li>
		echo '<div class="navigation"><ul class="pagination">' . "\n";

		/**	Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

		/**	Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><span><a href="%s" class="prev">%s</a></span></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( ! in_array( 2, $links ) )
				echo '<li>…</li>';
		}

		/**	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><span><a href="%s" class="next">%s</a></span></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		/**	Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
				echo '<li>…</li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><span><a href="%s">%s</a></span></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		/**	Next Post Link */
		if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link() );

		echo '</ul></div>' . "\n";

	}
}