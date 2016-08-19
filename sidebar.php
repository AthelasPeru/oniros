<?php 
/**
 * Add the sidebar code here.
 * To call sidebar just get_sidebar() wherever you want.
 * If you need to create different sidebars for different pages, then create a new file here
 * with the sidebar-<slug>.php form.
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
 			
 		</div>

 	<?php endif; ?>

 </aside>