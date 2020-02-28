<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */

/**
 * custom option and settings
 */
function templatation_settings_init() {
 // register a new setting for "templatation" page
 register_setting( 'templatation_data', 'temptt_thm_demo' );

 // register a new section in the "templatation" page
 add_settings_section(
 'templatation_section_developers',
 '',
 'templatation_section_developers_cb',
 'templatation_data'
 );

 // register a new field in the "templatation_section_developers" section, inside the "templatation" page
 add_settings_field(
 'templatation_demo_data',
 __( 'Hide this page in future.', 'templatation' ),
 'temptt_thm_demo_cb',
 'templatation_data',
 'templatation_section_developers',
 [
 'label_for' => 'temptt_thm_demo',
 'class' => 'templatation_row',
 'templatation_custom_data' => 'custom',
 ]
 );
}

/**
 * register our templatation_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'templatation_settings_init' );

/**
 * custom option and settings:
 * callback functions
 */

// developers section cb

// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function templatation_section_developers_cb( $args ) {
	$tt_temptt_theme = wp_get_theme();
 ?>
	<div class="updated notice tt-admin1">
		<span class="tt-admin2">First of all, thanks for purchasing <?php echo esc_attr($tt_temptt_theme);?> theme.</span>
			<p>In order to stop illegal use, we now require purchase key before providing the link to download demo data. We apologise for trouble but hope you will cooperate to protect our months of work distributed freely.</p>
			<p>Installation of demo data is very easy, given step by step below.</p>
			<ul>
				<li><strong>Step 1</strong>: Please go to <a href="https://support2.bolvo.com/download-theme-demo-file/">https://support2.bolvo.com/download-theme-demo-file/</a>.</li>
				<li><strong>Step 2</strong>: Find your theme name there, Enter your purchase key and Download the demo install file.</li>
				<li><strong>Step 3</strong>: Go to wp-admin/All in one Migration/Import and upload that downloaded file. Finish the import process.</li>
				<li><strong>Step 4</strong>: Go to Users/Profile and change Email address and password to suit yourself immediately. (This is important because this login details are not unique.).</li>
			</ul>


	</div>
 <?php
}

// pill field cb

// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function temptt_thm_demo_cb( $args ) {
 // get the value of the setting we've registered with register_setting()
 $options = get_option( 'temptt_thm_demo' );
 // output the field
 ?>

 <select id="<?php echo esc_attr( $args['label_for'] ); ?>"
 data-custom="<?php echo esc_attr( $args['templatation_custom_data'] ); ?>"
 name="temptt_thm_demo[<?php echo esc_attr( $args['label_for'] ); ?>]"
 >
 <option value="yes" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'yes', false ) ) : ( '' ); ?>>
 <?php esc_html_e( 'Show this page', 'templatation' ); ?>
 </option>
 <option value="no" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'no', false ) ) : ( '' ); ?>>
 <?php esc_html_e( 'Hide this page', 'templatation' ); ?>
 </option>
 </select>
 <p class="description">
 <?php esc_html_e( 'If you are done with installing demo data you can choose to hide this page in future. If in future you ever need this information again, just contact support.', 'templatation' ); ?>
 </p>
 <?php
}

/**
 * top level menu
 */
function temptt_thm_demo_page() {
 // add top level menu page
 add_menu_page(
 'Welcome To Theme Demo Data Install',
 'Theme Demo Install',
 'manage_options',
 'templatation_data',
 'temptt_thm_demo_page_html'
 );
}

/**
 * register our temptt_thm_demo_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'temptt_thm_demo_page' );

/**
 * top level menu:
 * callback functions
 */
function temptt_thm_demo_page_html() {
 // check user capabilities
 if ( ! current_user_can( 'manage_options' ) ) {
 return;
 }

 // add error/update messages

 // check if the user have submitted the settings
 // wordpress will add the "settings-updated" $_GET parameter to the url
 if ( isset( $_GET['settings-updated'] ) ) {
 // add settings saved message with the class of "updated"
 add_settings_error( 'templatation_messages', 'templatation_message', __( 'Settings Saved', 'templatation' ), 'updated' );
 }

 // show error/update messages
 settings_errors( 'templatation_messages' );
 ?>
 <div class="wrap">
 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 <form action="options.php" method="post">
 <?php
 // output security fields for the registered setting "templatation"
 settings_fields( 'templatation_data' );
 // output setting sections and their fields
 // (sections are registered for "templatation", each field is registered to a specific section)
 do_settings_sections( 'templatation_data' );
 // output save settings button
 submit_button( 'Save Settings' );
 ?>
 </form>
 </div>
 <?php
}