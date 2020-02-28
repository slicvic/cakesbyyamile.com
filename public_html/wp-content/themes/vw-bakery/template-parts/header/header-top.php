<?php
/**
 * The template part for header
 *
 * @package VW Bakery 
 * @subpackage vw_bakery
 * @since VW Bakery 1.0
 */
?>

<?php
  $vw_bakery_search_hide_show = get_theme_mod( 'vw_bakery_search_hide_show' );
  if ( 'Disable' == $vw_bakery_search_hide_show ) {
   $colmd = 'col-lg-5 col-md-12';
  } else { 
   $colmd = 'col-lg-4 col-md-11';
  } 
?>

<div id="header">
  <div class="header-menu <?php if( get_theme_mod( 'vw_bakery_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
    <div class="container">
      <div class="bg-header-box">
        <div class="row">
          <div class="col-lg-5 col-md-12">
            <div class="primary-left">
              <div id="mySidenav" class="nav sidenav">
                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-bakery' ); ?>">
                  <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-bakery'); ?></span></a>
                  <?php 
                    wp_nav_menu( array( 
                      'theme_location' => 'primary-left',
                      'container_class' => 'main-menu clearfix' ,
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                  ?>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 col-12 logo_static">
            <div class="logo_outer_box">
              <div class="logo_outer">
                <div class="logo">
                  <?php if ( has_custom_logo() ) : ?>
                    <div class="site-logo"><?php the_custom_logo(); ?></div>
                  <?php endif; ?>
                  <?php $blog_info = get_bloginfo( 'name' ); ?>
                    <?php if ( ! empty( $blog_info ) ) : ?>
                      <?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                      <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php
                      $description = get_bloginfo( 'description', 'display' );
                      if ( $description || is_customize_preview() ) :
                    ?>
                    <p class="site-description">
                      <?php echo esc_html( $description ); ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="<?php echo esc_html( $colmd ); ?>">
            <div class="primary-right">
              <div id="mySidenav" class="nav sidenav">
                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-bakery' ); ?>">
                  <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-bakery'); ?></span></a>
                  <?php 
                    wp_nav_menu( array( 
                      'theme_location' => 'primary-right',
                      'container_class' => 'main-menu clearfix' ,
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                  ?>
                </nav>
              </div>
            </div>
          </div>
          <?php if ( 'Disable' != $vw_bakery_search_hide_show ) {?>
            <div class="search-box col-lg-1 col-md-1">
              <span><a href="#"><i class="fas fa-search"></i></a></span>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="serach_outer">
    <div class="closepop"><a href="#"><i class="far fa-window-close"></i></a></div>
    <div class="serach_inner">
      <?php get_search_form(); ?>
    </div>
  </div>
</div>