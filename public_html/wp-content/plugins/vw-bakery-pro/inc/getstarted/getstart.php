<?php
//about theme info
add_action( 'admin_menu', 'vw_bakery_pro_gettingstarted' );
function vw_bakery_pro_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'vw-bakery-pro'), esc_html__('Get Started', 'vw-bakery-pro'), 'edit_theme_options', 'vw_bakery_pro_guide', 'vw_bakery_pro_mostrar_guide');   
}
$theme = wp_get_theme(); // gets the current theme
function vw_bakery_pro_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<p><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/final-logo.png'; ?>" width="200"></p>
			<h2><?php _e( 'Thanks for installing Sirat theme, you rock!', 'vw-bakery-pro' ) ?> </h2>
			<p><?php _e( 'VW Bakery Pro now supports colors, typography custom links for custom post types. Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional website', 'vw-bakery-pro' ) ?></p>
			<p><?php _e( "Please Click on the link below to know the Plugin setup information", 'vw-bakery-pro' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=vw_bakery_pro_guide' ) ); ?>" class="button button-primary"><?php _e( 'Getting Started With VW Bakery Pro', 'vw-bakery-pro' ); ?></a></p>
		</div>
	</div>
	<?php }
}
if ( 'Sirat' == $theme->name) {
	add_action('admin_notices', 'vw_bakery_pro_notice');
}


function vw_bakery_pro_notice1(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<p><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/final-logo.png'; ?>" width="200"></p>
			<h2><?php _e( 'To take the benefit of VW Bakery Pro Plugin please activate Sirat Free Theme', 'vw-bakery-pro' ) ?> </h2>
		</div>
	</div>
	<?php }
}
if ( 'Sirat' != $theme->name) {
	add_action('admin_notices', 'vw_bakery_pro_notice1');
}
/* Review Start*/
add_action( 'admin_notices', 'vw_bakery_pro_r_review' );
function vw_bakery_pro_r_review() {

	// Verify that we can do a check for reviews.
	$review = get_option( 'vw_bakery_pro_r_review' );
	$time	= time();
	$load	= false;
	if ( ! $review ) {
		$review = array(
			'time' 		=> $time,
			'dismissed' => false
		);
		add_option('vw_bakery_pro_r_review', $review);
		//$load = true;
	} else {
		// Check if it has been dismissed or not.
		if ( (isset( $review['dismissed'] ) && ! $review['dismissed']) && (isset( $review['time'] ) && (($review['time'] + (DAY_IN_SECONDS * 2)) <= $time)) ) {
			$load = true;
		}
	}
	// If we cannot load, return early.
	if ( ! $load ) {
		return;
	}

	// We have a candidate! Output a review message.
	?>
	<div class="notice notice-info is-dismissible vw_bakery_pro-acc-r-review-notice">
		<div class="vw_notice_outer">
			<img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/V-Logo.png'; ?>" width="200">
		</div>
		<p class="vw_review_head"><?php echo esc_html('Hi! We saw you have been using VW Bakery Pro Plugin for a few days and wanted to ask for your help to make the Plugin better.We just need a minute of your time to rate the Plugin. Thank you!'); ?></p>
		<p class="vw_review_buttons"> 
			<a href="<?php echo esc_url (VW_BAKERY_PRO_REVIEW); ?>" class="vw_bakery_pro-acc-r-dismiss-review-notice vw_bakery_pro-acc-r-review-out vw_review_buttons_a" target="_blank" rel="noopener"><?php echo esc_html('Rate the Plugin','vw-bakery-pro'); ?></a>
			<a href="#"  class="vw_bakery_pro-acc-r-dismiss-review-notice vw_bakery_pro-rate-later vw_review_buttons_a" target="_self" rel="noopener"><?php echo esc_html( 'Maybe Later', '' ); ?></a>
			<a href="#" class="vw_bakery_pro-acc-r-dismiss-review-notice vw_bakery_pro-rated vw_review_buttons_a" target="_self" rel="noopener"><?php echo esc_html( 'I already did', '' ); ?></a>
		</p>
	</div>
	<script type="text/javascript">
		jQuery(document).ready( function($) {
			$(document).on('click', '.vw_bakery_pro-acc-r-dismiss-review-notice, .vw_bakery_pro-acc-r-dismiss-notice .notice-dismiss', function( event ) {
				if ( $(this).hasClass('vw_bakery_pro-acc-r-review-out') ) {
					var vw_bakery_pro_rate_data_val = "1";
				}
				if ( $(this).hasClass('vw_bakery_pro-rate-later') ) {
					var vw_bakery_pro_rate_data_val =  "2";
					event.preventDefault();
				}
				if ( $(this).hasClass('vw_bakery_pro-rated') ) {
					var vw_bakery_pro_rate_data_val =  "3";
					event.preventDefault();
				}

				$.post( ajaxurl, {
					action: 'vw_bakery_pro_r_dismiss_reviews',
					vw_bakery_pro_rate_data_acc_r : vw_bakery_pro_rate_data_val
				});
				
				$('.vw_bakery_pro-acc-r-review-notice').hide();
				//location.reload();
			});
		});
	</script>
	<?php
}

