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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tester' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '~*9NAP~*;QvU~XG27dkM9xdgORN?zl#hUU22-pd=*c],p%f2Yuc`@{)ud^L>X+e-' );
define( 'SECURE_AUTH_KEY',  '5A4iBm;gb[xXOMR?`#J[<5w91?9tc,4Li 4Dl7huoFkZ[ !2%)jJ<bj)6,hXur)u' );
define( 'LOGGED_IN_KEY',    'F #EiB[ebfc_SxhN2KU/AD>?[XhEt45!?H)1W$058]?#PYz&qvHi)AvFIRN}}J,3' );
define( 'NONCE_KEY',        'zIjY}>9<7BIKS5n2JZiZ8sztyAC/]3_GDB4&Gzz&meVhupR5Jhn.FoP{>xp=j~dw' );
define( 'AUTH_SALT',        '*od=v{$DH!=`/CpW?GI E-1kz(Q6!`4_=Wr2S?@O>XuO3ZE3H_Mh=}9TD;}e[3X]' );
define( 'SECURE_AUTH_SALT', '>}Y$tC~6EZe&fC;kU*BYk(1_>^~3Oqn(aanKBjWOaTAT8CWNi(eu)>Q-^iq[ioia' );
define( 'LOGGED_IN_SALT',   '/,Bk-.]dJ.,!ho/^)~> s@UP?;vM3yX!7K:1]E]@)r|dGa6crz^^dfEd)*NdhYV+' );
define( 'NONCE_SALT',       'Da^?2y7$}PdU~4*~3=D {yr[I1GS|`j4r]BvD]idSO^0y[]9^=_Vp}54FqO:E0e0' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
