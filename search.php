<?php get_header( ); ?>
<?php 
// This is the search results template
// "s" is the searchquery used by wp searchform
// "post_type" limits the search results to those posttypes
	
	     global $wp_query;
	     $searchquery = $wp_query->query['s'];
	     $args = array(
		    's' => $searchquery,
		    'post_type'       => array('post','custompostype'), 
		    'posts_per_page'  => -1,
		  );
	     $the_query = new WP_Query($args);  
 ?>
	<?php if ($the_query->have_posts()) : ?> 
		<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
	
		<?php endwhile; ?>

  	<?php endif; ?> 
  	<?php wp_reset_postdata(); ?>	

<?php get_footer(); ?>