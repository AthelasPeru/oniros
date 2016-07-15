<?php 
/**
 * Base for the Post posttype archive.
 */
?>
<?php get_header(); ?>

	<!-- Begin of loop -->
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>

		<?php endwhile; ?>
	<?php else: ?>
		
	<?php endif;?>
	<?php wp_reset_postdata();  ?> 
	<!-- End of loop -->

<?php get_footer(); ?>
