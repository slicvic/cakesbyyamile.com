<?php
/**
 * OCDI support.
 *
 * @package Blogger Buzz
 */

// Disable PT branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * OCDI after import.
 *
 * @since 1.0.0
 */
function bloggerbuzzocdi_after_import() {

    // Assign navigation menu locations.
    $menu_location_details = array(
        'menu-1'  => 'Main Menu'
    );

    if ( ! empty( $menu_location_details ) ) {
        $navigation_settings = array();
        $current_navigation_menus = wp_get_nav_menus();
        if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
            foreach ( $current_navigation_menus as $menu ) {
                foreach ( $menu_location_details as $location => $menu_slug ) {
                    if ( $menu->slug === $menu_slug ) {
                        $navigation_settings[ $location ] = $menu->term_id;
                    }
                }
            }
        }

        set_theme_mod( 'nav_menu_locations', $navigation_settings );
    }
}
add_action( 'pt-ocdi/after_import', 'bloggerbuzzocdi_after_import' );


/**
 * Demo export/import
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package CoverNews
 */
if (!function_exists('bloggerbuzzocdi_files')) :
    /**
     * OCDI files.
     *
     * @since 1.0.0
     *
     * @return array Files.
     */
    function bloggerbuzzocdi_files() {

        return apply_filters( 'bloggerbuzzdemo_import_files', array(
            
            array(
                'import_file_name'             => esc_html__( 'Blogger Buzz Demo', 'blogger-buzz' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'welcome/demo-data/bloggerbuzz.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'welcome/demo-data/bloggerbuzz.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'welcome/demo-data/bloggerbuzz.dat',
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/bloggerbuzz.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/bloggerbuzz/',
            ),

            array(
                'import_file_name'             => esc_html__( 'Upgrade Premium', 'blogger-buzz' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/bloggerbuzzpro.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/bloggerbuzzpro/',
            ),

            array(
                'import_file_name'             => esc_html__( 'Upgrade Premium', 'blogger-buzz' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/bloggerbuzzpro-three.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/bloggerbuzzpro/sample-v1/',
            ),

            array(
                'import_file_name'             => esc_html__( 'Upgrade Premium', 'blogger-buzz' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/bloggerbuzzpro-two.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/bloggerbuzzpro/sample-v2/',
            ),

            array(
                'import_file_name'             => esc_html__( 'Upgrade Premium', 'blogger-buzz' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/bloggerbuzzpro-four.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/bloggerbuzzpro/sample-v3/',
            ),

            array(
                'import_file_name'             => esc_html__( 'Upgrade Premium', 'blogger-buzz' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/bloggerbuzzpro-five.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/bloggerbuzzpro/sample-v4/',
            )

        ));
    }
endif;
add_filter( 'pt-ocdi/import_files', 'bloggerbuzzocdi_files');