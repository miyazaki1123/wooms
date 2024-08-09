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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'm<23HZyfd6GS+!H{3(WhqnxEf9/QjzGtb}96g+*n5,|q1 hJC3B&Rd=H8m?t[-kh' );
define( 'SECURE_AUTH_KEY',   '*7On?X6Xh&V9?j[~`ZZ1M+DC}%1}S:w-oA8m-,fLb9.rlO,Lz:~JE+yo2C}N#wru' );
define( 'LOGGED_IN_KEY',     '0+B^ v(a|5ONs8=::P7_ZY?:5cj~ITA8gj?j>UqAAb ~B$Gi&o$E <R?.1Ok[WN8' );
define( 'NONCE_KEY',         '31spkHtw09<dj.8W2Wt0zfu||T0jNeGLs)9(k{V#1<T0K&5@jR}TlQrl7p>AaJyJ' );
define( 'AUTH_SALT',         '+KihqVb/yg;%N8pr,p-5?fGZkC}?P:t!}!s~RD:? {!$1XvM_{zsKAN~{#9FU3ae' );
define( 'SECURE_AUTH_SALT',  'oHw-lI^D`Zes$DfHx9.MT6 0PZr24kkkfYq,MS v4^[iYJ@-V#MwqEQ]^GU#U0BT' );
define( 'LOGGED_IN_SALT',    '(EH]cNQu6E(p%U#x9Z|RFFpA}YiJ^I,aM=P;Rk;^hK;/>U>-]0|5Y|k07Iq]j#TL' );
define( 'NONCE_SALT',        '%~v.m(D:oag;9/I4^|mzZ:::/%tjo+4s6uo%GEp85rQ!|[p<HQl-V?qS%: z{Y5|' );
define( 'WP_CACHE_KEY_SALT', 'az5^6Uuka+&=HP39_a5U!CDJ#jx4$xIWYuU9Y>oez?uD9YT*h7kx?ZC2lNkt<+R{' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
