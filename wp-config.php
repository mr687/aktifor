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
define('DB_NAME', 'idn_times');

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
define('AUTH_KEY',         'xO|OuNB/85WQ.i/ERTjfE^DTVnDBOdKJ]RyYpSj{Kc&fYX$1)+b3UC{GodC3s7Q<');
define('SECURE_AUTH_KEY',  ':TSrNR7@8;,D.)[gF=kpr-,f]h**}%N;Vry1ypO2B: Nb+AM#y5D`[_5IdaXAEcQ');
define('LOGGED_IN_KEY',    'j7XKkczP=~4L)O<~]c!tSe!Ime:^LXp-EEf.A@f_@FV.3{4;kFYtC!{+[+kD[)m,');
define('NONCE_KEY',        '|>ikd2I#%9O<(U!P8sZsY/l~X*Hse4QF;u|vARvArl|F@gr6Ec(6}m_54}i.6;?S');
define('AUTH_SALT',        '.!]Z>BZ3x#5_%x]7Kx}=1@Ct~7mr1tCJg{)5-mI2sRh3ERg.dO{ HzDrPg,A-ghS');
define('SECURE_AUTH_SALT', '}YIVX]8sg-A9^NVI{&;eRa$V5KXs<TuL.1[9^HFmZUC0gw.5k;`=YN)Be(pA>x8R');
define('LOGGED_IN_SALT',   'tchFm/)Vmhu2=gXbk-6QqnQ1c%tQjA}6>&$_.2Dg3L6+x`av$Oj jNkvK}W$$rUu');
define('NONCE_SALT',       '?DXxN{kJ*9}tS^~qf;0`9at~g-iyUz2,9%b =PT7M_tAgXSs1aQMOp1n_wM+TnQk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'idn_';

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
