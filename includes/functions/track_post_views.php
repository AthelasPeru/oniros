<?php 

/**
 * 
 * @param  [type] $postID [description]
 * @return [type]         [description]
 */
function set_post_views($postID) 
{
    $count_key = 'post_views_count';
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

function track_post_views($post_id) 
{
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;    
    }
    set_post_views($post_id);
}
add_action( 'wp_head', 'track_post_views');

function get_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return __("0 Views");
    }
    return $count.' '.__('Views');
}