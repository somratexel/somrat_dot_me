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
define('DB_NAME', 'somrat_dot_me');

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
define('AUTH_KEY',         'daWMEp&V3EL~xxFuR1q`3voqwA[w 6!_9QP,2M(F36yrv&Al+$1T)VQQ88m@-svj');
define('SECURE_AUTH_KEY',  'JM>Ljp}B%Flwq>oG(M>N+I.vc`s^{|3wf/8@d<&c*zo.PB|K+2JZ@5:{e-Xi&3JL');
define('LOGGED_IN_KEY',    '*wQy04onFWw1+a|&AE>V,2iL|5l-L|Yq)IN%$]53(-|R/oShZ/d:&75B1-e)v@?@');
define('NONCE_KEY',        '_TWx|KA2g9oVDB:<_E+J:`P.hY=LZeN/3>J~T!HLFTzE;B(O9bR]+}y?(78EWz])');
define('AUTH_SALT',        '-v/}88*l0TmMk#G@Iw|i<(YoVHWRIUm=ma7GaPX7Kz|nm:VOMfg94[+z;W9,FgJ]');
define('SECURE_AUTH_SALT', 'b-S]hvYY8c,Vw,*YvN}L A!%lDWEkHf}(l<kF(|uG/K)rizhB&$X|FR}H8#i=Yi6');
define('LOGGED_IN_SALT',   '2X?Q/+_EG%?ue)DH+[cXIH1nt][% s_ojx^4b+@VY,PiJL~,BiIz>Dn5%~MewBZE');
define('NONCE_SALT',       'd@`OA$6]U1S }GQ)Q@Assh&>cV?V+;2u+>|Ah?1&Ruf%CLj-?QIr$,Nkh/D>Xm|&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sdm_';

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
