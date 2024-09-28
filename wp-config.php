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
define( 'DB_NAME', 'project' );

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
define( 'AUTH_KEY',         '>^[Z6G6,h]9h^QYk~w),BGc?Hw!I}Fk>/R8Ki%;~M6`&#&f[c$d,b18As;&`Y*+x' );
define( 'SECURE_AUTH_KEY',  '#y6%#|GLBK|RdY`_PGbR 8Wf2G3Ywb[/*!SQ/7re^?5i>d[%1<b6|MA:<:8@@6I}' );
define( 'LOGGED_IN_KEY',    'p*Ba+u]F``I,+*LlDO9gbMC+t|X8@e=ry)pl2^<,bfR^6Y$[w0D<3ki8Sy&J?Xz@' );
define( 'NONCE_KEY',        'CNK+USG$^#BHL($Dc.tg;/f6cm,SMpg9]TQ7s:81zx~HPah({mv8+d|R1y3wrs<o' );
define( 'AUTH_SALT',        'vG-O)UBjG:=EAc0mKR`^zXUo{WS.fC.;~aI7RaUKn=[rw7y_{gKse_ mZM~k5p`d' );
define( 'SECURE_AUTH_SALT', '$5L$3=[g.hp,0SM*YON>Spch5>w8gILrIhBE/I@?EaLIsh<JD_}uywcs{.E[|%bV' );
define( 'LOGGED_IN_SALT',   '[>_%T<jrZv2^{mED:*rmZq?BWUXb#0;$kV+G(mANqKq$#u6)%mgUscamRd~F-ymw' );
define( 'NONCE_SALT',       '9J@Y&1c]lMN%zv^/HrOtw@z#c;u<Nlfbr=@2h SdnW/oi-ZG1D:IVR^kY?zHxe:R' );

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
