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
define('DB_NAME', 'kasirka');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'kcPE[9~H)H|Vu^26ld~|$HudF-?vZf.Y;v;dHXDyy)TkI2!f]m,;/Cc9^?J9p3hi');
define('SECURE_AUTH_KEY',  'VUd_5[#pm<T!6Nt43|g(5d*m[*#1JuqzR[>z]MTl]H|Y%}Mea4QwWi9;V.y>auIK');
define('LOGGED_IN_KEY',    ';O!P@Q05X.-/3WEbYD7IN~K}x8@w<Y!n_fZe4gK)O~>${+5U>64Rk[C <%DRQ`{^');
define('NONCE_KEY',        'B>PoeB;nM!JD%OYt|EDENDiJAX2,g${<Z >$rCPS^Z`s:hdQE`AL,cM=B*-=T5tL');
define('AUTH_SALT',        ';A})HRaC%=mr^f=O[JM.rz4[ft%H]5@oq]C-)+TuB-+}vX/HQbI%M^I,M31egfz]');
define('SECURE_AUTH_SALT', 'q]c?_g[zzsb>O~u70K*4_YXN$s^q)~,^m7N[I.N3JTuf1?7wdGIy5xW#3-7bUMNW');
define('LOGGED_IN_SALT',   'JK9Cl@u<k(q $$n6T:`sinBp,UZd-B7D9/Q@|%KA)@W(Q[N(p-8 ,/F.>!V4BRpA');
define('NONCE_SALT',       '4)(J?F3tv]/N4+$Z9iE~7As$,xpIA@tr}#(w!;XRkjUxU:&)$pDM6{R& % ySII!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'kas_';

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
