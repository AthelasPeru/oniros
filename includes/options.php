<?php 
function athelas_get_default_options() {
    $athelas_options = array(
        'logo' => ''
    );
    return $athelas_options;
}

function athelas_options_init() {
    $athelas_options = get_option( 'theme_athelas_options' );
 
    // Are our options saved in the DB?
    if ( false === $athelas_options ) {
        // If not, we'll save our default options
        $athelas_options = athelas_get_default_options();
        add_option( 'theme_athelas_options', $athelas_options );
    }
 
    // In other case we don't need to update the DB
}
 
// Initialize Theme options
add_action( 'after_setup_theme', 'athelas_options_init' );


// Add "Logo" link to the "Appearance" menu
function athelas_menu_options() {
    // add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function);
    add_theme_page('Logo', 'Logo', 'edit_theme_options', 'athelas-settings', 'athelas_admin_options_page');
}
// Load the Admin Options page
add_action('admin_menu', 'athelas_menu_options');
 
function athelas_admin_options_page() {
    ?>
        <!-- 'wrap','submit','icon32','button-primary' and 'button-secondary' are classes
        for a good WP Admin Panel viewing and are predefined by WP CSS -->
 
        <div class="wrap">
 
            <div id="icon-themes" class="icon32"><br /></div>
 
            <h2><?php _e( 'Logo', 'athelas' ); ?></h2>
 
            <!-- If we have any error by submiting the form, they will appear here -->
            <?php settings_errors( 'athelas-settings-errors' ); ?>
 
            <form id="form-athelas-options" action="options.php" method="post" enctype="multipart/form-data">
 
                <?php
                    settings_fields('theme_athelas_options');
                    do_settings_sections('athelas');
                ?>
 
                <p class="submit">
                    <input name="theme_athelas_options[submit]" id="submit_options_form" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes', 'athelas'); ?>" />
                    <input name="theme_athelas_options[reset]" type="submit" class="button-secondary" value="<?php esc_attr_e('Clear Fields', 'athelas'); ?>" />
                </p>
 
            </form>
 
        </div>
    <?php
}

function athelas_options_settings_init() {
    register_setting( 'theme_athelas_options', 'theme_athelas_options', 'athelas_options_validate' );
 
    // Add a form section for the Logo
    add_settings_section('athelas_settings_header', __( 'Logo options', 'athelas' ), 'athelas_settings_header_text', 'athelas');
 
    // Add Logo uploader
    add_settings_field('athelas_setting_logo',  __( 'Logo', 'athelas' ), 'athelas_setting_logo', 'athelas', 'athelas_settings_header');
    // Add Current Image Preview
	add_settings_field('athelas_setting_logo_preview',  __( 'Logo Preview', 'athelas' ), 'athelas_setting_logo_preview', 'athelas', 'athelas_settings_header');

}
add_action( 'admin_init', 'athelas_options_settings_init' );
 
function athelas_settings_header_text() {
    ?>
        <p><?php _e( 'Handle website Logo.', 'athelas' ); ?></p>
    <?php
}
 
function athelas_setting_logo() {
    $athelas_options = get_option( 'theme_athelas_options' );
    ?>
        <input type="text" id="logo_url" name="theme_athelas_options[logo]" value="<?php echo esc_url( $athelas_options['logo'] ); ?>" />
        <input id="upload_logo_button" type="button" class="button" value="<?php _e( 'Subir Logo', 'athelas' ); ?>" />
        <?php if ( '' != $athelas_options['logo'] ): ?>
            <input id="delete_logo_button" name="theme_athelas_options[delete_logo]" type="submit" class="button" value="<?php _e( 'Delete Logo', 'athelas' ); ?>" />
        <?php endif; ?>
        <span class="description"><?php _e('Upload an image for the website logo.', 'athelas' ); ?></span>
    <?php
}




function athelas_options_validate( $input ) {
    $default_options = athelas_get_default_options();
	$valid_input = $default_options;
	 
	$wptuts_options = get_option('theme_athelas_options');
	 
	$submit = ! empty($input['submit']) ? true : false;
	$reset = ! empty($input['reset']) ? true : false;
	$delete_logo = ! empty($input['delete_logo']) ? true : false;
	 
	if ( $submit ) {
	    if ( $athelas_options['logo'] != $input['logo'] && $athelas_options['logo'] != '' )
	        delete_image( $athelas_options['logo'] );
	 
	    $valid_input['logo'] = $input['logo'];
	}
	elseif ( $reset ) {
	    delete_image( $athelas_options['logo'] );
	    $valid_input['logo'] = $default_options['logo'];
	}
	elseif ( $delete_logo ) {
	    delete_image( $athelas_options['logo'] );
	    $valid_input['logo'] = '';
	}
	 
	return $valid_input;
}

function athelas_options_enqueue_scripts() {
    wp_register_script( 'upload', get_template_directory_uri() .'/includes/options/js/upload.js', array('jquery','media-upload','thickbox') );
 
    if ( 'appearance_page_athelas-settings' == get_current_screen() -> id ) {
        wp_enqueue_script('jquery');
 
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
 
        wp_enqueue_script('media-upload');
        wp_enqueue_script('upload');
 
    }
 
}
add_action('admin_enqueue_scripts', 'athelas_options_enqueue_scripts');


function athelas_options_setup() {
    global $pagenow;
 
    if ( 'media-upload.php' == $pagenow || 'async-upload.php' == $pagenow ) {
        // Now we'll replace the 'Insert into Post Button' inside Thickbox
        add_filter( 'gettext', 'replace_thickbox_text'  , 1, 3 );
    }
}
add_action( 'admin_init', 'athelas_options_setup' );


 
function replace_thickbox_text($translated_text, $text, $domain) {
    if ('Insert into Post' == $text) {
        $referer = strpos( wp_get_referer(), 'athelas-settings' );
        if ( $referer != '' ) {
            return __('SELECCIONAR COMO LOGO!', 'athelas' );
        }
    }
    return $translated_text;
}


function athelas_setting_logo_preview() {
    $athelas_options = get_option( 'theme_athelas_options' );  ?>
    <div id="upload_logo_preview" style="min-height: 100px;">
        <img style="max-width:100%;" src="<?php echo esc_url( $athelas_options['logo'] ); ?>" />
    </div>
    <?php
}

function delete_image( $image_url ) {
    global $wpdb;
 
    // We need to get the image's meta ID.
    $query = "SELECT ID FROM wp_posts where guid = '" . esc_url($image_url) . "' AND post_type = 'attachment'";
    $results = $wpdb->get_results($query);
 
    // And delete it
    foreach ( $results as $row ) {
        wp_delete_attachment( $row->ID );
    }
}

?>
