<?php
	
	/*---------------First highlight color-------------------*/

	$vw_bakery_first_color = get_theme_mod('vw_bakery_first_color');

	$custom_css = '';

	if($vw_bakery_first_color != false){
		$custom_css .='.cart_box, .contact-btn a, .products li:hover span.onsale, #footer, nav.woocommerce-MyAccount-navigation ul li, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, input[type="submit"], .pagination span, .pagination a, #comments a.comment-reply-link, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar .woocommerce-product-search button{';
			$custom_css .='background-color: '.esc_html($vw_bakery_first_color).';';
		$custom_css .='}';
	}
	if($vw_bakery_first_color != false){
		$custom_css .='#comments input[type="submit"].submit{';
			$custom_css .='background-color: '.esc_html($vw_bakery_first_color).'!important;';
		$custom_css .='}';
	}
	if($vw_bakery_first_color != false){
		$custom_css .='a, a.more-btn:hover, a.content-bttn:hover, .mid-contact p, .products li:hover span, #footer .tagcloud a:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .post-main-box:hover h2 a, .post-main-box:hover a, .woocommerce-message::before{';
			$custom_css .='color: '.esc_html($vw_bakery_first_color).';';
		$custom_css .='}';
	}
	if($vw_bakery_first_color != false){
		$custom_css .='.post-info hr, .woocommerce-message, .main-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($vw_bakery_first_color).';';
		$custom_css .='}';
	}
	if($vw_bakery_first_color != false){
		$custom_css .='.main-navigation ul ul, .header-fixed{';
			$custom_css .='border-bottom-color: '.esc_html($vw_bakery_first_color).';';
		$custom_css .='}';
	}
	if($vw_bakery_first_color != false){
		$custom_css .='.logo_outer{';
			$custom_css .='border-left-color: '.esc_html($vw_bakery_first_color).';';
		$custom_css .='}';
	}
	if($vw_bakery_first_color != false){
		$custom_css .='.logo_outer{';
			$custom_css .='border-right-color: '.esc_html($vw_bakery_first_color).';';
		$custom_css .='}';
	}

	$custom_css .='@media screen and (max-width:720px) {';
		if($vw_bakery_first_color != false){
			$custom_css .='#header{
			background-color:'.esc_html($vw_bakery_first_color).';
			}';
		}
	$custom_css .='}';

	$custom_css .='@media screen and (min-width:768px) and (max-width: 1023px) {';
		if($vw_bakery_first_color != false){
			$custom_css .='.logo img, .logo, .logo_outer_box{
			background-color:'.esc_html($vw_bakery_first_color).';
			}';
		}
	$custom_css .='}';

	/*---------------------------Second highlight color-------------------*/

	$vw_bakery_second_color = get_theme_mod('vw_bakery_second_color');

	if($vw_bakery_second_color != false){
		$custom_css .='#topbar, .time, .woocommerce span.onsale, #footer input[type="submit"], #sidebar .custom-social-icons i:hover, #footer .custom-social-icons i:hover, .scrollup i, #footer-2, #footer .woocommerce #respond input#submit, #footer .woocommerce a.button, #footer .woocommerce button.button, #footer .woocommerce input.button, #footer .woocommerce #respond input#submit.alt, #footer .woocommerce a.button.alt, #footer .woocommerce button.button.alt, #footer .woocommerce input.button.alt, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button:hover, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer .woocommerce-product-search button:hover{';
			$custom_css .='background-color: '.esc_html($vw_bakery_second_color).';';
		$custom_css .='}';
	}
	if($vw_bakery_second_color != false){
		$custom_css .='.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, #sidebar .custom-social-icons i, #footer .custom-social-icons i, .main-navigation ul.sub-menu a:hover, .main-navigation a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$custom_css .='color: '.esc_html($vw_bakery_second_color).';';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_bakery_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='#slider .inner-carousel-conetnt{';
			$custom_css .='top: -9em;';
		$custom_css .='}';
		$custom_css .='#slider .carousel-caption{';
			$custom_css .='top: 43%;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='#slider .inner-carousel-conetnt{';
			$custom_css .='top: -9em;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_bakery_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_bakery_slider_content_option','Center');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption{';
			$custom_css .='text-align:center; left:13%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption{';
			$custom_css .='text-align:center; left:23%; right:23%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption{';
			$custom_css .='text-align:center; left:45%; right:13%;';
		$custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_bakery_blog_layout_option','Default');
    if($theme_lay == 'Default'){
		$custom_css .='.post-main-box{';
			$custom_css .='';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$custom_css .='text-align:center;';
		$custom_css .='}';
		$custom_css .='.post-info, .content-bttn{';
			$custom_css .='margin-top:10px;';
		$custom_css .='}';
		$custom_css .='.post-info hr{';
			$custom_css .='margin:15px auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Left'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$custom_css .='text-align:Left;';
		$custom_css .='}';
		$custom_css .='.content-bttn{';
			$custom_css .='margin:20px 0;';
		$custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$topbar = get_theme_mod( 'vw_bakery_resp_topbar_hide_show',true);
    if($topbar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#topbar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($topbar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#topbar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$stickyheader = get_theme_mod( 'vw_bakery_stickyheader_hide_show',true);
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.header-fixed{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.header-fixed{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$stickyheader = get_theme_mod( 'vw_bakery_resp_slider_hide_show',true);
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$metabox = get_theme_mod( 'vw_bakery_metabox_hide_show',true);
    if($metabox == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.post-info{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($metabox == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.post-info{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$sidebar = get_theme_mod( 'vw_bakery_sidebar_hide_show',true);
    if($sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_bakery_topbar_padding_top_bottom = get_theme_mod('vw_bakery_topbar_padding_top_bottom');
	if($vw_bakery_topbar_padding_top_bottom != false){
		$custom_css .='#topbar{';
			$custom_css .='padding-top: '.esc_html($vw_bakery_topbar_padding_top_bottom).'; padding-bottom: '.esc_html($vw_bakery_topbar_padding_top_bottom).';';
		$custom_css .='}';
	}


	/*------------------ Search Settings -----------------*/
	
	$vw_bakery_search_font_size = get_theme_mod('vw_bakery_search_font_size');
	if($vw_bakery_search_font_size != false) {
		$custom_css .='.search-box i{';
			$custom_css .='font-size: '.esc_html($vw_bakery_search_font_size).';';
		$custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_bakery_button_border = get_theme_mod( 'vw_bakery_button_border', false);
	if($vw_bakery_button_border == true){
		$custom_css .='a.more-btn, a.content-bttn{';
			$custom_css .='border:2px solid; display: inline-block;';
		$custom_css .='}';
	}

	$vw_bakery_button_padding_top_bottom = get_theme_mod('vw_bakery_button_padding_top_bottom');
	$vw_bakery_button_padding_left_right = get_theme_mod('vw_bakery_button_padding_left_right');
	if($vw_bakery_button_padding_top_bottom != false || $vw_bakery_button_padding_left_right != false){
		$custom_css .='a.more-btn, a.content-bttn, .woocommerce ul.products li.product .button{';
			$custom_css .='padding-top: '.esc_html($vw_bakery_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_bakery_button_padding_top_bottom).';padding-left: '.esc_html($vw_bakery_button_padding_left_right).';padding-right: '.esc_html($vw_bakery_button_padding_left_right).';';
		$custom_css .='}';
	}

	$vw_bakery_button_border_radius = get_theme_mod('vw_bakery_button_border_radius');
	if($vw_bakery_button_border_radius != false){
		$custom_css .='a.more-btn, a.content-bttn, .woocommerce ul.products li.product .button{';
			$custom_css .='border-radius: '.esc_html($vw_bakery_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_bakery_copyright_alingment = get_theme_mod('vw_bakery_copyright_alingment');
	if($vw_bakery_copyright_alingment != false){
		$custom_css .='.copyright p{';
			$custom_css .='text-align: '.esc_html($vw_bakery_copyright_alingment).';';
		$custom_css .='}';
	}

	$vw_bakery_copyright_padding_top_bottom = get_theme_mod('vw_bakery_copyright_padding_top_bottom');
	if($vw_bakery_copyright_padding_top_bottom != false){
		$custom_css .='#footer-2{';
			$custom_css .='padding-top: '.esc_html($vw_bakery_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_bakery_copyright_padding_top_bottom).';';
		$custom_css .='}';
	}