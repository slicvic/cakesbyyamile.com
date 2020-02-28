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

//@ini_set( 'upload_max_size' , '120M' );
//@ini_set( 'post_max_size', '120M');
//@ini_set( 'max_execution_time', '900' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cakesbyyamile' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'r00t!' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
/*
define( 'AUTH_KEY',         '_8[Nc4~$LB~h+usj%)1`4Wi5!uYd{ejhQ4Ftvl|3>;zevL!-9k[X~PH0o84`hMn(' );
define( 'SECURE_AUTH_KEY',  'ha&nwA`b0MYP)B^;Ea|%uD*8?A8QgYtuR@Rz%SYX8P$2?I$Spt)TdG8`ZJc]XQ58' );
define( 'LOGGED_IN_KEY',    '`MoM+a2&Ug/i5C6$5&|sD-t,ZDM=Ls1H8aJQxv3Gc.mR95 g94nrB!J_MThX-[rm' );
define( 'NONCE_KEY',        '3QwI<c(,/Y@xd(k}9+udi,Q] {9e$-R&i)L#,B!OgA/u< LMLg-pcA3_;1*|9<?k' );
define( 'AUTH_SALT',        'I1[%$^H-Y/TLjX]X*qn{y17>Bz}AFDw /{Tq!>4&xoI{0U`T910E]Y9OU[JnlNh9' );
define( 'SECURE_AUTH_SALT', '%R<]y%@0rsJV*%[b;Y!4( FdT=-_/tt2,L6^60a[7fJm_2NaMzVHHS!&|s.4J$(b' );
define( 'LOGGED_IN_SALT',   '8UHE{Y.EXkV[JHGc)PTye~sUm%1WE.EtmcvbD>9(mDXsU>/-eNw7+6Au@|+h3{ib' );
define( 'NONCE_SALT',       'abs`&Azka_*<<R4&(H>gVIrT+h%;Z|5%dEs`[s0jPU<O9J=V /WHb*@~2Fx.{5`?' );
*/

define('AUTH_KEY',         ' q+B+&PTR3P1b-H41gM]WHUO%e`1b4Iy>Tc6$X?2x);d){lO)kZ>7<~3h-/:FkF%');
define('SECURE_AUTH_KEY',  '(j#BGJ rhb=ZwR[L=x{C1.R| vF^jx$P1gb/|4F~uH3r?+>@Raw$G47l%ng!yV63');
define('LOGGED_IN_KEY',    '~XVV+yyhy,Gba5PH}L|WtPX^+lzHc-roJU}?Q_&?2,6c*[*?lk--ZvI6Z|ImoO[p');
define('NONCE_KEY',        '<EGX;r34-P| W q&5U2Z>{EYx-CTy|_k+-|fNB3H+$toG,I*KLd>*3K7GCm-7-PS');
define('AUTH_SALT',        'hdXQs44w#-:+MV?vj-!DbLP)5B_{ &V+rvI#_*(FcaBdYm=AwSY6y_&%w[)~2XW~');
define('SECURE_AUTH_SALT', 'dQgew>pQ?2wW0iVVfHmU@/Lk*Fjge)4>%G,]--?G}JQ3wad)<YZbq3?N]pjUd9E+');
define('LOGGED_IN_SALT',   '-p(`p|2]$6{-|K||`^E |4]v218^wt+,JdI<pl78>reK|f:,}Mlh:j$kr|:R%[/q');
define('NONCE_SALT',       '~i|Dz_:+YSL;|5-AH@4+gWk[)*Z+?FD/v9V-(0kG n}7lc `UZbu*n3gDqzAqLvw');

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


// SMTP Authentication
define( 'SMTP_USER',   'AKIAYIHZFWR7E2ZNRK4H' );
define( 'SMTP_PASS',   'BNqyostTgnl5S7T6LhlbNDvJO5hI8gqgp9cY4sPatlZx' );
define( 'SMTP_HOST',   'email-smtp.us-west-2.amazonaws.com' );
define( 'SMTP_FROM',   'vmlantigua@gmail.com' );
define( 'SMTP_FROMNAME',   'Cakes By Yamile' );
define( 'SMTP_PORT',   587 );
define( 'SMTP_SECURE', 'tls' );
define( 'SMTP_AUTH',    true );
define( 'SMTP_DEBUG',   0 );
