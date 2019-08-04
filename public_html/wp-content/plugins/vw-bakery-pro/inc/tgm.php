<?php
require_once VW_BAKERY_PRO_PLUGIN_PATH. '/inc/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function vw_bakery_pro_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'WooCommerce', 'vw-bakery-pro' ),
			'slug'             => 'woocommerce',
			'source'           => 'woocommerce',
			'required'         => true,
			
		),
		array(
			'name'             => __( 'VW Title Banner Image', 'vw-bakery-pro' ),
			'slug'             => 'vw-title-banner-image',
			'source'           => '',
			'required'         => true,
			'force_activation' => true,
		),
		array(
			'name'             => __( 'VW Gallery Images', 'vw-bakery-pro' ),
			'slug'             => 'vw-gallery-images',
			'source'           => '',
			'required'         => true,
			'force_activation' => true,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'vw_bakery_pro_register_recommended_plugins' );