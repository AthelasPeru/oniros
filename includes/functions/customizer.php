<?php 

/**
 * Oniros Theme Customizer
 */
function oniros_customize_register( $wp_customize ) {
	// Logo Controls
	$wp_customize->add_section( 'oniros_logo_section' , array(
	    'title'       => __( 'Logo', 'oniros' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to display above the site title on each page',
	) );
	$wp_customize->add_setting( 'oniros_logo'  , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'oniros_sanitize_uri'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'oniros_logo', array(
	    'label'    => __( 'Logo', 'oniros' ),
	    'section'  => 'oniros_logo_section',
	    'settings' => 'oniros_logo',
	) ) );
}
add_action( 'customize_register', 'oniros_customize_register' );
/**
 * Sanitize URIs
 */
function oniros_sanitize_uri($uri){
	if('' === $uri){
		return '';
	}
	return esc_url_raw($uri);
}