<?php

	$tafri_travel_theme_color = get_theme_mod('tafri_travel_theme_color');

	$custom_css = '';

	if($tafri_travel_theme_color != false){
		$custom_css .='#sidebar .tagcloud a:hover,.top-header,input[type="submit"], .read-moresec a:hover, .search-box i, #slider i:hover, #slider .inner_carousel .view-btn a, #destination hr, .date-color, .page-box:hover .read-more-btn a, span.meta-nav, #footer input[type="submit"], .copyright, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], .pagination a:hover, .pagination .current, #footer .tagcloud a:hover, #header .nav ul li:hover > ul, .des_box .des_content{';
			$custom_css .='background-color: '.esc_html($tafri_travel_theme_color).';';
		$custom_css .='}';
	}
	if($tafri_travel_theme_color != false){
		$custom_css .='.pagination span, .pagination a,input[type="search"], .read-moresec a, .page-box:hover h4, .read-more-btn a, #footer h3, a.showcoupon,.woocommerce-message::before, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce .quantity .qty, #sidebar caption, #sidebar h3, h1.entry-title,
			h1.page-title, a, #content-box h2,.page-box-single .metabox, #content-box h3{';
			$custom_css .='color: '.esc_html($tafri_travel_theme_color).';';
		$custom_css .='}';
	}
	if($tafri_travel_theme_color != false){
		$custom_css .='#slider i:hover,#destination h2, #slider .inner_carousel .view-btn a, #footer input[type="search"], .read-more-btn a,.woocommerce .quantity .qty, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .serach_inner form.search-form{';
			$custom_css .='border-color: '.esc_html($tafri_travel_theme_color).';';
		$custom_css .='}';
	}
	if($tafri_travel_theme_color != false){
		$custom_css .='.woocommerce-message, #header{';
			$custom_css .='border-top-color: '.esc_html($tafri_travel_theme_color).';';
		$custom_css .='}';
	}
	if($tafri_travel_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($tafri_travel_theme_color).'!important;';
		$custom_css .='}';
	}
	if($tafri_travel_theme_color != false){
		$custom_css .='.page-box-single h3{';
			$custom_css .='color: '.esc_html($tafri_travel_theme_color).'!important;';
		$custom_css .='}';
	}