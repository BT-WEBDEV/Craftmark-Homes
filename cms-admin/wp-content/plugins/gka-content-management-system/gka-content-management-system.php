<?php
/*
Plugin Name: Gka Content Management System
Plugin URI:  
Description: Gka Content Management System as API feed backend system.
Version:     0.0.1
Author:      Amra Narmandakh
Author URI:  http://gkaadvertising.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: gka-content-management-system
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH') ) {
	exit;
}

// Including php files
require_once ( plugin_dir_path(__FILE__) . 'gka-cms-register-post-type.php');
// require_once ( plugin_dir_path(__FILE__) . 'gka-cms-remove-admin-menu.php');
require_once ( plugin_dir_path(__FILE__) . 'gka-cms-meta-boxes.php');
require_once ( plugin_dir_path(__FILE__) . 'gka-cms-remove-add-new.php');

// CSS and JS
function gka_cms_enqueue_scripts() {
	global $pagenow, $typenow;
	// var_dump($pagenow);
	// die();
	wp_enqueue_style( 'gka-backend-style', plugins_url( 'assets/css/gka-backend-style.css', __FILE__ ) );

	if ( ($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'crest_of_alexandria') {
		wp_enqueue_style( 'gka-backend-style', plugins_url( 'assets/css/gka-backend-style.css', __FILE__ ) );
		// wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
		wp_enqueue_script( 'gka_main-js', plugins_url( 'assets/js/gka-main.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '20150204', true );
	}
}

add_action( 'admin_enqueue_scripts', 'gka_cms_enqueue_scripts' );