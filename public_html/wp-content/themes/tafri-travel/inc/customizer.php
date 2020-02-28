<?php
/**
 * Tafri Travel Theme Customizer
 *
 * @package tafri-travel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tafri_travel_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('tafri_travel_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'tafri-travel'),
		'description'    => __('Description of what this panel does.', 'tafri-travel'),
	));	

	// font array
	$font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );
    
	//Typography
	$wp_customize->add_section( 'tafri_travel_typography', array(
    	'title'      => __( 'Color / Fonts Settings', 'tafri-travel' ),
		'priority'   => 30,
		'panel' => 'tafri_travel_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'tafri_travel_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tafri_travel_paragraph_color', array(
		'label' => __('Paragraph Color', 'tafri-travel'),
		'section' => 'tafri_travel_typography',
		'settings' => 'tafri_travel_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('tafri_travel_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tafri_travel_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tafri_travel_paragraph_font_family', array(
	    'section'  => 'tafri_travel_typography',
	    'label'    => __( 'Paragraph Fonts','tafri-travel'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('tafri_travel_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tafri_travel_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','tafri-travel'),
		'section'	=> 'tafri_travel_typography',
		'setting'	=> 'tafri_travel_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'tafri_travel_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tafri_travel_atag_color', array(
		'label' => __('"a" Tag Color', 'tafri-travel'),
		'section' => 'tafri_travel_typography',
		'settings' => 'tafri_travel_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('tafri_travel_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tafri_travel_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tafri_travel_atag_font_family', array(
	    'section'  => 'tafri_travel_typography',
	    'label'    => __( '"a" Tag Fonts','tafri-travel'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'tafri_travel_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tafri_travel_li_color', array(
		'label' => __('"li" Tag Color', 'tafri-travel'),
		'section' => 'tafri_travel_typography',
		'settings' => 'tafri_travel_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('tafri_travel_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tafri_travel_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tafri_travel_li_font_family', array(
	    'section'  => 'tafri_travel_typography',
	    'label'    => __( '"li" Tag Fonts','tafri-travel'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'tafri_travel_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tafri_travel_h1_color', array(
		'label' => __('H1 Color', 'tafri-travel'),
		'section' => 'tafri_travel_typography',
		'settings' => 'tafri_travel_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('tafri_travel_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tafri_travel_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tafri_travel_h1_font_family', array(
	    'section'  => 'tafri_travel_typography',
	    'label'    => __( 'H1 Fonts','tafri-travel'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('tafri_travel_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tafri_travel_h1_font_size',array(
		'label'	=> __('H1 Font Size','tafri-travel'),
		'section'	=> 'tafri_travel_typography',
		'setting'	=> 'tafri_travel_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'tafri_travel_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tafri_travel_h2_color', array(
		'label' => __('h2 Color', 'tafri-travel'),
		'section' => 'tafri_travel_typography',
		'settings' => 'tafri_travel_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('tafri_travel_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tafri_travel_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tafri_travel_h2_font_family', array(
	    'section'  => 'tafri_travel_typography',
	    'label'    => __( 'h2 Fonts','tafri-travel'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('tafri_travel_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tafri_travel_h2_font_size',array(
		'label'	=> __('h2 Font Size','tafri-travel'),
		'section'	=> 'tafri_travel_typography',
		'setting'	=> 'tafri_travel_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'tafri_travel_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tafri_travel_h3_color', array(
		'label' => __('h3 Color', 'tafri-travel'),
		'section' => 'tafri_travel_typography',
		'settings' => 'tafri_travel_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('tafri_travel_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tafri_travel_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tafri_travel_h3_font_family', array(
	    'section'  => 'tafri_travel_typography',
	    'label'    => __( 'h3 Fonts','tafri-travel'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('tafri_travel_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tafri_travel_h3_font_size',array(
		'label'	=> __('h3 Font Size','tafri-travel'),
		'section'	=> 'tafri_travel_typography',
		'setting'	=> 'tafri_travel_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'tafri_travel_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tafri_travel_h4_color', array(
		'label' => __('h4 Color', 'tafri-travel'),
		'section' => 'tafri_travel_typography',
		'settings' => 'tafri_travel_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('tafri_travel_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tafri_travel_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tafri_travel_h4_font_family', array(
	    'section'  => 'tafri_travel_typography',
	    'label'    => __( 'h4 Fonts','tafri-travel'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('tafri_travel_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tafri_travel_h4_font_size',array(
		'label'	=> __('h4 Font Size','tafri-travel'),
		'section'	=> 'tafri_travel_typography',
		'setting'	=> 'tafri_travel_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'tafri_travel_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tafri_travel_h5_color', array(
		'label' => __('h5 Color', 'tafri-travel'),
		'section' => 'tafri_travel_typography',
		'settings' => 'tafri_travel_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('tafri_travel_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tafri_travel_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tafri_travel_h5_font_family', array(
	    'section'  => 'tafri_travel_typography',
	    'label'    => __( 'h5 Fonts','tafri-travel'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('tafri_travel_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tafri_travel_h5_font_size',array(
		'label'	=> __('h5 Font Size','tafri-travel'),
		'section'	=> 'tafri_travel_typography',
		'setting'	=> 'tafri_travel_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'tafri_travel_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tafri_travel_h6_color', array(
		'label' => __('h6 Color', 'tafri-travel'),
		'section' => 'tafri_travel_typography',
		'settings' => 'tafri_travel_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('tafri_travel_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tafri_travel_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tafri_travel_h6_font_family', array(
	    'section'  => 'tafri_travel_typography',
	    'label'    => __( 'h6 Fonts','tafri-travel'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('tafri_travel_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tafri_travel_h6_font_size',array(
		'label'	=> __('h6 Font Size','tafri-travel'),
		'section'	=> 'tafri_travel_typography',
		'setting'	=> 'tafri_travel_h6_font_size',
		'type'	=> 'text'
	));
	
	// Add the Theme Color Option section.
	$wp_customize->add_section( 'tafri_travel_theme_color_option', array( 
		'panel' => 'tafri_travel_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'tafri-travel' 
	) )	);

  	$wp_customize->add_setting( 'tafri_travel_theme_color', array(
	    'default' => '#26bdf7',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tafri_travel_theme_color', array(
  		'label' => __('Color Option','tafri-travel'),
	    'description' => __('One can change complete theme color on just one click.', 'tafri-travel'),
	    'section' => 'tafri_travel_theme_color_option',
	    'settings' => 'tafri_travel_theme_color',
  	)));

	//Top Bar
	$wp_customize->add_section('tafri_travel_topbar',array(
		'title'	=> __('Topbar Section','tafri-travel'),
		'description'	=> __('Add topbar content','tafri-travel'),
		'priority'	=> null,
		'panel' => 'tafri_travel_panel_id',
	));

	$wp_customize->add_setting('tafri_travel_timing',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('tafri_travel_timing',array(
		'label'	=> __('Timing','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tafri_travel_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tafri_travel_facebook_url',array(
		'label'	=> __('Add Facebook link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tafri_travel_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tafri_travel_twitter_url',array(
		'label'	=> __('Add Twitter link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tafri_travel_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tafri_travel_insta_url',array(
		'label'	=> __('Add Instagram link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tafri_travel_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('tafri_travel_linkedin_url',array(
		'label'	=> __('Add Linkedin link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tafri_travel_pintrest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('tafri_travel_pintrest_url',array(
		'label'	=> __('Add Pintrest link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_pintrest_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tafri_travel_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('tafri_travel_youtube_url',array(
		'label'	=> __('Add Youtube link','tafri-travel'),
		'section'	=> 'tafri_travel_topbar',
		'setting'	=> 'tafri_travel_youtube_url',
		'type'	=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'tafri_travel_slider' , array(
    	'title'      => __( 'Slider Settings', 'tafri-travel' ),
		'priority'   => null,
		'panel' => 'tafri_travel_panel_id'
	) );

	$wp_customize->add_setting('tafri_travel_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tafri_travel_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','tafri-travel'),
       'section' => 'tafri_travel_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'tafri_travel_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'tafri_travel_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'tafri_travel_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'tafri-travel' ),
			'description'	=> __('Size of image should be 1600 x 633','tafri-travel'),
			'section'  => 'tafri_travel_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Destination Section
	$wp_customize->add_section('tafri_travel_category',array(
		'title'	=> __('Destination Section','tafri-travel'),
		'description'	=> __('Add  section below.','tafri-travel'),
		'panel' => 'tafri_travel_panel_id',
	));

	$wp_customize->add_setting('tafri_travel_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('tafri_travel_title',array(
	    'label' => __('Section Title','tafri-travel'),
	    'section' => 'tafri_travel_category',
	    'type'  => 'text'
   	));

   	$wp_customize->add_setting('tafri_travel_desc',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('tafri_travel_desc',array(
	    'label' => __('Section short description','tafri-travel'),
	    'section' => 'tafri_travel_category',
	    'type'  => 'text'
   	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('tafri_travel_popular_destination',array(
		'default'	=> 'select',
		'sanitize_callback' => 'tafri_travel_sanitize_choices',
	));	
	$wp_customize->add_control('tafri_travel_popular_destination',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','tafri-travel'),
		'description'	=> __('Size of image should be 300 x 300','tafri-travel'),
		'section' => 'tafri_travel_category',
	));

	//footer
	$wp_customize->add_section('tafri_travel_footer_section', array(
		'title'       => __('Footer Text', 'tafri-travel'),
		'description' => __('Add some text for footer like copyright etc.', 'tafri-travel'),
		'priority'    => null,
		'panel'       => 'tafri_travel_panel_id',
	));

	$wp_customize->add_setting('tafri_travel_footer_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('tafri_travel_footer_text', array(
		'label'   => __('Copyright Text', 'tafri-travel'),
		'section' => 'tafri_travel_footer_section',
		'type'    => 'text',
	));

	//Layouts
	$wp_customize->add_section('tafri_travel_left_right', array(
		'title'    => __('Sidebar Layout Settings', 'tafri-travel'),
		'priority' => null,
		'panel'    => 'tafri_travel_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('tafri_travel_layout_options', array(
		'default'           => __('Right Sidebar', 'tafri-travel'),
		'sanitize_callback' => 'tafri_travel_sanitize_choices',
	));
	$wp_customize->add_control('tafri_travel_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'tafri-travel'),
		'section'        => 'tafri_travel_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'tafri-travel'),
			'Right Sidebar' => __('Right Sidebar', 'tafri-travel'),
			'One Column'    => __('One Column', 'tafri-travel'),
			'Grid Layout'   => __('Grid Layout', 'tafri-travel')
		),
	));
}
add_action('customize_register', 'tafri_travel_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Tafri_Travel_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
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
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the contafri_travel_Customizetrols.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Tafri_Travel_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Tafri_Travel_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Travel Pro Theme', 'tafri-travel'),
					'pro_text' => esc_html__('Go Pro', 'tafri-travel'),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/wordpress-travel-theme/'),
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

		wp_enqueue_script('tafri-travel-customize-controls', trailingslashit(get_template_directory_uri()).'/assets/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('tafri-travel-customize-controls', trailingslashit(get_template_directory_uri()).'assets/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Tafri_Travel_Customize::get_instance();