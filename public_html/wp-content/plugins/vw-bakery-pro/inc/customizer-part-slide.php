<?php

	$wp_customize->add_section('vw_bakery_pro_slider_section',array(
		'title'	=> __('Slider Settings','vw-bakery-pro'),
		'description'	=> __('Add slider images here.','vw-bakery-pro'),
		'priority'	=> null,
		'panel' => 'vw_bakery_pro_panel_id',
	));
	$wp_customize->add_setting('vw_bakery_pro_slider_enabledisable',array(
        'default'=> 'Enable',
        'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
    ));
	$wp_customize->add_control('vw_bakery_pro_slider_enabledisable', array(
        'type' => 'radio',
        'label' => 'Do you want this section',
        'section' => 'vw_bakery_pro_slider_section',
        'choices' => array(
            'Enable' => 'Enable',
            'Disable' => 'Disable'
        ),
    ));

	$wp_customize->selective_refresh->add_partial( 'vw_bakery_pro_slider_enabledisable', array(
	    'selector' => '#slider h2',
	    'render_callback' => 'vw_bakery_pro_customize_partial_vw_bakery_pro_slider_enabledisable',
	) );
 

    $wp_customize->add_setting('vw_bakery_pro_slide_heading_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_bakery_pro_slide_heading_image', array(
        'label' => __('Heading Image ','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_slider_section',
        'settings' => 'vw_bakery_pro_slide_heading_image'
	)));

	$wp_customize->add_setting('vw_bakery_pro_slide_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_bakery_pro_slide_number',array(
		'label'	=> __('Number of slides to show','vw-bakery-pro'),
		'section'	=> 'vw_bakery_pro_slider_section',
		'type'		=> 'number'
	));
	$count =  get_theme_mod('vw_bakery_pro_slide_number');
		
	for($i=1, $j=1; $i<=$count; $i++, $j++) {

		 $wp_customize->add_setting( 'vw_bakery_pro_slide_image_separator_option'.$i,
	        array(
	            'default' => '',
	            'transport' => 'postMessage',
	            'sanitize_callback' => 'sanitize_hex_color'
	        )
	    );
	    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_slide_image_separator_option'.$i,
	        array(
	            'label' => __('Slider Setting','vw-bakery-pro').$i,
	            'section' => 'vw_bakery_pro_slider_section'
	        )
	    ) );
		if($j>=5){ $j=1; }
		$wp_customize->add_setting('vw_bakery_pro_slide_image'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_bakery_pro_slide_image'.$i,
	        array(
	            'label' => __('Slider Image ','vw-bakery-pro').$i.__(' (1600x562)','vw-bakery-pro'),
	            'section' => 'vw_bakery_pro_slider_section',
	            'settings' => 'vw_bakery_pro_slide_image'.$i
		)));
		$wp_customize->add_setting('vw_bakery_pro_slide_heading'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('vw_bakery_pro_slide_heading'.$i,array(
			'label' => __('Slide Heading Title','vw-bakery-pro').$i,
			'section' => 'vw_bakery_pro_slider_section',
			'setting'	=> 'vw_bakery_pro_slide_heading'.$i,
			'type'	=> 'text'
		));
		$wp_customize->add_setting('vw_bakery_pro_slide_text'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_textarea_field',
		));
		$wp_customize->add_control('vw_bakery_pro_slide_text'.$i,array(
			'label' => __('Slide Text','vw-bakery-pro').$i,
			'section' => 'vw_bakery_pro_slider_section',
			'setting'	=> 'vw_bakery_pro_slide_text'.$i,
			'type'	=> 'textarea'
		));
		$wp_customize->add_setting('vw_bakery_pro_slide_btntext'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_textarea_field',
		));
		$wp_customize->add_control('vw_bakery_pro_slide_btntext'.$i,array(
			'label' => __('Slider Button Text','vw-bakery-pro').$i,
			'section' => 'vw_bakery_pro_slider_section',
			'setting'	=> 'vw_bakery_pro_slide_btntext'.$i,
			'type'	=> 'text'
		));
		$wp_customize->add_setting('vw_bakery_pro_slide_btnurl'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control('vw_bakery_pro_slide_btnurl'.$i,array(
			'label' => __('Button URL','vw-bakery-pro').$i,
			'section' => 'vw_bakery_pro_slider_section',
			'setting'	=> 'vw_bakery_pro_slide_btnurl'.$i,
			'type'	=> 'text'
		));

		$wp_customize->add_setting('vw_bakery_pro_slide_btntext2'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_textarea_field',
		));
		$wp_customize->add_control('vw_bakery_pro_slide_btntext2'.$i,array(
			'label' => __('Slider Button Text 2','vw-bakery-pro').$i,
			'section' => 'vw_bakery_pro_slider_section',
			'setting'	=> 'vw_bakery_pro_slide_btntext2'.$i,
			'type'	=> 'text'
		));
		$wp_customize->add_setting('vw_bakery_pro_slide_btnurl2'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control('vw_bakery_pro_slide_btnurl2'.$i,array(
			'label' => __('Button URL 2','vw-bakery-pro').$i,
			'section' => 'vw_bakery_pro_slider_section',
			'setting'	=> 'vw_bakery_pro_slide_btnurl2'.$i,
			'type'	=> 'text'
		));
	}
		// Other Settings
	 	$wp_customize->add_setting( 'vw_bakery_pro_slide_delay_separator_option',
	        array(
	            'default' => '',
	            'transport' => 'postMessage',
	            'sanitize_callback' => 'sanitize_hex_color'
	        )
	    );
	    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_slide_delay_separator_option',
	        array(
	            'label' => __('Slide Delay Setting','vw-bakery-pro'),
	            'section' => 'vw_bakery_pro_slider_section'
	        )
	    ) );

		$wp_customize->add_setting('vw_bakery_pro_slide_delay',array(
			'default'	=> '10000',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('vw_bakery_pro_slide_delay',array(
			'label'	=> __('Slide Delay','vw-bakery-pro'),
			'section'	=> 'vw_bakery_pro_slider_section',
			'description' => __('interval is in milliseconds. 1000 = 1 second -> so 1000 * 10 = 10 seconds', 'vw-bakery-pro'),
			'type'		=> 'number'
		));

		$wp_customize->add_setting( 'vw_bakery_pro_slide_remove_fade',
		   array(
		      'default' => 0,
		      'transport' => 'refresh',
		      'sanitize_callback' => 'vw_bakery_pro_switch_sanitization'
		));	 
		$wp_customize->add_control( new Vw_Bakery_Pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_bakery_pro_slide_remove_fade',
		   array(
		      'label' => esc_html__( 'Remove Fade Slider','vw-bakery-pro' ),
		      'section' => 'vw_bakery_pro_slider_section'
		)));
	
	 	$wp_customize->add_setting( 'vw_bakery_pro_sliderHeading_color_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_sliderHeading_color_separator_option',
        array(
            'label' => __('section Color and font setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_slider_section'
        )
    ) );

	$wp_customize->add_setting( 'vw_bakery_pro_sliderHeading_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_sliderHeading_color', array(
		'label' => __('Slider Heading Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_slider_section',
		'settings' => 'vw_bakery_pro_sliderHeading_color',
	)));
	//This is Slider Heading FontFamily picker setting
	$wp_customize->add_setting('vw_bakery_pro_sliderHeading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_sliderHeading_font_family', array(
	    'section'  => 'vw_bakery_pro_slider_section',
	    'label'    => __( 'Slider Heading Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	// This is Slider Text Color picker setting
	$wp_customize->add_setting( 'vw_bakery_pro_slidertext_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_slidertext_color', array(
		'label' => __('Slider Text Color', 'vw-bakery-pro'),
		'section' => 'vw_bakery_pro_slider_section',
		'settings' => 'vw_bakery_pro_slidertext_color',
	)));
	//This is Slider Text FontFamily picker setting
	$wp_customize->add_setting('vw_bakery_pro_slidertext_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_bakery_pro_slidertext_font_family', array(
	    'section'  => 'vw_bakery_pro_slider_section',
	    'label'    => __( 'Slider Text Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	// Button color settings
	$wp_customize->add_setting( 'vw_bakery_pro_slide_buttoncolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_slide_buttoncolor', array(
		'label' => 'First Button Text Color',
		'section' => 'vw_bakery_pro_slider_section',
		'settings' => 'vw_bakery_pro_slide_buttoncolor',
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_slide_buttonbgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_slide_buttonbgcolor', array(
		'label' => 'First Button Background Color',
		'section' => 'vw_bakery_pro_slider_section',
		'settings' => 'vw_bakery_pro_slide_buttonbgcolor',
	)));
	$wp_customize->add_setting('vw_bakery_pro_button_fontfamily',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_button_fontfamily', array(
	    'section'  => 'vw_bakery_pro_slider_section',
	    'label'    => __( 'First Button Text Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));

 	// Button color settings
	$wp_customize->add_setting( 'vw_bakery_pro_slide_buttonsecondcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_slide_buttonsecondcolor', array(
		'label' => 'Second Button Text Color',
		'section' => 'vw_bakery_pro_slider_section',
		'settings' => 'vw_bakery_pro_slide_buttonsecondcolor',
	)));
	$wp_customize->add_setting( 'vw_bakery_pro_slide_buttonsecondbgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_slide_buttonsecondbgcolor', array(
		'label' => 'Second Button Background Color',
		'section' => 'vw_bakery_pro_slider_section',
		'settings' => 'vw_bakery_pro_slide_buttonsecondbgcolor',
	)));
	$wp_customize->add_setting('vw_bakery_pro_buttonsecond_fontfamily',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_bakery_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_bakery_pro_buttonsecond_fontfamily', array(
	    'section'  => 'vw_bakery_pro_slider_section',
	    'label'    => __( 'Second Button Text Fonts','vw-bakery-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));
 	$wp_customize->add_setting('vw_bakery_pro_slider_arrows',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_bakery_pro_slider_arrows',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Next & Previous Arrows','vw-bakery-pro'),
        'section' => 'vw_bakery_pro_slider_section',
    ));
?>