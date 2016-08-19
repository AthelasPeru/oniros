<?php 
/**
 * This should be only used for native post posttype. 
 * If you want to work with CPT use single-custom.php
 */
get_header(); ?>


		<?php while ( have_posts() ) : the_post(); ?>

			<!-- All your stuff -->

		<?php endwhile; // end of the loop. ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>