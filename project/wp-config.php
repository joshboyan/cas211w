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
define('DB_NAME', 'student203p');

/** MySQL database username */
define('DB_USER', 'student203');

/** MySQL database password */
define('DB_PASSWORD', 'student203');

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
define('AUTH_KEY',         'I_X.v=IvI5{;nm|4G} BW|pR2so2#<ye%qI.w!*Hfw%M>%Qx2(=PLkU!uGEb*8T1');
define('SECURE_AUTH_KEY',  'qDx@q;!ZM/_+7}T>&$J/_h*#}X]9:[5Kh0`$LnZ1#+Bb@zt+9=f>[M5bVXLp2}c0');
define('LOGGED_IN_KEY',    '+6Jrf*Px@gJ.VvvlNE;4P7+t7+Pq:kL#+N^Be2+MZ:jaMY`BPj#g~;OOPJb?nC#x');
define('NONCE_KEY',        'a-B|Q; R9|H/-@AhKW0a-)GY+_8soAu8KPq->M@$6gh,%C5uU|-gYA[FSPH7qEXX');
define('AUTH_SALT',        '7:/A!SassW6u[mx:~[BN$PRF/3}9peccfkv1j^)t`pe`:ax{s<}IitsO$lMvN[7^');
define('SECURE_AUTH_SALT', 'G[+&mWdSf+~;_uVVei[miflh(ty{L#jtGp-)!NkBJXc7u]fETfB=_f2|<FUJ)t_=');
define('LOGGED_IN_SALT',   'E8DQN)tod+*[dUONG}[l^&M5gQCxZJ[;HV&ycluA-Jb|YF>;7E{MKnjX2m^=-Bc5');
define('NONCE_SALT',       '49:VFH$~*1b}5a1EQlH=l~| _9t9+_-6RW;%;NA-xqt99v-}tmTgb;j^J?+^|l@k');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
