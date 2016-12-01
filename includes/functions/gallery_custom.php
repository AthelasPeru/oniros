<?php 

add_filter('post_gallery','customFormatGallery',10,2);

function customFormatGallery($string,$attr){

    $output = "<div id=\"container\">";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){
    	$output .= "<div class=\"post__gallery__item\">";
        $output .= wp_get_attachment_image($imagePost->ID, 'medium_thumbnail');
		$output .= "</div>";

    }

    $output .= "</div>";

    return $output;
}