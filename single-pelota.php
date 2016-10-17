<?php 
	/*
	 * 
	 * For more info: http://codex.wordpress.org/Post_Type_Templates
	*/
 ?>
<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php endwhile; ?>

	<?php else: ?>

	<?php endif;?>
	<?php wp_reset_postdata(); ?>
	
 <?php get_footer(); ?>


