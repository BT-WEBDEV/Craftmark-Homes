<?php

// Create table on activation
global $wpdb;
$plugin_name_db_version = '1.0';
$table_name = $wpdb->prefix . "gka_settings"; 
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE $table_name (
		  id int(10) NOT NULL AUTO_INCREMENT,
		  setting_name varchar(250) NULL,
		  setting_value text NULL,
		  UNIQUE KEY id (id),
          UNIQUE (setting_name)
		) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
add_option( 'plugin_name_db_version', $plugin_name_db_version );


?>