<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Bakery
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'vw-bakery' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header role="banner">
  <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'vw-bakery' ); ?></a> 

	<div id="header" class="responsive-menu">
    <div class="toggle-nav mobile-menu">
      <button role="tab" onclick="menu_openNav()"><i class="<?php echo esc_html(get_theme_mod('vw_bakery_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-bakery'); ?></span></button>
    </div>
		<div id="mySidenav" class="nav sidenav">
      <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-bakery' ); ?>">
        <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="<?php echo esc_html(get_theme_mod('vw_bakery_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-bakery'); ?></span></a>
        <?php 
          wp_nav_menu( array( 
            'theme_location' => 'responsive-menu',
            'container_class' => 'main-menu clearfix' ,
            'menu_class' => 'clearfix',
            'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
            'fallback_cb' => 'wp_page_menu',
          ) ); 
        ?>
      </nav>
    </div>
	</div>
	<div class="home-page-header">
    <?php get_template_part('template-parts/header/topbar'); ?>
    <?php get_template_part('template-parts/header/header-top'); ?>
	</div>
</header>

<?php if(get_theme_mod('vw_bakery_loader_enable',true)==1){ ?>
  <div id="preloader">
    <div id="status">
      <?php $theme_lay = get_theme_mod( 'vw_bakery_loader_icon','Two Way');
        if($theme_lay == 'Two Way'){ ?>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/two-way.gif" alt="" role="img"/>
      <?php }else if($theme_lay == 'Dots'){ ?>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/dots.gif" alt="" role="img"/>
      <?php }else if($theme_lay == 'Rotate'){ ?>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/rotate.gif" alt="" role="img"/>
      <?php } ?>
    </div>
  </div>
<?php } ?>