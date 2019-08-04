<?php
    /* Footer Sections */
   
    
    $wp_customize->add_setting( 'vw_bakery_pro_social_icons_separator_option',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_bakery_pro_social_icons_separator_option',
        array(
            'label' => __('social Icons Setting','vw-bakery-pro'),
            'section' => 'vw_bakery_pro_social_icons'
        )
    ) );

    $wp_customize->add_section('vw_bakery_pro_social_icons',array(
        'title' => __('Social Icons','vw-bakery-pro'),
        'description'   => __('Add social Icons details Here','vw-bakery-pro'),
        'panel' => 'vw_bakery_pro_panel_id',
    ));

    $wp_customize->add_setting('vw_bakery_pro_headertwitter',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_bakery_pro_headertwitter',array(
        'label' => __('Add twitter link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_social_icons',
        'setting'   => 'vw_bakery_pro_headertwitter',
        'type'      => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_headerpinterest',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_bakery_pro_headerpinterest',array(
        'label' => __('Add pinterest link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_social_icons',
        'setting'   => 'vw_bakery_pro_headerpinterest',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_headerfacebook',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_bakery_pro_headerfacebook',array(
        'label' => __('Add facebook link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_social_icons',
        'setting'   => 'vw_bakery_pro_headerfacebook',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_headeryoutube',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_bakery_pro_headeryoutube',array(
        'label' => __('Add Youtube link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_social_icons',
        'setting'   => 'vw_bakery_pro_headeryoutube',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_headerinstagram',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_bakery_pro_headerinstagram',array(
        'label' => __('Add Instagram link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_social_icons',
        'setting'   => 'vw_bakery_pro_headerinstagram',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_headerlinkedin',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_bakery_pro_headerlinkedin',array(
        'label' => __('Add Linkedin link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_social_icons',
        'setting'   => 'vw_bakery_pro_headerlinkedin',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_headertumblric',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_bakery_pro_headertumblric',array(
        'label' => __('Add Tumblr link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_social_icons',
        'setting'   => 'vw_bakery_pro_headertumblric',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_headergoogleplus',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_bakery_pro_headergoogleplus',array(
        'label' => __('Add GooglePlus link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_social_icons',
        'setting'   => 'vw_bakery_pro_headergoogleplus',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_headerflickr',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_bakery_pro_headerflickr',array(
        'label' => __('Add Flickr link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_social_icons',
        'setting'   => 'vw_bakery_pro_headerflickr',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_bakery_pro_headervk',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_bakery_pro_headervk',array(
        'label' => __('Add VK link','vw-bakery-pro'),
        'section'   => 'vw_bakery_pro_social_icons',
        'setting'   => 'vw_bakery_pro_headervk',
        'type'  => 'text'
    ));
    //color pallet//
    $wp_customize->add_setting( 'vw_bakery_pro_social_icon_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '
        vw_bakery_pro_social_icon_color', array(
        'label' => __('Icons Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_social_icons',
        'settings' => 'vw_bakery_pro_social_icon_color',
    )));

    $wp_customize->add_setting( 'vw_bakery_pro_social_icon_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_social_icon_bgcolor', array(
        'label' => __('Icons Background Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_social_icons',
        'settings' => 'vw_bakery_pro_social_icon_bgcolor',
    )));

    $wp_customize->add_setting( 'vw_bakery_pro_social_icon_hover_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_bakery_pro_social_icon_hover_color', array(
        'label' => __('Icons Hover Background Color', 'vw-bakery-pro'),
        'section' => 'vw_bakery_pro_social_icons',
        'settings' => 'vw_bakery_pro_social_icon_hover_color',
    )));
?>