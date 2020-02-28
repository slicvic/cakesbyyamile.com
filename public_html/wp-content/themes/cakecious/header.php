<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cakecious
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if( function_exists('cakecious_tt_preloader')) echo cakecious_tt_preloader(); ?>

<?php

	$hdr_type = cakecious_get_hdr_type();
	// load appropriate header template
	if( empty($hdr_type) || $hdr_type == 'default' )      get_template_part( 'templates/header1' );
	if( $hdr_type == 'header2' )                          get_template_part( 'templates/header2' );
	if( $hdr_type == 'header3' )                          get_template_part( 'templates/header3' );
	if( $hdr_type == 'header4' )                          get_template_part( 'templates/header4' );
	if( $hdr_type == 'header5' )                          get_template_part( 'templates/header5' );


?>