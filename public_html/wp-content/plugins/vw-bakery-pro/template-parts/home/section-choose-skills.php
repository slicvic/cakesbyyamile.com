<?php 
$mission_enable = get_theme_mod( 'vw_bakery_pro_radio_choose_skills_enable' );
if ( 'Disable' == $mission_enable ) {
  return;
}
if( get_theme_mod('vw_bakery_pro_choose_skills_bgcolor') ) { 
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_bakery_pro_choose_skills_bgcolor')).';';
}elseif( get_theme_mod('vw_bakery_pro_choose_skills_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_bakery_pro_choose_skills_bgimage')).'\')';
}else{
  $about_backg = '';   
}
?>
<section id="choose_skills" style="<?php echo esc_html($about_backg); ?>">
	<div class="container">
		<?php if(get_theme_mod('vw_bakery_pro_choose_skills_title') != ''){ ?>
			<div class="text-center">
				<h3><?php echo esc_html(get_theme_mod('vw_bakery_pro_choose_skills_title')); ?></h3>
			</div>
		<?php } ?>
		<div class="text-center">
			<img class="mt-3 mb-4" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_choose_skills_title_image')); ?>" alt="Image"/>
		</div>
		<div class="row">
			<div class="<?php if (get_theme_mod( 'vw_bakery_pro_our_choose_section_enable',true ) ==  'Enable'){ echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?> ">
				<?php require_once VW_BAKERY_PRO_PLUGIN_PATH.'template-parts/home/skills.php'; ?>
			</div>
			<div class="<?php if (get_theme_mod( 'vw_bakery_pro_skills_enabledisable',true ) ==  'Enable'){ echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?>">
			<?php require_once VW_BAKERY_PRO_PLUGIN_PATH. 'template-parts/home/why-choose-us.php'; ?>
			</div>			
		</div>
	</div>
</section>