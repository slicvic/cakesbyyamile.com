<?php 
$about_section = get_theme_mod( 'vw_bakery_pro_our_choose_section_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
if( get_theme_mod('vw_bakery_pro_choose_skills_bgcolor') ) { 
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_bakery_pro_our_choose_bgcolor')).';';
}elseif( get_theme_mod('vw_bakery_pro_choose_skills_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_bakery_pro_our_choose_bgimage')).'\')';
}else{
  $about_backg = '';   
}
$countchoose =  get_theme_mod('vw_bakery_pro_choose_box_number');
if($countchoose != ''){
?>
<div id="why-choose-us">
  <div class="inner_sec">
    <div class="about-inner">
      <div class="why-choose-box row">            
        <?php for($i=1; $i<=$countchoose; $i++) { ?>
          <div class="col-lg-12 mb-4">
            <div class="row">
              <?php if(get_theme_mod('vw_bakery_pro_choose_box_image'.$i) != ''){ ?>
              <div class="col-md-3 col-4">
                <div class="choose-box-icon">
                  <img src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_choose_box_image'.$i)); ?>" alt="Image"/>
                </div>
              </div>
              <?php } ?>
              <div class="col-md-9 col-8">
                <div class="choose-box-content">
                  <?php if(get_theme_mod('vw_bakery_pro_choose_box_title'.$i) != ''){ ?>
                    <h4><?php echo esc_html(get_theme_mod('vw_bakery_pro_choose_box_title'.$i)); ?></h4>
                    <?php } ?>
                    <p><?php echo esc_html(get_theme_mod('vw_bakery_pro_choose_box_des'.$i)); ?></p>
                  
                </div>            
              </div>
            </div> 
          </div>
        <?php } ?>            
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php } ?>