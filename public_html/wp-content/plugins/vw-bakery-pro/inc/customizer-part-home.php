<?php
    // -------------- Other Plugins Details ----------------

  $wp_customize->add_section('vw_bakery_pro_title_banner',array(
      'title' => __('Our other new plugins','vw-bakery-pro'),
      'description' => __('Purchase Our other new plugins','vw-bakery-pro'),
      'priority' => 3,
  ));

  $wp_customize->add_setting( 'vw_bakery_pro_buy_title_banner_plugin', array(
  ) );
  $wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_bakery_pro_buy_title_banner_plugin', array(
      'section' => 'vw_bakery_pro_title_banner',
      'label' => __( 'VW Title Banner Plugin', 'vw-bakery-pro' ),
      'description' => __( 'Need to add banner images? Check out VW Title Banner Plugin', 'vw-bakery-pro' ),
      'content' => __( '<a href="https://www.vwthemes.com/premium-plugin/vw-title-banner-plugin/" target="_blank" class="button button-secondary alignright review_st">Buy Now</a>', 'vw-bakery-pro' ),
  )));
    /*-------------------add separator--------------------------------*/
    $wp_customize->add_setting( 'vw_bakery_pro_home_contact_details_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_home_contact_details_separator_option',
        array(
            'label' => __('Section Background Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_home_contact_details_section'
        )
    ) );

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_radio_home_contact_details_enable', array(
        'selector' => '.home_details',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_radio_home_contact_details_enable',
    ) );

	/*------------------------Home Contact details----------------------------*/
    $wp_customize->add_section('vw_bakery_pro_home_contact_details_section',array(
        'title' => __('Home Contact Details','vw-bakery-pro'),
        'description'   => __('Edit Home Contact details from here','vw-bakery-pro'),
        'panel' => 'vw_bakery_pro_panel_id',
    ));

    $wp_customize->add_setting('vw_bakery_pro_radio_home_contact_details_enable',
        array(
            'default' => 'Enable',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control('vw_bakery_pro_radio_home_contact_details_enable',
        array(
            'type' => 'radio',
            'label' => __('Do you want this section', 'vw-bakery-pro'),
            'section' => 'vw_bakery_pro_home_contact_details_section',
            'choices' => array(
                'Enable' => __('Enable', 'vw-bakery-pro'),
                'Disable' => __('Disable', 'vw-bakery-pro')
        ),
    ));
    $wp_customize->add_setting( 'vw_bakery_pro_home_contact_details_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_home_contact_details_bgcolor', array(
        'label' => __('Background Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'settings' => 'vw_bakery_pro_home_contact_details_bgcolor',
    )));
    $wp_customize->add_setting('vw_bakery_pro_home_contact_details_bgimage',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'vw_bakery_pro_home_contact_details_bgimage',
            array(
                'label' => __('Background image','vw-bakery-pro'),
                'section' => 'vw_bakery_pro_home_contact_details_section',
                'settings' => 'vw_bakery_pro_home_contact_details_bgimage'
    )));
   
    $wp_customize->add_setting('vw_bakery_pro_home_contact_details_number',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_home_contact_details_number',array(
        'label' => __('Number of box to show','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_home_contact_details_section',
        'type'      => 'number'
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_home_contact_details_box_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_home_contact_details_box_separator_option',
        array(
            'label' => __('Add Box Info','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_home_contact_details_section'
        )
    ) );

    $count =  get_theme_mod('vw_bakery_pro_home_contact_details_number');
    for($m =1; $m <=$count; $m++){
        $wp_customize->add_setting('vw_bakery_pro_home_contact_details_box'.$m,array(
            'default'   => '',
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
        $wp_customize->add_control('vw_bakery_pro_home_contact_details_box'.$m,array(
            'label' => __('Box','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_home_contact_details_section',
            'setting'   => 'vw_bakery_pro_home_contact_details_box'.$m,
            'type'=>'textarea'
        ));
    }
    $wp_customize->add_setting('vw_bakery_pro_home_phone_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_home_phone_text',array(
        'label' => __('Phone Text','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'setting'   => 'vw_bakery_pro_home_phone_text',
        'type'=>'textarea'
    ));
    $wp_customize->add_setting('vw_bakery_pro_home_phone_number',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_home_phone_number',array(
        'label' => __('Phone Number','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'setting'   => 'vw_bakery_pro_home_phone_number',
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('vw_bakery_pro_home_email_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_home_email_text',array(
        'label' => __('Email Text','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'setting'   => 'vw_bakery_pro_home_email_text',
        'type'=>'textarea'
    ));
    $wp_customize->add_setting('vw_bakery_pro_home_email_address',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_home_email_address',array(
        'label' => __('Email Address','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'setting'   => 'vw_bakery_pro_home_email_address',
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('vw_bakery_pro_contact_homebtn_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
	$wp_customize->add_control('vw_bakery_pro_contact_homebtn_text',array(
        'label' => __('Button Text','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_home_contact_details_section',
        'setting'   => 'vw_bakery_pro_contact_homebtn_text',
        'type'      => 'text'
    ));    
    $wp_customize->add_setting('vw_bakery_pro_contact_homebtn_url',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
	$wp_customize->add_control('vw_bakery_pro_contact_homebtn_url',array(
        'label' => __('Button Link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_home_contact_details_section',
        'setting'   => 'vw_bakery_pro_contact_homebtn_url',
        'type'      => 'url'
    ));
    $wp_customize->add_setting( 'vw_bakery_pro_home_contact_opening_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_home_contact_opening_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_home_contact_opening_color_separator_option',
        array(
            'label' => __('Content Color and Font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_home_contact_details_section'
        )
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_home_contact_opening_color', array(
        'label' => __('Opening Timings Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'settings' => 'vw_bakery_pro_home_contact_opening_color',
    )));
    $wp_customize->add_setting( 'vw_bakery_pro_home_contact_opening_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_home_contact_opening_bg_color', array(
        'label' => __('Opening Timings BgColor', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'settings' => 'vw_bakery_pro_home_contact_opening_bg_color',
    )));
    $wp_customize->add_setting('vw_bakery_pro_about_opening_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_about_opening_font_family', array(
	    'section'  => 'vw_bakery_pro_home_contact_details_section',
	    'label'    => __( 'Opening Timings Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_home_contact_phone_text_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_home_contact_phone_text_color', array(
        'label' => __('Phone Text/Email Text Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'settings' => 'vw_bakery_pro_home_contact_phone_text_color',
    )));
    $wp_customize->add_setting('vw_bakery_pro_about_contact_phone_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_about_contact_phone_font_family', array(
	    'section'  => 'vw_bakery_pro_home_contact_details_section',
	    'label'    => __( 'Phone Text/Email Text Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_home_contact_phone_no_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_home_contact_phone_no_color', array(
        'label' => __('Phone no/Email address Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'settings' => 'vw_bakery_pro_home_contact_phone_no_color',
    )));
    $wp_customize->add_setting('vw_bakery_pro_about_contact_phone_no_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_about_contact_phone_no_font_family', array(
	    'section'  => 'vw_bakery_pro_home_contact_details_section',
	    'label'    => __( 'Phone no/Email address Color Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_home_contact_phone_icon_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_home_contact_phone_icon_color', array(
        'label' => __('Icon Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'settings' => 'vw_bakery_pro_home_contact_phone_icon_color',
    )));
    $wp_customize->add_setting( 'vw_bakery_pro_about_contact_phone_iconbg', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_about_contact_phone_iconbg', array(
        'label' => __('Icon BgColor', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'settings' => 'vw_bakery_pro_about_contact_phone_iconbg',
    )));
    $wp_customize->add_setting( 'vw_bakery_pro_home_contact_button_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_home_contact_button_color', array(
        'label' => __('Button Text Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'settings' => 'vw_bakery_pro_home_contact_button_color',
    )));
    $wp_customize->add_setting( 'vw_bakery_pro_about_contact_buttonbg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_about_contact_buttonbg_color', array(
        'label' => __('Button Text BgColor', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_home_contact_details_section',
        'settings' => 'vw_bakery_pro_about_contact_buttonbg_color',
    )));
    $wp_customize->add_setting('vw_bakery_pro_about_contact_button_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_about_contact_button_font_family', array(
	    'section'  => 'vw_bakery_pro_home_contact_details_section',
	    'label'    => __( 'Button Text Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	/*------------------------------------About section -------------------------------------*/

    $wp_customize->add_setting( 'vw_bakery_pro_homeabout_sec_bgcolor_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_homeabout_sec_bgcolor_separator_option',
        array(
            'label' => __('Section Background Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_homeabout_sec'
        )
    ) );

	$wp_customize->add_section('vw_bakery_pro_homeabout_sec',array(
		'title'	=> __('About Section','vw-bakery-pro'),
		'description'	=> __('Add Welcome content here.','vw-bakery-pro'),
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_radio_about_enable',
	    array(
        'default' => 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control('vw_bakery_pro_radio_about_enable',
	    array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_homeabout_sec',
        'choices' => array(
        'Enable' => __('Enable', 'vw-bakery-pro'),
        'Disable' => __('Disable', 'vw-bakery-pro')
	    ),
	));

	$wp_customize->add_setting( 'vw_bakery_pro_about_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_about_bgcolor', array(
		'label' => __('Section Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_homeabout_sec',
		'settings' => 'vw_bakery_pro_about_bgcolor',
	)));
	$wp_customize->add_setting('vw_bakery_pro_about_bgimage',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control( $wp_customize,'vw_bakery_pro_about_bgimage',array(
        'label' => __('Section Background Image','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_homeabout_sec',
        'settings' => 'vw_bakery_pro_about_bgimage'
	)));	
	$wp_customize->add_setting('vw_bakery_pro_about_section_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control( $wp_customize,'vw_bakery_pro_about_section_image',array(
        'label' => __('About Image','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_homeabout_sec',
        'settings' => 'vw_bakery_pro_about_section_image'
	)));

	$wp_customize->add_setting('vw_bakery_pro_about_heading_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control( $wp_customize,'vw_bakery_pro_about_heading_image',array(
        'label' => __('Heading Icon Image','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_homeabout_sec',
        'settings' => 'vw_bakery_pro_about_heading_image'
	)));

	 $wp_customize->add_setting( 'vw_bakery_pro_about_title_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_about_title_separator_option',
        array(
            'label' => __('Section Content Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_homeabout_sec'
        )
    ) );

     $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_about_title', array(
        'selector' => '.about-content',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_about_title',
    ) );

	$wp_customize->add_setting('vw_bakery_pro_about_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_pro_about_title',array(
		'label'	=> __('Section Title','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_homeabout_sec',
		'setting'	=> 'vw_bakery_pro_about_title',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_pro_about_description',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_textarea_field'
	));
	$wp_customize->add_control('vw_bakery_pro_about_description',array(
		'label'	=> __('Section Description','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_homeabout_sec',
		'setting'	=> 'vw_bakery_pro_about_description',
		'type'		=> 'textarea'
	));

	$wp_customize->add_setting('vw_bakery_pro_viewmore_btn_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
	$wp_customize->add_control('vw_bakery_pro_viewmore_btn_text',array(
        'label' => __('List Text','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_homeabout_sec',
        'setting'   => 'vw_bakery_pro_viewmore_btn_text',
        'type'      => 'text'
    ));
    
    $wp_customize->add_setting('vw_bakery_pro_viewmore_url',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
	$wp_customize->add_control('vw_bakery_pro_viewmore_url',array(
        'label' => __('List Link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_homeabout_sec',
        'setting'   => 'vw_bakery_pro_viewmore_url',
        'type'      => 'url'
    ));
    
     $wp_customize->add_setting( 'vw_bakery_pro_about_title_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_about_title_color_separator_option',
        array(
            'label' => __('Section Content Color and Font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_homeabout_sec'
        )
    ) );

    $wp_customize->add_setting( 'vw_bakery_pro_about_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_about_title_color', array(
		'label' => __('Heading Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_homeabout_sec',
		'settings' => 'vw_bakery_pro_about_title_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_about_title_color_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_about_title_color_font_family', array(
	    'section'  => 'vw_bakery_pro_homeabout_sec',
	    'label'    => __( 'Title Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	
	$wp_customize->add_setting( 'vw_bakery_pro_about_para_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_about_para_color', array(
		'label' => __('Text Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_homeabout_sec',
		'settings' => 'vw_bakery_pro_about_para_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_about_para_color_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_about_para_color_font_family', array(
	    'section'  => 'vw_bakery_pro_homeabout_sec',
	    'label'    => __( 'Para Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('vw_bakery_pro_about_list_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_about_list_font_family', array(
	    'section'  => 'vw_bakery_pro_homeabout_sec',
	    'label'    => __( 'Button Text Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_about_button_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_about_button_bgcolor', array(
		'label' => __('Button Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_homeabout_sec',
		'settings' => 'vw_bakery_pro_about_button_bgcolor',
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_about_button_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_about_button_text_color', array(
		'label' => __('Button Text Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_homeabout_sec',
		'settings' => 'vw_bakery_pro_about_button_text_color',
	)));


	 /*------------------------------------Services Tab -------------------------------------*/
    $wp_customize->add_setting( 'vw_bakery_pro_services_tab_section_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_services_tab_section_separator_option',
        array(
            'label' => __('Section Background Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_services_tab_section'
        )
    ) );

	$wp_customize->add_section('vw_bakery_pro_services_tab_section',array(
		'title'	=> __('Services','vw-bakery-pro'),
		'description'	=> __('Add Services content here','vw-bakery-pro'),
		'priority'	=> null,
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_services_tab_enabledisable',array(
        'default'=> 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
	$wp_customize->add_control('vw_bakery_pro_services_tab_enabledisable', array(
        'type' => 'radio',
        'label' => 'Do you want this section',
        'section' => 'vw_bakery_pro_services_tab_section',
        'choices' => array(
            'Enable' => 'Enable',
            'Disable' => 'Disable'
        ),
    ));

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_services_tab_sec_title', array(
        'selector' => '#services h3',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_services_tab_sec_title',
    ) );


    $wp_customize->add_setting('vw_bakery_pro_services_tab_sec_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_pro_services_tab_sec_title',array(
		'label'	=> __('Section Title','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_services_tab_section',
		'setting'	=> 'vw_bakery_pro_services_tab_sec_title',
		'type'		=> 'text'
	));

    $wp_customize->add_setting( 'vw_bakery_pro_services_tab_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_services_tab_bgcolor', array(
		'label' => __('Section Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_services_tab_section',
		'settings' => 'vw_bakery_pro_services_tab_bgcolor',
	)));
	$wp_customize->add_setting('vw_bakery_pro_services_tab_bgimage',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control( $wp_customize,'vw_bakery_pro_services_tab_bgimage',array(
        'label' => __('Section Background Image','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_services_tab_section',
        'settings' => 'vw_bakery_pro_services_tab_bgimage'
	)));

	$wp_customize->add_setting('vw_bakery_pro_services_heading_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control( $wp_customize,'vw_bakery_pro_services_heading_image',array(
        'label' => __('Heading Image','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_services_tab_section',
        'settings' => 'vw_bakery_pro_services_heading_image'
	)));

    $wp_customize->add_setting( 'vw_bakery_pro_services_tab_number_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_services_tab_number_separator_option',
        array(
            'label' => __('Tabs to show ','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_services_tab_section'
        )
    ) );

	$wp_customize->add_setting('vw_bakery_pro_services_tab_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_bakery_pro_services_tab_number',array(
		'label'	=> __('Number of Tabs to show','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_services_tab_section',
		'type'		=> 'number'
	));

	$count =  get_theme_mod('vw_bakery_pro_services_tab_number', 6);
	for($i=1; $i<=$count; $i++) {

        $wp_customize->add_setting( 'vw_bakery_pro_services_tab_image_separator_option'.$i,
            array(
                'default' => '',
                'transport' => 'postMessage',
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_services_tab_image_separator_option'.$i,
            array(
                'label' => __('Tabs Image ','vw-bakery-pro').$i,
                'section' => 'vw_bakery_pro_services_tab_section'
            )
        ) );

		$wp_customize->add_setting('vw_bakery_pro_services_tab_image'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_bakery_pro_services_tab_image'.$i,
	        array(
	            'label' => __('Tab Image ','vw-bakery-pro').$i,
	            'section' => 'vw_bakery_pro_services_tab_section',
	            'settings' => 'vw_bakery_pro_services_tab_image'.$i
		)));
		$wp_customize->add_setting('vw_bakery_pro_services_title'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('vw_bakery_pro_services_title'.$i,array(
			'label'	=> __('Title','vw-bakery-pro'),
			'section'	=> 'vw_bakery_pro_services_tab_section',
			'type'	=> 'text'
		));
		$wp_customize->add_setting('vw_bakery_pro_services_title_url'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control('vw_bakery_pro_services_title_url'.$i,array(
			'label' => __('Link','vw-bakery-pro').$i,
			'section' => 'vw_bakery_pro_services_tab_section',
			'setting'	=> 'vw_bakery_pro_services_title_url'.$i,
			'type'	=> 'text'
		));


        $wp_customize->add_setting('vw_bakery_pro_services_tab_content'.$i,array(
            'default'   => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('vw_bakery_pro_services_tab_content'.$i,array(
            'label' => __('Add content here','vw-bakery-pro'),
            'section'   => 'vw_bakery_pro_services_tab_section',
            'type'  => 'textarea'
        ));
	}

	//Color Pallete Started
    $wp_customize->add_setting( 'vw_bakery_pro_services_tab_sectiontitle_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_services_tab_sectiontitle_color_separator_option',
        array(
            'label' => __('Section Content Color and Font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_services_tab_section'
        )
    ) );

	$wp_customize->add_setting( 'vw_bakery_pro_services_tab_sectiontitle_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_services_tab_sectiontitle_color', array(
		'label' => 'Section Title Color',
		'section' => 'vw_bakery_pro_services_tab_section',
		'settings' => 'vw_bakery_pro_services_tab_sectiontitle_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_services_tab_sectiontitle_fontfamily',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_services_tab_sectiontitle_fontfamily', array(
	    'section'  => 'vw_bakery_pro_services_tab_section',
	    'label'    => __( 'Section Title Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));

	$wp_customize->add_setting( 'vw_bakery_pro_services_tab_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_services_tab_title_color', array(
		'label' => 'Title Color',
		'section' => 'vw_bakery_pro_services_tab_section',
		'settings' => 'vw_bakery_pro_services_tab_title_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_button_tab_title_fontfamily',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_button_tab_title_fontfamily', array(
	    'section'  => 'vw_bakery_pro_services_tab_section',
	    'label'    => __( 'Title Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));

 	$wp_customize->add_setting( 'vw_bakery_pro_services_tab_activetitle_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_services_tab_activetitle_color', array(
		'label' => 'Content Color',
		'section' => 'vw_bakery_pro_services_tab_section',
		'settings' => 'vw_bakery_pro_services_tab_activetitle_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_button_tab_activetitle_fontfamily',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_button_tab_activetitle_fontfamily', array(
	    'section'  => 'vw_bakery_pro_services_tab_section',
	    'label'    => __( 'Content Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));

 	/*-------------------------------Products Section----------------------------------------*/
    //Color Pallete Started
    $wp_customize->add_setting( 'vw_bakery_pro_products_sec_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_products_sec_color_separator_option',
        array(
            'label' => __('Section Background Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_products_sec'
        )
    ) );

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_products_title', array(
        'selector' => '#products h3',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_products_title',
    ) );

	$wp_customize->add_section('vw_bakery_pro_products_sec',array(
		'title'	=> __('Products Section','vw-bakery-pro'),
		'description'	=> __('Add Products here.','vw-bakery-pro'),
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_radio_products_enable',
	    array(
	        'default' => 'Enable',
	        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control('vw_bakery_pro_radio_products_enable',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section', 'vw-bakery-pro'),
	        'section' => 'vw_bakery_pro_products_sec',
	        'choices' => array(
	        'Enable' => __('Enable', 'vw-bakery-pro'),
	        'Disable' => __('Disable', 'vw-bakery-pro')
	    ),
	));

	$wp_customize->add_setting( 'vw_bakery_pro_products_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_products_bgcolor',array(
		'label' => __('Background Color', 'vw-bakery-pro'),
		'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_products_sec',
		'settings' => 'vw_bakery_pro_products_bgcolor',
	)));
	$wp_customize->add_setting('vw_bakery_pro_products_bgimage',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
           new WP_Customize_Image_Control($wp_customize,'vw_bakery_pro_products_bgimage',
            array(
            'label' => __('Background Image','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_products_sec',
            'settings' => 'vw_bakery_pro_products_bgimage',
    )));
    $wp_customize->add_setting('vw_bakery_pro_products_title_image',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	  new WP_Customize_Image_Control( $wp_customize,'vw_bakery_pro_products_title_image',array(
	    'label' => __('Title Image','vw-bakery-pro'),
	    'section' => 'vw_bakery_pro_products_sec',
	    'settings' => 'vw_bakery_pro_products_title_image'
	)));

	$wp_customize->add_setting( 'vw_bakery_pro_products_number_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_products_number_separator_option',
        array(
            'label' => __('Product to show','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_products_sec'
        )
    ) );

	$wp_customize->add_setting('vw_bakery_pro_products_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_bakery_pro_products_number',array(
		'label'	=> __('Number of Product to show','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_products_sec',
		'type'		=> 'number'
	));
	$tpcount =  get_theme_mod('vw_bakery_pro_products_number');
	$args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
	$wp_customize->add_setting('vw_bakery_pro_productss_category',array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_productss_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_products_sec',
    ));
    $wp_customize->add_setting('vw_bakery_pro_products_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_pro_products_title',array(
		'label'	=> __('Section Title','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_products_sec',
		'setting'	=> 'vw_bakery_pro_products_title',
		'type'		=> 'text'
	));

    $wp_customize->add_setting( 'vw_bakery_pro_products_title_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_products_title_color_separator_option',
        array(
            'label' => __('Section Content Color and Font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_products_sec'
        )
    ) );
    
	$wp_customize->add_setting( 'vw_bakery_pro_products_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_products_title_color', array(
		'label' => 'Section Title Color',
		'section' => 'vw_bakery_pro_products_sec',
		'settings' => 'vw_bakery_pro_products_title_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_products_title_fontfamily',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_products_title_fontfamily', array(
	    'section'  => 'vw_bakery_pro_products_sec',
	    'label'    => __( 'Section Title Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));
 	$wp_customize->add_setting( 'vw_bakery_pro_products_sale_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_products_sale_color', array(
		'label' => 'Sale Color',
		'section' => 'vw_bakery_pro_products_sec',
		'settings' => 'vw_bakery_pro_products_sale_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_products_sale_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_products_sale_font_family', array(
	    'section'  => 'vw_bakery_pro_products_sec',
	    'label'    => __( 'Sale Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));
 	$wp_customize->add_setting( 'vw_bakery_pro_products_sale_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_products_sale_bg_color', array(
		'label' => 'Sale BgColor',
		'section' => 'vw_bakery_pro_products_sec',
		'settings' => 'vw_bakery_pro_products_sale_bg_color',
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_products_name_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_products_name_color', array(
		'label' => 'Products Name Color',
		'section' => 'vw_bakery_pro_products_sec',
		'settings' => 'vw_bakery_pro_products_name_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_products_name_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_products_name_font_family', array(
	    'section'  => 'vw_bakery_pro_products_sec',
	    'label'    => __( 'Products Name Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));
 	$wp_customize->add_setting( 'vw_bakery_pro_products_content_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_products_content_color', array(
		'label' => 'Products Content Color',
		'section' => 'vw_bakery_pro_products_sec',
		'settings' => 'vw_bakery_pro_products_content_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_products_content_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_products_content_font_family', array(
	    'section'  => 'vw_bakery_pro_products_sec',
	    'label'    => __( 'Products Content Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));
 	$wp_customize->add_setting( 'vw_bakery_pro_products_price_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_products_price_color', array(
		'label' => 'Products Price Color',
		'section' => 'vw_bakery_pro_products_sec',
		'settings' => 'vw_bakery_pro_products_price_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_products_price_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_products_price_font_family', array(
	    'section'  => 'vw_bakery_pro_products_sec',
	    'label'    => __( 'Products Price Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));
 	$wp_customize->add_setting( 'vw_bakery_pro_products_cartbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_products_cartbg_color', array(
		'label' => 'Cart IconBg Color',
		'section' => 'vw_bakery_pro_products_sec',
		'settings' => 'vw_bakery_pro_products_cartbg_color',
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_products_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_products_hover_color', array(
		'label' => 'Products Hover Color',
		'section' => 'vw_bakery_pro_products_sec',
		'settings' => 'vw_bakery_pro_products_hover_color',
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_products_saleicon_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_products_saleicon_hover_color', array(
		'label' => 'Sale & Icon Hover Color',
		'section' => 'vw_bakery_pro_products_sec',
		'settings' => 'vw_bakery_pro_products_saleicon_hover_color',
	)));
	/*-------------------------------Our Records-----------------------------*/
    $wp_customize->add_setting( 'vw_bakery_pro_our_records_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_our_records_separator_option',
        array(
            'label' => __('Our Records','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_our_records'
        )
    ) );

	$wp_customize->add_section('vw_bakery_pro_our_records',array(
		'title'	=> __('Our Records','vw-bakery-pro'),
		'description'	=> __('Add our records sections content here.','vw-bakery-pro'),
		'panel' => 'vw_bakery_pro_panel_id',
	));
	//Our Records enable or disable
	$wp_customize->add_setting('vw_bakery_pro_our_records_enable',array(
        'default'=> 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
	$wp_customize->add_control('vw_bakery_pro_our_records_enable', array(
        'type' => 'radio',
        'label' => 'Do you want this section',
        'section' => 'vw_bakery_pro_our_records',
        'choices' => array(
            'Enable' => 'Enable',
            'Disable' => 'Disable'
        ),
    ));
  
    $wp_customize->add_setting( 'vw_bakery_pro_our_records_number_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_our_records_number_separator_option',
        array(
            'label' => __(' Records to show ','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_our_records'
        )
    ) );
     $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_our_records_number', array(
            'selector' => '#our_records .container',
            'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_our_records_number',
        ) );
    
	$wp_customize->add_setting('vw_bakery_pro_our_records_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_bakery_pro_our_records_number',array(
		'label'	=> __('Number of record to show','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_our_records',
		'type'		=> 'number'
	));

	$pricing_number_count =  get_theme_mod('vw_bakery_pro_our_records_number', 4);
	for($i=1;$i<=$pricing_number_count;$i++) {

        $wp_customize->add_setting( 'vw_bakery_pro_our_records_image_separator_option'.$i,
            array(
                'default' => '',
                'transport' => 'postMessage',
                'sanitize_callback' => 'sanitize_textarea_field'
            )
        );
        $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_our_records_image_separator_option'.$i,
            array(
                'label' => __('Our Records Settings ','vw-bakery-pro').$i,
                'section' => 'vw_bakery_pro_our_records'
            )
        ) );

		$wp_customize->add_setting('vw_bakery_pro_our_records_image'.$i,array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_bakery_pro_our_records_image'.$i,array(
	            'label' => __('Counter Image','vw-bakery-pro'),
	            'section' => 'vw_bakery_pro_our_records',
	            'settings' => 'vw_bakery_pro_our_records_image'.$i
		)));
		$wp_customize->add_setting('vw_bakery_pro_number_title1'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));		
		$wp_customize->add_control('vw_bakery_pro_number_title1'.$i,array(
			'label'	=> __('Number','vw-bakery-pro'),
			'section'=> 'vw_bakery_pro_our_records',
			'type'=> 'text'
		));
		$wp_customize->add_setting('vw_bakery_pro_circle_content1'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));		
		$wp_customize->add_control('vw_bakery_pro_circle_content1'.$i,array(
			'label'	=> __('Counter Title','vw-bakery-pro'),
			'section'=> 'vw_bakery_pro_our_records',
			'type'	=> 'text'
		));
	}

	//Our Records background color picker setting

    $wp_customize->add_setting( 'vw_bakery_pro_our_records_bg_color_separator_option'.$i,
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_our_records_bg_color_separator_option'.$i,
        array(
            'label' => __('Section Content Color And Font Settings','vw-bakery-pro').$i,
            'section' => 'vw_bakery_pro_our_records'
        )
    ) );

	$wp_customize->add_setting( 'vw_bakery_pro_our_records_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_our_records_bg_color', array(
		'label' => 'Background Color',
		'section' => 'vw_bakery_pro_our_records',
		'settings' => 'vw_bakery_pro_our_records_bg_color',
	)));
	//Our Records background image picker setting
	$wp_customize->add_setting('vw_bakery_pro_our_records_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));		
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_bakery_pro_our_records_bg_image',array(
            'label' => __('Background image','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_our_records',
            'settings' => 'vw_bakery_pro_our_records_bg_image'
	)));


	$wp_customize->add_setting( 'vw_bakery_pro_records_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_records_text_color', array(
		'label' => 'Number Color',
		'section' => 'vw_bakery_pro_our_records',
		'settings' => 'vw_bakery_pro_records_text_color',

	)));
	//Our Records font family picker setting
	$wp_customize->add_setting('vw_bakery_pro_records_text_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_records_text_font_family', array(
	    'section'  => 'vw_bakery_pro_our_records',
	    'label'    => __( 'Number Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'vw_bakery_pro_records_content_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_records_content_color', array(
		'label' => 'Content Color',
		'section' => 'vw_bakery_pro_our_records',
		'settings' => 'vw_bakery_pro_records_content_color',

	)));

	//Our Records font family picker setting
	$wp_customize->add_setting('vw_bakery_pro_records_content_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_records_content_font_family', array(
	    'section'  => 'vw_bakery_pro_our_records',
	    'label'    => __( 'Content Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	/*-------------------------------------------- GALLERY --------------------------------------*/	
     $wp_customize->add_setting( 'vw_bakery_pro_gallery_sec_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_gallery_sec_separator_option',
        array(
            'label' => __('Gallery Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_gallery_sec'
        )
    ) );

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_gallery_section_title', array(
        'selector' => '#vw_gallery',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_gallery_section_title',
    ) );
    
    $wp_customize->add_section('vw_bakery_pro_gallery_sec',array(
		'title'	=> __('Gallery','vw-bakery-pro'),
		'description'	=> __('This section is only for adding gallery shortcode. <a href="','vw-bakery-pro').esc_url(home_url()).__('/wp-admin/edit.php?post_type=vw_gallery" target="_blank">Click here</a> to add gallery.','vw-bakery-pro'),
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_radio_gallery_enable',
	    array(
	        'default' => 'Enable',
	        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	    )
    );
	$wp_customize->add_control('vw_bakery_pro_radio_gallery_enable',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section', 'vw-bakery-pro'),
	        'section' => 'vw_bakery_pro_gallery_sec',
	        'choices' => array(
	            'Enable' => __('Enable', 'vw-bakery-pro'),
	            'Disable' => __('Disable', 'vw-bakery-pro')
	        ),
	    )
    );


	$wp_customize->add_setting('vw_bakery_pro_gallery_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_bakery_pro_gallery_section_title',array(
			'label'	=> __('Section Title','vw-bakery-pro'),
			'section'	=> 'vw_bakery_pro_gallery_sec',
			'setting'	=> 'vw_bakery_pro_gallery_section_title',
			'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_pro_gallery_section_title_image',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_bakery_pro_gallery_section_title_image', array(
       'label' => __('Heading Image','vw-bakery-pro'),
       'section' => 'vw_bakery_pro_gallery_sec',
       'settings' => 'vw_bakery_pro_gallery_section_title_image',
	)));

    $wp_customize->add_setting( 'vw_bakery_pro_gallery_shortcode_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_gallery_shortcode_separator_option',
        array(
            'label' => __('Gallery shortcode Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_gallery_sec'
        )
    ) );
 
	$wp_customize->add_setting('vw_bakery_pro_gallery_shortcode',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	$wp_customize->add_control('vw_bakery_pro_gallery_shortcode',array(
			'label'	=> __('Shortcode','vw-bakery-pro'),
			'section'	=> 'vw_bakery_pro_gallery_sec',
			'setting'	=> 'vw_bakery_pro_gallery_shortcode',
			'type'		=> 'text'
		)
	);

	// Color pallete
	$wp_customize->add_setting( 'vw_bakery_pro_gallery_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_gallery_bgcolor',array(
		'label' => __('Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_gallery_sec',
		'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-bakery-pro'),
		'settings' => 'vw_bakery_pro_gallery_bgcolor',
	)));
	$wp_customize->add_setting('vw_bakery_pro_gallery_bgimage',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
	       $wp_customize,
	       'vw_bakery_pro_gallery_bgimage',
	       array(
	           'label' => __('Background Image','vw-bakery-pro'),
	           'section' => 'vw_bakery_pro_gallery_sec',
	           'settings' => 'vw_bakery_pro_gallery_bgimage',
	)));

	$wp_customize->add_setting( 'vw_bakery_pro_gallery_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_gallery_title_color', array(
		'label' => __('Section Title Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_gallery_sec',
		'settings' => 'vw_bakery_pro_gallery_title_color',
	)));

	$wp_customize->add_setting('vw_bakery_pro_gallery_title_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_gallery_title_font_family', array(
	    'section'  => 'vw_bakery_pro_gallery_sec',
	    'label'    => __( 'Section Title Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_gallery_link_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_gallery_link_color', array(
		'label' => __('Link Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_gallery_sec',
		'settings' => 'vw_bakery_pro_gallery_link_color',
	)));
	/*---------------------------------------Our Skills Section---------------------------------*/

    $wp_customize->add_setting( 'vw_bakery_pro_choose_skills_sec_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_choose_skills_sec_separator_option',
        array(
            'label' => __('Section Background Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_choose_skills_sec'
        )
    ) );

	$wp_customize->add_section('vw_bakery_pro_choose_skills_sec',array(
			'title'	=> __('Our Skills Section','vw-bakery-pro'),
			'description'	=> __('Our Skills Disable Enable here.','vw-bakery-pro'),
			'priority'	=> null,
			'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_radio_choose_skills_enable',
	    array(
		        'default' => 'Enable',
		        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));	
	$wp_customize->add_control('vw_bakery_pro_radio_choose_skills_enable',
    array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_choose_skills_sec',
	        'choices' => array(
	            'Enable' => __('Enable', 'vw-bakery-pro'),
	            'Disable' => __('Disable', 'vw-bakery-pro')
	    ),
    ));
    $wp_customize->add_setting( 'vw_bakery_pro_choose_skills_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_choose_skills_bgcolor', array(
				'label' => __('Background Color', 'vw-bakery-pro'),
				'section' => 'vw_bakery_pro_choose_skills_sec',
				'settings' => 'vw_bakery_pro_choose_skills_bgcolor',
	)));
	$wp_customize->add_setting('vw_bakery_pro_choose_skills_bgimage',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'vw_bakery_pro_choose_skills_bgimage',
	        array(
	            'label' => __('Background image','vw-bakery-pro'),
	            'section' => 'vw_bakery_pro_choose_skills_sec',
	            'settings' => 'vw_bakery_pro_choose_skills_bgimage'
	)));
     $wp_customize->add_setting( 'vw_bakery_pro_choose_skills_title_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_choose_skills_title_separator_option',
        array(
            'label' => __('Section Content Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_choose_skills_sec'
        )
    ) );

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_choose_skills_title', array(
        'selector' => '#choose_skills h3',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_choose_skills_title_separator_option',
    ) );
    
	$wp_customize->add_setting('vw_bakery_pro_choose_skills_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_pro_choose_skills_title',array(
		'label'	=> __('Section Title','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_choose_skills_sec',
		'setting'	=> 'vw_bakery_pro_choose_skills_title',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('vw_bakery_pro_choose_skills_title_image',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'vw_bakery_pro_choose_skills_title_image',
	        array(
	            'label' => __('Title image','vw-bakery-pro'),
	            'section' => 'vw_bakery_pro_choose_skills_sec',
	            'settings' => 'vw_bakery_pro_choose_skills_title_image'
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_skills_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_skills_title_color', array(
		'label' => __('Section Title Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_choose_skills_sec',
		'settings' => 'vw_bakery_pro_skills_title_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_skills_title_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_skills_title_font_family', array(
	    'section'  => 'vw_bakery_pro_choose_skills_sec',
	    'label'    => __( 'Section Title Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	/* ----------------------------Why Choose Us--------------------------------*/
    $wp_customize->add_setting( 'vw_bakery_pro_our_choose_section_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_our_choose_section_separator_option',
        array(
            'label' => __('Why Choose Us Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_our_choose_section'
        )
    ) );

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_choose_box_number', array(
        'selector' => '#why-choose-us',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_choose_box_number',
    ) );


	$wp_customize->add_section('vw_bakery_pro_our_choose_section',array(
		'title'	=> __('Why Choose Us','vw-bakery-pro'),
		'description'	=> __('Add Why Choose Us details here','vw-bakery-pro'),
		'priority'	=> null,
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_our_choose_section_enable',array(
        'default' => 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control('vw_bakery_pro_our_choose_section_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_our_choose_section',
        'choices' => array(
            'Enable' => __('Enable', 'vw-bakery-pro'),
            'Disable' => __('Disable', 'vw-bakery-pro')
	)));
	
	$wp_customize->add_setting('vw_bakery_pro_choose_box_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_bakery_pro_choose_box_number',array(
		'label'	=> __('Number of Details to show','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_our_choose_section',
		'type'		=> 'number'
	));
	$countchoose =  get_theme_mod('vw_bakery_pro_choose_box_number');
	for($i=1; $i<=$countchoose; $i++) {

        $wp_customize->add_setting( 'vw_bakery_pro_choose_box_image_separator_option'.$i,
            array(
                'default' => '',
                'transport' => 'postMessage',
                'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
            )
        );
        $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_choose_box_image_separator_option'.$i,
            array(
                'label' => __('Title Icon Image/Title Options','vw-bakery-pro').$i,
                'section' => 'vw_bakery_pro_our_choose_section'
            )
        ) );

		$wp_customize->add_setting('vw_bakery_pro_choose_box_image'.$i,array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(
		    new WP_Customize_Image_Control( $wp_customize,'vw_bakery_pro_choose_box_image'.$i,array(
			    'label' => __('Title Icon Image','vw-bakery-pro'),
			    'section' => 'vw_bakery_pro_our_choose_section',
			    'settings' => 'vw_bakery_pro_choose_box_image'.$i
			)
		));

		$wp_customize->add_setting('vw_bakery_pro_choose_box_title'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_bakery_pro_choose_box_title'.$i,array(
			'label'	=> __('Title','vw-bakery-pro'),
			'section'	=> 'vw_bakery_pro_our_choose_section',
			'setting'	=> 'vw_bakery_pro_choose_box_title'.$i,
			'type'		=> 'text'
		));
		$wp_customize->add_setting('vw_bakery_pro_choose_box_des'.$i,array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_bakery_pro_choose_box_des'.$i,array(
			'label'	=> __('Description','vw-bakery-pro'),
			'section'	=> 'vw_bakery_pro_our_choose_section',
			'setting'	=> 'vw_bakery_pro_choose_box_des'.$i,
			'type'		=> 'textarea'
		));
	}

    $wp_customize->add_setting( 'vw_bakery_pro_choose_video_heading_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_choose_video_heading_color_separator_option',
        array(
            'label' => __('Section Content Color And Font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_our_choose_section'
        )
    ) );


	$wp_customize->add_setting( 'vw_bakery_pro_choose_video_heading_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_choose_video_heading_color', array(
		'label' => __('Title Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_our_choose_section',
		'settings' => 'vw_bakery_pro_choose_video_heading_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_choose_video_heading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_choose_video_heading_font_family', array(
	    'section'  => 'vw_bakery_pro_our_choose_section',
	    'label'    => __( 'Title Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_choose_video_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_choose_video_text_color', array(
		'label' => __('Text Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_our_choose_section',
		'settings' => 'vw_bakery_pro_choose_video_text_color',
	)));
	//font family picker setting
	$wp_customize->add_setting('vw_bakery_pro_choose_video_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_choose_video_font_family', array(
	    'section'  => 'vw_bakery_pro_our_choose_section',
	    'label'    => __( 'Text Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

    /*------------------------------------ Skills -------------------------------------*/
    $wp_customize->add_setting( 'vw_bakery_pro_skills_section_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_skills_section_separator_option',
        array(
            'label' => __('Skills Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_skills_section'
        )
    ) );

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_skills_number', array(
        'selector' => '#skills',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_skills_number',
    ) );

	$wp_customize->add_section('vw_bakery_pro_skills_section',array(
		'title'	=> __('Skills','vw-bakery-pro'),
		'description'	=> __('Add Skills content here','vw-bakery-pro'),
		'priority'	=> null,
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_skills_enabledisable',array(
        'default'=> 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
	$wp_customize->add_control('vw_bakery_pro_skills_enabledisable', array(
        'type' => 'radio',
        'label' => 'Do you want this section',
        'section' => 'vw_bakery_pro_skills_section',
        'choices' => array(
            'Enable' => 'Enable',
            'Disable' => 'Disable'
        ),
    ));

    $wp_customize->add_setting('vw_bakery_pro_skills_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_bakery_pro_skills_number',array(
		'label'	=> __('Number of Tabs to show','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_skills_section',
		'type'		=> 'number'
	));

    $wp_customize->add_setting( 'vw_bakery_pro_skills_number_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_skills_number_separator_option',
        array(
            'label' => __('Section Content Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_skills_section'
        )
    ) );

	$count =  get_theme_mod('vw_bakery_pro_skills_number', 6);
	for($i=1; $i<=$count; $i++) {
		$wp_customize->add_setting('vw_bakery_pro_skills_bar_title'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('vw_bakery_pro_skills_bar_title'.$i,array(
			'label'	=> __('Bar Title','vw-bakery-pro'),
			'section'	=> 'vw_bakery_pro_skills_section',
			'type'	=> 'text'
		));

		$wp_customize->add_setting('vw_bakery_pro_skills_bar_percent'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('vw_bakery_pro_skills_bar_percent'.$i,array(
			'label'	=> __('Add bar percentage here','vw-bakery-pro'),
			'section'	=> 'vw_bakery_pro_skills_section',
			'type'	=> 'text'
		));
	}

    $wp_customize->add_setting( 'vw_bakery_pro_skills_section_content_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_skills_section_content_separator_option',
        array(
            'label' => __('Section Content Color And Font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_skills_section'
        )
    ) );

	$wp_customize->add_setting( 'vw_bakery_pro_skills_section_content', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_skills_section_content', array(
		'label' => __('Bar Border Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_skills_section',
		'settings' => 'vw_bakery_pro_skills_section_content',
	)));

	//font family picker setting
	
	$wp_customize->add_setting( 'vw_bakery_pro_skills_section_bar_content', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_skills_section_bar_content', array(
		'label' => __('Bar heading Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_skills_section',
		'settings' => 'vw_bakery_pro_skills_section_bar_content',
	)));

	//font family picker setting
	$wp_customize->add_setting('vw_bakery_pro_skills_bar_fontfamily',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_skills_bar_fontfamily', array(
	    'section'  => 'vw_bakery_pro_skills_section',
	    'label'    => __( 'Bar heading Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'vw_bakery_pro_skills_section_bar', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_skills_section_bar', array(
		'label' => __('Bar Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_skills_section',
		'settings' => 'vw_bakery_pro_skills_section_bar',
	)));

	$wp_customize->add_setting( 'vw_bakery_pro_skills_section_bar_percent_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_skills_section_bar_percent_color', array(
		'label' => __('Bar Percent Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_skills_section',
		'settings' => 'vw_bakery_pro_skills_section_bar_percent_color',
	)));

	/*------------------------------Team Section----------------------------------------*/


	$wp_customize->add_section('vw_bakery_pro_team_sec',array(
		'title'	=> __('Team','vw-bakery-pro'),
		'description' => __('This section is only for Team title and styling. <a href="','vw-bakery-pro').esc_url(home_url()).__('/wp-admin/edit.php?post_type=team" target="_blank">Click here</a> to add Expert','vw-bakery-pro'),
		'priority'	=> null,
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_radio_team_enable',array(
        'default' => 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control('vw_bakery_pro_radio_team_enable',
    array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_team_sec',
	    'choices' => array(
        'Enable' => __('Enable', 'vw-bakery-pro'),
        'Disable' => __('Disable', 'vw-bakery-pro')
	     ),
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_team_sec_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_team_sec_separator_option',
        array(
            'label' => __('Section Background Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_team_sec'
        )
    ) );

	$wp_customize->add_setting( 'vw_bakery_pro_team_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_bgcolor', array(
			'label' => __('Background Color', 'vw-bakery-pro'),
			'section' => 'vw_bakery_pro_team_sec',
			'settings' => 'vw_bakery_pro_team_bgcolor',
	)));
	$wp_customize->add_setting('vw_bakery_pro_team_bgimage',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'vw_bakery_pro_team_bgimage',
	        array(
	            'label' => __('Background image','vw-bakery-pro'),
	            'section' => 'vw_bakery_pro_team_sec',
	            'settings' => 'vw_bakery_pro_team_bgimage'
	)));

    $wp_customize->add_setting( 'vw_bakery_pro_team_title_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_team_title_separator_option',
        array(
            'label' => __('Section Content Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_team_sec'
        )
    ) );

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_team_title', array(
        'selector' => '#team .container',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_team_title',
    ) );

	$wp_customize->add_setting('vw_bakery_pro_team_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_pro_team_title',array(
		'label'	=> __('Section Title','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_team_sec',
		'setting'	=> 'vw_bakery_pro_team_title',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('vw_bakery_pro_team_title_image',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'vw_bakery_pro_team_title_image',
	        array(
	            'label' => __('Title image','vw-bakery-pro'),
	            'section' => 'vw_bakery_pro_team_sec',
	            'settings' => 'vw_bakery_pro_team_title_image'
	)));

    $wp_customize->add_setting( 'vw_bakery_pro_team_title_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_team_title_color_separator_option',
        array(
            'label' => __('Section Content Color And Font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_team_sec'
        )
    ) );


	$wp_customize->add_setting( 'vw_bakery_pro_team_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_title_color', array(
		'label' => __('Section Title Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_team_sec',
		'settings' => 'vw_bakery_pro_team_title_color',
	)));
	//font family picker setting
	$wp_customize->add_setting('vw_bakery_pro_team_title_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_team_title_font_family', array(
	    'section'  => 'vw_bakery_pro_team_sec',
	    'label'    => __( 'Section Title Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_team_box_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_box_bgcolor', array(
		'label' => __('Box Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_team_sec',
		'settings' => 'vw_bakery_pro_team_box_bgcolor',
	)));
    $wp_customize->add_setting( 'vw_bakery_pro_team_box_social_borderimg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_box_social_borderimg_color', array(
        'label' => __('Image Border Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_team_sec',
        'settings' => 'vw_bakery_pro_team_box_social_borderimg_color',
    )));
	$wp_customize->add_setting( 'vw_bakery_pro_team_box_hover_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_box_hover_bgcolor', array(
		'label' => __('Box Title Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_team_sec',
		'settings' => 'vw_bakery_pro_team_box_hover_bgcolor',
	)));
	$wp_customize->add_setting('vw_bakery_pro_team_title_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_team_title_font_family', array(
	    'section'  => 'vw_bakery_pro_team_sec',
	    'label'    => __( 'Box Title Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_team_box_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_box_text_color', array(
		'label' => __('Box Text Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_team_sec',
		'settings' => 'vw_bakery_pro_team_box_text_color',
	)));

	$wp_customize->add_setting('vw_bakery_pro_team_text_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_team_text_font_family', array(
	    'section'  => 'vw_bakery_pro_team_sec',
	    'label'    => __( 'Box Text Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_team_box_social_icon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_box_social_icon_color', array(
		'label' => __('Social Icon Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_team_sec',
		'settings' => 'vw_bakery_pro_team_box_social_icon_color',
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_team_box_socialbg_icon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_box_socialbg_icon_color', array(
		'label' => __('Social Icon BgColor', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_team_sec',
		'settings' => 'vw_bakery_pro_team_box_socialbg_icon_color',
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_team_box_social_hover_icon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_box_social_hover_icon_color', array(
		'label' => __('Social Icon Hover Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_team_sec',
		'settings' => 'vw_bakery_pro_team_box_social_hover_icon_color',
	)));

	$wp_customize->add_setting( 'vw_bakery_pro_team_box_hover_textcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_box_hover_textcolor', array(
		'label' => __('Box Button Text Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_team_sec',
		'settings' => 'vw_bakery_pro_team_box_hover_textcolor',
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_team_box_buttonbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_box_buttonbg_color', array(
		'label' => __('Box Button Bg Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_team_sec',
		'settings' => 'vw_bakery_pro_team_box_buttonbg_color',
	)));
	$wp_customize->add_setting('vw_bakery_pro_team_button_text_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_team_button_text_font_family', array(
	    'section'  => 'vw_bakery_pro_team_sec',
	    'label'    => __( 'Box Button Title Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_bakery_pro_team_box_button_border_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_team_box_button_border_color', array(
		'label' => __('Box Button Border Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_team_sec',
		'settings' => 'vw_bakery_pro_team_box_button_border_color',
	)));
	/*---------------------------------------Testimonial Partner Section---------------------------------*/

    $wp_customize->add_setting( 'vw_bakery_pro_testimonial_partner_sec_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_testimonial_partner_sec_separator_option',
        array(
            'label' => __('Testimonial Partner Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_testimonial_partner_sec'
        )
    ) );


	$wp_customize->add_section('vw_bakery_pro_testimonial_partner_sec',array(
			'title'	=> __('Testimonial Partner Section','vw-bakery-pro'),
			'description'	=> __('Testimonial Partner Disable Enable here.','vw-bakery-pro'),
			'priority'	=> null,
			'panel' => 'vw_bakery_pro_panel_id',
	));

	$wp_customize->add_setting('vw_bakery_pro_radio_testimonial_partner_enable',
	    array(
		        'default' => 'Enable',
		        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));	
	$wp_customize->add_control('vw_bakery_pro_radio_testimonial_partner_enable',
    array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_testimonial_partner_sec',
	        'choices' => array(
	            'Enable' => __('Enable', 'vw-bakery-pro'),
	            'Disable' => __('Disable', 'vw-bakery-pro')
	    ),
    ));
    $wp_customize->add_setting( 'vw_bakery_pro_testimonial_partner_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_testimonial_partner_bgcolor', array(
		'label' => __('Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_testimonial_partner_sec',
		'settings' => 'vw_bakery_pro_testimonial_partner_bgcolor',
	)));
	$wp_customize->add_setting('vw_bakery_pro_testimonial_partner_bgimage',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'vw_bakery_pro_testimonial_partner_bgimage', array(
        'label' => __('Background image','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_testimonial_partner_sec',
        'settings' => 'vw_bakery_pro_testimonial_partner_bgimage'
	)));

	/* ------------------------------Testimonial Section -----------------------------------*/

     $wp_customize->add_setting( 'vw_bakery_pro_testimonial_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_testimonial_separator_option',
        array(
            'label' => __('Testimonial Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_testimonial'
        )
    ) );

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_testimonial_title', array(
        'selector' => '#testimonials h3',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_testimonial_title',
    ) );

	$wp_customize->add_section('vw_bakery_pro_testimonial',array(
			'title'	=> __('Testimonial','vw-bakery-pro'),
			'description'    => __('This section is only for Testimonial title and styling. <a href="','vw-bakery-pro').esc_url(home_url()).__('/wp-admin/edit.php?post_type=testimonials" target="_blank">Click here</a> to add testimonials.','vw-bakery-pro'),
			'priority'	=> null,
			'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_radio_testimonial_enable',
	    array(
	        'default' => 'Enable',
	        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control('vw_bakery_pro_radio_testimonial_enable',
    array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_testimonial',
	        'choices' => array(
	            'Enable' => __('Enable', 'vw-bakery-pro'),
	            'Disable' => __('Disable', 'vw-bakery-pro')
	    ),
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_testimonial_title_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_testimonial_title_separator_option',
        array(
            'label' => __('Section Title and Image Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_testimonial'
        )
    ) );


	$wp_customize->add_setting('vw_bakery_pro_testimonial_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_bakery_pro_testimonial_title',array(
		'label'	=> __('Section Title','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_testimonial',
		'setting'	=> 'vw_bakery_pro_testimonial_title',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_pro_testimonial_title_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize,'vw_bakery_pro_testimonial_title_image',array(
        'label' => __('Heading Image','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_testimonial',
        'settings' => 'vw_bakery_pro_testimonial_title_image'
	)));

	$wp_customize->add_setting( 'vw_bakery_pro_testimonial_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_testimonial_title_color', array(
		'label' => __('Section Title Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_testimonial',
		'settings' => 'vw_bakery_pro_testimonial_title_color',
	)));

	//font family picker setting


    $wp_customize->add_setting( 'vw_bakery_pro_testimonial_title_font_family_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_testimonial_title_font_family_separator_option',
        array(
            'label' => __('Section Content Color And Font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_testimonial'
        )
    ) );


	$wp_customize->add_setting('vw_bakery_pro_testimonial_title_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_testimonial_title_font_family', array(
	    'section'  => 'vw_bakery_pro_testimonial',
	    'label'    => __( 'Section Title Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	
	$wp_customize->add_setting( 'vw_bakery_pro_testimonial_name_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_testimonial_name_color', array(
		'label' => __('Heading Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_testimonial',
		'settings' => 'vw_bakery_pro_testimonial_name_color',
	)));

	$wp_customize->add_setting('vw_bakery_pro_testimonial_name_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_testimonial_name_family', array(
	    'section'  => 'vw_bakery_pro_testimonial',
	    'label'    => __( 'Heading Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'vw_bakery_pro_testimonial_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_testimonial_text_color', array(
		'label' => __('Text Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_testimonial',
		'settings' => 'vw_bakery_pro_testimonial_text_color',
	)));

	$wp_customize->add_setting('vw_bakery_pro_testimonial_text_font',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_testimonial_text_font', array(
	    'section'  => 'vw_bakery_pro_testimonial',
	    'label'    => __( 'Text Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'vw_bakery_pro_testimonial_designation_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_testimonial_designation_color', array(
		'label' => __('Designation Text Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_testimonial',
		'settings' => 'vw_bakery_pro_testimonial_designation_color',
	)));

	$wp_customize->add_setting('vw_bakery_pro_testimonial_designation_font',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_testimonial_designation_font', array(
	    'section'  => 'vw_bakery_pro_testimonial',
	    'label'    => __( 'Designation Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'vw_bakery_pro_testimonial_box_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_testimonial_box_color', array(
		'label' => __('Testimonial Box Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_testimonial',
		'settings' => 'vw_bakery_pro_testimonial_box_color',
	)));

	/*------------------------------Our Partners----------------------------------*/

    $wp_customize->add_setting( 'vw_bakery_pro_our_partners_section_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_our_partners_section_separator_option',
        array(
            'label' => __('Our Partners Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_our_partners_section'
        )
    ) );

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_partners_title', array(
        'selector' => '#our_partners h3',
        'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_partners_title',
    ) );

	$wp_customize->add_section('vw_bakery_pro_our_partners_section',array(
		'title'	=> __('Our Partners','vw-bakery-pro'),
		'description'	=> __('Add partners details here','vw-bakery-pro'),
		'priority'	=> null,
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_radio_our_partners_enable',array(
        'default' => 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control('vw_bakery_pro_radio_our_partners_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_our_partners_section',
        'choices' => array(
            'Enable' => __('Enable', 'vw-bakery-pro'),
            'Disable' => __('Disable', 'vw-bakery-pro')
	)));

    $wp_customize->add_setting( 'vw_bakery_pro_partners_title_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_partners_title_separator_option',
        array(
            'label' => __('Section Content and Image Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_our_partners_section'
        )
    ) );

	$wp_customize->add_setting('vw_bakery_pro_partners_title',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_bakery_pro_partners_title',array(
		'label'	=> __('Section Title','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_our_partners_section',
		'setting'	=> 'vw_bakery_pro_partners_title',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_bakery_pro_partners_title_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control( $wp_customize,'vw_bakery_pro_partners_title_image',array(
        'label' => __('Heading Image','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_our_partners_section',
        'settings' => 'vw_bakery_pro_partners_title_image'
	)));
	
	$wp_customize->add_setting('vw_bakery_pro_our_partners_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_bakery_pro_our_partners_number',array(
		'label'	=> __('Number of boxes to show','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_our_partners_section',
		'type'		=> 'number'
	));
	$count =  get_theme_mod('vw_bakery_pro_our_partners_number');
	for($i=1, $j=1; $i<=$count; $i++, $j++) {

		if($j==4){ $j=1; }
		$wp_customize->add_setting('vw_bakery_pro_our_partners_image'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_bakery_pro_our_partners_image'.$i,
	        array(
	            'label' => __('Partner Image ','vw-bakery-pro').$i,
	            'section' => 'vw_bakery_pro_our_partners_section',
	            'settings' => 'vw_bakery_pro_our_partners_image'.$i
		)));	
	}

	$wp_customize->add_setting( 'vw_bakery_pro_our_partners_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_our_partners_title_color', array(
		'label' => __('Section Title Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_our_partners_section',
		'settings' => 'vw_bakery_pro_our_partners_title_color',
	)));

	$wp_customize->add_setting('vw_bakery_pro_our_partners_title_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_our_partners_title_font_family', array(
	    'section'  => 'vw_bakery_pro_our_partners_section',
	    'label'    => __( 'Section Title Font Family','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//Latest Post

	$wp_customize->add_section('vw_bakery_pro_latest_post',array(
		'title'	=> __('Latest Post','vw-bakery-pro'),
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_radio_post_enable',
    array(
        'default' => 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
	$wp_customize->add_control(
    'vw_bakery_pro_radio_post_enable',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section', 'vw-bakery-pro'),
	        'section' => 'vw_bakery_pro_latest_post',
	        'choices' => array(
	            'Enable' => __('Enable', 'vw-bakery-pro'),
	            'Disable' => __('Disable', 'vw-bakery-pro')
	    ),
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_latest_post_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_latest_post_color_separator_option',
        array(
            'label' => __('Section Background Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_latest_post'
        )
    ) );
    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_radio_post_enable', array(
            'selector' => '#latest_post .container',
            'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_radio_post_enable',
     ) );


	$wp_customize->add_setting( 'vw_bakery_pro_latest_post_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 		'vw_bakery_pro_latest_post_color', array(
		'label' => 'Background Color',
		'section' => 'vw_bakery_pro_latest_post',
		'settings' => 'vw_bakery_pro_latest_post_color',
	)));
	
	$wp_customize->add_setting('vw_bakery_pro_our_latest_post_bgimage',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'vw_bakery_pro_our_latest_post_bgimage',
	        array(
	            'label' => __('Background image','vw-bakery-pro'),
	            'section' => 'vw_bakery_pro_latest_post',
	            'settings' => 'vw_bakery_pro_our_latest_post_bgimage'
	))); 
	
	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('vw_bakery_pro_latestblogpost_setting',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_bakery_pro_latestblogpost_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select category from here','vw-bakery-pro'),
		'section' => 'vw_bakery_pro_latest_post',
	));
	$wp_customize->add_setting( 'vw_bakery_pro_latestpost_boxheading_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_latestpost_boxheading_color', array(
		'label' => __('Heading Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_latest_post',
		'settings' => 'vw_bakery_pro_latestpost_boxheading_color',
	)));
	//font family picker setting

    $wp_customize->add_setting( 'vw_bakery_pro_latestpost_boxheading_font_family_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_latestpost_boxheading_font_family_separator_option',
        array(
            'label' => __('Section Content Color And Font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_latest_post'
        )
    ) );


	$wp_customize->add_setting('vw_bakery_pro_latestpost_boxheading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_latestpost_boxheading_font_family', array(
	    'section'  => 'vw_bakery_pro_latest_post',
	    'label'    => __( 'Section Heading Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));


	$wp_customize->add_setting( 'vw_bakery_pro_latestpost_content_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_latestpost_content_color', array(
		'label' => __('Text Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_latest_post',
		'settings' => 'vw_bakery_pro_latestpost_content_color',
	)));
	//font family picker setting
	$wp_customize->add_setting('vw_bakery_pro_latestpost_content_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_latestpost_content_font_family', array(
	    'section'  => 'vw_bakery_pro_latest_post',
	    'label'    => __( 'Content Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'vw_bakery_pro_latestpost_date_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_latestpost_date_color', array(
		'label' => __('Button Text Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_latest_post',
		'settings' => 'vw_bakery_pro_latestpost_date_color',
	)));
    $wp_customize->add_setting( 'vw_bakery_pro_latestpost_meta_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_latestpost_meta_color', array(
        'label' => __('Button Border Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_latest_post',
        'settings' => 'vw_bakery_pro_latestpost_meta_color',
    )));
	//font family picker setting
	$wp_customize->add_setting('vw_bakery_pro_latestpost_date_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_latestpost_date_font_family', array(
	    'section'  => 'vw_bakery_pro_latest_post',
	    'label'    => __( 'Button Text Font','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
    $wp_customize->add_setting( 'vw_bakery_pro_latestpost_button_hover_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_latestpost_button_hover_color', array(
        'label' => __('Button Hover Background Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_latest_post',
        'settings' => 'vw_bakery_pro_latestpost_button_hover_color',
    )));
	$wp_customize->add_setting( 'vw_bakery_pro_latestpost_date_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_latestpost_date_bgcolor', array(
		'label' => __('Button Background Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_latest_post',
		'settings' => 'vw_bakery_pro_latestpost_date_bgcolor',
	)));

	/*----------------------------- Get In Touch -----------------------------*/
    $wp_customize->add_section('vw_bakery_pro_getintouch_section',array(
        'title' => __('Get In Touch','vw-bakery-pro'),
        'description'   => __('Add Get In Touch content from here','vw-bakery-pro'),
        'panel' => 'vw_bakery_pro_panel_id',
    ));

    $wp_customize->add_setting('vw_bakery_pro_radio_getintouch_enable',
        array(
            'default' => 'Enable',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control('vw_bakery_pro_radio_getintouch_enable',
        array(
            'type' => 'radio',
            'label' => __('Do you want this section', 'vw-bakery-pro'),
            'section' => 'vw_bakery_pro_getintouch_section',
            'choices' => array(
                'Enable' => __('Enable', 'vw-bakery-pro'),
                'Disable' => __('Disable', 'vw-bakery-pro')
        ),
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_getintouch_bgcolor_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_getintouch_bgcolor_separator_option',
        array(
            'label' => __('Section Background Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_getintouch_section'
        )
    ) );

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_getintouch_number', array(
            'selector' => '#map ',
            'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_getintouch_number',
     ) );

    $wp_customize->add_setting( 'vw_bakery_pro_getintouch_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_getintouch_bgcolor', array(
        'label' => __('Background Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_getintouch_section',
        'settings' => 'vw_bakery_pro_getintouch_bgcolor',
    )));
    $wp_customize->add_setting('vw_bakery_pro_getintouch_bgimage',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_bakery_pro_getintouch_bgimage', array(
        'label' => __('Background image','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_getintouch_section',
        'settings' => 'vw_bakery_pro_getintouch_bgimage'
    )));


    $wp_customize->add_setting('vw_bakery_pro_getintouch_number',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_getintouch_number',array(
        'label' => __('Number of box to show','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_getintouch_section',
        'type'      => 'number'
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_getintouch_number_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_getintouch_number_separator_option',
        array(
            'label' => __('Section Content Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_getintouch_section'
        )
    ) );
    $count =  get_theme_mod('vw_bakery_pro_getintouch_number');
    for($m =1; $m <=$count; $m++){
        $wp_customize->add_setting('vw_bakery_pro_getintouch_box_icon'.$m,array(
            'default'   => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('vw_bakery_pro_getintouch_box_icon'.$m,array(
            'label' => __('Box icon','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_getintouch_section',
            'setting'   => 'vw_bakery_pro_getintouch_box_icon'.$m,
            'type'=>'text'
        ));

        $wp_customize->add_setting('vw_bakery_pro_getintouch_box'.$m,array(
            'default'   => '',
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
        $wp_customize->add_control('vw_bakery_pro_getintouch_box'.$m,array(
            'label' => __('Box Text','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_getintouch_section',
            'setting'   => 'vw_bakery_pro_getintouch_box'.$m,
            'type'=>'textarea'
        ));
    }
    $wp_customize->add_setting( 'vw_bakery_pro_getin_touch_icon_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_getin_touch_icon_color_separator_option',
        array(
            'label' => __('Section color and font Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_getintouch_section'
        )
    ) );

    $wp_customize->add_setting( 'vw_bakery_pro_getin_touch_icon_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_getin_touch_icon_color', array(
        'label' => __('Icon Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_getintouch_section',
        'settings' => 'vw_bakery_pro_getin_touch_icon_color',
    )));
    $wp_customize->add_setting( 'vw_bakery_pro_getin_touch_icon_colorbg', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_getin_touch_icon_colorbg', array(
        'label' => __('Icon BgColor', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_getintouch_section',
        'settings' => 'vw_bakery_pro_getin_touch_icon_colorbg',
    )));
    $wp_customize->add_setting( 'vw_bakery_pro_getin_touch_contact_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_getin_touch_contact_color', array(
        'label' => __('Contact Details Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_getintouch_section',
        'settings' => 'vw_bakery_pro_getin_touch_contact_color',
    )));
    $wp_customize->add_setting('vw_bakery_pro_getin_touch_contact_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_bakery_pro_getin_touch_contact_font_family', array(
        'section'  => 'vw_bakery_pro_getintouch_section',
        'label'    => __( 'Contact Details Font','vw-bakery-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));
	/*Blog page category*/
	$wp_customize->add_section('vw_bakery_pro_blog_category',array(
		'title'	=> __('Blog Page','vw-bakery-pro'),
		'description'	=> __('select the category you wish to be get displayed on blog page .','vw-bakery-pro'),
		'priority'	=> null,
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('vw_bakery_pro_category_setting',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_bakery_pro_category_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Blog page (select category to show selected post)','vw-bakery-pro'),
		'section' => 'vw_bakery_pro_blog_category',
	));

    $wp_customize->add_section('vw_bakery_pro_single_post_general_settings',array(
        'title' => __('Post Settings','vw-bakery-pro'),
        'description'   => __('Change Your Setting','vw-bakery-pro'),
        'panel' => 'vw_bakery_pro_panel_id',
    ));


    $wp_customize->add_setting( 'vw_bakery_pro_toggle_auther',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vw_Bakery_Pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_pro_toggle_auther',
       array(
          'label' => esc_html__( 'Author Name','vw-bakery-pro' ),
          'section' => 'vw_bakery_pro_single_post_general_settings'
    )));

    $wp_customize->add_setting( 'vw_bakery_pro_toggle_comments',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vw_Bakery_Pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_pro_toggle_comments',
       array(
          'label' => esc_html__( 'Comment','vw-bakery-pro' ),
          'section' => 'vw_bakery_pro_single_post_general_settings'
    )));

    $wp_customize->add_setting( 'vw_bakery_pro_toggle_date',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vw_Bakery_Pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_pro_toggle_date',
       array(
          'label' => esc_html__( 'Post Date','vw-bakery-pro' ),
          'section' => 'vw_bakery_pro_single_post_general_settings'
    )));
    
    $wp_customize->add_setting( 'vw_bakery_pro_toggle_sharing',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vw_Bakery_Pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_pro_toggle_sharing',
       array(
          'label' => esc_html__( 'Social Sharing','vw-bakery-pro' ),
          'section' => 'vw_bakery_pro_single_post_general_settings'
    )));   

     $wp_customize->add_setting( 'vw_bakery_pro_post_general_settings_post_share_facebook',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
   )
  );
 
  $wp_customize->add_control( new Vw_Bakery_Pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_pro_post_general_settings_post_share_facebook',
     array(
        'label' => esc_html__( 'Post Share Facebook', 'vw-bakery-pro' ),
        'section' => 'vw_bakery_pro_single_post_general_settings'
     )
  ));

  $wp_customize->add_setting( 'vw_bakery_pro_single_post_general_settings_post_share_linkedin',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
   )
  );
 
  $wp_customize->add_control( new Vw_Bakery_Pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_pro_single_post_general_settings_post_share_linkedin',
     array(
        'label' => esc_html__( 'Post Share Linkedin', 'vw-bakery-pro' ),
        'section' => 'vw_bakery_pro_single_post_general_settings'
     )
  ));

  $wp_customize->add_setting( 'vw_bakery_pro_single_post_general_settings_post_share_googleplus',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
   )
  );
 
  $wp_customize->add_control( new Vw_Bakery_Pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_pro_single_post_general_settings_post_share_googleplus',
     array(
        'label' => esc_html__( 'Post Share Google Plus', 'vw-bakery-pro' ),
        'section' => 'vw_bakery_pro_single_post_general_settings'
     )
  ));

  $wp_customize->add_setting( 'vw_bakery_pro_single_post_general_settings_post_share_twitter',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
   )
  );
 
  $wp_customize->add_control( new Vw_Bakery_Pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_pro_single_post_general_settings_post_share_twitter',
     array(
        'label' => esc_html__( 'Post Share Twitter', 'vw-bakery-pro' ),
        'section' => 'vw_bakery_pro_single_post_general_settings'
     )
  ));

  $wp_customize->add_setting( 'vw_bakery_pro_single_post_general_settings_post_category',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
   )
  );
 
    $wp_customize->add_setting( 'vw_bakery_pro_post_general_settings_post_sidebar',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
        )
    );
     
    $wp_customize->add_control( new Vw_Bakery_Pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_pro_post_general_settings_post_sidebar',
         array(
            'label' => esc_html__( 'Show or Hide Sidebar', 'vw-bakery-pro' ),
            'section' => 'vw_bakery_pro_single_post_general_settings'
         )
    ));
?>