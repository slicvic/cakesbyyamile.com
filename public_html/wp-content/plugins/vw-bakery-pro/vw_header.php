<?php
/**
 * The Header for our theme.
 *
 * @package vw-bakery-pro
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="<?php echo VW_BAKERY_STYLES; ?>masthead" class="<?php echo VW_BAKERY_STYLES; ?>site-header">

    <!-- before header hook -->
    <?php do_action( 'vw_bakery_pro_before_topbar' ); ?>
    <?php require_once VW_BAKERY_PRO_EXT_DIR. 'template-parts/header/top-bar.php'; ?> 
    
    <?php do_action( 'vw_bakery_pro_before_header' ); ?>
    <?php require_once VW_BAKERY_PRO_EXT_DIR. 'template-parts/header/content-header.php'; ?> 

    <div class="clearfix"></div>

  </header>