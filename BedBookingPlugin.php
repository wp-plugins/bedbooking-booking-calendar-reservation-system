<?php
/**
 * Plugin Name: bb_name
 * Plugin URI: http://rst.com.pl
 * Text Domain: bedbooking
 * Domain Path: /languages
 * Description: bb_desc
 * Version: 1.0
 * Author: RST
 * Author URI: http://rst.com.pl
 * License: GPL2
 */


define('bedbooking_VERSION', '1.0');
define('bedbooking_OptionName', 'BBPlugin_Options');
define('bedbooking_Text_Domain', 'bedbooking');
define('bedbooking_PLUGIN_URL', plugin_dir_url( __FILE__ ));


__('bb_desc', bedbooking_Text_Domain);
__('bb_name', bedbooking_Text_Domain);
        
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}




if ( is_admin() ) {

}

wp_enqueue_script("jquery");

add_action( 'admin_menu', 'bedbooking_menu' );
add_action( 'admin_init', 'bedbooking_init' );


add_action( 'wp_ajax_nopriv_bedbooking_ajax_save_action_callback', 'bedbooking_ajax_save_action_callback' );
add_action( 'wp_ajax_bedbooking_ajax_save_action_callback', 'bedbooking_ajax_save_action_callback' );



require_once dirname( __FILE__ ) . '/BedBookingWidget.php';
function bedbooking_register_widgets() {
	register_widget( 'BedBookingWidget' );
}

add_action( 'widgets_init', 'bedbooking_register_widgets' );

function bedbooking_theme_name_scripts() {

}

add_action( 'wp_enqueue_scripts', 'bedbooking_theme_name_scripts' );

function bedbooking_init() {
    load_plugin_textdomain(bedbooking_Text_Domain, false, dirname( plugin_basename( __FILE__ ) ). '/languages' );
	/* Register our stylesheet. */
	wp_register_style( 'bedbookingAdminStylesheet', plugins_url('admin/css/admin.css', __FILE__) );
	wp_register_script( 'bedbookingAdminScript', plugins_url('admin/js/admin.js', __FILE__) );
	
}


 function bedbooking_admin_styles() {
	/*
	 * It will be called only on your plugin admin page, enqueue our stylesheet here
	 */
	wp_enqueue_style( 'bedbookingAdminStylesheet' );
}
 function bedbooking_admin_scripts() {
	/*
	 * It will be called only on your plugin admin page, enqueue our stylesheet here
	 */
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bedbookingAdminScript') ;
}
   
function bedbooking_menu() {
	$page = add_menu_page( 'BedBookingPlugin', 'BedBooking', 'manage_options', 'bedbooking-menu-page', 'bedbooking_options_page',plugins_url('/admin/images/bedbooking-icon.png', __FILE__)); 
	add_action( 'admin_print_styles-' . $page, 'bedbooking_admin_styles' );
	add_action( 'admin_print_scripts-' . $page, 'bedbooking_admin_scripts' );
}

function bedbooking_options_page() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	wp_enqueue_media();

	require_once 'admin/options.php';
}


function bedbooking_ajax_save_action_callback() {
    

    if(isset($_POST['remove'])) {
           update_option(bedbooking_OptionName, serialize(array()));
    } else {
        $data = $_POST['data'];
        $safe_data = array();
        $safe_data['username'] = sanitize_email($data['username']);
        $safe_data['password'] = sanitize_text_field($data['password']);
        $safe_data['calendarcode'] = sanitize_text_field($data['calendarcode']);
        $safe_data['userId'] = sanitize_text_field((int)$data['userId']);
        $safe_data['objectId'] = sanitize_text_field((int)$data['objectId']);
        update_option(bedbooking_OptionName, serialize($safe_data));
    }
    echo json_encode(array('status' => 'OK'));
    die();
}



