<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sparky');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'S|03@Ql*%@nLwi#!t`Rnei|xN+0Z;xx},z_]{}%i#8<7 zhX>e)pRxm2u|}:b}XF');
define('SECURE_AUTH_KEY',  '@]!->N?+yteJwT#UoL5:swlzD|Au7dBZX(Jv#&|4B+kmT0+BPC~.bfgWLh!a`ozs');
define('LOGGED_IN_KEY',    '-VS`8jpg3O2Z+IH5x,6g/GVs9!L)i9LQ e+fPIFxnP-JaI1R:tL@rgNJUcQrrB7W');
define('NONCE_KEY',        '<A6hc$9+JUrB+L@h68>KHApJK_R@>R/F+o61yUPFSTfu##>lhan$$c+q%hWQC>y-');
define('AUTH_SALT',        'F@+ ^nB^2+m^h&NZ%)M%mDV]`ssM@|1}h570x-6Lu_cH%$&UFP6*eXs&n?m!5F_<');
define('SECURE_AUTH_SALT', '^lPpUQQN)v sKg}X^mf9#<T,n`5h$-da{=BTKL-@E${-xtwk3S^B8X0GAwwu=k_|');
define('LOGGED_IN_SALT',   'pF7j/#uW@_Tg|lT!qklzhjopQNNY-T}KNI<<(AW?)A[b5$>Qj~BpCA~QCW8cD$ =');
define('NONCE_SALT',       'n$ybW Ew=3TARM3otQ&-4r*ixOXTQZ&||X/7L:Q]l7]q<E/n[n&$ho#H&JVpF-Zk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'as_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
