<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Start Loading Functions - Please refrain from editing this section
/*-----------------------------------------------------------------------------------*/

include_once get_template_directory(). '/inc/constants.php';   // Theme constants
include_once get_template_directory(). '/inc/init.php';        // Theme loading starts.
add_filter( 'breadcrumb_trail_inline_style', '__return_false' );
/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'cakecious_dequeue_styles' );
function cakecious_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	return $enqueue_styles;
}


/*-----------------------------------------------------------------------------------*/
/**
 * Its recommended to use child theme instead if you want to write your own functions.
 * Child theme is supplied inside the main download zip.
 */

function templatation_vc_row_and_vc_column($class_string, $tag) {
	$class_string = str_replace('wpb_row', ' wpb_row cakecious ', $class_string);
	return $class_string;
}

// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'templatation_vc_row_and_vc_column', 10, 2);







/*-----------------------------------------------------------------------------------*/
/* /End
/*-----------------------------------------------------------------------------------*/
