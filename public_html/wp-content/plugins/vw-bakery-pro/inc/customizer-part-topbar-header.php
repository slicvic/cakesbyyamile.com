<?php

	$wp_customize->add_section('vw_bakery_pro_topbar_header',array(
		'title'	=> __('Top Bar','vw-bakery-pro'),
		'description'	=> __('Top Bar Settings','vw-bakery-pro'),
		'priority'	=> null,
		'panel' => 'vw_bakery_pro_panel_id',
	));

	$wp_customize->add_setting('vw_bakery_pro_topbar_enable',
    array(
        'default' => 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control('vw_bakery_pro_topbar_enable',
    array(
        'type' => 'radio',
        'label' => 'Do you want this section',
        'section' => 'vw_bakery_pro_topbar_header',
        'choices' => array(
            'Enable' => __('Enable', 'vw-bakery-pro'),
            'Disable' => __('Disable', 'vw-bakery-pro')
        ),
    ));

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_header_address', array(
	    'selector' => '.contact_details',
	    'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_header_address',
	) );
	
    $wp_customize->add_setting( 'vw_bakery_pro_topbar_searchbox_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_topbar_searchbox_separator_option',
        array(
            'label' => __('Topbar Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_topbar_header'
        )
    ) );

    $wp_customize->add_setting('vw_bakery_pro_topbar_searchbox',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_topbar_searchbox',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide search box','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_topbar_header',
    ));
	// Contact details
	//Cell Number

	$wp_customize->add_setting('vw_bakery_pro_header_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_bakery_pro_header_address',array(
		'label'	=> __('Add Address here','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_topbar_header',
		'setting'	=> 'vw_bakery_pro_header_address',
		'type'	=> 'text'
	));
	$wp_customize->add_setting('vw_bakery_pro_header_social_icons',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_header_social_icons',array(
        'type' => 'checkbox',
        'label' => __('Enable Social Icons','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_topbar_header',
    ));
	$wp_customize->add_setting('vw_bakery_pro_header_cart',array(
        'default' => '',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_header_cart',array(
        'type' => 'checkbox',
        'label' => __('Enable Cart','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_topbar_header',
    ));

	$wp_customize->add_setting( 'vw_bakery_pro_header_contact_details_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_header_contact_details_color_separator_option',
        array(
            'label' => __('Topbar Color and font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_topbar_header'
        )
    ) );
	
	$wp_customize->add_setting( 'vw_bakery_pro_header_contact_details_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_header_contact_details_color', array(
		'label' => __('Top Bar Contact Details Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_topbar_header',
		'settings' => 'vw_bakery_pro_header_contact_details_color',
	)));

	$wp_customize->add_setting('vw_bakery_pro_header_contact_details_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_header_contact_details_font_family', array(
	    'section'  => 'vw_bakery_pro_topbar_header',
	    'label'    => __('Top Bar contact details Font family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'vw_bakery_pro_header_contact_detailsicon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_header_contact_detailsicon_color', array(
		'label' => __('Top Bar contact icon Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_topbar_header',
		'settings' => 'vw_bakery_pro_header_contact_detailsicon_color',
	)));

	$wp_customize->add_setting( 'vw_bakery_pro_topbar_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_topbar_bgcolor', array(
		'label' => __('Top Bar Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_topbar_header',
		'settings' => 'vw_bakery_pro_topbar_bgcolor',
	)));

	$wp_customize->add_setting('vw_bakery_pro_topbar_bgimage',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'vw_bakery_pro_topbar_bgimage',
            array(
                'label' => __('Top Bar Background image (1520px x 50px)','vw-bakery-pro'),
                'section' => 'vw_bakery_pro_topbar_header',
                'settings' => 'vw_bakery_pro_topbar_bgimage'
            )
        )
    );

	// Header Section

	$wp_customize->add_section('vw_bakery_pro_header_section',array(
		'title'	=> __('Header','vw-bakery-pro'),
		'description'	=> __('Header Settings','vw-bakery-pro'),
		'priority'	=> null,
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting( 'vw_bakery_pro_header_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_header_title_color', array(
		'label' => __('Header Main title Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_header_section',
		'settings' => 'vw_bakery_pro_header_title_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_header_title_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_header_title_font_family', array(
	    'section'  => 'vw_bakery_pro_header_section',
	    'label'    => __('Header Main title Font family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_headerhomebg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_headerhomebg_color', array(
		'label' => __('Header Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_header_section',
		'settings' => 'vw_bakery_pro_headerhomebg_color',
	)));
	// This is Header Menu Color picker setting
	$wp_customize->add_setting( 'vw_bakery_pro_headermenus_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_headermenus_color', array(
		'label' => __('Menu Item Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_header_section',
		'settings' => 'vw_bakery_pro_headermenus_color',
	)));
	//This is Header Menu FontFamily picker setting
	$wp_customize->add_setting('vw_bakery_pro_headermenu_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_headermenu_font_family', array(
	    'section'  => 'vw_bakery_pro_header_section',
	    'label'    => __( 'Menu Item Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_header_menuhovercolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_header_menuhovercolor', array(
		'label' => __('Menu Item Hover Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_header_section',
		'settings' => 'vw_bakery_pro_header_menuhovercolor',
	)));
	
	// This is Nav Dropdown Background Color picker setting
	$wp_customize->add_setting( 'vw_bakery_pro_dropdownbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_dropdownbg_color', array(
		'label' => __('Menu DropDown Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_header_section',
		'settings' => 'vw_bakery_pro_dropdownbg_color',
	)));

	$wp_customize->add_setting( 'vw_bakery_pro_dropdownbg_itemcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_dropdownbg_itemcolor', array(
		'label' => __('Menu DropDown Item Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_header_section',
		'settings' => 'vw_bakery_pro_dropdownbg_itemcolor',
	)));

	$wp_customize->add_setting( 'vw_bakery_pro_dropdownbg_item_hovercolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_dropdownbg_item_hovercolor', array(
		'label' => __('Menu DropDown Item Hover Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_header_section',
		'settings' => 'vw_bakery_pro_dropdownbg_item_hovercolor',
	)));
	
	//In Responsive
	$wp_customize->add_setting( 'vw_bakery_pro_dropdownbg_responsivecolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_dropdownbg_responsivecolor', array(
		'label' => __('Responsive Menu Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_header_section',
		'settings' => 'vw_bakery_pro_dropdownbg_responsivecolor',
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_headermenu_responsive_item_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_headermenu_responsive_item_color', array(
		'label' => __('Responsive Menu item DropDown Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_header_section',
		'settings' => 'vw_bakery_pro_headermenu_responsive_item_color',
	)));
?>