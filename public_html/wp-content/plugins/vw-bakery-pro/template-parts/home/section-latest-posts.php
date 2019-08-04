<?php 
$latestpost_enable = get_theme_mod( 'vw_bakery_pro_radio_post_enable' );
if ( 'Disable' == $latestpost_enable ) {
  return;
}
/*Latest post*/
if( get_theme_mod('vw_bakery_pro_latest_post_color') ) { 
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_bakery_pro_latest_post_color')).';';
}elseif( get_theme_mod('vw_bakery_pro_our_latest_post_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_bakery_pro_our_latest_post_bgimage')).'\')';
}else{
  $about_backg = '';   
}
?>
<section id="latest_post" style="<?php echo esc_html($about_backg); ?>">
  <div class="innerbox">
    <div class="container">
      <div class="row">
      <?php
        $i=1;
        $j =1;
        $args = array(
          'post_type' => 'post',
          'category_name' => get_theme_mod('vw_bakery_pro_latestblogpost_setting'),
          'posts_per_page'=> 3,
        );
        $new = new WP_Query($args);
         while( $new->have_posts() ) : $new->the_post(); 
         $data= get_post_meta( $post->ID); ?>
         <?php if($j == 4 ) { $j = 1; } ?>         
          <?php if($j == 1 ){ ?>
            <div class="col-lg-8 col-md-8 col-sm-12">
          <?php } if($j == 3){ ?>
            <div class="col-lg-4 col-md-4 col-sm-12">
          <?php } ?>
            <div class="postbox">
              <div class="row m-0"> 
                <div class="<?php if($j == 1 || $j == 2){ ?> col-md-6 <?php } ?> pl-0">
                  <div class="postpic">
                    <?php if (has_post_thumbnail()){ ?>
                    <?php the_post_thumbnail(); ?>
                    <?php } ?>                  
                  </div>
                </div>
                <div class="<?php if($j == 1 || $j == 2){ ?> col-md-6 <?php } ?> pl-0">
                  <div class="postbox-content postcol<?php echo esc_attr($i); ?>">
                    <h3 class="post_head"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html(vw_bakery_pro_string_limit_words($excerpt,25)); ?></p>
                    <div class="read-more">
                      <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'READ MORE','vw-bakery-pro' ); ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php if($j == 2){ ?>
            </div>
          <?php } ?>
            <?php  $j++; $i++; endwhile; 
          ?> 
          </div>      
        </div>
    </div>
  </div>
</section>