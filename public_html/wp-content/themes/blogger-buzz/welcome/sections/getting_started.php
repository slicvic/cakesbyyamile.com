<div class="getting-started-top-wrap clearfix">
	<div class="theme-steps-list">
		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 1 - Manage Home Page Posts Layout', 'blogger-buzz'); ?></h3>
			<ol>
				<li><?php echo esc_html__('Go to Appearance >> Customize >> Home / Category Posts Settings >> HomePage Posts Settings', 'blogger-buzz'); ?></li>
				<li><?php echo esc_html__('Select Home Blog Posts Layout Per as you want.', 'blogger-buzz'); ?></li>
				<li><?php echo esc_html__('Save changes', 'blogger-buzz'); ?></li>
			</ol>
		</div>

		<div class="theme-steps">
			<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/homepage-blog-posts.gif'); ?>" alt="<?php echo esc_html__('Select Home Page Blog Posts Layout', 'blogger-buzz'); ?>">
		</div>

	</div>

	<div class="theme-image">
		<h3><?php echo esc_html__('Import Sample Demo', 'blogger-buzz'); ?></h3>
		<img src="<?php echo esc_url(get_template_directory_uri(). '/screenshot.png'); ?>" alt="<?php echo esc_html__('Buzzstore Demo', 'blogger-buzz'); ?>">

		<div class="theme-import-demo">
			<?php 
			$bloggerbuzzdemo_importer_slug = 'one-click-demo-import';
			$bloggerbuzzdemo_importer_filename ='one-click-demo-import';
			$bloggerbuzzimport_url = '#';

			if ( $this->bloggerbuzzcheck_installed_plugin( $bloggerbuzzdemo_importer_slug, $bloggerbuzzdemo_importer_filename ) && !$this->bloggerbuzzcheck_plugin_active_state( $bloggerbuzzdemo_importer_slug, $bloggerbuzzdemo_importer_filename ) ) :
				$bloggerbuzzimport_class = 'button button-primary bloggerbuzz-activate-plugin';
				$bloggerbuzzimport_button_text = esc_html__('Activate Importer Plugin', 'blogger-buzz');
			elseif( $this->bloggerbuzzcheck_installed_plugin( $bloggerbuzzdemo_importer_slug, $bloggerbuzzdemo_importer_filename ) ) :
				$bloggerbuzzimport_class = 'button button-primary';
				$bloggerbuzzimport_button_text = esc_html__('Go to Importer Page >>', 'blogger-buzz');
				$bloggerbuzzimport_url = admin_url('themes.php?page=pt-one-click-demo-import');
			else :
				$bloggerbuzzimport_class = 'button button-primary bloggerbuzz-install-plugin';
				$bloggerbuzzimport_button_text = esc_html__('Install Importer Plugin', 'blogger-buzz');
			endif;
			?>
			<p><?php echo sprintf(esc_html__('Or you can import the demo with just one click. It is recommended to import the demo on a fresh WordPress install. Or you can reset the website using %s plugin.', 'blogger-buzz'), '<a target="_blank" href="https://wordpress.org/plugins/wordpress-reset/">WordPress Reset</a>'); ?></p>

			<p><?php echo esc_html__('Note: First Install All Theme Recommended Plugins.', 'blogger-buzz'); ?></p>

			<p><?php echo esc_html__('Click on the button below to install and activate demo importer plugin.', 'blogger-buzz'); ?></p>
			<a data-slug="<?php echo esc_attr($bloggerbuzzdemo_importer_slug); ?>" data-filename="<?php echo esc_attr($bloggerbuzzdemo_importer_filename); ?>" class="<?php echo esc_attr($bloggerbuzzimport_class); ?>" href="<?php echo esc_url( $bloggerbuzzimport_url ); ?>"><?php echo esc_html($bloggerbuzzimport_button_text); ?></a>
		</div>
	</div>
</div>


<div class="getting-started-bottom-wrap">
	<h3><?php echo esc_html__('Check our premium demos. You might be interested in purchasing premium version.', 'blogger-buzz'); ?></h3>
	<p><?php echo esc_html__('Check out the websites that you can create with the premium version of the Blogger Buzz Pro theme. These demos can be imported with just one click in the premium version.', 'blogger-buzz'); ?></p>

	<div class="recomended-plugin-wrap clearfix">

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/bloggerbuzzpro.jpg'); ?>" alt="<?php echo esc_html__('Blogger Buzz Pro Demo One', 'blogger-buzz'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Blogger Buzz Pro Demo One','blogger-buzz'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/bloggerbuzzpro/" class="button button-primary"><?php echo esc_html__('Preview', 'blogger-buzz'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/bloggerbuzzpro-three.jpg'); ?>" alt="<?php echo esc_html__('Blogger Buzz Pro Demo Two', 'blogger-buzz'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Blogger Buzz Pro Demo Two','blogger-buzz'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/bloggerbuzzpro/sample-v1/" class="button button-primary"><?php echo esc_html__('Preview', 'blogger-buzz'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/bloggerbuzzpro-two.jpg'); ?>" alt="<?php echo esc_html__('Blogger Buzz Pro Demo Three', 'blogger-buzz'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Blogger Buzz Pro Demo Three','blogger-buzz'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/bloggerbuzzpro/sample-v2/" class="button button-primary"><?php echo esc_html__('Preview', 'blogger-buzz'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/bloggerbuzzpro-four.jpg'); ?>" alt="<?php echo esc_html__('Blogger Buzz Pro Demo Four', 'blogger-buzz'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Blogger Buzz Pro Demo Four','blogger-buzz'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/bloggerbuzzpro/sample-v3/" class="button button-primary"><?php echo esc_html__('Preview', 'blogger-buzz'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/bloggerbuzzpro-five.jpg'); ?>" alt="<?php echo esc_html__('Blogger Buzz Pro Demo Five', 'blogger-buzz'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Blogger Buzz Pro Demo Five','blogger-buzz'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/bloggerbuzzpro/sample-v4/" class="button button-primary"><?php echo esc_html__('Preview', 'blogger-buzz'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/bloggerbuzzpro-six.jpg'); ?>" alt="<?php echo esc_html__('Blogger Buzz Pro Demo Six', 'blogger-buzz'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Blogger Buzz Pro Demo Six','blogger-buzz'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/bloggerbuzzpro/sample-v5/" class="button button-primary"><?php echo esc_html__('Preview', 'blogger-buzz'); ?></a>
				</span>
			</div>
		</div>

	</div>
</div>

<div class="upgrade-box">
	<div class="upgrade-box-text">
		<h3><?php echo esc_html__('Upgrade To Premium Version ( Blogger Buzz Pro )', 'blogger-buzz'); ?></h3>
		<p><?php echo esc_html__('Blogger Buzz Pro Theme you can create a beautiful website. if you want to unlock more possibilites then upgrade to premium version.', 'blogger-buzz'); ?></p>
		<p><?php echo esc_html__('Try the Premium version and check if it fits to your need or not.', 'blogger-buzz'); ?></p>
	</div>

	<a class="upgrade-button" href="https://sparklewpthemes.com/wordpress-themes/bloggerbuzzpro/" target="_blank"><?php esc_html_e('Upgrade Now', 'blogger-buzz'); ?></a>
</div>