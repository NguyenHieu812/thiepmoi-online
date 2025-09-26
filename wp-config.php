<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kinhmattam_wedding');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'NG9SjP#RWHSYG.Su`XhC66r]jC/_CtcuqOr!A`(.47XCaV[6),[?GZP| bo@Fp;e');
define('SECURE_AUTH_KEY',  'oTK%r[ZO-hY,AvEg(Vi3 2`}?{7{{=oY+TQ&3o-fD5Eqb&m}HES2uf8rMKu@{ex;');
define('LOGGED_IN_KEY',    'NZmw[gD7-bG$j,BQrG,Vu(MQ&4EY!sZ&Ot4>-{_>&Z;y[tN]$-IW$]NkCl0hSzB/');
define('NONCE_KEY',        '3opmzKsfu9UJt27?=M&V&$CDmg&l4fYl3Q]7w:!I:vp`,$ _Hl8Xg;VYo^! 0 8]');
define('AUTH_SALT',        '1vKBh/B]wz_oPl1CS8%|B#$>=vQQbKw54%BT?H&Cq4%;E+sQ%tmPD@%`[`GO+Z3T');
define('SECURE_AUTH_SALT', '_wjOh11Jqf{0zXeD=Lh3US-M.t- C@=z#`BOTaSLg%EUO.g`w&N$kK+w/9~0*Yd}');
define('LOGGED_IN_SALT',   'U%pT_8jx3}V|0fl#W#!-2 zpe4|o*hKI,|tz<qT87XSRvGOBFO.?q5GFw;$p1.s9');
define('NONCE_SALT',       'tg+TW%-jLy-Wi+hOh_lOLSl9%5b6ty+7I37#C2=QiFP3<@+-4uS.nUJT_)72q=zQ');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */

define('WP_HOME', 'http://localhost/thiepmoi-online');
define('WP_SITEURL', 'http://localhost/thiepmoi-online');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
