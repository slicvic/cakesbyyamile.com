<?php
/**
 * Template part for displaying Top Bar Content
 *
 * @package vw_bakery_pro
 */ 

$about_section = get_theme_mod( 'vw_bakery_pro_topbar_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
/*About us*/
if( get_theme_mod('vw_bakery_pro_topbar_bgcolor','') ) {
  $background_setting = 'background-color:'.esc_attr(get_theme_mod('vw_bakery_pro_topbar_bgcolor','')).';';
}elseif( get_theme_mod('vw_bakery_pro_topbar_bgimage','') ){
  $background_setting = 'background-image:url(\''.esc_url(get_theme_mod('vw_bakery_pro_topbar_bgimage')).'\')';
}else{
  $background_setting = '';
}
?>
<section id="<?php echo VW_BAKERY_STYLES; ?>site_top" class="<?php echo VW_BAKERY_STYLES; ?>top_bar" style="<?php echo esc_attr($background_setting);  ?>">
  <div class="container container-full-width">
    <div class="contact_details">
      <div class="row m-0">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="left-col">
            <ul class="left-side-content">
              <?php if(get_theme_mod('vw_bakery_pro_topbar_searchbox',true)!= ""){?>
                <li class="<?php echo VW_BAKERY_STYLES; ?>search-box">
                  <span><i class="fas fa-search"></i></span>
                </li>
              <?php }?>
              <?php if(get_theme_mod('vw_bakery_pro_header_address') != ''){ ?>
                <li>
                  <span class="hi_normal"><i class="fas fa-location-arrow"></i><?php echo esc_html(get_theme_mod('vw_bakery_pro_header_address'));?></span>
                </li>
              <?php } ?>            
              <div class="<?php echo VW_BAKERY_STYLES; ?>serach_outer">
                <div class="closepop"><i class="far fa-window-close"></i></div>
                <div class="<?php echo VW_BAKERY_STYLES; ?>serach_inner">
                  <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>"><input type="search" id="<?php echo esc_attr($unique_id); ?>" class="<?php echo VW_BAKERY_STYLES; ?>search-field" placeholder="<?php echo esc_attr_x( 'Type to search..', 'placeholder', 'vw-bakery-pro' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo esc_html_e( 'Search', 'vw-bakery-pro' ); ?></span>
                    <span><i class="fas fa-search"></i></span></button>
                    <input type="hidden" name="post_type" value="properties">
                  </form>
                </div>
              </div>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 offset-lg-0 col-md-6 col-sm-6">
          <div class="right-side-content row">
            <div class="col-md-9 col-sm-9 col-9">
              <?php if(get_theme_mod('vw_bakery_pro_header_social_icons',true) != ''){ ?>
              <?php require_once VW_BAKERY_PRO_PLUGIN_PATH.'template-parts/home/social-icons.php'; ?>
              <?php } ?>
            </div>
            <?php if(get_theme_mod('vw_bakery_pro_header_cart',true) != ''){ ?>
              <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                <div class="col-md-3 col-sm-3 col-3">
                  <div class="cart_box">
                    <span class="hi_normal"><i class="fas fa-cart-arrow-down"></i></span>
                    <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
                    <div class="top-cart" id="cart">
                      <div id="top-add-to-cart">
                        <div class="top-cart-inner">
                          <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } 
            else {
              echo '<h6>'.esc_html('Install Woocommerce for cart box','vw-bakery-pro').'</h6>'; }
            } ?>
          </div>
        </div>        
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</section>