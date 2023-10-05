<?php
define('WP_CACHE', true); // WP-Optimize Cache
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u2136904_ideeca' );
/** Database username */
define( 'DB_USER', 'u2136904_ideeca' );
/** Database password */
define( 'DB_PASSWORD', 'jP8pA3hF3uvS5cJ9' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
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
define( 'AUTH_KEY',         'z7wxa7njswyydvzam7ktddczwzjwpjki1vffwd3skuqf92rpw04whymlpgjwd5jr' );
define( 'SECURE_AUTH_KEY',  'vyir6axrfqmzpuveu2oywjhqcskjzmldgk5wyfayqmoqnrfxlrkuocf2sbfn2fnz' );
define( 'LOGGED_IN_KEY',    'jwqi4jkg7vw4vtwr1wy2gs9obz7lvbe0ze6ug2bajeb0nrfkibdcsszgwdumiaew' );
define( 'NONCE_KEY',        'gibbs4dnjwfavash5eopdjxwttlfn0idvvacpts1xebbyxg6jotgoedlrebs2uak' );
define( 'AUTH_SALT',        'iwkahoi6zveavplvxxurbwt4pcanbe2ivec117jvsuvvgijwnppp1gcepe4i1elk' );
define( 'SECURE_AUTH_SALT', '6aaux6zj8lqtqpenruhkasx1kt0j8ebpj4ejnlo3jaosczn0nzayw6eagygvnc28' );
define( 'LOGGED_IN_SALT',   'yvbqt2nloo2fbrbshvtirmlvqs4kh7xgbpdw7vjvs4ajet49kfsrysgsx7dy32x6' );
define( 'NONCE_SALT',       'ch9c0uysjopmphfwvywafrp7b0av9dbfhlfl35cc9uruzdqjybfhvms3fw5on1kj' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wprs_';
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
/*Increase PHP Memory to 128MB*/
define('WP_MEMORY_LIMIT', '1084M');
/* Add any custom values between this line and the "stop editing" line. */
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
