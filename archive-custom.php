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
	<main id="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
		<h1><?php post_type_archive_title(); ?></h1>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" role="article">
				<header>
					<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<?php the_title(); ?></a></h3>
				</header>
				<section>
					<?php the_excerpt(); ?>
				</section>
				<footer>
					<a href="<?php the_permalink() ?>">See more</a>
				</footer>
			</article>
		<?php endwhile; ?>
				<!-- something -->
		<?php else : ?>
			<article id="post-not-found" class="hentry cf">
				<header>
					<h1>Oops, Post Not Found!></h1>
				</header>
				<section>
					<p>Uh Oh. Something is missing. Try double checking things.</p>
				</section>
				<footer>
					<p>This is the error message in the custom posty type archive template.</p>
				</footer>
			</article>
		<?php endif; ?>
	</main>
	<?php get_sidebar(); ?>
<?php get_footer(); ?> 