<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'spdxpdmy_WPJOO');

/** MySQL database username */
define('DB_USER', 'spdxpdmy_WPJOO');

/** MySQL database password */
define('DB_PASSWORD', 'vo>c*Y4vgC)5z*a9O');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'cacbd893ea4bb5891531f5fbc7773f46cb81486d841454de310e8aa15570b03c');
define('SECURE_AUTH_KEY', 'd06158866d2beaa880a232f1a2f6cbdb0992c0c0a12a917886c3935f18b78327');
define('LOGGED_IN_KEY', 'a31a98b4b791a922484977f0b835154239e5fcf7ade9bc6c71495c88ae708aa7');
define('NONCE_KEY', 'd97a9aeaeea95537ee841b5cc28809322583c953d9ff1cf5882dd83bc60a5e5e');
define('AUTH_SALT', '32fefef4d91706c3458f0b3d202640281cfaaef1909242837f00c41485461295');
define('SECURE_AUTH_SALT', 'e7a822252a49417f1d9db28f23b505a809098927ff326cb950517ae2a41b9cea');
define('LOGGED_IN_SALT', 'a9a186e0bbf216df6b4f5808d15a257a575c8abf85a83ea5731a5af1d01cb409');
define('NONCE_SALT', '98c91c63ec024a849a94137340f428346cd426a00db5a5672f31397736849ee9');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'rAo_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
