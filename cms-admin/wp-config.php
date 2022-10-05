<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cms_craftmark_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'g5r*Xi(Hab8]w}0Zr{~z)uWa*Nd?R~0eiM+p8h{0v$&?f8(nS.-:MH O=tK4g1(X');
define('SECURE_AUTH_KEY',  'fNeK C|:a&:bp?1MEH6n:YAZm8453YOGb}9LeVhb_rI4g[-a1?KWusZ$ioR8WT;F');
define('LOGGED_IN_KEY',    '=*gs:)cbh{.;^.I 6}$*@ZLJ-LpXAj>~FJ9R^[FKf=]t=BbC2_(632,_h QM=ijv');
define('NONCE_KEY',        'f88z6/21[d+d%KoJHeY0VOh]/T8)vkR3U^Ie3:JgJXPr),[okfl~&QUuFt`ju6.G');
define('AUTH_SALT',        '7_$~%Ddt6+%50Gs9{dHiFg6gx@ #%H3%{[jX v51c.<NFnT|7FJ9:]XGnMEX@SbJ');
define('SECURE_AUTH_SALT', 'U)Pz8=(DDDjbyxl:uJ`!2b!31AJd$@gy[+/?u0CU/r9/jmp;<7xT*,v!0j|I|K|v');
define('LOGGED_IN_SALT',   '-!5} 7drCT),r=T#B^.8h;6lj>>2xXJz<Dz=ms<9ieRZC&7xT6`l1@jEs?aY,#cr');
define('NONCE_SALT',       '.l5d<QjX&SFy_an*Ox)r^{WVN}>f`5#&u&#EBuq9am7Fb/Gld55alg%8LCjCq.~9');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
