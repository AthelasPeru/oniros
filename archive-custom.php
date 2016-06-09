<?php 
/**
 * This is the base archive for all CPT archives. 
 * it should be called archive-<cpt-slug>.php
 * if you don't need to change anything in the query 
 * it's not necesary to add it, since WP hierarchy 
 * should take care of the template inheriting the query.
 * 
 * If you want to set a Page for an archive use page-base.php instead.
 */
?>

<?php get_header(); ?>

	<!-- Begin of loop -->
	<?php 
		$args = array(
	          //Type & Status Parameters
	          'post_type'   => array('posttype'), //change this one to your cpt-slug
	          'posts_per_page' = -1
	    );
		$query = new WP_Query( $args ); 
	 ?>
	<?php if($query->have_posts()): ?>
		<?php while($query->have_posts()): $query->the_post(); ?>

		<?php endwhile; ?>
	<?php endif; ?> 
	<?php wp_reset_postdata(); ?>	
	<!-- End of loop -->

<?php get_footer(); ?> 