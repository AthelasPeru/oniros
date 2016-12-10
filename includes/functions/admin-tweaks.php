<?php 

/*
Functions that modify how the admin works or appears.
Call it via the functions file.


*/

// Admin footer modification
function replace_footer_admin () 
{
    echo '<span id="footer-thankyou">Developed with love by: <a href="http://www.athelas.pe" target="_blank">Athelas</a> & <a href="" target="_blank">Designer/Developer name</a></span>';
}
add_filter('admin_footer_text', 'replace_footer_admin');



// REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS
// https://codex.wordpress.org/Dashboard_Widgets_API
function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );

/*
Create a custom Dashboard widget


*/


/*
Login Page Customization


*/

//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function oniros_login_css() {
    wp_enqueue_style( 'oniros_login_css', get_template_directory_uri() . '/dist/css/login/login.min.css', false );
}

// changing the logo link from wordpress.org to your site
function oniros_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function oniros_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'oniros_login_css', 10 );
add_filter( 'login_headerurl', 'oniros_login_url' );
add_filter( 'login_headertitle', 'oniros_login_title' );