add_action( 'wp_ajax_vw_bakery_pro_r_dismiss_reviews', 'vw_bakery_pro_r_dismiss_reviews' );
function vw_bakery_pro_r_dismiss_reviews() {
	if ( ! $review ) {
		$review = array();
	}
	
	if($_POST['vw_bakery_pro_rate_data_acc_r']=="1"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		
	}
	if($_POST['vw_bakery_pro_rate_data_acc_r']=="2"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		
	}
	if($_POST['vw_bakery_pro_rate_data_acc_r']=="3"){
		$review['time'] 	 = time();
		$review['dismissed'] = true;
		
	}
	update_option( 'vw_bakery_pro_r_review', $review );
	die;
}

/* Review End*/

// Add a Custom CSS file to WP Admin Area
function vw_bakery_pro_admin_theme_style() {
   wp_enqueue_style( 'vw-bakery-pro-font', vw_bakery_pro_admin_font_url(), array() );
   wp_enqueue_style('custom-admin-style', VW_BAKERY_PRO_EXT_URI.'inc/getstarted/getstart.css');
    wp_enqueue_script('tabs',VW_BAKERY_PRO_EXT_URI.'inc/getstarted/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_bakery_pro_admin_theme_style');

// Theme Font URL
function vw_bakery_pro_admin_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Muli:300,400,600,700,800,900';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//guidline for about theme
function vw_bakery_pro_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-bakery-pro' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php _e( 'Welcome to VW Bakery Pro', 'vw-bakery-pro' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php _e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-bakery-pro'); ?></p>
    </div>
    <div class="tab-sec">
		<div class="tab">
		  	<button class="tablinks" onclick="openCity(event, 'theme_info')"><?php _e( 'Getting Started', 'vw-bakery-pro' ); ?></button>  
		  	<button class="tablinks" onclick="openCity(event, 'demo_importer')"><?php _e( 'Demo Content Importer', 'vw-bakery-pro' ); ?></button>
		  	<button class="tablinks" onclick="openCity(event, 'plugins')"><?php _e( 'Plugins', 'vw-bakery-pro' ); ?></button>
		  	<button class="tablinks" onclick="openCity(event, 'theme_offer')"><?php esc_html_e( 'Hire Us', 'vw-bakery-pro' ); ?></button>
		 	<button class="tablinks" onclick="openCity(event, 'others_theme')"><?php esc_html_e( 'Other Products', 'vw-bakery-pro' ); ?></button>
		 	
		</div>

		<!-- Tab content -->
		<div id="theme_info" class="tabcontent open">
			
		  	<div class="col-left-inner">
		  		<h3><?php _e( 'VW Bakery Pro Plugin Information', 'vw-bakery-pro' ); ?></h3>
				<hr class="h3hr">
		  		<h4><?php _e( 'Plugin Documentation', 'vw-bakery-pro' ); ?></h4>
				<p><?php _e( 'If you need any assistance regarding setting up and configuring the Plugin, our documentation is there.', 'vw-bakery-pro' ); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_BAKERY_PRO_THEME_DOC ); ?>" target="_blank"> <?php _e( 'Documentation', 'vw-bakery-pro' ); ?></a>
				</div>
				<hr>
				<h4><?php _e('Plugin Customizer', 'vw-bakery-pro'); ?></h4>
				<p> <?php _e('To begin customizing your website, start by clicking "Customize".', 'vw-bakery-pro'); ?></p>
				<div class="info-link">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php _e('Customizing', 'vw-bakery-pro'); ?></a>
				</div>
				<hr>				
				<h4><?php _e('Having Trouble, Need Support?', 'vw-bakery-pro'); ?></h4>
				<p> <?php _e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our Plugin.', 'vw-bakery-pro'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_BAKERY_PRO_SUPPORT ); ?>" target="_blank"><?php _e('Support Forum', 'vw-bakery-pro'); ?></a>
				</div>
				<hr>
				<h4><?php _e('Reviews & Testimonials', 'vw-bakery-pro'); ?></h4>
				<p> <?php _e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-bakery-pro'); ?>  </p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_BAKERY_PRO_REVIEW ); ?>" target="_blank"><?php _e('Reviews', 'vw-bakery-pro'); ?></a>
				</div>
		  	</div>
		  	<div class="col-right-inner">
			  <h3><?php _e('How to set up Home Page Template','vw-bakery-pro'); ?></h3>
			  <hr class="h3hr">
				<p><?php _e('Follow these instructions to setup Home page.','vw-bakery-pro'); ?></p>
                 <ul>
                  <li><?php _e('1. Create a Page to set template:  Go to ','vw-bakery-pro'); ?>
                  <b><?php _e('Dashboard &gt;&gt; Pages &gt;&gt; Add New Page','vw-bakery-pro'); ?></b>.
                  <p><?php _e('Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.','vw-bakery-pro'); ?></p></li>
                  <img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/home-page-template.png'; ?>" alt="" />
                  <p></p><span class="strong"><?php _e('2. Set the front page:','vw-bakery-pro'); ?></span><?php _e(' Go to ','vw-bakery-pro'); ?>
				  <b><?php _e(' Settings -&gt; Reading --&gt; Set the front page display static page to home page ','vw-bakery-pro'); ?></b></p>
				  <img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/set-front-page.png'; ?>" alt="" />
                  <p><?php _e(' Once you are done with this, you can see all the demo content on front page. ','vw-bakery-pro'); ?></p>
                 </ul>
		  	</div>
		</div>	
		<div id="plugins" class="tabcontent">
			<h2 class="dashboard-install-title"><?php _e(' Install Required Plugins ','vw-bakery-pro'); ?></h2>
            <div class="required_theme">
            	<p>
					<?php esc_html_e('In order to use vw bakery pro plugin you need to install sirat free theme ','vw-bakery-pro'); ?>
				</p>
				<ul>
					<li>
						<?php esc_html_e('Go to wordpress dashboard >> appearance >> themes','vw-bakery-pro'); ?>
					</li>
					<li>
						<?php esc_html_e('click on add New then upload theme','vw-bakery-pro'); ?>
					</li>
					<li>
						<?php esc_html_e('Select your theme folder and click on install now button','vw-bakery-pro'); ?>
					</li>
					<li>
						<?php esc_html_e('After installation activate sirat theme','vw-bakery-pro'); ?>
					</li>

				</ul>
			</div>
	     	<div class="posttype-plugin">
		     	<h2 id="heading"><?php _e('Set up VW Bakery Pro Plugin','vw-bakery-pro'); ?></h2>
		     	<p><b><?php _e('Plugins are ways to extend and add to the functionality that already exists in WordPress.','vw-bakery-pro'); ?></b></p>
		     	<ol>
		     		<li><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/right-arrow.png'; ?>" alt="" /><?php _e('First, you need to download the plugin from the source (which will be a zip file vw-bakery-pro-plugin).','vw-bakery-pro'); ?> </li>
		     		<li><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/right-arrow.png'; ?>" alt="" /><?php _e('Next, you need to go to WordPress admin area and visit Plugins &#187; Add New.','vw-bakery-pro'); ?>  </b></li>
		     		<figure class="img-paraloid"><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/uploadplug.png'; ?>" alt="" /></figure>
		     		<li><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/right-arrow.png'; ?>" alt="" /><?php _e('After that, click on the ','vw-bakery-pro'); ?> <b><?php _e('Upload Plugin button','vw-bakery-pro'); ?></b> <?php _e('on top of the page.','vw-bakery-pro'); ?></li>
		     		<li><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/right-arrow.png'; ?>" alt="" /> <?php _e('This will bring you to the plugin upload page.','vw-bakery-pro'); ?> </li>
		     		<li><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/right-arrow.png'; ?>" alt="" /><?php _e('Here, you need to click on the choose file button and select the plugin file you downloaded earlier to your computer.','vw-bakery-pro'); ?></li>
		     		<figure class="img-paraloid pull-left"><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/pluginuploadpage.png'; ?>" alt="" /></figure>
		     		<li><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/right-arrow.png'; ?>" alt="" /><?php _e(' After you have selected the file, you need to click on the install now button.','vw-bakery-pro'); ?></li>
		     		<li><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/right-arrow.png'; ?>" alt="" /><?php _e(' WordPress will now upload the plugin file from your computer and install it for you. You will see a success message like this after installation is finished.','vw-bakery-pro'); ?></li>
		     		<li><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/right-arrow.png'; ?>" alt="" /><?php _e(' Once installed, you need to click on the Activate Plugin link to start using the plugin.','vw-bakery-pro'); ?></li>
		     		<li><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/right-arrow.png'; ?>" alt="" /> <?php _e('  As soon as you activate plugin, you will get Team and Testimonial in your Admin Navigation Pannel.','vw-bakery-pro'); ?></li>
		        </ol>
	     	</div>
		</div>

		<div id="demo_importer" class="tabcontent">
			<h3><?php esc_html_e('Do Before Demo Importer','vw-bakery-pro'); ?></h3>
			<ol class="importer-note">
				<li>
				<?php esc_html_e('Firstly Upload and Activate Sirat Theme From','vw-bakery-pro'); ?>
					<a href="https://wordpress.org/themes/sirat/" target="_blank">WordPress.org</a>
				</li>
				<li>
					<?php echo esc_html('Upload and Activate WooCommerce and Contact Form 7 plugin then run demo importer to display demo contents','vw-bakery-pro'); ?>
				</li>
				<li>
					<?php echo esc_html('Check Demo Importer Demo','vw-bakery-pro'); ?>
					<a href="https://www.youtube.com/watch?v=pCeJwmd-5sM&feature=youtu.be" target="_blank">Here</a>
				</li>
			</ol>
			<h3><?php _e( 'Click the below run importer button to import demo content', 'vw-bakery-pro' ); ?></h3>
			<hr class="h3hr">
			<?php 
			/* Get Started. */ 
			require_once VW_BAKERY_PRO_EXT_DIR .'inc/getstarted/demo-importer.php'; ?>
		</div>
		<div id="theme_offer" class="tabcontent">
			<div class="theme-offer">
				<a href="<?php echo esc_url(VW_BAKERY_PRO_CONTACT); ?>" target="_blank"><img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/theme_offers.png'; ?>" alt="" /></a>
			</div>
		</div>
		<div id="others_theme" class="tabcontent">
			<h3><?php esc_html_e( 'You may also like some of our products', 'vw-bakery-pro' ); ?></h3>
			<hr class="h3hr">
			<div class="row-bar">
				<div class="col2-first">
					<h3><?php esc_html_e('SHOPIFY THEME','vw-bakery-pro'); ?></h3>
					<img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/shopify.png'; ?>" alt="" />
					<h4><b><?php esc_html_e('VW SHOWCASE SHOPIFY THEME','vw-bakery-pro'); ?></b></h4>
					<p><?php esc_html_e('If you want to run an online store, VW Showcase is the theme for you. Set your business statement by emphasizing on your products that could be anything like electronic items, home appliances, fashion accessories etc.','vw-bakery-pro'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_BAKERY_PRO_SHOPIFY ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'vw-bakery-pro' ); ?></a>
					</div>
				</div>
				<div class="col2-first">
					<h3><?php esc_html_e('MOODLE THEME','vw-bakery-pro'); ?></h3>
					<img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/moodle.png'; ?>" alt="" />
					<h4><b><?php esc_html_e('TALEEM RESPONSIVE LMS PRODUCT','vw-bakery-pro'); ?></b></h4>
					<p><?php esc_html_e('Taleem is a responsive Lms Product developed to be used by schools, colleges, universities, coaching institutes, online course providers and similar websites.','vw-bakery-pro'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_BAKERY_PRO_MOODLE ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'vw-bakery-pro' ); ?></a>
					</div>
				</div>
				<div class="col2-first">
					<h3><?php esc_html_e('MOBILE APP','vw-bakery-pro'); ?></h3>
					<img src="<?php echo VW_BAKERY_PRO_EXT_URI.'inc/getstarted/images/mobile_app.png'; ?>" alt="" />
					<h4><b><?php esc_html_e('VW WOOCOMMERCE MOBILE APP','vw-bakery-pro'); ?></b></h4>
					<p><?php esc_html_e('Give your customer freedom and convenience of shopping from mobile through your own mobile commerce App. This app will be fully synchronised with your woo-commerce store. Place orders easily and set extra mobile benefits.','vw-bakery-pro'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_BAKERY_PRO_MOBILE_APP ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'vw-bakery-pro' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>