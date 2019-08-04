<?php
/**
 * Template part for displaying team Post
 *
 * @package vw_bakery_pro
 */ 
$about_section = get_theme_mod( 'vw_bakery_pro_radio_team_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
if( get_theme_mod('vw_bakery_pro_team_bgcolor','') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_bakery_pro_team_bgcolor','')).';';
}elseif( get_theme_mod('vw_bakery_pro_team_bgimage','') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_bakery_pro_team_bgimage')).'\')';
}else{
  $about_backg = '';
}
?>
<section id="team" style="<?php echo esc_attr($about_backg); ?>">
  <div class="container">
    <div class="row">
		<?php
			$args = array(
			'post_type' => 'team',
			'post_status' => 'publish',
			'posts_per_page' => 4
		);
		$new = new WP_Query($args); ?>
		<div class="col-lg-6 col-md-12">
	      <ul class="nav row">
	        <?php $j=1;
	         	while ( $new->have_posts() ){
		            $new->the_post();  ?>
		              <li class="nav-item col-lg-6 col-md-3 col-6 mb-4">
		                  <a class="nav-link <?php if($j==1){ echo 'active'; } ?>" href="#team_tab<?php echo esc_attr($j);?>" role="tab" data-toggle="tab">	
		                    <img src="<?php the_post_thumbnail_url(); ?>">
		                    <span class="teamimg-border"></span>
		                  </a>
		              </li>
	        	<?php $j++; }
	       wp_reset_query(); ?>
	      </ul>
	  	</div>
	  	<div class="col-lg-6 col-md-12">
	  	<div class="text-center">
			<?php if(get_theme_mod('vw_bakery_pro_team_title',true != '')){?>
			<h3><?php echo esc_html(get_theme_mod('vw_bakery_pro_team_title')); ?></h3>
			<?php } ?>
			<img class="mt-3 mb-4" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_team_title_image')); ?>" alt="Image"/>

	    </div>
	    <div class="tab-content team_content">
	       <?php $i=1; while ( $new->have_posts() ){
		        $new->the_post();  ?>
		        <div role="tabpanel" class="tm_tab mt-4 tab-pane fade <?php if($i==1){ echo 'in active show'; } ?>" id="team_tab<?php echo esc_attr($i);?>">		        	
		         	<div class="team_outer_box">
						<div class="team-box">
							<h3 class="team_name"><a href="<?php the_permalink(); ?>"><span class="heading3"><?php the_title(); ?></span></a></h3>
							<p class="p-3"><?php $excerpt = get_the_excerpt(); echo esc_html(vw_bakery_pro_string_limit_words($excerpt,40)); ?></p>
							<div class="team-socialbox mt-3 mb-3">                         
								<?php if(get_post_meta($post->ID,'meta-facebookurl',true) || get_post_meta($post->ID,'meta-twitterurl',true) || get_post_meta($post->ID,'meta-googleplusurl',true) || get_post_meta($post->ID,'meta-linkdenurl',true)){?>
									<?php if(get_post_meta($post->ID,'meta-facebookurl',true)){?>
									<a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-facebookurl',true)); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
									<?php } if(get_post_meta($post->ID,'meta-twitterurl',true)){?>
									<a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-twitterurl',true)); ?>" target="_blank"><i class="fab fa-twitter"></i></a>                              
									<?php } if(get_post_meta($post->ID,'meta-linkdenurl',true)){?>
									<a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-linkdenurl',true)); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
									<?php } if(get_post_meta($post->ID,'meta-googleplusurl',true)){?>
									<a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-googleplusurl',true)); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
									<?php }?>
								<?php }?>
			                </div>
			                <a class="team-link" href="<?php the_permalink(); ?>"><?php echo esc_html('Discover More'); ?></a>
						</div>
		          	</div>
		        </div>
	        <?php $i++; }
	       wp_reset_query(); ?>
	      </div>
	    </div>
	</div>
    <div class="clearfix"></div>
  </div>
</section>