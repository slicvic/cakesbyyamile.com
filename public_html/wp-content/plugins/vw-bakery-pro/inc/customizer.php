<?php
/**
 * vw-bakery-pro Plugin Customizer
 *
 * @package vw-bakery-pro
 */
/**
 * Loads custom control for layout settings
 */
function vw_bakery_pro_custom_controls() {
    require_once VW_BAKERY_PRO_PLUGIN_PATH . 'inc/admin/customize-texteditor-control.php';

    // Inlcude the Alpha Color Picker control file.

    require_once VW_BAKERY_PRO_PLUGIN_PATH.'/inc/custom-controls.php';
    require_once VW_BAKERY_PRO_PLUGIN_PATH.'/inc/button-controls.php';
    
    require_once VW_BAKERY_PRO_PLUGIN_PATH.'/inc/alpha-color-picker.php';
    

}
add_action( 'customize_register', 'vw_bakery_pro_custom_controls' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_bakery_pro_customize_register( $wp_customize ) {
    
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.logo a',
        'render_callback' => 'twentyfifteen_customize_partial_blogname',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'twentyfifteen_customize_partial_blogdescription',
    ) );

    $wp_customize->add_setting('vw_bakery_pro_display_title',array(
        'default' => 'false',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_display_title',array(
        'type' => 'checkbox',
        'label' => __('Show Title','vw-bakery-pro'),
        'section' => 'title_tagline',
    ));
    $wp_customize->add_setting('vw_bakery_pro_display_tagline',array(
        'default' => 'false',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_display_tagline',array(
        'type' => 'checkbox',
        'label' => __('Show Tagline','vw-bakery-pro'),
        'section' => 'title_tagline',
    ));

    //add home page setting pannel
    $wp_customize->add_panel( 'vw_bakery_pro_panel_id', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Plugin Settings', 'vw-bakery-pro' ),
        'description' => __( 'Description of what this panel does.', 'vw-bakery-pro' ),
    ) );
    $font_array = array(
        '' => __( 'No Fonts', 'vw-bakery-pro' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-bakery-pro' ),
        'Acme' => __( 'Acme', 'vw-bakery-pro' ),
        'Anton' => __( 'Anton', 'vw-bakery-pro' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-bakery-pro' ),
        'Arimo' => __( 'Arimo', 'vw-bakery-pro' ),
        'Arsenal' => __( 'Arsenal', 'vw-bakery-pro' ),
        'Arvo' => __( 'Arvo', 'vw-bakery-pro' ),
        'Alegreya' => __( 'Alegreya', 'vw-bakery-pro' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-bakery-pro' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-bakery-pro' ),
        'Bangers' => __( 'Bangers', 'vw-bakery-pro' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-bakery-pro' ),
        'Bad Script' => __( 'Bad Script', 'vw-bakery-pro' ),
        'Bitter' => __( 'Bitter', 'vw-bakery-pro' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-bakery-pro' ),
        'BenchNine' => __( 'BenchNine', 'vw-bakery-pro' ),
        'Cabin' => __( 'Cabin', 'vw-bakery-pro' ),
        'Cardo' => __( 'Cardo', 'vw-bakery-pro' ),
        'Courgette' => __( 'Courgette', 'vw-bakery-pro' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-bakery-pro' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-bakery-pro' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-bakery-pro' ),
        'Cuprum' => __( 'Cuprum', 'vw-bakery-pro' ),
        'Cookie' => __( 'Cookie', 'vw-bakery-pro' ),
        'Chewy' => __( 'Chewy', 'vw-bakery-pro' ),
        'Days One' => __( 'Days One', 'vw-bakery-pro' ),
        'Dosis' => __( 'Dosis', 'vw-bakery-pro' ),
        'Economica' => __( 'Economica', 'vw-bakery-pro' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-bakery-pro' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-bakery-pro' ),
        'Francois One' => __( 'Francois One', 'vw-bakery-pro' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-bakery-pro' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-bakery-pro' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-bakery-pro' ),
        'Handlee' => __( 'Handlee', 'vw-bakery-pro' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-bakery-pro' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-bakery-pro' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-bakery-pro' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-bakery-pro' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-bakery-pro' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-bakery-pro' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-bakery-pro' ),
        'Kanit' => __( 'Kanit', 'vw-bakery-pro' ),
        'Lobster' => __( 'Lobster', 'vw-bakery-pro' ),
        'Lato' => __( 'Lato', 'vw-bakery-pro' ),
        'Lora' => __( 'Lora', 'vw-bakery-pro' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-bakery-pro' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-bakery-pro' ),
        'Merriweather' => __( 'Merriweather', 'vw-bakery-pro' ),
        'Monda' => __( 'Monda', 'vw-bakery-pro' ),
        'Montserrat' => __( 'Montserrat', 'vw-bakery-pro' ),
        'Muli' => __( 'Muli', 'vw-bakery-pro' ),
        'Marck Script' => __( 'Marck Script', 'vw-bakery-pro' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-bakery-pro' ),
        'Open Sans' => __( 'Open Sans', 'vw-bakery-pro' ),
        'Overpass' => __( 'Overpass', 'vw-bakery-pro' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-bakery-pro' ),
        'Oxygen' => __( 'Oxygen', 'vw-bakery-pro' ),
        'Orbitron' => __( 'Orbitron', 'vw-bakery-pro' ),
        'Patua One' => __( 'Patua One', 'vw-bakery-pro' ),
        'Pacifico' => __( 'Pacifico', 'vw-bakery-pro' ),
        'Padauk' => __( 'Padauk', 'vw-bakery-pro' ),
        'Playball' => __( 'Playball', 'vw-bakery-pro' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-bakery-pro' ),
        'PT Sans' => __( 'PT Sans', 'vw-bakery-pro' ),
        'Philosopher' => __( 'Philosopher', 'vw-bakery-pro' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-bakery-pro' ),
        'Poiret One' => __( 'Poiret One', 'vw-bakery-pro' ),
        'Quicksand' => __( 'Quicksand', 'vw-bakery-pro' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-bakery-pro' ),
        'Raleway' => __( 'Raleway', 'vw-bakery-pro' ),
        'Rubik' => __( 'Rubik', 'vw-bakery-pro' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-bakery-pro' ),
        'Russo One' => __( 'Russo One', 'vw-bakery-pro' ),
        'Righteous' => __( 'Righteous', 'vw-bakery-pro' ),
        'Slabo' => __( 'Slabo', 'vw-bakery-pro' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-bakery-pro' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-bakery-pro'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-bakery-pro' ),
        'Sacramento' => __( 'Sacramento', 'vw-bakery-pro' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-bakery-pro' ),
        'Tangerine' => __( 'Tangerine', 'vw-bakery-pro' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-bakery-pro' ),
        'VT323' => __( 'VT323', 'vw-bakery-pro' ),
        'Varela Round' => __( 'Varela Round', 'vw-bakery-pro' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-bakery-pro' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-bakery-pro' ),
        'Volkhov' => __( 'Volkhov', 'vw-bakery-pro' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-bakery-pro' )
    );
    require_once VW_BAKERY_PRO_PLUGIN_PATH . 'inc/custom-controls.php';
    //general Settings
    require_once VW_BAKERY_PRO_PLUGIN_PATH . 'inc/customizer-seperator/class/customizer-seperator.php';

    require_once VW_BAKERY_PRO_PLUGIN_PATH . 'inc/customize-repeater/customize-repeater.php';
    
    require_once VW_BAKERY_PRO_PLUGIN_PATH . 'inc/customizer-custom-variables.php';
    //Top bar
    require_once VW_BAKERY_PRO_PLUGIN_PATH . 'inc/customizer-part-topbar-header.php';
    //Slider
    require_once VW_BAKERY_PRO_PLUGIN_PATH . 'inc/customizer-part-slide.php';
    //Home page sections
    require_once VW_BAKERY_PRO_PLUGIN_PATH . 'inc/customizer-part-home.php';
    // Social icons
    require_once VW_BAKERY_PRO_PLUGIN_PATH . 'inc/customizer-part-social-icons.php';
    //Footer
    require_once VW_BAKERY_PRO_PLUGIN_PATH . 'inc/customizer-part-footer.php';

}
add_action( 'customize_register', 'vw_bakery_pro_customize_register' );
//Integer
function vw_bakery_pro_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_bakery_pro_customize {
    /**
     * Returns the instance.
     *
     * @since  1.0.0
     * @access public
     * @return object
     */
    public static function get_instance() {
        static $instance = null;
        if ( is_null( $instance ) ) {
            $instance = new self;
            $instance->setup_actions();
        }
        return $instance;
    }
    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function __construct() {}
    /**
     * Sets up initial actions.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setup_actions() {
        // Register panels, sections, settings, controls, and partials.
        add_action( 'customize_register', array( $this, 'sections' ) );
        add_action( 'customize_register', array( $this, 'mobileApp' ) );
        // Register scripts and styles for the controls.
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
    }
    /**
     * Sets up the customizer sections.
     *
     * @since  1.0.0
     * @access public
     * @param  object  $manager
     * @return void
     */
    public function sections( $manager ) {
        // Load custom sections.
        require_once VW_BAKERY_PRO_EXT_DIR. 'inc/review-section.php';
        // Register custom section types.
        $manager->register_section_type( 'vw_bakery_pro_customize_reviews_and_testimonials' );
        // Register sections.
        $manager->add_section(
            new vw_bakery_pro_customize_reviews_and_testimonials(
                $manager,
                'bakery_pro_example_11',
                array(
                    'title'    => esc_html__( 'Review & Testimonial', 'vw-bakery-pro' ),
                    'reviews_and_testimonials_text' => esc_html__( 'Rate Us', 'vw-bakery-pro' ),
                    'reviews_and_testimonials_url'  => 'https://www.vwthemes.com/topic/reviews-and-testimonials/',
                    'priority'   => 1,
                )
            )
        );
    }
    public function mobileApp( $manager ) {
        // Load custom sections.
        require_once VW_BAKERY_PRO_EXT_DIR. 'inc/review-section.php';
        // Register custom section types.
        $manager->register_section_type( 'vw_bakery_pro_customize_reviews_and_testimonials' );
        // Register sections.
        $manager->add_section(
            new vw_bakery_pro_customize_reviews_and_testimonials(
                $manager,
                'bakery_pro_example_12',
                array(
                    'title'    => esc_html__( 'WooCommerce App', 'vw-bakery-pro' ),
                    'reviews_and_testimonials_text' => esc_html__( 'Buy Now', 'vw-bakery-pro' ),
                    'reviews_and_testimonials_url'  => 'https://www.vwthemes.com/premium-plugin/vw-woocommerce-mobile-app/',
                    'priority'   => 2,
                )
            )
        );
    }
   

    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts() {
         wp_enqueue_script( 'vw-bakery-pro-customize-controls', VW_BAKERY_PRO_EXT_URI. '/assets/js/customize-controls.js');

        wp_enqueue_style( 'vw-bakery-pro-customize-controls', VW_BAKERY_PRO_EXT_URI. '/assets/css/customize-controls.css');
    }
}
// Doing this customizer thang!
vw_bakery_pro_customize::get_instance();