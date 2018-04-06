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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '[+#Sd_4w_A10dCpQU?[jsD]%Oc{>?fhz! #7-y0uD&!LEVazu)(?^cqnjk8Bf/P}');
define('SECURE_AUTH_KEY',  'aUHjyX]wZ:j(d/<L6=YI%rXL?A%.)pl1^f85(5g51!*D[7(I^BsCT?R@$(D,kq2H');
define('LOGGED_IN_KEY',    'o<h?e:Iq|n&j3rjon;X:oRcK,:R:r!+?}R<:rlcJ@^+<Gr`L|hCImtQE(3X8R+Lz');
define('NONCE_KEY',        'q9c],i [&ABWLnKsw%b>KTwYRVj9<TI|,PJ7*?fd?T{f$I`+>(7y}IQ=%k]F^rga');
define('AUTH_SALT',        'LO/K_s tDJg4gj+b:<RbM)EtJaD|F/qD4&|CFQwE4:$3x:zQP)n*F_x1@la[T7i!');
define('SECURE_AUTH_SALT', '6^Kiur!taK`W^Fp/0Jnw,#t &FEx]TEdNcr&@eSBC7_j~e3,c!t6<ljBkZe@,&Of');
define('LOGGED_IN_SALT',   'yOQOOFcYJEX<q)h,^RAi?Cb9Vh~x#Uw4eCK<EpH^FzOepS,kTDCOR4J5+8aR5*^U');
define('NONCE_SALT',       '3#CbGsi+r~2$5+D?lj0r^C<:HB(Ksmhu~g6_T~w-T0*[Go~ljRA|`Pso|fX]}Z.)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
