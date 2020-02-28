<?php
/**
 * VW Bakery Theme Customizer
 *
 * @package VW Bakery
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_bakery_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_bakery_custom_controls' );

function vw_bakery_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_bakery_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-bakery' ),
	    'description' => __( 'Description of what this panel does.', 'vw-bakery' ),
	) );

	$wp_customize->add_section( 'vw_bakery_left_right', array(
    	'title'      => __( 'General Settings', 'vw-bakery' ),
		'priority'   => null,
		'panel' => 'vw_bakery_panel_id'
	) );

	$wp_customize->add_setting('vw_bakery_width_option',array(
        'default' => __('Full Width','vw-bakery'),
        'sanitize_callback' => 'vw_bakery_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Bakery_Image_Radio_Control($wp_customize, 'vw_bakery_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-bakery'),
        'description' => __('Here you can change the width layout of Website.','vw-bakery'),
        'section' => 'vw_bakery_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_bakery_theme_options',array(
        'default' => __('Right Sidebar','vw-bakery'),
        'sanitize_callback' => 'vw_bakery_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_bakery_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-bakery'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-bakery'),
        'section' => 'vw_bakery_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-bakery'),
            'Right Sidebar' => __('Right Sidebar','vw-bakery'),
            'One Column' => __('One Column','vw-bakery'),
            'Three Columns' => __('Three Columns','vw-bakery'),
            'Four Columns' => __('Four Columns','vw-bakery'),
            'Grid Layout' => __('Grid Layout','vw-bakery')
        ),
	));

	$wp_customize->add_setting('vw_bakery_page_layout',array(
        'default' => __('One Column','vw-bakery'),
        'sanitize_callback' => 'vw_bakery_sanitize_choices'
	));
	$wp_customize->add_control('vw_bakery_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-bakery'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-bakery'),
        'section' => 'vw_bakery_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-bakery'),
            'Right Sidebar' => __('Right Sidebar','vw-bakery'),
            'One Column' => __('One Column','vw-bakery')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_bakery_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-bakery' ),
		'section' => 'vw_bakery_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_bakery_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-bakery' ),
		'section' => 'vw_bakery_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_bakery_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-bakery' ),
        'section' => 'vw_bakery_left_right'
    )));

	$wp_customize->add_setting('vw_bakery_loader_icon',array(
        'default' => __('Two Way','vw-bakery'),
        'sanitize_callback' => 'vw_bakery_sanitize_choices'
	));
	$wp_customize->add_control('vw_bakery_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-bakery'),
        'section' => 'vw_bakery_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-bakery'),
            'Dots' => __('Dots','vw-bakery'),
            'Rotate' => __('Rotate','vw-bakery')
        ),
	) );

	//Contact us
	$wp_customize->add_section('vw_bakery_topbar',array(
		'title'	=> __('Contact Section','vw-bakery'),
		'description'=> __('This section will appear in the topbar and below slider','vw-bakery'),
		'panel' => 'vw_bakery_panel_id',
	));	

	$wp_customize->add_setting( 'vw_bakery_topbar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_topbar_hide_show',array(
		'label' => esc_html__( 'Show / Hide Topbar','vw-bakery' ),
		'section' => 'vw_bakery_topbar'
    )));

    $wp_customize->add_setting('vw_bakery_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-bakery'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-bakery'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-bakery' ),
        ),
		'section'=> 'vw_bakery_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_bakery_sticky_header',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-bakery' ),
        'section' => 'vw_bakery_topbar'
    )));

    $wp_customize->add_setting( 'vw_bakery_search_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_search_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Search','vw-bakery' ),
          'section' => 'vw_bakery_topbar'
    )));

    $wp_customize->add_setting('vw_bakery_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_search_font_size',array(
		'label'	=> __('Search Font Size','vw-bakery'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-bakery'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-bakery' ),
        ),
		'section'=> 'vw_bakery_topbar',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_bakery_location_address_icon',array(
		'default'	=> 'fas fa-location-arrow',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Bakery_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_bakery_location_address_icon',array(
		'label'	=> __('Add Location Icon','vw-bakery'),
		'transport' => 'refresh',
		'section'	=> 'vw_bakery_topbar',
		'setting'	=> 'vw_bakery_location_address_icon',
		'type'		=> 'icon'
	)));
	
	$wp_customize->add_setting('vw_bakery_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_bakery_location',array(
		'label'	=> __('Location','vw-bakery'),
		'section'=> 'vw_bakery_topbar',
		'setting'=> 'vw_bakery_location',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_timing_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Bakery_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_bakery_timing_icon',array(
		'label'	=> __('Add Timing Icon','vw-bakery'),
		'transport' => 'refresh',
		'section'	=> 'vw_bakery_topbar',
		'setting'	=> 'vw_bakery_timing_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_bakery_opening_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_bakery_opening_text',array(
		'label'	=> __('Opening Time Text','vw-bakery'),
		'section'=> 'vw_bakery_topbar',
		'setting'=> 'vw_bakery_opening_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_opening_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_bakery_opening_time',array(
		'label'	=> __('Opening Time','vw-bakery'),
		'section'=> 'vw_bakery_topbar',
		'setting'=> 'vw_bakery_opening_time',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Bakery_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_bakery_phone_icon',array(
		'label'	=> __('Add Call Icon','vw-bakery'),
		'transport' => 'refresh',
		'section'	=> 'vw_bakery_topbar',
		'setting'	=> 'vw_bakery_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_bakery_call_us',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_bakery_call_us',array(
		'label'	=> __('Phone no. Text','vw-bakery'),
		'section'=> 'vw_bakery_topbar',
		'setting'=> 'vw_bakery_call_us',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_call_no',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_bakery_call_no',array(
		'label'	=> __('Phone Number','vw-bakery'),
		'section'=> 'vw_bakery_topbar',
		'setting'=> 'vw_bakery_call_no',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_email_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Bakery_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_bakery_email_icon',array(
		'label'	=> __('Add Email Icon','vw-bakery'),
		'transport' => 'refresh',
		'section'	=> 'vw_bakery_topbar',
		'setting'	=> 'vw_bakery_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_bakery_email_us',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_bakery_email_us',array(
		'label'	=> __('Email Text','vw-bakery'),
		'section'=> 'vw_bakery_topbar',
		'setting'=> 'vw_bakery_email_us',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_bakery_email_address',array(
		'label'	=> __('Email Address','vw-bakery'),
		'section'=> 'vw_bakery_topbar',
		'setting'=> 'vw_bakery_email_address',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_contact_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_bakery_contact_link',array(
		'label'	=> __('Contact Link','vw-bakery'),
		'section'=> 'vw_bakery_topbar',
		'setting'=> 'vw_bakery_contact_link',
		'type'=> 'url'
	));

	$wp_customize->add_setting('vw_bakery_cart_icon',array(
		'default'	=> 'fas fa-shopping-cart',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Bakery_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_bakery_cart_icon',array(
		'label'	=> __('Add Cart Icon','vw-bakery'),
		'transport' => 'refresh',
		'section'	=> 'vw_bakery_topbar',
		'setting'	=> 'vw_bakery_cart_icon',
		'type'		=> 'icon'
	)));

	//Slider
	$wp_customize->add_section( 'vw_bakery_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-bakery' ),
		'priority'   => null,
		'panel' => 'vw_bakery_panel_id'
	) );

	$wp_customize->add_setting( 'vw_bakery_slider_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_slider_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Slider','vw-bakery' ),
          'section' => 'vw_bakery_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_bakery_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_bakery_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_bakery_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-bakery' ),
			'description' => __('Slider image size (1500 x 600)','vw-bakery'),
			'section'  => 'vw_bakery_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('vw_bakery_slider_content_option',array(
        'default' => __('Center','vw-bakery'),
        'sanitize_callback' => 'vw_bakery_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Bakery_Image_Radio_Control($wp_customize, 'vw_bakery_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-bakery'),
        'section' => 'vw_bakery_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_bakery_slider_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_bakery_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-bakery' ),
		'section'     => 'vw_bakery_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_bakery_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_bakery_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_bakery_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_bakery_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-bakery' ),
	'section'     => 'vw_bakery_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_bakery_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-bakery'),
      '0.1' =>  esc_attr('0.1','vw-bakery'),
      '0.2' =>  esc_attr('0.2','vw-bakery'),
      '0.3' =>  esc_attr('0.3','vw-bakery'),
      '0.4' =>  esc_attr('0.4','vw-bakery'),
      '0.5' =>  esc_attr('0.5','vw-bakery'),
      '0.6' =>  esc_attr('0.6','vw-bakery'),
      '0.7' =>  esc_attr('0.7','vw-bakery'),
      '0.8' =>  esc_attr('0.8','vw-bakery'),
      '0.9' =>  esc_attr('0.9','vw-bakery')
	),
	));

	//Bakery Products
	$wp_customize->add_section( 'vw_bakery_product_section' , array(
    	'title'      => __( 'Bakery products', 'vw-bakery' ),
		'priority'   => null,
		'panel' => 'vw_bakery_panel_id'
	) );

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'vw_bakery_product_settings', array(
		'default'           => '',
		'sanitize_callback' => 'vw_bakery_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_bakery_product_settings', array(
		'label'    => __( 'Select Product Page', 'vw-bakery' ),
		'section'  => 'vw_bakery_product_section',
		'type'     => 'dropdown-pages'
	) );	

	//Blog Post
	$wp_customize->add_section('vw_bakery_blog_post',array(
		'title'	=> __('Blog Post Settings','vw-bakery'),
		'panel' => 'vw_bakery_panel_id',
	));	

	$wp_customize->add_setting( 'vw_bakery_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-bakery' ),
        'section' => 'vw_bakery_blog_post'
    )));

    $wp_customize->add_setting( 'vw_bakery_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_toggle_author',array(
		'label' => esc_html__( 'Author','vw-bakery' ),
		'section' => 'vw_bakery_blog_post'
    )));

    $wp_customize->add_setting( 'vw_bakery_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-bakery' ),
		'section' => 'vw_bakery_blog_post'
    )));

    $wp_customize->add_setting( 'vw_bakery_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_bakery_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-bakery' ),
		'section'     => 'vw_bakery_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_bakery_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_bakery_blog_layout_option',array(
        'default' => __('Default','vw-bakery'),
        'sanitize_callback' => 'vw_bakery_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Bakery_Image_Radio_Control($wp_customize, 'vw_bakery_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-bakery'),
        'section' => 'vw_bakery_blog_post',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

	// Button Settings
	$wp_customize->add_section( 'vw_bakery_button_settings', array(
		'title' => esc_html__( 'Button Settings','vw-bakery'),
		'panel' => 'vw_bakery_panel_id',
	));

	$wp_customize->add_setting( 'vw_bakery_button_border',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_button_border',array(
        'label' => esc_html__( 'Button Border','vw-bakery' ),
        'section' => 'vw_bakery_button_settings'
    )));

	$wp_customize->add_setting('vw_bakery_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-bakery'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-bakery'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-bakery' ),
        ),
		'section'=> 'vw_bakery_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-bakery'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-bakery'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-bakery' ),
        ),
		'section'=> 'vw_bakery_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_bakery_button_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_bakery_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-bakery' ),
		'section'     => 'vw_bakery_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('vw_bakery_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_button_text',array(
		'label'	=> __('Add Button Text','vw-bakery'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-bakery' ),
        ),
		'section'=> 'vw_bakery_button_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_bakery_404_page',array(
		'title'	=> __('404 Page Settings','vw-bakery'),
		'panel' => 'vw_bakery_panel_id',
	));	

	$wp_customize->add_setting('vw_bakery_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_bakery_404_page_title',array(
		'label'	=> __('Add Title','vw-bakery'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-bakery' ),
        ),
		'section'=> 'vw_bakery_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_bakery_404_page_content',array(
		'label'	=> __('Add Text','vw-bakery'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-bakery' ),
        ),
		'section'=> 'vw_bakery_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-bakery'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-bakery' ),
        ),
		'section'=> 'vw_bakery_404_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_bakery_responsive_media',array(
		'title'	=> __('Responsive Media','vw-bakery'),
		'panel' => 'vw_bakery_panel_id',
	));

	$wp_customize->add_setting( 'vw_bakery_resp_topbar_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_resp_topbar_hide_show',array(
          'label' => esc_html__( 'Show / Hide Topbar','vw-bakery' ),
          'section' => 'vw_bakery_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_bakery_stickyheader_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_stickyheader_hide_show',array(
          'label' => esc_html__( 'Sticky Header','vw-bakery' ),
          'section' => 'vw_bakery_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_bakery_resp_slider_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_resp_slider_hide_show',array(
          'label' => esc_html__( 'Show / Hide Slider','vw-bakery' ),
          'section' => 'vw_bakery_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_bakery_metabox_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_metabox_hide_show',array(
          'label' => esc_html__( 'Show / Hide Metabox','vw-bakery' ),
          'section' => 'vw_bakery_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_bakery_sidebar_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_sidebar_hide_show',array(
          'label' => esc_html__( 'Show / Hide Sidebar','vw-bakery' ),
          'section' => 'vw_bakery_responsive_media'
    )));

    $wp_customize->add_setting('vw_bakery_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Bakery_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_bakery_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-bakery'),
		'transport' => 'refresh',
		'section'	=> 'vw_bakery_responsive_media',
		'setting'	=> 'vw_bakery_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_bakery_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Bakery_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_bakery_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-bakery'),
		'transport' => 'refresh',
		'section'	=> 'vw_bakery_responsive_media',
		'setting'	=> 'vw_bakery_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_bakery_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-bakery' ),
		'priority' => null,
		'panel' => 'vw_bakery_panel_id'
	) );

	$wp_customize->add_setting('vw_bakery_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Bakery_Content_Creation( $wp_customize, 'vw_bakery_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-bakery' ),
		),
		'section' => 'vw_bakery_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-bakery' ),
	) ) );
	
	//Footer Text
	$wp_customize->add_section('vw_bakery_footer',array(
		'title'	=> __('Footer','vw-bakery'),
		'description'=> __('This section will appear in the footer','vw-bakery'),
		'panel' => 'vw_bakery_panel_id',
	));	
	
	$wp_customize->add_setting('vw_bakery_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_bakery_footer_text',array(
		'label'	=> __('Copyright Text','vw-bakery'),
		'section'=> 'vw_bakery_footer',
		'setting'=> 'vw_bakery_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_bakery_copyright_alingment',array(
        'default' => __('center','vw-bakery'),
        'sanitize_callback' => 'vw_bakery_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Bakery_Image_Radio_Control($wp_customize, 'vw_bakery_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-bakery'),
        'section' => 'vw_bakery_footer',
        'settings' => 'vw_bakery_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_bakery_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-bakery'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-bakery'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-bakery' ),
        ),
		'section'=> 'vw_bakery_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_bakery_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_bakery_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Bakery_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-bakery' ),
      	'section' => 'vw_bakery_footer'
    )));

    $wp_customize->add_setting('vw_bakery_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Bakery_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_bakery_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-bakery'),
		'transport' => 'refresh',
		'section'	=> 'vw_bakery_footer',
		'setting'	=> 'vw_bakery_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_bakery_scroll_top_alignment',array(
        'default' => __('Right','vw-bakery'),
        'sanitize_callback' => 'vw_bakery_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Bakery_Image_Radio_Control($wp_customize, 'vw_bakery_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-bakery'),
        'section' => 'vw_bakery_footer',
        'settings' => 'vw_bakery_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'vw_bakery_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Bakery_Customize {

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
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Bakery_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Bakery_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Bakery Pro Theme', 'vw-bakery' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-bakery' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/bakery-wordpress-theme/'),
		)));

		$manager->add_section(new VW_Bakery_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-bakery' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-bakery' ),
			'pro_url'  => admin_url('themes.php?page=vw_bakery_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-bakery-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-bakery-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Bakery_Customize::get_instance();