<?php
/**
 * Template part for displaying posts
 *
 * @package vw_bakery_pro
 */
?>
<div id="<?php echo VW_BAKERY_STYLES; ?>header">
  <div class="container custom_container">
    <div class="m-0">
      <div class="menubar m-0 mt-3 mt-md-0 mt-lg-3">
        <div class="row bg-media">
          <div class="innermenubox mobile-menu">
            <div class="toggle-nav">
                <span onclick="openNav()"><i class="fas fa-bars"></i></span>
            </div>
            <div id="<?php echo VW_BAKERY_STYLES; ?>mySidenav" class="<?php echo VW_BAKERY_STYLES; ?>nav <?php echo VW_BAKERY_STYLES; ?>sidenav">
              <nav id="<?php echo VW_BAKERY_STYLES; ?>site-navigation" class="<?php echo VW_BAKERY_STYLES; ?>main-navigation">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times"></i></a>
                <?php 
                  wp_nav_menu( array( 
                    'theme_location' => 'vw_primary_menu',
                    'container_class' => 'menu clearfix' ,
                    'menu_class' => 'clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                ?>
              </nav><!-- #site-navigation -->
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
          <div class="row mobile_logo">
            <div class="col-md-12 col-lg-5 left_menu">
              <nav id="<?php echo VW_BAKERY_STYLES; ?>site-navigation" class="<?php echo VW_BAKERY_STYLES; ?>main-navigation w-100">
                <?php 
                  wp_nav_menu( array( 
                    'theme_location' => 'vw_left_menu',
                    'container_class' => 'menu clearfix' ,
                    'menu_class' => 'clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s list_nav">%3$s</ul>',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                ?>
              </nav><!-- #site-navigation -->
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-8 logo_static">
              <div class="<?php echo VW_BAKERY_STYLES; ?>logo_outer_box">
                <div class="<?php echo VW_BAKERY_STYLES; ?>logo_outer">
                  <div class="<?php echo VW_BAKERY_STYLES; ?>logo">
                    <?php 
                      if( has_custom_logo() ){  vw_bakery_pro_the_custom_logo();  }

                      if( get_theme_mod('vw_bakery_pro_display_title', true) != ''){ ?>
                        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
                      <?php }

                      if( get_theme_mod('vw_bakery_pro_display_tagline', true) != ''){ 
                        $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) : ?>
                          <p class="<?php echo VW_BAKERY_STYLES; ?>site-description"><?php echo esc_html($description); ?></p>
                      <?php endif; }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-5 right_menu">
              <nav id="<?php echo VW_BAKERY_STYLES; ?>site-navigation" class="<?php echo VW_BAKERY_STYLES; ?>main-navigation w-100">
                <?php 
                  wp_nav_menu( array( 
                    'theme_location' => 'vw_right_menu',
                    'container_class' => 'menu clearfix' ,
                    'menu_class' => 'clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s list_nav">%3$s</ul>',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                ?>
              </nav><!-- #site-navigation -->
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>