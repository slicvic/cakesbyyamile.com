<?php 
$about_section = get_theme_mod( 'vw_bakery_pro_skills_enabledisable' );
if ( 'Disable' == $about_section ) {
  return;
}
$count =  get_theme_mod('vw_bakery_pro_skills_number');
?>
<div id="<?php echo VW_BAKERY_STYLES; ?>skills">
  <div class="inner_sec">
    <div class="container">      
      <div class="about-inner">
        <div class="bar_box">
          <?php  
            for($i=1; $i<=$count; $i++) {?>
              <p><?php echo get_theme_mod('vw_bakery_pro_skills_bar_title'.$i);?></p>
              <div class="<?php echo VW_BAKERY_STYLES; ?>progress">
                <div class="<?php echo VW_BAKERY_STYLES; ?>progress-bar" style="width:<?php echo esc_attr(get_theme_mod('vw_bakery_pro_skills_bar_percent'.$i)); ?>">
                  <span class="progress_percentage"><?php echo get_theme_mod('vw_bakery_pro_skills_bar_percent'.$i);?></span>
                </div>
              </div>
           <?php } ?>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>