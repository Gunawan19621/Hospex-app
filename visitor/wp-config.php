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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hospex' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '-yu!3d~W,Z}g;(NTSuE<8Y0%v&9(wAn9M%)bt-;p/-g7@~*~(px>W> /?YB!XL/#' );
define( 'SECURE_AUTH_KEY',  'Tw8Lncqs0ObN*P6+y.3&992W9f8KWjQaQ!#!6fkyss%]5:GHlx15r_NUE5Z K[.=' );
define( 'LOGGED_IN_KEY',    '1=?:nG=$y1V</|joh`@IeP$E_SN|1g!|EKX;`TXgF%T_24LC8PN53WoCj,+{:nJW' );
define( 'NONCE_KEY',        'JR7s~l(0&:<fbq-Y<*6X$+N><9oK}lPC` ULCB:ySY/gH|uc krZwj>u`xJ^{!Md' );
define( 'AUTH_SALT',        'KL(ZRIe)$}R)I/&yu/Y=v5yH:-qV9<;ed6}X_{3xjemMhTsqG)d:UKuDVBy[k%1E' );
define( 'SECURE_AUTH_SALT', 'ykc)8[x9#jJbR-wpg1P=`zR@ygS_)dv|H9S,34)}9pZiX)BFJhu8]u3uPYt6jsd7' );
define( 'LOGGED_IN_SALT',   'Vy|$ELLG,)+FfaX6*Z(CK3CnrV6(<#=!3`9spviL[VPKcWWDj3ny a}jAA{obNq,' );
define( 'NONCE_SALT',       'E=7=~Q_|<rGS`TcdTy+k<PiVovx=NJKN7$w!#^8-uFlg1r,KVQisVGZq1$[9rzK4' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
