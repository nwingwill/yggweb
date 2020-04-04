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
//define( 'DB_NAME', 'yggweb' );

/** The name of the database for WordPress Podction*/
define( 'DB_NAME', 'li3ryzpheamj463d' );

/** MySQL database username */
//define( 'DB_USER', 'root' );

/** MySQL database username Production*/
define( 'DB_USER', 'v7zgi7ik3ztdgvgq' );

/** MySQL database password develop*/
//define( 'DB_PASSWORD', '' );

/** MySQL database password Production*/
define( 'DB_PASSWORD', 'qf93tv1c8fbue7rr' );

/** MySQL hostname Develop*/
//define( 'DB_HOST', 'localhost' );

/** MySQL hostname Production*/
define( 'DB_HOST', 'g3v9lgqa8h5nq05o.cbetxkdyhwsb.us-east-1.rds.amazonaws.com' );

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
define( 'AUTH_KEY',         'WJO%WF{ he8Qw&Rg`o(+I;7juOpgJ{)IK(uhIY~U@G#f~cwjOvtTq=R4y<.wr8nR' );
define( 'SECURE_AUTH_KEY',  ';1SlG#OUgiHZ)G$uaU-8N-jV(8yQ:+3x9hvn(}8#GoQbiyU7h+0ZzuAZ/YL/<_p`' );
define( 'LOGGED_IN_KEY',    '^Ur;+Q/+ebcCYz Wh*Dn^mFC_Ddbh>eJnp0i/&ocV|hmgT><[m67oCyQ*RAUkP(p' );
define( 'NONCE_KEY',        'k/7j(ClDAxDOsbLdX.p~_YSl[GCirp ;OzWdPqX]R.3(JZgf}_~SVsz.NV(s9/ut' );
define( 'AUTH_SALT',        'j$B= WehiLQp79U}mYg-~Gi5D5R>x#:%T[83zp}H`Hx+{kNt7{7@(s&V7K>m2kSd' );
define( 'SECURE_AUTH_SALT', '}J)v,Q8BGCX3Dq,TIe9w+=$6/)F$}%*wu+OF~)_2HNTu/%B%FM1YFvU]eCO#)kJT' );
define( 'LOGGED_IN_SALT',   'Y`KzVBpM&(onyo&LoC[RH-T4SgU<}]I0>,$:]4wau wg21n(+@zx +~cZgl)#Da^' );
define( 'NONCE_SALT',       '+:#EHr~=w0$ShNF-7m0C_vCvko11;|%D/(S#SH x8tl4+%e)+DHO~JOA1&!k/]D&' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
