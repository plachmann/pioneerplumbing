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
define('DB_NAME', 'maclachc_wp887');

/** MySQL database username */
define('DB_USER', 'maclachc_wp887');

/** MySQL database password */
define('DB_PASSWORD', '[1u4vp5l(S');

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
define('AUTH_KEY',         'zi3sjdvcwgk5ydjcfwnprvqpidmajj3ogjytcwugzku8uhus9rcxyqa2byd4uulf');
define('SECURE_AUTH_KEY',  'olqjivthadgjhlitckq6jcuiz3e2tjwedgnlkwf4mdc5bvme8ktxgudgbedr6fmi');
define('LOGGED_IN_KEY',    'styqphvnankerixloolcng7ybtxc4l2kzhbn6rykmxje9skftwjmn5k14uswscjc');
define('NONCE_KEY',        'q0kvkllyc1mcezdpi0p0tlmdcghy1vunhtjnne1skpcohxioc80fgga2l5iqsll7');
define('AUTH_SALT',        'gykn7ymfwmxzunm1mzdfolzzsws1frp6pcsxj5madnhwjtntl8ivk26yp8plwxng');
define('SECURE_AUTH_SALT', 'cohep9lesjqkq2j6wth508nsxvrljgzvac0xpdure8p4wb7dhjnn4kknuvdd7lsx');
define('LOGGED_IN_SALT',   'wzb5rntfyeduu9hhqasy1rpcftz1uepgxjkflegqgeqowutaxxpqs4cdd8yufl9y');
define('NONCE_SALT',       '6zvtbbn1ohitewcgrxrfxsngvplk3hjqtlnarwvahhfyeopmvvebqe7qrpl99vyx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpbl_';

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
