<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache




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
if (preg_match('/^(qa[2]*|dev)\./', $_SERVER['HTTP_HOST'])) {
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'aspegic-ch-qa');
    define('DB_USER', 'aspegic-ch-qa');
    define('DB_PASSWORD', 'KPMeFpdPy06OiGqs');
} else if ($SERVER['HTTP_HOST'] === null) {
	define('DB_HOST', 'mysql');
    define('DB_NAME', 'sucuremadebasf');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
	
	define('WP_HOME','http://localhost:8081');
	define('WP_SITEURL','http://localhost:8081'); 
	
	define('WP_DEBUG', false);
	
	//define('PLL_CACHE_HOME_URL', false);
	
} else {
    define('DB_HOST', 'mysql-prod');
    define('DB_NAME', 'aspegic-ch-pd');
    define('DB_USER', 'aspegic-ch-pd');
    define('DB_PASSWORD', 'a535BDTzVeYkEtx4');
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '|_%US`XIb/T?7m4%8!ccF>(%`hQw/z=myRC/Gekb1.pUQr-L@k;935:/}.YHn^>9');
define('SECURE_AUTH_KEY',  '.jsTU_S|I4?05L]8-P}&gQ<:5,[,cal[N>-mOYF0OD+^9PTVfF`juoTC-P?3d3SU');
define('LOGGED_IN_KEY',    '3W,nV=nhk d#u]Uxn,/z9N_@#)s=8:DO+fg_] _d5eLi|X1?-4`JHRc|czFj!,{V');
define('NONCE_KEY',        '!39XTUcFvCq]XjU6MDkm<1XHfQ$-igoIpSrl4:%s7&>_.??L>rzi?~.AsLHlu2jM');
define('AUTH_SALT',        'dN=@yE*RixmRfv|_<HpG7Y%`ca4| ?Z&u0IS|PCi57.;v|Ft,u^P&)%8-[?*l9#y');
define('SECURE_AUTH_SALT', '&X>?a@1)X U; O?OS WNHZkhCi(<830_X}exY^(r3MF=^eA/wM6{p?vM=K!Wpnxm');
define('LOGGED_IN_SALT',   '4iZWYknK}@/]N,{kt4+?Vf8P$G2_u.l|T+&z*)DUg( ]I8kGXtj`f-bjmd`E]c*e');
define('NONCE_SALT',       '=@d5r=8Nfl?eil9]c6z-U`~Y&e&LZ6L Wb-Tt?8.840ifTG93/$xEGLorj$oHr,L');

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
