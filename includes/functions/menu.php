<?php 

function register_my_menus() {
  register_nav_menus(
    array(
    	// menu area slug    //menu title
      'main-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
 ?>