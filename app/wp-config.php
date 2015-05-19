<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'mediatrends-new');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Hl-e|o^MLD85}v$?~hMt*MjH/=,l{Af%?]-rRc,3cCFd3y?XYsbQZX.@@[`Nhvqg');
define('SECURE_AUTH_KEY',  ' *|E1ADpqJf)5RRWH*G*26>kGe`*a|:=.5U-yGc3&,xq`69FX+m*bDawj<W{8|Y^');
define('LOGGED_IN_KEY',    '|_L3)3CMG;mHh><e$S.}iX}GD~|n9X--+4F<M9N 8@+4zT3&/j3eywAI|!Aa(.n=');
define('NONCE_KEY',        'VKm:XUz_3*ZKw)kN<w7|]=Xe,cU3E@#wv*Z@Zg6Z=x4[K6R!IM.(i wb&(k-zw@C');
define('AUTH_SALT',        '0:^^>1Mb^516=#f77X.!YD<|@{+]]37ivehON6Ko|<8;Fw^!HHk% VVI&V{,<mfw');
define('SECURE_AUTH_SALT', '<0w**($(+iJ9*V%<F7 v:P^a-#8Lvnoi%=jyjI*ihFDw[wS1+-SXx0$J)]Q_S?T]');
define('LOGGED_IN_SALT',   'dt~+x5G61_C4 !hX5zd PQ%4J;+xP)V0U^M!(iDYDPG_GrZ{V-~}|l<[qs~z)>RF');
define('NONCE_SALT',       'xIxS8Bu~([~Oj5UB`r/@wy@-WLh@~WC~w8R!8N-0BIT|rkr#^]]OoHi.a-<+Ektr');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
