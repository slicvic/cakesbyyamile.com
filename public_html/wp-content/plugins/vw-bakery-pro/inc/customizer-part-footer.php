<?php
    /* Footer Sections */
   
    $wp_customize->add_section('vw_bakery_pro_footer_section_first',array(
        'title' => __('Footer','vw-bakery-pro'),
        'description'   => __('Edit footer sections','vw-bakery-pro'),
        'panel' => 'vw_bakery_pro_panel_id',
    ));
    $wp_customize->add_setting('vw_bakery_pro_radiolast_enable',
    array(
        'default' => 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control('vw_bakery_pro_radiolast_enable',
    array(
        'type' => 'radio',
        'label' => 'Do you want this section',
        'section' => 'vw_bakery_pro_footer_section_first',
        'choices' => array(
            'Enable' => __('Enable', 'vw-bakery-pro'),
            'Disable' => __('Disable', 'vw-bakery-pro')
        ),
    ));
    // add color picker setting

    $wp_customize->add_setting( 'vw_bakery_pro_section_footer_bgcolor_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_section_footer_bgcolor_separator_option',
        array(
            'label' => __('Section Background Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_footer_section_first'
        )
    ) );
     $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_subscribe_title', array(
            'selector' => '#footer .subscribe_box h4 ',
            'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_subscribe_title',
     ) );

    $wp_customize->add_setting( 'vw_bakery_pro_section_footer_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    // add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_section_footer_bgcolor', array(
        'label' => __('Background Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section_first',
        'settings' => 'vw_bakery_pro_section_footer_bgcolor',
    )));
    $wp_customize->add_setting('vw_bakery_pro_footer_bgimage',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_bakery_pro_footer_bgimage', array(
        'label' => __('Background image','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section_first',
        'settings' => 'vw_bakery_pro_footer_bgimage'
    )));
    $wp_customize->add_setting('vw_bakery_pro_footer_subscribe',array(
        'default' => 'true',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_footer_subscribe',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Subcribe Section','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section_first',
    ));
    $wp_customize->add_setting('vw_bakery_pro_subscribe_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_subscribe_title_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_subscribe_title_separator_option',
        array(
            'label' => __('Section Title Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_footer_section_first'
        )
    ) );

    $wp_customize->add_control('vw_bakery_pro_subscribe_title',array(
        'label' => __('Subscribe Title','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section_first',
        'setting'   => 'vw_bakery_pro_subscribe_title',
        'type'=>'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_subscribe_subtitle',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_subscribe_subtitle',array(
        'label' => __('Subscribe Sub Title','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section_first',
        'setting'   => 'vw_bakery_pro_subscribe_subtitle',
        'type'=>'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_subscribe_form_code',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_subscribe_form_code',array(
        'label' => __('Form Shortcode','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section_first',
        'setting'   => 'vw_bakery_pro_subscribe_form_code',
        'type'=>'text'
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_footer_titles_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_footer_titles_color_separator_option',
        array(
            'label' => __('Section color and Font Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_footer_section_first'
        )
    ) );

    $wp_customize->add_setting( 'vw_bakery_pro_footer_titles_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_footer_titles_color', array(
        'label' => __('Heading Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section_first',
        'settings' => 'vw_bakery_pro_footer_titles_color',
    )));

    $wp_customize->add_setting('vw_bakery_pro_footer_title_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_bakery_pro_footer_title_font_family', array(
        'section'  => 'vw_bakery_pro_footer_section_first',
        'label'    => __( 'Heading Font Family','vw-bakery-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));
    $wp_customize->add_setting( 'vw_bakery_pro_footer_title_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_footer_title_color', array(
        'label' => __('Footer Title Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section_first',
        'settings' => 'vw_bakery_pro_footer_title_color',
    )));

    
    $wp_customize->add_setting('vw_bakery_pro_footer_titles_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_bakery_pro_footer_titles_font_family', array(
        'section'  => 'vw_bakery_pro_footer_section_first',
        'label'    => __( 'Footer Title Font Family','vw-bakery-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));
    $wp_customize->add_setting( 'vw_bakery_pro_footer_content_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_footer_content_color', array(
        'label' => __('Content Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section_first',
        'settings' => 'vw_bakery_pro_footer_content_color',
    )));

    $wp_customize->add_setting('vw_bakery_pro_footer_contents_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_bakery_pro_footer_contents_font_family', array(
        'section'  => 'vw_bakery_pro_footer_section_first',
        'label'    => __( 'Content Font Family','vw-bakery-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));
    
    //Contact Page section
    $wp_customize->add_section('vw_bakery_pro_contact_page_section',array(
        'title' => __('Contact','vw-bakery-pro'),
        'description'   => __('Add contact page settings here','vw-bakery-pro'),
        'priority'  => null,
        'panel' => 'vw_bakery_pro_panel_id',
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_contact_page_section_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_contact_page_section_separator_option',
        array(
            'label' => __('Section Map Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_contact_page_section'
        )
    ) );

    $wp_customize->add_setting('vw_bakery_pro_address_longitude',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_address_longitude',array(
        'label' => __('Longitude','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_address_longitude',
        'type'=>'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_address_latitude',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_address_latitude',array(
        'label' => __('Latitude','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_address_latitude',
        'type'=>'text'
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_contactpage_email_title_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_contactpage_email_title_separator_option',
        array(
            'label' => __('Section Email Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_contact_page_section'
        )
    ) );

    $wp_customize->add_setting('vw_bakery_pro_contactpage_email_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_contactpage_email_title',array(
        'label' => __('Email Title','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_contactpage_email_title',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_contactpage_email',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_contactpage_email',array(
        'label' => __('Email ','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_contactpage_email',
        'type'  => 'text'
    ));
    

    $wp_customize->add_setting( 'vw_bakery_pro_address_title_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_address_title_separator_option',
        array(
            'label' => __('Section Address Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_contact_page_section'
        )
    ) );

    $wp_customize->add_setting('vw_bakery_pro_address_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_address_title',array(
        'label' => __('Address','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_address_title',
        'type'  => 'textarea'
    ));
    $wp_customize->add_setting('vw_bakery_pro_address',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_address',array(
        'label' => __('Address ','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_address',
        'type'  => 'textarea'
    ));
    $wp_customize->add_setting( 'vw_bakery_pro_contactpage_phone_title_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_contactpage_phone_title_separator_option',
        array(
            'label' => __('Section Phone  Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_contact_page_section'
        )
    ) );

    $wp_customize->add_setting('vw_bakery_pro_contactpage_phone_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_contactpage_phone_title',array(
        'label' => __('Phone Title','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_contactpage_phone_title',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_contactpage_phone',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_contactpage_phone',array(
        'label' => __('Phone ','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_contactpage_phone',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_contactpage_working_hours_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_contactpage_working_hours_title',array(
        'label' => __('Working Hours','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_contactpage_working_hours_title',
        'type'  => 'text'
    ));
     $wp_customize->add_setting('vw_bakery_pro_contactpage_working_number',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_contactpage_working_number',array(
        'label' => __('Total Number of Days','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_contactpage_working_number',
        'type'  => 'number'
    ));
    $working_number =  get_theme_mod('vw_bakery_pro_contactpage_working_number');
    for ($i=1; $i <= $working_number; $i++ ){        
        $wp_customize->add_setting('vw_bakery_pro_contactpage_working_hours'.$i,array(
            'default'   => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control('vw_bakery_pro_contactpage_working_hours'.$i,array(
            'label' => __('Add Working Hours','vw-bakery-pro').$i,
            'section' => 'vw_bakery_pro_contact_page_section',
            'setting'   => 'vw_bakery_pro_contactpage_working_hours'.$i,
            'type'  => 'textarea'
        ));
    }
    $wp_customize->add_setting( 'vw_bakery_pro_contactpage_form_title_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_contactpage_form_title_separator_option',
        array(
            'label' => __('Section Title Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_contact_page_section'
        )
    ) );
    $wp_customize->add_setting('vw_bakery_pro_contactpage_form_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_contactpage_form_title',array(
        'label' => __('Add Form Title','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_contactpage_form_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_bakery_pro_contactpage_form_subtitle',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_contactpage_form_subtitle',array(
        'label' => __('Add Form Title','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'setting'   => 'vw_bakery_pro_contactpage_form_subtitle',
        'type'  => 'textarea'
    ));
    $wp_customize->add_setting( 'vw_bakery_pro_contact_page_heading_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_contact_page_heading_color_separator_option',
        array(
            'label' => __('Section Color and Font Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_contact_page_section'
        )
    ) );

    $wp_customize->add_setting( 'vw_bakery_pro_contact_page_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_contact_page_heading_color', array(
        'label' => __('Contact Heading Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'settings' => 'vw_bakery_pro_contact_page_heading_color',
    )));
    //This is Section Heading FontFamily picker setting
    $wp_customize->add_setting('vw_bakery_pro_contact_page_heading_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_bakery_pro_contact_page_heading_font_family', array(
        'section'  => 'vw_bakery_pro_contact_page_section',
        'label'    => __( 'Contact Heading Fonts','vw-bakery-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));
    $wp_customize->add_setting( 'vw_bakery_pro_contact_page_content_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_contact_page_content_color', array(
        'label' => __('Contact Content Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_contact_page_section',
        'settings' => 'vw_bakery_pro_contact_page_content_color',
    )));
    //This is Section Heading FontFamily picker setting
    $wp_customize->add_setting('vw_bakery_pro_contact_page_contact_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_bakery_pro_contact_page_contact_font_family', array(
        'section'  => 'vw_bakery_pro_contact_page_section',
        'label'    => __( 'Contact Content Fonts','vw-bakery-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));

    /* Copyright */

    $wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_footer_copy', array(
            'selector' => '.copyright p',
            'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_footer_copy',
     ) );
    $wp_customize->add_section('vw_bakery_pro_footer_section',array(
        'title' => __('Footer Text','vw-bakery-pro'),
        'description'   => __('Add some text for footer like copyright etc.','vw-bakery-pro'),
        'priority'  => null,
        'panel' => 'vw_bakery_pro_panel_id',
    ));

   
    $wp_customize->add_setting('vw_bakery_pro_footer_copy',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_bakery_pro_footer_copy',array(
        'label' => __('Copyright Text','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_footer_section',
        'type'      => 'textarea'
    ));

    $wp_customize->add_setting( 'vw_bakery_pro_section_footer_copy_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    // add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_section_footer_copy_bgcolor', array(
        'label' => __('Background Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section',
        'settings' => 'vw_bakery_pro_section_footer_copy_bgcolor',
    )));
    $wp_customize->add_setting('vw_bakery_pro_footer_copy_bgimage',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'vw_bakery_pro_footer_copy_bgimage',
            array(
                'label' => __('Background image','vw-bakery-pro'),
                'section' => 'vw_bakery_pro_footer_section',
                'settings' => 'vw_bakery_pro_footer_bgimage'
    )));

    $wp_customize->add_setting( 'vw_bakery_pro_footer_para_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_footer_para_color', array(
        'label' => __('Content Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_footer_section',
        'settings' => 'vw_bakery_pro_footer_para_color',
    )));

    $wp_customize->add_setting('vw_bakery_pro_footer_para_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_bakery_pro_footer_para_font_family', array(
        'section'  => 'vw_bakery_pro_footer_section',
        'label'    => __( 'Content Font Family','vw-bakery-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));

    //Shortcode Section
    $wp_customize->add_section('vw_bakery_pro_shortcode_section',array(
        'title' => __('Shortcode Settings','vw-bakery-pro'),
        'description'   => __('Use below shortcode here.','vw-bakery-pro'),
        'priority'  => null,
        'panel' => 'vw_bakery_pro_panel_id',
    ));
   $wp_customize->add_setting('vw_bakery_pro_shortcode',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_shortcode',array(
        'section' => 'vw_bakery_pro_shortcode_section',
        'setting'   => 'vw_bakery_pro_shortcode',
        'type'=>'textarea'
    ));
?>