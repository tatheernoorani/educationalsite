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
define( 'DB_NAME', 'my-project' );

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
define( 'AUTH_KEY',         'd~e]%)JJ3PnH_3.ccgfe39uA89KfOLSN:kBkEilq8Bxc/9~iup6A?fSgjQt65q[]' );
define( 'SECURE_AUTH_KEY',  'F=(Aj?9{lHJlt )fySJH*y=VmvP=}xA#t]r*T.O}2;~3J]%3!yXkvkwqdMEdA]c7' );
define( 'LOGGED_IN_KEY',    'Nk)SRA,JYd[Rg>HaN2T^i;pX|ia;>dC3[P3cdDbwk`wfquU0PdC8+o${HolxD1IG' );
define( 'NONCE_KEY',        'mnW;@%-0Y4|1T, qy?e{/?<]:Q+ip5(U>yK~PM(s^!IeJYo?&IHw6TINz?garTi(' );
define( 'AUTH_SALT',        't0!BiR0w[;SLS]9<+^=17<>qoI<4-idGp].>I9U_j$`ndw]D>N%DWE/V$n@Nh:,1' );
define( 'SECURE_AUTH_SALT', ']9R-tFt+dF{?bwD;g)h_9?!b5| :FUQ}m:b}9q[.ZnU#XiHw(]ynpt6J/ZUV`_|p' );
define( 'LOGGED_IN_SALT',   'xjZ*G]n{W2uDpsCAI Q531de!Rp|6;nL3%u7GECuC@kpu1?KOah6EoS+`<f^,as^' );
define( 'NONCE_SALT',       'r,8mQIu1{b{*nEySk*+Ezz`xT@s&`q-$33,3$U;F%Hw`HpP4W`H5o5QxF/CxbxUB' );

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
