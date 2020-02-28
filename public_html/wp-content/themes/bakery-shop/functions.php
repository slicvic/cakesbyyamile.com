<?php
/**
 * Bakery Shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bakery_Shop
 */

//define theme version
if ( !defined( 'BAKERY_SHOP_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();
	
	define ( 'BAKERY_SHOP_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/* Declare Global Default Page ID*/
$bakery_shop_default_page = '';
$bakery_shop_page_array = get_pages();
if(is_array($bakery_shop_page_array)){
    $bakery_shop_default_page = $bakery_shop_page_array[0]->ID;
}

/* Declare Global Default Post ID*/
$bakery_shop_default_post = '';
$bakery_shop_post_array = get_posts();
if(is_array($bakery_shop_post_array)){
    $bakery_shop_default_post = $bakery_shop_post_array[0]->ID;
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Implement the Custom functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Implement the WordPress Hooks.
 */
require get_template_directory() . '/inc/wp-hooks.php';

/**
 * Custom template function for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template hooks for this theme.
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load plugin for right and no sidebar
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Load widgets.
 */
require get_template_directory() . '/inc/widgets/widgets.php';




add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( PHPMailer $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->SMTPDebug  = SMTP_DEBUG;
    //$phpmailer->setFrom(SMTP_FROM, SMTP_FROMNAME);
    //$phpmailer->addAddress(SMTP_FROM);
    $phpmailer->Host       = SMTP_HOST;
    $phpmailer->Username   = SMTP_USER;
    $phpmailer->Password   = SMTP_PASS;
    $phpmailer->Port       = SMTP_PORT;
    $phpmailer->SMTPAuth   = SMTP_AUTH;
    $phpmailer->SMTPSecure = SMTP_SECURE;
}

