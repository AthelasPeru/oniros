<?php

//Para los thumbnails
function athelas_thumbnail($image_field, $image_size, $classes=array('')){
	
	if (!function_exists('get_all_classes')) {
		function get_all_classes($classes, $height, $width, $image_size){
			$all_classes = '';
			foreach ($classes as $value) {
				$all_classes = $all_classes.$value.' ';
			};
			$all_classes = $all_classes.' height-'.$height.' width-'.$width.' size-'.$image_size;
			return $all_classes;
		};
	}
	if( get_field($image_field) ){
		$image = get_field($image_field);
	}elseif ( get_sub_field($image_field) ) {
		$image = get_sub_field($image_field);
	}else {
		$image_class = get_all_classes($classes, 'placeholder', 'placeholder', $image_size);
		echo '<img class="'.$image_class.'" src="'. get_stylesheet_directory_uri().'/bgimage/'.$image_size.'.jpg" alt"placeholder"/>';
	}
	

	if( !empty($image) ){
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];

		$size = $image_size;
		$thumb = $image['sizes'][$size];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];

		$image_class = get_all_classes($classes, $height, $width, $image_size);
		
		//if( is_single() ){
		//	echo '<a href="'.$url.'" title="'.$title.'">';
		//}
		echo '<img class="'.$image_class.'" src="'.$thumb.'" title="'.$title.'" alt="'.$alt.'"/>';
		//if( is_single() ){
		//	echo '</a>';
		//}
	};
};



//Función para convertir el custom_field('xx') en un excerpt de 50 palabras máximo
function get_athelas_custom_field_excerpt($title, $chars) {
	global $post;
	$text = get_field($title);
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = $chars; // in words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '...');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}


function the_excerpt_max_charlength($charlength) {
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



//BreadCrumbs :D
function athelas_breadcrumb() {
	$url = $_SERVER["REQUEST_URI"];
	$urlArray = array_slice(explode("/",$url), 0, -1);

	// Set $dir to the first value
	$dir = array_shift($urlArray);
	echo '<div class="breadcrumb-wrapper"><span class="breadcrumb-content"><a href="'.get_bloginfo('url').'">Home</a></span>';
	foreach($urlArray as $text) {
		$dir .= "/$text";
		echo ' <span class="breadcrumb-separator">/</span> <span class="breadcrumb-content"><a href="'.$dir.'">' . ucwords(strtr($text, array('_' => ' ', '-' => ' '))) . '</a></span>';
	}
	echo '</div>';
}




// Numbered Pagination (DEBERIAMOS RE-HACER ESTA FUNCION)
if ( !function_exists( 'wpex_pagination' ) ) {
//http://www.wpexplorer.com/pagination-wordpress-theme/
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '>' : '<';
		$next_arrow = is_rtl() ? '<;' : '>';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') ){
				 $current_page = 1;
			 }
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'					=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'				=> $format,
				'current'				=> max( 1, get_query_var('paged') ),
				'total' 				=> $total,
				'mid_size'				=> 3,
				'type' 					=> 'list',
				'prev_text'				=> $prev_arrow,
				'next_text'				=> $next_arrow,
			 ) );
		}
	}
	
}



//Related posts function
function related_posts_args($original_post, $posts_per_page){
	$post = $original_post;
	if ($post == ''){
		if(is_page('blog-archive') ){
			$post_type = 'post';	
		} elseif (is_single('post')) {
			$post_type = 'post';
		}else{
			$post_type = get_post_type($post);
		}
	} else {
		$post_type = get_post_type($post);
	}
	//Get the tags (¿Categories?) of the post
	// $tags = wp_get_post_tags($post->ID);
	$args=array(
	// 'tag__in' => array($tags),
	'post__not_in' => array($post->ID),
	'posts_per_page'=>$posts_per_page,
	'post_type' => array($post_type),
	'meta_key' => 'athelas_post_views_count',
	'orderby' => 'meta_value_num', 
	'order' => 'DESC'  
	);
	return $args;
}



function athelas_show_categories($br=true){
	global $post;
	$categories = get_the_category();

	$counter = 0;
	echo '<p>';
	echo '<strong class="categories-label">CATEGORIAS: </strong>';
	echo '<br class="hide-for-large-up">';
	if($br){
		echo '<br>';
	}
	if($categories){
		foreach( $categories as $category ) { 
			if ($category->name != 'Proximo evento') {
				if($counter != 0){
					echo '<span class="blog-categories separator"> / </span>';
				}
				$counter ++;
				echo '<span class="blog-categories"><a href="'.get_category_link( $category->term_id ).'" rel="bookmark" title="'.sprintf( __( "View all posts in %s" ), $category->name ).'">'.$category->name.'</a></span>';   
			} // if($categories->name not proximo evento)
		} // foreach($categories)
	} // if($categories)
	echo '</p>';
}



// Deberiamos tener una función que una wp_nav_menu() con Foundation.
// http://foundation.zurb.com/forum/posts/438-enabling-foundation-5-nav-with-wordpress-menus



// Admin footer modification
 
function remove_footer_admin () 
{
    echo '<span id="footer-thankyou">Developed with love by: <a href="http://www.athelas.pe" target="_blank">Athelas</a> & <a href="" target="_blank">Designer name</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


// REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS
 
function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );


// Ojo: Esta funcion arregla TODO en la vida = > Arregla Pagination en custom-post-types! 
function add_custom_posts_per_page( &$q ) {
	global $custom_post_types;

	$custom_post_types = array("news");
	if ( $q->is_archive ) { // any archive
		if ( in_array ($q->query_vars['post_type'], $custom_post_types) ) {
			$q->set( 'posts_per_page', 5 );
		}
	}
	return $q;
}

add_filter('parse_query', 'add_custom_posts_per_page');


function athelas_set_post_views($postID) {
    $count_key = 'athelas_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



function athelas_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    athelas_set_post_views($post_id);
}
add_action( 'wp_head', 'athelas_track_post_views');


function athelas_get_post_views($postID){
    $count_key = 'athelas_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }
    return $count.' Views';
}

?>