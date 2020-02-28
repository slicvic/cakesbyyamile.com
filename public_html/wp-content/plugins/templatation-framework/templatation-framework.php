<?php
/*
Plugin Name: Templatation Framework
Plugin URI: http://templatation.com/
Author: Templatation
Author URI: http://templatation.com/
Version: 2.95
Description: Framework plugin needed for theme to work smoothly.
Text Domain: templatation
*/

// Define Constants
define('TT_FW_ROOT', dirname(__FILE__));
global $tt_temptt_components;
global $temptt_redux_menu;  $temptt_redux_menu = 'menu';
global $temptt_redux_menuparent;  $temptt_redux_menuparent = '';

// Fetch the options set from theme, which we use to decide which features to turn on from this plugin.
$defaults = array(
		'portfolio_cpt'             => '0',
		'team_cpt'                  => '0',
		'client_cpt'                => '0',
		'testimonial_cpt'           => '0',
		'project_cpt'               => '0',
		'metaboxes'                 => '1',
		'theme_options'             => '1',
		'common_shortcodes'         => '1',
		'post_shortcodes'           => '0',
		'ttnew_hero_sc'             => '0',
		'integrate_VC'              => '1',
		'tt_widget_instagram'       => '0',
		'tt_widget_twitter'         => '0',
		'tt_widget_getintouch'      => '0',
		'tt_widget_infowidget'      => '0',
		'tt_widget_recentpost'      => '0',
		'tt_car_cpt'                => '0',
		'tt_dashboard_panel'        => '0',
		'temptt_themename'          => '', /* as in Stylesheet */
		'temptt_author'             => 'blv', /* if blv or da */
		'temptt_tf_link'            => '', /* format : itemslug/itemID */
		'temptt_new_importer'       => '0', /* whether to use the new importer */
		'temptt_new_importer2'      => '0', /* whether to use the new importer with multi demo select option */
		'temptt_pcode_check_no'     => '0', /* whether to implement purchase code verification. put 0 to enable pcode verification */
		/*'temptt_num_demos'          => '5', /* Number of demos */
);
/* old version support. thats why using both. */
if(get_option('tt_temptt_components_user')) {
	$tt_temptt_components = wp_parse_args( get_option( 'tt_temptt_components_user' ), $defaults ); // Replace defaults with values set in Theme.
}
if(get_option('temptt_tt_components_user')) {
	$tt_temptt_components = wp_parse_args( get_option( 'temptt_tt_components_user' ), $defaults ); // Replace defaults with values set in Theme.
}

// If purchase code verification system to enable or not.
if ( ! empty( $tt_temptt_components['temptt_pcode_check_no'] ) ) {
	define('TT_PCODE_NO', '1');
}

// If purchase code verification system to enable or not.
if ( ! empty( $tt_temptt_components['temptt_theme_remote'] ) ) {
	define('TT_REMOTE_T_DIR', $tt_temptt_components['temptt_theme_remote']);
}

