<?php

  $wp_customize->add_setting( 'vw_bakery_pro_section_ordering_settings_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_section_ordering_settings_separator_option',
        array(
            'label' => __('Section Ordering Settings','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_section_ordering_settings'
        )
    ) );


 $wp_customize->add_section('vw_bakery_pro_section_ordering_settings',array(
      'title' => __('Section Ordering','vw-bakery-pro'),
      'description'=> __('Section Ordering.','vw-bakery-pro'),
      'panel' => 'vw_bakery_pro_panel_id',
  ));

  $wp_customize->add_setting( 'vw_bakery_pro_section_ordering_settings_repeater',
      array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new vw_bakery_pro_Repeater_Custom_Control( $wp_customize, 'vw_bakery_pro_section_ordering_settings_repeater',
      array(
        'label' => __( 'Section Reordering','vw-bakery-pro' ),
        'section' => 'vw_bakery_pro_section_ordering_settings',
        'button_labels' => array(
          'add' => __( 'Add Row','vw-bakery-pro' ), 
        )
      )
   ) );

  $wp_customize->add_setting('vw_bakery_pro_contactus_paddingbottom',array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_bakery_pro_contactus_paddingbottom',array(
  'label' => __('Home contact details Padding Bottom','vw-bakery-pro'),
  'description' => __('Enter Padding Bottom In Pixel', 'vw-bakery-pro'),
  'section' => 'vw_bakery_pro_section_ordering_settings',
  'setting' => 'vw_bakery_pro_contactus_paddingbottom',
  'type'  => 'text'
  ));

  //General Color Pallete
  $wp_customize->add_setting( 'vw_bakery_pro_color_pallette_separator_option',
      array(
          'default' => '',
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_color_pallette_separator_option',
      array(
          'label' => __('Boxed Option','vw-bakery-pro'),
          'section' => 'vw_bakery_pro_color_pallette'
      )
  ) );

  $wp_customize->add_section('vw_bakery_pro_color_pallette',array(
      'title' => __('Typography / General settings','vw-bakery-pro'),
      'description'=> __('Typography settings','vw-bakery-pro'),
      'panel' => 'vw_bakery_pro_panel_id',
  ));

  $wp_customize->add_setting('vw_bakery_pro_radio_boxed_full_layout',
      array(
        'default' => 'full-Width',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_bakery_pro_radio_boxed_full_layout',
      array(
        'type' => 'radio',
        'label' => __('Choose Boxed or Full Width Layout', 'vw-bakery-pro'),
        'description' => __('The width should be greater than 1140px. Otherwise it will messed up the layout.','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_color_pallette',
        'choices' => array(
        'full-Width' => __('Full Width', 'vw-bakery-pro'),
        'boxed' => __('Boxed', 'vw-bakery-pro')
      ),
  ));

  $wp_customize->add_setting('vw_bakery_pro_radio_boxed_full_layout_value',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_bakery_pro_radio_boxed_full_layout_value',array(
      'label' => __('Add Boxed layout Width Here','vw-bakery-pro'),
      'section' => 'vw_bakery_pro_color_pallette',
      'setting' => 'vw_bakery_pro_radio_boxed_full_layout_value',
      'type'    => 'text'
    )
  );

  //This is Button Text FontFamily picker setting

  $wp_customize->add_setting( 'vw_bakery_pro_body_font_family_separator_option',
      array(
          'default' => '',
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_body_font_family_separator_option',
      array(
          'label' => __('Body Option','vw-bakery-pro'),
          'section' => 'vw_bakery_pro_color_pallette'
      )
  ) );

  $wp_customize->add_setting('vw_bakery_pro_body_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'vw_bakery_pro_body_font_family', array(
      'section'  => 'vw_bakery_pro_color_pallette',
      'label'    => __( 'Body Font family','vw-bakery-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_bakery_pro_body_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_bakery_pro_body_font_size',array(
      'label' => __('font size in px','vw-bakery-pro'),
      'section' => 'vw_bakery_pro_color_pallette',
      'setting' => 'vw_bakery_pro_body_font_size',
      'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_bakery_pro_body_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_body_color', array(
    'label' => __('Body color', 'vw-bakery-pro'),
    'section' => 'vw_bakery_pro_color_pallette',
    'settings' => 'vw_bakery_pro_body_color',
  )));

  $wp_customize->add_setting( 'vw_bakery_pro_h1_font_family_separator_option',
      array(
          'default' => '',
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_h1_font_family_separator_option',
      array(
          'label' => __('First Headding Option','vw-bakery-pro'),
          'section' => 'vw_bakery_pro_color_pallette'
      )
  ) );

  $wp_customize->add_setting('vw_bakery_pro_h1_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'vw_bakery_pro_h1_font_family', array(
      'section'  => 'vw_bakery_pro_color_pallette',
      'label'    => __( 'H1','vw-bakery-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_bakery_pro_h1_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_bakery_pro_h1_font_size',array(
      'label' => __('H1 font size in px','vw-bakery-pro'),
      'section' => 'vw_bakery_pro_color_pallette',
      'setting' => 'vw_bakery_pro_h1_font_size',
      'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_bakery_pro_h1_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_h1_color', array(
    'label' => __('H1 color', 'vw-bakery-pro'),
    'section' => 'vw_bakery_pro_color_pallette',
    'settings' => 'vw_bakery_pro_h1_color',
  )));

   $wp_customize->add_setting( 'vw_bakery_pro_h2_font_family_separator_option',
      array(
          'default' => '',
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_h2_font_family_separator_option',
      array(
          'label' => __('Second Headding Option','vw-bakery-pro'),
          'section' => 'vw_bakery_pro_color_pallette'
      )
  ) );

  $wp_customize->add_setting('vw_bakery_pro_h2_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'vw_bakery_pro_h2_font_family', array(
      'section'  => 'vw_bakery_pro_color_pallette',
      'label'    => __( 'H2','vw-bakery-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_bakery_pro_h2_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_bakery_pro_h2_font_size',array(
      'label' => __('H2 font size in px','vw-bakery-pro'),
      'section' => 'vw_bakery_pro_color_pallette',
      'setting' => 'vw_bakery_pro_h2_font_size',
      'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_bakery_pro_h2_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_h2_color', array(
    'label' => __('H2 color', 'vw-bakery-pro'),
    'section' => 'vw_bakery_pro_color_pallette',
    'settings' => 'vw_bakery_pro_h2_color',
  )));

  $wp_customize->add_setting( 'vw_bakery_pro_h3_font_family_separator_option',
      array(
          'default' => '',
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_h3_font_family_separator_option',
      array(
          'label' => __('Third Headding Option','vw-bakery-pro'),
          'section' => 'vw_bakery_pro_color_pallette'
      )
  ) );

  $wp_customize->add_setting('vw_bakery_pro_h3_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));

  $wp_customize->add_control(
      'vw_bakery_pro_h3_font_family', array(
      'section'  => 'vw_bakery_pro_color_pallette',
      'label'    => __( 'H3','vw-bakery-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_bakery_pro_h3_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_bakery_pro_h3_font_size',array(
      'label' => __('H3 font size in px','vw-bakery-pro'),
      'section' => 'vw_bakery_pro_color_pallette',
      'setting' => 'vw_bakery_pro_h3_font_size',
      'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_bakery_pro_h3_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_h3_color', array(
    'label' => __('H3 color', 'vw-bakery-pro'),
    'section' => 'vw_bakery_pro_color_pallette',
    'settings' => 'vw_bakery_pro_h3_color',
  )));

  $wp_customize->add_setting( 'vw_bakery_pro_h4_font_family_separator_option',
      array(
          'default' => '',
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_h4_font_family_separator_option',
      array(
          'label' => __('Four Headding Option','vw-bakery-pro'),
          'section' => 'vw_bakery_pro_color_pallette'
      )
  ) );

  $wp_customize->add_setting('vw_bakery_pro_h4_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'vw_bakery_pro_h4_font_family', array(
      'section'  => 'vw_bakery_pro_color_pallette',
      'label'    => __( 'H4','vw-bakery-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_bakery_pro_h4_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_bakery_pro_h4_font_size',array(
      'label' => __('H4 font size in px','vw-bakery-pro'),
      'section' => 'vw_bakery_pro_color_pallette',
      'setting' => 'vw_bakery_pro_h4_font_size',
      'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_bakery_pro_h4_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_h4_color', array(
    'label' => __('H4 color', 'vw-bakery-pro'),
    'section' => 'vw_bakery_pro_color_pallette',
    'settings' => 'vw_bakery_pro_h4_color',
  )));

  $wp_customize->add_setting( 'vw_bakery_pro_h5_font_family_separator_option',
      array(
          'default' => '',
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_h5_font_family_separator_option',
      array(
          'label' => __(' Five Headding Option','vw-bakery-pro'),
          'section' => 'vw_bakery_pro_color_pallette'
      )
  ) );
  $wp_customize->add_setting('vw_bakery_pro_h5_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'vw_bakery_pro_h5_font_family', array(
      'section'  => 'vw_bakery_pro_color_pallette',
      'label'    => __( 'H5','vw-bakery-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_bakery_pro_h5_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_bakery_pro_h5_font_size',array(
      'label' => __('H5 font size in px','vw-bakery-pro'),
      'section' => 'vw_bakery_pro_color_pallette',
      'setting' => 'vw_bakery_pro_h5_font_size',
      'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_bakery_pro_h5_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_h5_color', array(
    'label' => __('H5 color', 'vw-bakery-pro'),
    'section' => 'vw_bakery_pro_color_pallette',
    'settings' => 'vw_bakery_pro_h5_color',
  )));

  $wp_customize->add_setting( 'vw_bakery_pro_h6_font_family_separator_option',
      array(
          'default' => '',
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_h6_font_family_separator_option',
      array(
          'label' => __(' Sixth Headding Option','vw-bakery-pro'),
          'section' => 'vw_bakery_pro_color_pallette'
      )
  ) );
  $wp_customize->add_setting('vw_bakery_pro_h6_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'vw_bakery_pro_h6_font_family', array(
      'section'  => 'vw_bakery_pro_color_pallette',
      'label'    => __( 'H6','vw-bakery-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_bakery_pro_h6_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_bakery_pro_h6_font_size',array(
      'label' => __('H6 font size in px','vw-bakery-pro'),
      'section' => 'vw_bakery_pro_color_pallette',
      'setting' => 'vw_bakery_pro_h6_font_size',
      'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_bakery_pro_h6_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_h6_color', array(
    'label' => __('H6 color', 'vw-bakery-pro'),
    'section' => 'vw_bakery_pro_color_pallette',
    'settings' => 'vw_bakery_pro_h6_color',
  )));
  //paragarph font family

  $wp_customize->add_setting( 'vw_bakery_pro_paragarpah_font_family_separator_option',
      array(
          'default' => '',
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_paragarpah_font_family_separator_option',
      array(
          'label' => __(' paragarpah Setting Option','vw-bakery-pro'),
          'section' => 'vw_bakery_pro_color_pallette'
      )
  ) );
  $wp_customize->add_setting('vw_bakery_pro_paragarpah_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'vw_bakery_pro_paragarpah_font_family', array(
      'section'  => 'vw_bakery_pro_color_pallette',
      'label'    => __( 'Paragraph','vw-bakery-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_bakery_pro_para_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_bakery_pro_para_font_size',array(
      'label' => __('Paragraph font size in px','vw-bakery-pro'),
      'section' => 'vw_bakery_pro_color_pallette',
      'setting' => 'vw_bakery_pro_para_font_size',
      'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_bakery_pro_para_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_para_color', array(
      'label' => __('Para color', 'vw-bakery-pro'),
      'section' => 'vw_bakery_pro_color_pallette',
      'settings' => 'vw_bakery_pro_para_color',
    )
  ));
  $wp_customize->add_setting( 'vw_bakery_pro_hi_first_color_separator_option',
      array(
          'default' => '',
          'transport' => 'postMessage',
          'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
      )
  );
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_hi_first_color_separator_option',
      array(
          'label' => __(' First Global Color Option','vw-bakery-pro'),
          'section' => 'vw_bakery_pro_color_pallette'
      )
  ) );
  $wp_customize->add_setting( 'vw_bakery_pro_hi_first_color', array(
    'default' => '#ff7c93',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_hi_first_color', array(
    'label' => __('Highlight Color First (It will change it globally)', 'vw-bakery-pro'),
    'section' => 'vw_bakery_pro_color_pallette',
    'settings' => 'vw_bakery_pro_hi_first_color',
  )));
?>