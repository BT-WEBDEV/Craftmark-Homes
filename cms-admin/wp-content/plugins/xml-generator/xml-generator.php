<?php
/**
 * @package GkaGeneratorPlugin
 */
/*
* Plugin Name: XML Generator
* Plugin URI: https://www.gkaadvertising.com/
* Description: Realtor XML feed generator
* Version: 1.0
* Author: GKA Creative Agency
* Project Manager: anarmandakh@gkaadvertising.com
* Author URI: https://www.gkaadvertising.com/
* License: GPLv2 or later
*/

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'GKA__PLUGIN_DIR', plugin_dir_path( __FILE__ )  );
define( 'GKA__PLUGIN_URL', plugin_dir_url( __FILE__ )  );
define( 'GKA__UPLOAD_DIR', wp_upload_dir()['basedir']  );
define( 'GKA__UPLOAD_URL', wp_upload_dir()['baseurl']  );
define( 'GKA__BASE_URL', getDomain() );

function getDomain() {
    $sURL    = site_url(); // WordPress function
    $asParts = parse_url( $sURL ); // PHP function

    if ( ! $asParts )
      wp_die( 'ERROR: Path corrupt for parsing.' ); // replace this with a better error result

    $sScheme = $asParts['scheme'];
    $nPort   = $asParts['port'];
    $sHost   = $asParts['host'];
    $nPort   = 80 == $nPort ? '' : $nPort;
    $nPort   = 'https' == $sScheme AND 443 == $nPort ? '' : $nPort;
    $sPort   = ! empty( $sPort ) ? ":$nPort" : '';
    $sReturn = $sScheme . '://' . $sHost . $sPort;

    return $sReturn;
}

// 
require_once( GKA__PLUGIN_DIR . 'config.php' );
require_once( GKA__PLUGIN_DIR . 'controller/gkaXML.php' );
require_once( GKA__PLUGIN_DIR . 'controller/gkaJSON.php' );
require_once( GKA__PLUGIN_DIR . 'controller/gkaDB.php' );
require_once( GKA__PLUGIN_DIR . 'views/gkaSettings.php' );

// Add admin menu
function gka_admin_menu() {
    add_menu_page('XML Generator', 'XML Generator', 'manage_options', 'xml-generator', 'gka_settings_page', GKA__PLUGIN_URL . 'assets/gka_logo_16x16.png', 200 );
}
add_action('admin_menu', 'gka_admin_menu');

// Add CSS and JS
function gka_enqueue_scripts() {
	global $pagenow;
	if ($pagenow == 'admin.php') {
		wp_enqueue_style( 'bootstrap-4', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-grid.min.css' );
		wp_enqueue_style( 'mdbootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'gka_enqueue_scripts' );

?>

<?php
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

?>