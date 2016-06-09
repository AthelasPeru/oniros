<?php 
/**
 * Add the sidebar code here, it should be called with
 * get_template_part( "includes/templates/sidebar" );
 * if you need to create different sidebars for different pages, then create a new file here
 * with the sidebar-<slug>.php form. then call it with
 * get_template_part( "includes/templates/sidebar", "slug");
 * 
 * If you want to remove templates, 
 * just delete the templates folder and 
 * replace the function get_template_part with the contents 
 * of the this file.
 */
 ?>

 <aside id="sidebar" class="sidebar" role="complementary">
 	<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

 		<?php dynamic_sidebar( 'sidebar1' ); ?>

 	<?php else : ?>

 		<?php
 			/*
 			 * This content shows up if there are no widgets defined in the backend.
 			*/
 		?>

 		<div class="no-widgets">
 			<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'athelas_theme' );  ?></p>
 		</div>

 	<?php endif; ?>

 </aside>