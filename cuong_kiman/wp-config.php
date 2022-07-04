<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'cuong_kiman' );

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
define( 'AUTH_KEY',         '|#7s*hz;(Gzx]%rdE[~*N17Y>u4Bk]W6q:4rK0CTEhmOT/&&FFn|uq(W<SpQ>).~' );
define( 'SECURE_AUTH_KEY',  '1e.oUC6kuOME;N>7=jV)}oeEw-IS(IvVsiwc?E}Ydf]l_aM7`;im.YbXDPw SAe~' );
define( 'LOGGED_IN_KEY',    '(l94CdBZDVLB]gnZ*/2[p^|u$x5(=&Ke+H{Wwzy0{$g+)sO k}0.s)bZV_lX8n3-' );
define( 'NONCE_KEY',        '9OFSsMVC1MGs5{SCuf0Wnz)5x7l0J8(YS0#`*.$#- Y.xNdG4uMg&97?0eiuPb@>' );
define( 'AUTH_SALT',        'Px4(#:]n(g(mgl+2BV7J&yfGbu8rL@TEdp 2}=rcFHU,W7]Qj*U9e*/&mVOQWjSw' );
define( 'SECURE_AUTH_SALT', '[?hx#MIa(.E^Xdl]>dvRjn3y7mhMAhEG6]cFRr!f:MZIS&h9+b<Iplb&6c@.jxUC' );
define( 'LOGGED_IN_SALT',   '*?3n-%z^rK*U[LnB~Z1.<?wm%^MnOuN%H;)Ji,YNsITQUT&fxJ^yBQfJw%LeI]Y5' );
define( 'NONCE_SALT',       '4Munv0Y<#M&0jUUu:#=RS75R)DRmmLJqV~lO9LzYeMhv%/of)Z=,?bm^tJ#`:`>Q' );

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