//Include Portfolio CPT
if ( ! empty( $tt_temptt_components['portfolio_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-portfolio.php';
}

//Include Clients CPT
if ( ! empty( $tt_temptt_components['client_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-client.php';
}

//Include Projects CPT
if ( ! empty( $tt_temptt_components['project_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-project.php';
}

//Include Team CPT
if ( ! empty( $tt_temptt_components['team_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-team.php';
}

//Include Car CPT
if ( ! empty( $tt_temptt_components['tt_car_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-car.php';
}

//Include Testimonial CPT
if ( ! empty( $tt_temptt_components['testimonial_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-testimonial.php';
}

//Include CS framework
if ( ! class_exists( 'CSFramework' && ! empty( $tt_temptt_components['metaboxes'] ) ) ) {
	include TT_FW_ROOT . '/inc/cs-framework/cs-framework.php';
}

//Include Shortcodes
if ( ! empty( $tt_temptt_components['common_shortcodes'] ) ) {
	include TT_FW_ROOT . '/inc/shortcodes/init.php';
}

//Include VC stuff
if ( ! empty( $tt_temptt_components['integrate_VC'] ) ) {
	if ( function_exists( 'vc_set_as_theme' ) ) {
		include TT_FW_ROOT . '/inc/vc/vc-init.php';
	}
}

//Include twitter
if ( ! empty( $tt_temptt_components['tt_widget_twitter'] ) ) {
		add_action( 'wp_enqueue_scripts', 'tt_temptt_framework_twter_enqueue' );
		include TT_FW_ROOT . '/inc/widgets/tt-widget_twitter.php';
}

//Include getintouch widget
if ( ! empty( $tt_temptt_components['tt_widget_getintouch'] ) ) {
		include TT_FW_ROOT . '/inc/widgets/tt-widget_getintouch.php';
}


//Include info widget
if ( ! empty( $tt_temptt_components['tt_widget_infowidget'] ) ) {
		include TT_FW_ROOT . '/inc/widgets/tt-widget_infowidget.php';
}

//Include Recentpost widget
if ( ! empty( $tt_temptt_components['tt_widget_recentpost'] ) ) {
		include TT_FW_ROOT . '/inc/widgets/tt-widget_recentpost.php';
}


// New demo data setup link.
$demolink = '';
$demolink = get_option('theme_demo_link');
if ( '' != $demolink ) {
	include TT_FW_ROOT . '/inc/adminpage/themesetup.php';
}
/*-----------------------------------------------------------------------------------*/
/* Remove no-ttfmwrk class from body, when this plugin is active. */
/*-----------------------------------------------------------------------------------*/
add_filter( 'body_class','tt_temptt_ttfmwrk_yes', 11 );
if ( ! function_exists( 'tt_temptt_ttfmwrk_yes' ) ) {
function tt_temptt_ttfmwrk_yes( $classes ) {

	if (($key = array_search('no-ttfmwrk', $classes)) !== false) {
    unset($classes[$key]);
	}
	return $classes;
  }
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue twitter script function . */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'tt_temptt_framework_twter_enqueue' ) ) {
function tt_temptt_framework_twter_enqueue() {
	wp_enqueue_script( 'temptt-twitterFetcher', plugin_dir_url( __FILE__ ) . 'inc/assets/js/twitterFetcher.js', array( 'jquery' ), null, true );
	wp_enqueue_style( 'temptt-twitterFetcher-style', plugin_dir_url( __FILE__ ) . 'inc/assets/css/twitterFetcher.css', false );
  }
}


/*-----------------------------------------------------------------------------------*/
/* tt_get_dynamic_value() */
/* Replace values in a provided array with theme options, if available. */
/*
/* $settings array should resemble: $settings = array( 'theme_option_without_tt' => 'default_value' );
/*
/* @since 4.4.4 */
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'tt_temptt_opt_values' )) {
	function tt_temptt_opt_values( $settings ) {
		global $tt_temptt_opt;

		if ( is_array( $tt_temptt_opt ) ) {
			foreach ( $settings as $k => $v ) {

				if ( is_array( $v ) ) {
					foreach ( $v as $k1 => $v1 ) {
						if ( isset( $tt_temptt_opt[ 'tt_' . $k ][ $k1 ] ) && ( $tt_temptt_opt[ 'tt_' . $k ][ $k1 ] != '' ) ) {
							$settings[ $k ][ $k1 ] = $tt_temptt_opt[ 'tt_' . $k ][ $k1 ];
						}
					}
				} else {
					if ( isset( $tt_temptt_opt[ 'tt_' . $k ] ) && ( $tt_temptt_opt[ 'tt_' . $k ] != '' ) ) {
						$settings[ $k ] = $tt_temptt_opt[ 'tt_' . $k ];
					}
				}
			}
		}

		return $settings;
	} // End tt_temptt_opt_values()
}


/*-----------------------------------------------------------------------------------*/
/* tt_temptt_get_option() */
/* Replace values in a provided variable with theme options, if available. */
/*
 * field id should be without tt_
 */
/* TT @since 6.0 */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'tt_temptt_get_option' ) ) {
	function tt_temptt_get_option( $var, $default = false ) {
		global $tt_temptt_opt;

		if ( isset( $tt_temptt_opt[ 'tt_' . $var ] ) ) {
			$var = $tt_temptt_opt[ 'tt_' . $var ];
		} else {
			$var = $default;
		}

		return $var;
	} // End tt_temptt_get_option()
}


/** remove redux menu under the tools **/
add_action( 'admin_menu', 'temptt_tt_remove_redux_menu',12 );
function temptt_tt_remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}

/*-----------------------------------------------------------------------------------*/
/* The Dashboard */
/*-----------------------------------------------------------------------------------*/
/**
 * Get the version data for the currently active theme.
 */
if ( ! function_exists( 'temptt_get_theme_version_data' ) ) {
function temptt_get_theme_version_data () {
	$response = array(
					'parent_theme_name'     => '',
					'parent_theme_version'  => '',
					'parent_theme_slug'     => '',
					);

	if ( function_exists( 'wp_get_theme' ) ) {
		$theme_data = wp_get_theme();
			$response['parent_theme_name']      = $theme_data->get( 'Name' );
			$response['parent_theme_version']   = $theme_data->get( 'Version' );
			$response['parent_theme_slug']      = get_template();
		}

	return $response;
} // End temptt_get_theme_version_data()
}

//Include Dasboard
$temptt_thmname = temptt_get_theme_version_data();
if ( is_admin() && ucfirst(get_template()) === $tt_temptt_components['temptt_themename'] && ! empty( $tt_temptt_components['tt_dashboard_panel'] ) ) {
		/* WE need to show panel now, so set redux menu under panel menu. */
		$temptt_redux_menu = 'submenu'; $temptt_redux_menuparent = 'templatation_dashboard';
		include TT_FW_ROOT . '/inc/dashboard/dashboard.php';
}

//Include New importer. only if the panel also exists and correct theme is activated.
if ( is_admin() && ! empty( $tt_temptt_components['temptt_new_importer']) && ( ucfirst(get_template()) === $tt_temptt_components['temptt_themename'] ) && ! empty( $tt_temptt_components['tt_dashboard_panel'] ) ) {
	include TT_FW_ROOT . '/inc/importer/demo-importer.php';
}

//Include New importer. only if the panel also exists and correct theme is activated.
if ( is_admin() && ! empty( $tt_temptt_components['temptt_new_importer2']) && ( ucfirst(get_template()) === $tt_temptt_components['temptt_themename'] ) && ! empty( $tt_temptt_components['tt_dashboard_panel'] ) ) {
	include TT_FW_ROOT . '/inc/importer2/demo-importer.php';
}


//Include redux framework
if ( ! class_exists( 'Redux' && ! empty( $tt_temptt_components['theme_options'] ) ) ) {
	include TT_FW_ROOT . '/inc/redux/admin-init.php';
}


/**
 * Output nonce, action, and option_page fields for a settings page.
 * @param string $option_group A settings group name. This should match the group name used in register_setting().
 */
function temptt_settings_fields($option_group) {
	echo "<input type='hidden' name='option_page' value='" . esc_attr($option_group) . "' />";
	echo '<input type="hidden" name="action" value="update" />';
	wp_nonce_field("$option_group-options");
}


// admin styles.
if ( ! function_exists( 'temptt__tt_admin_styles' ) ) {
	function temptt__tt_admin_styles() {

		wp_enqueue_style( 'temptt-admin-css', plugin_dir_url( __FILE__ ) . '/inc/assets/css/admin-tt.css' );

	} add_action('admin_enqueue_scripts', 'temptt__tt_admin_styles', 200);
}
