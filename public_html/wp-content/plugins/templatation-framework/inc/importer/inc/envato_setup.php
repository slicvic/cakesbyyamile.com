<?php
/**
 * Envato Theme Setup Wizard Class
 *
 * Takes new users through some basic steps to setup their ThemeForest theme.
 *
 * @author      dtbaker
 * @author      vburlak
 * @package     envato_wizard
 * @version     1.1.7
 *
 * Based off the WooThemes installer.
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Envato_Theme_Setup_Wizard' ) ) {
	/**
	 * Envato_Theme_Setup_Wizard class
	 */
	class Envato_Theme_Setup_Wizard {

		/**
		 * The class version number.
		 *
		 * @since 1.1.1
		 * @access private
		 *
		 * @var string
		 */
		protected $version = '1.1.9';

		/** @var string Current theme name, used as namespace in actions. */
		protected $theme_name = '';

		/** @var string Current Step */
		protected $step   = '';

		/** @var array Steps for the setup wizard */
		protected $steps  = array();

		/**
		 * Relative plugin path
		 *
		 * @since 1.1.2
		 *
		 * @var string
		 */
		protected $plugin_path = '';

		/**
		 * Relative plugin url for this plugin folder, used when enquing scripts
		 *
		 * @since 1.1.2
		 *
		 * @var string
		 */
		protected $plugin_url = '';

		/**
		 * The slug name to refer to this menu
		 *
		 * @since 1.1.1
		 *
		 * @var string
		 */
		protected $page_slug;

		/**
		 * TGMPA instance storage
		 *
		 * @var object
		 */
		protected $tgmpa_instance;

		/**
		 * TGMPA Menu slug
		 *
		 * @var string
		 */
		protected $tgmpa_menu_slug = 'tgmpa-install-plugins';

		/**
		 * TGMPA Menu url
		 *
		 * @var string
		 */
		protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';

		/**
		 * The slug name for the parent menu
		 *
		 * @since 1.1.2
		 *
		 * @var string
		 */
		protected $page_parent;

		/**
		 * Complete URL to Setup Wizard
		 *
		 * @since 1.1.2
		 *
		 * @var string
		 */
		protected $page_url;


		/**
		 * Holds the current instance of the theme manager
		 *
		 * @since 1.1.3
		 * @var Envato_Theme_Setup_Wizard
		 */
		private static $instance = null;

		/**
		 * @since 1.1.3
		 *
		 * @return Envato_Theme_Setup_Wizard
		 */
		public static function get_instance() {
			if ( ! self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * A dummy constructor to prevent this class from being loaded more than once.
		 *
		 * @see Envato_Theme_Setup_Wizard::instance()
		 *
		 * @since 1.1.1
		 * @access private
		 */
		public function __construct() {
			$this->init_globals();
			$this->init_actions();
		}

		/**
		 * Get the default style. Can be overriden by theme init scripts.
		 *
		 * @see Envato_Theme_Setup_Wizard::instance()
		 *
		 * @since 1.1.9
		 * @access public
		 */
		public function get_header_logo_width(){
			return '200px';
		}

		/**
		 * Setup the class globals.
		 *
		 * @since 1.1.1
		 * @access private
		 */
		public function init_globals() {
			$current_theme = wp_get_theme();
			$temptt_parent_thm = get_template();
			$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#','',$current_theme->get( 'Name' ) ) );
			$this->page_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_page_slug', $temptt_parent_thm.'-setup' );
			$this->parent_slug = apply_filters( $temptt_parent_thm . '_theme_setup_wizard_parent_slug', '' );

			//If we have parent slug - set correct url
			if( $this->parent_slug !== '' ){
				$this->page_url = 'admin.php?page='.$this->page_slug;
			}else{
				$this->page_url = 'admin.php?page='.$this->page_slug;
			}
			$this->page_url = apply_filters( $this->theme_name . '_theme_setup_wizard_page_url', $this->page_url );

			//set relative plugin path url
			$this->plugin_path = trailingslashit( $this->cleanFilePath( dirname( __FILE__ ) ) );
			$relative_url = str_replace( $this->cleanFilePath( plugin_dir_path( __FILE__ ) ), '', $this->plugin_path );
			$this->plugin_url = trailingslashit( plugins_url( '/', __FILE__ ) . $relative_url );
		}

		/**
		 * Setup the hooks, actions and filters.
		 *
		 * @uses add_action() To add actions.
		 * @uses add_filter() To add filters.
		 *
		 * @since 1.1.1		 * @access private

		 */
		public function init_actions() {
			if ( apply_filters( $this->theme_name . '_enable_setup_wizard', true ) && current_user_can( 'manage_options' ) ) {

				if ( ! is_child_theme() ) {
					add_action( 'after_switch_theme', array( $this, 'switch_theme' ) );
				}

				if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
					add_action( 'init', array( $this, 'get_tgmpa_instanse' ), 30 );
					add_action( 'init', array( $this, 'set_tgmpa_url' ), 40 );
				}

				add_action( 'admin_menu', array( $this, 'admin_menus' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
				//add_action( 'admin_init', array( $this, 'admin_redirects' ), 30 );
				add_action( 'admin_init', array( $this, 'init_wizard_steps' ), 30 );
				add_action( 'admin_init', array( $this, 'setup_wizard' ), 30 );
				add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10, 1 );
				add_action( 'wp_ajax_envato_setup_plugins', array( $this, 'ajax_plugins' ) );
				add_action( 'wp_ajax_envato_setup_content', array( $this, 'ajax_content' ) );
			}
			if ( function_exists( 'envato_market' ) ) {
/*				add_action( 'admin_init', array( $this, 'envato_market_admin_init' ), 20 );
				add_filter( 'http_request_args', array( $this, 'envato_market_http_request_args' ), 10, 2 );*/
			}
		}

		public function enqueue_scripts() {
		}
		public function tgmpa_load( $status ) {
			return is_admin() || current_user_can( 'install_themes' );
		}

		public function switch_theme() {
			set_transient( '_'.$this->theme_name.'_activation_redirect', 1 );
		}
		public function admin_redirects() {
			ob_start();
			if ( ! get_transient( '_'.$this->theme_name.'_activation_redirect' ) ) {
				return;
			}
			delete_transient( '_'.$this->theme_name.'_activation_redirect' );
			wp_safe_redirect( admin_url( $this->page_url ) );
			exit;
		}

		/**
		 * Get configured TGMPA instance
		 *
		 * @access public
		 * @since 1.1.2
		 */
		public function get_tgmpa_instanse(){
			$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		}

		/**
		 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
		 *
		 * @access public
		 * @since 1.1.2
		 */
		public function set_tgmpa_url(){

			$this->tgmpa_menu_slug = ( property_exists($this->tgmpa_instance, 'menu') ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
			$this->tgmpa_menu_slug = apply_filters($this->theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug);

			$tgmpa_parent_slug = ( property_exists($this->tgmpa_instance, 'parent_slug') && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';

			$this->tgmpa_url = apply_filters($this->theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug.'?page='.$this->tgmpa_menu_slug);

		}

		/**
		 * Add admin menus/screens.
		 */
		public function admin_menus() {

			if( $this->is_submenu_page() ){
				//prevent Theme Check warning about "themes should use add_theme_page for adding admin pages"
				$add_subpage_function = 'add_submenu'.'_page';
				$add_subpage_function( $this->parent_slug, __( 'Theme Setup Wizard','envato_setup' ), __( 'Theme Setup Wizard','envato_setup' ), 'manage_options', $this->page_slug, array( $this, 'setup_wizard' ) );
			}else{
				add_theme_page( __( 'Theme Setup Wizard','envato_setup' ), __( 'Theme Setup Wizard','envato_setup' ), 'manage_options', $this->page_slug, array( $this, 'setup_wizard' ) );
		}

		}

		/**
		 * Setup steps.
		 *
		 * @since 1.1.1
		 * @access public
		 * @return array
		 */
		public function init_wizard_steps() {

			$this->steps = array(
				'introduction' => array(
					'name'    => __( 'Introduction', 'envato_setup' ),
					'view'    => array( $this, 'envato_setup_introduction' ),
					'handler' => array( $this, 'envato_setup_introduction_save' ),
				),
			);
			if( ! defined( 'TT_PCODE_NO' ) ) { /* only show below if purchase code verif enabled in theme.*/
				if ( is_file( get_template_directory() . '/inc/helper/theme-wupdates.php' ) && ( 0 != filesize( get_template_directory() . '/inc/helper/theme-wupdates.php' ) ) ) { /* only show if wupdte code exists.*/
					$this->steps['updates'] = array(
						'name'    => __( 'Activate', 'envato_setup' ),
						'view'    => array( $this, 'envato_setup_updates' ),
						'handler' => array( $this, 'envato_setup_updates_save' ),
					);
				}
			}
			$this->steps['customize'] = array(
				'name'    => __( 'Child Theme', 'envato_setup' ),
				'view'    => array( $this, 'envato_setup_customize' ),
				'handler' => '',
			);

			if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
				$this->steps['default_plugins'] = array(
					'name' => __( 'Plugins', 'envato_setup' ),
					'view' => array( $this, 'envato_setup_default_plugins' ),
					'handler' => '',
				);
			}
			$this->steps['default_content'] = array(
				'name'    => __( 'Content', 'envato_setup' ),
				'view'    => array( $this, 'envato_setup_default_content' ),
				'handler' => '',
			);
			$this->steps['design'] = array(
				'name'    => __( 'Theme Setup', 'envato_setup' ),
				'view'    => array( $this, 'envato_setup_tt_theme_setup' ),
				'handler' => array( $this, 'envato_setup_tt_theme_setup_save' ),
			);
			$this->steps['help_support'] = array(
				'name'    => __( 'Support', 'envato_setup' ),
				'view'    => array( $this, 'envato_setup_help_support' ),
				'handler' => '',
			);
			$this->steps['next_steps'] = array(
				'name'    => __( 'Ready!', 'envato_setup' ),
				'view'    => array( $this, 'envato_setup_ready' ),
				'handler' => '',
			);


			$this->steps = apply_filters(  $this->theme_name . '_theme_setup_wizard_steps', $this->steps );

		}

		/**
		 * Show the setup wizard
		 */
		public function setup_wizard() {
			if ( empty( $_GET['page'] ) || $this->page_slug !== $_GET['page'] ) {
				return;
			}
			ob_end_clean();

			$this->step = isset( $_GET['step'] ) ? sanitize_key( $_GET['step'] ) : current( array_keys( $this->steps ) );

			wp_register_script( 'jquery-blockui', $this->plugin_url . 'js/jquery.blockUI.js', array( 'jquery' ), '2.70', true );
			wp_register_script( 'envato-setup', $this->plugin_url . 'js/envato-setup.js', array( 'jquery', 'jquery-blockui' ), $this->version );
			wp_localize_script( 'envato-setup', 'envato_setup_params', array(
				'tgm_plugin_nonce'            => array(
					'update' => wp_create_nonce( 'tgmpa-update' ),
					'install' => wp_create_nonce( 'tgmpa-install' ),
				),
				'tgm_bulk_url' => admin_url( $this->tgmpa_url ),
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'wpnonce' => wp_create_nonce( 'envato_setup_nonce' ),
				'verify_text' => __( '...verifying','envato_setup' ),
			) );

			//wp_enqueue_style( 'envato_wizard_admin_styles', $this->plugin_url . '/css/admin.css', array(), $this->version );
			wp_enqueue_style( 'envato-setup', $this->plugin_url . 'css/envato-setup.css', array( 'wp-admin', 'dashicons', 'install' ), $this->version );

			//enqueue style for admin notices
			wp_enqueue_style( 'wp-admin' );

			wp_enqueue_media();
			wp_enqueue_script( 'media' );

			ob_start();
			$this->setup_wizard_header();
			$this->setup_wizard_steps();
			$show_content = true;
			echo '<div class="envato-setup-content">';
			if ( ! empty( $_REQUEST['save_step'] ) && isset( $this->steps[ $this->step ]['handler'] ) ) {
				$show_content = call_user_func( $this->steps[ $this->step ]['handler'] );
			}
			if ( $show_content ) {
				$this->setup_wizard_content();
			}
			echo '</div>';
			$this->setup_wizard_footer();
			exit;
		}

		public function get_step_link( $step ) {
			return  add_query_arg( 'step', $step, admin_url( 'admin.php?page=' .$this->page_slug ) );
		}
		public function get_next_step_link() {
			$keys = array_keys( $this->steps );
			return add_query_arg( 'step', $keys[ array_search( $this->step, array_keys( $this->steps ) ) + 1 ], remove_query_arg( 'translation_updated' ) );
		}

		/**
		 * Setup Wizard Header
		 */
		public function setup_wizard_header() {
		?>
		<!DOCTYPE html>
		<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
		<head>
			<meta name="viewport" content="width=device-width" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title><?php _e( 'Theme &rsaquo; Setup Wizard', 'envato_setup' ); ?></title>
			<?php wp_print_scripts( 'envato-setup' ); ?>
			<?php do_action( 'admin_print_styles' ); ?>
			<?php do_action( 'admin_print_scripts' ); ?>
			<?php //do_action( 'admin_head' ); ?>
		</head>
		<body class="envato-setup wp-core-ui">
		<h1 id="wc-logo">
			<a href="http://themeforest.net/user/templatation/portfolio" target="_blank"><?php
				$image_url = get_template_directory().'/assets/img/logo.jpg';
				$image_url1 = get_template_directory().'/assets/img/logo.png';
				if ( file_exists(get_template_directory().'/assets/img/logo.jpg') ) {
					$image = '<img class="site-logo" src="%s" alt="%s" style="width:%s; height:auto" />';
					printf(
						$image,
						get_template_directory_uri().'/assets/img/logo.jpg',
						get_bloginfo( 'name' ),
						''
					);
				} elseif ( file_exists(get_template_directory().'/assets/img/logo.png') ) {
					$image = '<img class="site-logo" src="%s" alt="%s" style="width:%s; height:auto" />';
					printf(
						$image,
						get_template_directory_uri().'/assets/img/logo.png',
						get_bloginfo( 'name' ),
						''
					);
				} else { ?>
					<p>Theme setup wizard</p><?php
				} ?></a>
		</h1>
		<?php
		}

		/**
	 * Setup Wizard Footer
		 */
		public function setup_wizard_footer() {
		?>
		<a class="wc-return-to-dashboard" href="<?php echo esc_url( admin_url() ); ?>"><?php _e( 'Return to the WordPress Dashboard', 'envato_setup' ); ?></a>
		</body>
		<?php
		@do_action( 'admin_footer' );
		do_action( 'admin_print_footer_scripts' );
		?>
		</html>
		<?php
	}

		/**
		 * Output the steps
		 */
		public function setup_wizard_steps() {
			$ouput_steps = $this->steps;
			array_shift( $ouput_steps );
			?>
			<ol class="envato-setup-steps">
				<?php foreach ( $ouput_steps as $step_key => $step ) : ?>
					<li class="<?php
					$show_link = false;
					if ( $step_key === $this->step ) {
						echo 'active';
					} elseif ( array_search( $this->step, array_keys( $this->steps ) ) > array_search( $step_key, array_keys( $this->steps ) ) ) {
						echo 'done';
						$show_link = true;
					}
					?>"><?php
						if ( $show_link ) {
							?>
							<a href="<?php echo esc_url( $this->get_step_link( $step_key ) );?>"><?php echo esc_html( $step['name'] );?></a>
							<?php
						} else {
							echo esc_html( $step['name'] );
						}
						?></li>
				<?php endforeach; ?>
			</ol>
			<?php
		}

		/**
		 * Output the content for the current step
		 */
		public function setup_wizard_content() {
			isset( $this->steps[ $this->step ] ) ? call_user_func( $this->steps[ $this->step ]['view'] ) : false;
		}

		/**
		 * Introduction step
		 */
		public function envato_setup_introduction() {
			if ( isset( $_REQUEST['export'] ) ) {

				// find the ID of our menu names so we can import them into default menu locations and also the widget positions below.
				$menus = get_terms( 'nav_menu' );
				$menu_ids = array();
				foreach ( $menus as $menu ) {
					if ( $menu->name == 'Main' ) {
						$menu_ids['primary'] = $menu->term_id;
					} else if ( $menu->name == 'Secondary' ) {
						$menu_ids['footer'] = $menu->term_id;
						$menu_ids['top_bar_nav'] = $menu->term_id;
					}
				}
				// used for me to export my widget settings.
				$widget_positions = get_option( 'sidebars_widgets' );
				$widget_options = array();
				$my_options = array();
				foreach ( $widget_positions as $sidebar_name => $widgets ) {
					if ( is_array( $widgets ) ) {
						foreach ( $widgets as $widget_name ) {
							$widget_name_strip = preg_replace( '#-\d+$#','',$widget_name );
							$widget_options[ $widget_name_strip ] = get_option( 'widget_'.$widget_name_strip );
						}
					}
				}

				?>
				<h1>Current Settings:</h1>
				<!--<p>categories.json:</p>
				<textarea style="width:100%; height:80px;"><?php /*echo json_encode( $categories );*/?></textarea>-->
				<?php // FIX IMAGES ?>
				<p>widget_positions.json</p>
				<textarea style="width:100%; height:80px;"><?php echo json_encode( $widget_positions );?></textarea>
				<p>widget_options.json:</p>
				<textarea style="width:100%; height:80px;"><?php echo json_encode( $widget_options );?></textarea>
				<p>menu.json:</p>
				<textarea style="width:100%; height:80px;"><?php echo json_encode( $menu_ids );?></textarea>
				<p>options.json:</p>
				<textarea style="width:100%; height:80px;"><?php echo json_encode( $my_options );?></textarea>
				<p>Copy these values into your PHP code when distributing/updating the theme.</p>
				<?php
			}  else if( get_option('envato_setup_complete', false) ){
				?>
				<h1><?php printf( __( 'Welcome to the setup wizard for %s.' ), ucfirst(get_template())); ?></h1>
				<p class="lead success"><?php _e('It looks like you already have setup'. ucfirst(get_template()));?></p>

				<p class="envato-setup-actions step">
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
						   class="button-primary button button-next button-large"><?php _e( 'Run Setup Wizard Again' ); ?></a>
					<a href="<?php echo admin_url( 'admin.php?page=templatation_dashboard' ); ?>"
					   class="button button-large"><?php _e( 'Exit to '. ucfirst(get_template()) .' Panel' ); ?></a>
				</p>
				<?php
			} else {
				?>
				<h1><?php printf( __( 'Welcome to the setup wizard for %s.' ), ucfirst(get_template())); ?></h1>
				<p class="lead"><?php printf( __( 'Thank you for choosing the %s theme from ThemeForest. This quick setup wizard will help you configure your new website. This wizard will install the required WordPress plugins, default content, logo and tell you a little about Help &amp; Support options. <br/>It should only take 3-5 minutes.' ), ucfirst(get_template())); ?></p>
				<p><?php _e( 'No time right now? If you don\'t want to go through the wizard, you can skip and return to the WordPress dashboard. Come back anytime if you change your mind!' ); ?></p>
				<p class="envato-setup-actions step">
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
					   class="button-primary button button-large button-next"><?php _e( 'Let\'s Go!' ); ?></a>
					<a href="<?php echo esc_url( wp_get_referer() && ! strpos( wp_get_referer(),'update.php' ) ? wp_get_referer() : admin_url( '' ) ); ?>"
					   class="button button-large"><?php _e( 'Not right now' ); ?></a>
				</p>
				<?php
			}
		}

		/**
		 *
		 * Handles save button from welcome page. This is to perform tasks when the setup wizard has already been run. E.g. reset defaults
		 *
		 * @since 1.2.5
		 */
		public function envato_setup_introduction_save(){

			check_admin_referer( 'envato-setup' );
			return false;
		}

		private function _wp_get_attachment_id_by_post_name( $post_name ) {
	        global $wpdb;
			$str = $post_name;
			$posts = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_title = '$str' ", OBJECT );
			if($posts) return $posts[0]->ID;
   		}

		private function _get_plugins() {
			$instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
			$plugins = array(
				'all'      => array(), // Meaning: all plugins which still have open actions.
				'install'  => array(),
				'update'   => array(),
				'activate' => array(),
			);

			foreach ( $instance->plugins as $slug => $plugin ) {
				if ( $instance->is_plugin_active( $slug ) && false === $instance->does_plugin_have_update( $slug ) ) {
					// No need to display plugins if they are installed, up-to-date and active.
					continue;
				} else {
					$plugins['all'][ $slug ] = $plugin;

					if ( ! $instance->is_plugin_installed( $slug ) ) {
						$plugins['install'][ $slug ] = $plugin;
					} else {
						if ( false !== $instance->does_plugin_have_update( $slug ) ) {
							$plugins['update'][ $slug ] = $plugin;
						}

						if ( $instance->can_plugin_activate( $slug ) ) {
							$plugins['activate'][ $slug ] = $plugin;
						}
					}
				}
			}
			return $plugins;
		}

		/**
		 * Page setup
		 */
		public function envato_setup_default_plugins() {

			tgmpa_load_bulk_installer();
			// install plugins with TGM.
			if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
				die( 'Failed to find TGM' );
			}
			$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'envato-setup' );
			$plugins = $this->_get_plugins();

			// copied from TGM

			$method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
			$fields = array_keys( $_POST ); // Extra fields to pass to WP_Filesystem.

			if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
				return true; // Stop the normal page form from displaying, credential request form will be shown.
			}

			// Now we have some credentials, setup WP_Filesystem.
			if ( ! WP_Filesystem( $creds ) ) {
				// Our credentials were no good, ask the user for them again.
				request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );

				return true;
			}

			/* If we arrive here, we have the filesystem */

			?>
			<h1><?php _e( 'Default Plugins', 'envato_setup' ); ?></h1>
			<form method="post">

				<?php
				$plugins = $this->_get_plugins();
				if ( count( $plugins['all'] ) ) {
					?>
					<p><?php _e( 'Your website needs a few essential plugins. The following plugins will be installed:', 'envato_setup' ); ?></p>
					<ul class="envato-wizard-plugins">
						<?php foreach ( $plugins['all'] as $slug => $plugin ) {  ?>
							<li data-slug="<?php echo esc_attr( $slug );?>"><?php echo esc_html( $plugin['name'] );?>
								<span>
    								<?php
								    $keys = array();
								    if ( isset( $plugins['install'][ $slug ] ) ) { $keys[] = 'Installation'; }
								    if ( isset( $plugins['update'][ $slug ] ) ) { $keys[] = 'Update'; }
								    if ( isset( $plugins['activate'][ $slug ] ) ) { $keys[] = 'Activation'; }
								    echo implode( ' and ',$keys ).' required';
								    ?>
    							</span>
								<div class="spinner"></div>
							</li>
						<?php } ?>
					</ul>
					<p><?php _e( 'If it takes too long or displays AJAX error, the faster way to activate plugins is, (Please let the all processes finish on this page first) Click the Return to WP Dashboard on bottom, Then go to Appearance-> Install plugins and Activate. Then you can restart this demo installer.', 'envato_setup' ); ?></p>
					<?php
				} else {
					echo '<p class="lead">'.__( 'Good news! All plugins are already installed and up to date. Please continue.','envato_setup' ).'</p>';
				} ?>

				<p class="envato-setup-actions step">
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button-primary button button-large button-next" data-callback="install_plugins"><?php _e( 'Continue', 'envato_setup' ); ?></a>
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php _e( 'Skip this step', 'envato_setup' ); ?></a>
					<?php wp_nonce_field( 'envato-setup' ); ?>
				</p>
			</form>
			<?php
		}


		public function ajax_plugins() {
			if ( ! check_ajax_referer( 'envato_setup_nonce', 'wpnonce' ) || empty( $_POST['slug'] ) ) {
				wp_send_json_error( array( 'error' => 1, 'message' => __( 'No Slug Found','envato_setup' ) ) );
			}
			$json = array();
			// send back some json we use to hit up TGM
			$plugins = $this->_get_plugins();
			// what are we doing with this plugin?
			foreach ( $plugins['activate'] as $slug => $plugin ) {
				if ( $_POST['slug'] == $slug ) {
					$json = array(
						'url' => admin_url( $this->tgmpa_url ),
						'plugin' => array( $slug ),
						'tgmpa-page' => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce' => wp_create_nonce( 'bulk-plugins' ),
						'action' => 'tgmpa-bulk-activate',
						'action2' => -1,
						'message' => __( 'Activating Plugin','envato_setup' ),
					);
					break;
				}
			}
			foreach ( $plugins['update'] as $slug => $plugin ) {
				if ( $_POST['slug'] == $slug ) {
					$json = array(
						'url' => admin_url( $this->tgmpa_url ),
						'plugin' => array( $slug ),
						'tgmpa-page' => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce' => wp_create_nonce( 'bulk-plugins' ),
						'action' => 'tgmpa-bulk-update',
						'action2' => -1,
						'message' => __( 'Updating Plugin','envato_setup' ),
					);
					break;
				}
			}
			foreach ( $plugins['install'] as $slug => $plugin ) {
				if ( $_POST['slug'] == $slug ) {
					$json = array(
						'url' => admin_url( $this->tgmpa_url ),
						'plugin' => array( $slug ),
						'tgmpa-page' => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce' => wp_create_nonce( 'bulk-plugins' ),
						'action' => 'tgmpa-bulk-install',
						'action2' => -1,
						'message' => __( 'Installing Plugin','envato_setup' ),
					);
					break;
				}
			}

			if ( $json ) {
				$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
				wp_send_json( $json );
			} else {
				wp_send_json( array( 'done' => 1, 'message' => __( 'Success','envato_setup' ) ) );
			}
			exit;

		}


		private function _content_default_get() {

			$content = array();

				// fetching all XMLs.
				$xml_directory = get_template_directory() . '/inc/helper/importer/content/';

				foreach ( glob( $xml_directory . '*.xml' ) as $filename ) { // get all xml files from content dir
					$filename    = basename( $filename );
					if(!strpos($filename, '_')) {continue;} // we do not want to include the main XML but only its parts.
					$file_name = substr($filename, 0, (strlen($filename))-(strlen(strrchr($filename, '.')))); // file name with extension.
					$content[$filename] = array(
						'title' => $filename,
						'description' => __( 'This will import '.$file_name.' import file.', 'envato_setup' ),
						'pending' => __( 'Pending.', 'envato_setup' ),
						'installing' => __( 'Installing '.$filename.'.', 'envato_setup' ),
						'success' => __( 'Success.', 'envato_setup' ),
						'install_callback' => array( $this,'_content_install_'.$file_name ),
					);

				}


			$content['widgets'] = array(
				'title' => __( 'Widgets', 'envato_setup' ),
				'description' => __( 'Insert default sidebar widgets as seen in the demo.', 'envato_setup' ),
				'pending' => __( 'Pending.', 'envato_setup' ),
				'installing' => __( 'Installing Default Widgets.', 'envato_setup' ),
				'success' => __( 'Success.', 'envato_setup' ),
				'install_callback' => array( $this,'_content_install_widgets' ),
			);
/*			$content['menu'] = array(
				'title' => __( 'Menu', 'envato_setup' ),
				'description' => __( 'Insert default menu as seen in the demo.', 'envato_setup' ),
				'pending' => __( 'Pending.', 'envato_setup' ),
				'installing' => __( 'Installing Default Menu.', 'envato_setup' ),
				'success' => __( 'Success.', 'envato_setup' ),
				'install_callback' => array( $this,'_content_install_menu' ),
			);*/
			$content['settings'] = array(
				'title' => __( 'Settings', 'envato_setup' ),
				'description' => __( 'Configure default settings.', 'envato_setup' ),
				'pending' => __( 'Pending.', 'envato_setup' ),
				'installing' => __( 'Installing Default Settings.', 'envato_setup' ),
				'success' => __( 'Success.', 'envato_setup' ),
				'install_callback' => array( $this,'_content_install_settings' ),
			);

			$content = apply_filters( $this->theme_name . '_theme_setup_wizard_content', $content );

			return $content;

		}

		/**
		 * Page setup
		 */
		public function envato_setup_default_content() {
			?>
			<h1><?php _e( 'Default Content', 'envato_setup' ); ?></h1>
			<form method="post">
					<p><?php printf( __( 'It\'s time to insert some default content for your new WordPress website. Choose what you would like inserted below and click Continue. We divided XML file in parts for smooth import process. It is recommended to leave everything selected. Once inserted, this content can be managed from the WordPress admin dashboard. If you see ajax error below, do not worry and contact support. Note: First one will take 2-3 minutes, rest will be faster. ', 'templatation' ), '<a href="' . esc_url( admin_url( 'edit.php?post_type=page' ) ) . '" target="_blank">', '</a>' ); ?></p>
				<table class="envato-setup-pages" cellspacing="0">
					<thead>
					<tr>
						<td class="check"> </td>
						<th class="item"><?php _e( 'Item', 'envato_setup' ); ?></th>
						<th class="description"><?php _e( 'Description', 'envato_setup' ); ?></th>
						<th class="status"><?php _e( 'Status', 'envato_setup' ); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ( $this->_content_default_get() as $slug => $default ) {  ?>
						<tr class="envato_default_content" data-content="<?php echo esc_attr( $slug );?>">
							<td>
								<input type="checkbox" name="default_content[pages]" class="envato_default_content" id="default_content_<?php echo esc_attr( $slug );?>" value="1" checked>
							</td>
							<td><label for="default_content_<?php echo esc_attr( $slug );?>"><?php echo $default['title']; ?></label></td>
							<td class="description"><?php echo $default['description']; ?></td>
							<td class="status"> <span><?php echo $default['pending'];?></span> <div class="spinner"></div></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>

				<p><?php _e( 'Once inserted, this content can be managed from the WordPress admin dashboard.', 'envato_setup' ); ?></p>

				<p class="envato-setup-actions step">
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button-primary button button-large button-next" data-callback="install_content"><?php _e( 'Continue', 'envato_setup' ); ?></a>
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php _e( 'Skip this step', 'envato_setup' ); ?></a>
					<?php wp_nonce_field( 'envato-setup' ); ?>
				</p>
			</form>
			<?php
		}


		public function ajax_content() {
			$content = $this->_content_default_get();
			if ( ! check_ajax_referer( 'envato_setup_nonce', 'wpnonce' ) || empty( $_POST['content'] ) && isset( $content[ $_POST['content'] ] ) ) {
				wp_send_json_error( array( 'error' => 1, 'message' => __( 'No content Found','envato_setup' ) ) );
			}

			$json = false;
			$this_content = $content[ $_POST['content'] ];

			if ( isset( $_POST['proceed'] ) ) {
				// install the content!

				if ( ! empty( $this_content['install_callback'] ) ) {
					if ( $result = call_user_func( $this_content['install_callback'] ) ) {
						if( is_array( $result ) && isset( $result['retry'] ) ){
							// we split the stuff up again.
							$json = array(
								'url' => admin_url( 'admin-ajax.php' ),
								'action' => 'envato_setup_content',
								'proceed' => 'true',
								'retry' => time(),
								'retry_count' => $result['retry_count'],
								'content' => $_POST['content'],
								'_wpnonce' => wp_create_nonce( 'envato_setup_nonce' ),
								'message' => $this_content['installing'],
							);
						}else{
							$json = array(
								'done' => 1,
								'message' => $this_content['success'],
								'debug' => $result,
							);
						}
					}
				}
			} else {

				$json = array(
					'url' => admin_url( 'admin-ajax.php' ),
					'action' => 'envato_setup_content',
					'proceed' => 'true',
					'content' => $_POST['content'],
					'_wpnonce' => wp_create_nonce( 'envato_setup_nonce' ),
					'message' => $this_content['installing'],
				);
			}

			if ( $json ) {
				$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
				wp_send_json( $json );
			} else {
				wp_send_json( array( 'error' => 1, 'message' => __( 'Error','envato_setup' ) ) );
			}

			exit;

		}
		private function _import_wordpress_xml_file( $xml_file_path ) {
			global $wpdb;
			if (! is_file( get_template_directory() . '/inc/helper/importer/content/'.basename( $xml_file_path ) ) ) return 'Not needed'; // added by dinesh

			if ( ! defined( 'WP_LOAD_IMPORTERS' ) ) { define( 'WP_LOAD_IMPORTERS', true ); }

			// Load Importer API
			require_once ABSPATH . 'wp-admin/includes/import.php';

			if ( ! class_exists( 'WP_Importer' ) ) {
				$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				if ( file_exists( $class_wp_importer ) ) {
					require $class_wp_importer;
				}
			}

			if ( ! class_exists( 'WP_Import' ) ) {
				$class_wp_importer = __DIR__ .'/importer/wordpress-importer.php';
				if ( file_exists( $class_wp_importer ) ) {
					require $class_wp_importer; }
			}

			if ( class_exists( 'WP_Import' ) ) {
				require_once __DIR__ .'/importer/envato-content-import.php';
				$wp_import = new envato_content_import();
				$wp_import->fetch_attachments = true;
				ob_start();
				$wp_import->import( $xml_file_path );
				$message = ob_get_clean();
				return array( $wp_import->check(),$message );
			}
			return false;
		}

		private function _content_install_Import_0() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_0.xml' );
		}
		private function _content_install_Import_1() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_1.xml' );
		}
		private function _content_install_Import_2() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_2.xml' );
		}
		private function _content_install_Import_3() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_3.xml' );
		}
		private function _content_install_Import_4() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_4.xml' );
		}
		private function _content_install_Import_5() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_5.xml' );
		}
		private function _content_install_Import_6() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_6.xml' );
		}
		private function _content_install_Import_7() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_7.xml' );
		}
		private function _content_install_Import_8() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_8.xml' );
		}
		private function _content_install_Import_9() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_9.xml' );
		}
		private function _content_install_Import_10() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/Import_10.xml' );
		}

/*		private function _content_install_pages() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/all.xml' );
		}
		private function _content_install_media() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/media.xml' );
		}
		private function _content_install_posts() {
			return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/posts.xml' );
		}
		private function _content_install_products() {
			if ( $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/products.xml' ) ) {
				return $this->_import_wordpress_xml_file( get_template_directory() . '/inc/helper/importer/content/variations.xml' );
			}
			return false;
		}*/

		private function _make_child_theme( $new_theme_title ) {

				$parent_theme_template = get_template();

				// Turn a theme name into a directory name
				$new_theme_name = sanitize_title( $new_theme_title );
				$theme_root = get_theme_root();

				// Validate theme name
				$new_theme_path = $theme_root.'/'.$new_theme_name;
				if ( file_exists( $new_theme_path ) ) {
					// Don't create child theme.
				} else{
					// Create Child theme
					mkdir( $new_theme_path );

					$plugin_folder = __DIR__.'/child-theme/';

					// Make style.css
					ob_start();
					require $plugin_folder.'child-theme-css.php';
					$css = ob_get_clean();
					file_put_contents( $new_theme_path.'/style.css', $css );

					// Copy functions.php
					copy( $plugin_folder.'functions.php', $new_theme_path.'/functions.php' );

					// Copy screenshot
					copy( $plugin_folder.'screenshot.jpg', $new_theme_path.'/screenshot.jpg' );

					// Make child theme an allowed theme (network enable theme)
					$allowed_themes = get_site_option( 'allowedthemes' );
					$allowed_themes[ $new_theme_name ] = true;
					update_site_option( 'allowedthemes', $allowed_themes );
				}

				// Switch to theme
				if($parent_theme_template !== $new_theme_name){
					echo '<p class="lead success">Child Theme <strong>'.$new_theme_title.'</strong> created and activated! Folder is located in wp-content/themes/<strong>'.$new_theme_name.'</strong></p>';
					update_option('temptt_has_child_theme', $new_theme_name);
					switch_theme( $new_theme_name, $new_theme_name );
				}
		}


		private function _content_install_widgets() {
			// todo: pump these out into the 'content/' folder along with the XML so it's a little nicer to play with
			$import_widget_positions = $this->_get_json( 'widget_positions.json' );
			$import_widget_options = $this->_get_json( 'widget_options.json' );
			// importing.
			$widget_positions = get_option( 'sidebars_widgets' );

			//                    echo '<pre>'; print_r($import_widget_positions); print_r($import_widget_options); print_r($my_options); echo '</pre>';exit;
			foreach ( $import_widget_options as $widget_name => $widget_options ) {
				// replace certain elements with updated imported entries.
/*				foreach($widget_options as $widget_option_id => $widget_option){
					if(!empty($widget_option['nav_menu'])){
						// check if this one has been imported yet.
						$new_id = $this->_imported_term_id($widget_option['nav_menu']);
						if(!$new_id){
							unset($widget_options[$widget_option_id]);
						}else{
							$widget_options[$widget_option_id]['nav_menu'] = $new_id;
						}
					}
					if(!empty($widget_option['image_id'])){
						// check if this one has been imported yet.
						$new_id = $this->_imported_post_id($widget_option['image_id']);
						if(!$new_id){
							unset($widget_options[$widget_option_id]);
						}else{
							$widget_options[$widget_option_id]['image_id'] = $new_id;
						}
					}
				}*/
				$existing_options = get_option( 'widget_'.$widget_name,array() );
				$new_options = $existing_options + $widget_options;
				//                        echo $widget_name;
				//                        print_r($new_options);
				update_option( 'widget_'.$widget_name,$new_options );
			}
			update_option( 'sidebars_widgets',array_merge( $widget_positions,$import_widget_positions ) );
			//                    print_r($widget_positions + $import_widget_positions);exit;

			return true;

		}
		public function _content_install_settings() {


			$menu_ids = $this->_get_json( 'menu.json' );
			$save = array();
			foreach($menu_ids as $menu_id => $term_id){
				$new_term_id = $this->_imported_term_id($term_id);
				if($new_term_id){
					$save[$menu_id] = $new_term_id;
				}
			}
			if ( $save ) {
				set_theme_mod( 'nav_menu_locations', array_map( 'absint', $save ) );
			}

			global $wp_rewrite;
			$wp_rewrite->set_permalink_structure('/%year%/%monthnum%/%day%/%postname%/');
			update_option( "rewrite_rules", FALSE );
			$wp_rewrite->flush_rules( true );
			flush_rewrite_rules();

			return true;
		}
		private function _get_json( $file ) {
			if ( is_file( get_template_directory() . '/inc/helper/importer/content/'.basename( $file ) ) ) {
				WP_Filesystem();
				global $wp_filesystem;
				$file_name = get_template_directory() . '/inc/helper/importer/content/' . basename( $file );
				if ( file_exists( $file_name ) ) {
					return json_decode( $wp_filesystem->get_contents( $file_name ), true );
				}
			}
			return array();
		}



		/**
		 * Theme Setup
		 */
		public function envato_setup_tt_theme_setup() {

			?>
			<h1><?php _e( 'Theme Setup', 'templatation' ); ?></h1>
			<form method="post">
				<p><?php printf( __( 'On this page, we import the sliders(if any), setup the Homepages and menus as well as some other required setups. Please do not skip this step and click Continue button. ' ,'templatation' ), '' ); ?></p>


				<p><?php _e( 'Please Note that you can customize theme easily by going to Theme-options after this setup is done. You can easily change logo and customize many areas of themes with modern theme options panel.' ,'templatation' ); ?></p>

				<p class="envato-setup-actions step">
					<input type="submit" class="button-primary button button-large button-next" value="<?php esc_attr_e( 'Continue', 'templatation' ); ?>" name="save_step" />
					<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php _e( 'Skip this step', 'templatation' ); ?></a>
					<?php wp_nonce_field( 'envato-setup' ); ?>
				</p>
			</form>
			<?php
		}

		/**
		 * Save Theme setup options
		 */
		public function envato_setup_tt_theme_setup_save() {
			check_admin_referer( 'envato-setup' );

			if ( class_exists( 'woocommerce' ) ) {
				// set the blog page and the home page.
				$shoppage = get_page_by_title( 'Shop' );
				if ( $shoppage ) {
					update_option( 'woocommerce_shop_page_id',$shoppage->ID );
				}
				$shoppage = get_page_by_title( 'Cart' );
				if ( $shoppage ) {
					update_option( 'woocommerce_cart_page_id',$shoppage->ID );
				}
				$shoppage = get_page_by_title( 'Checkout' );
				if ( $shoppage ) {
					update_option( 'woocommerce_checkout_page_id',$shoppage->ID );
				}
				$shoppage = get_page_by_title( 'My Account' );
				if ( $shoppage ) {
					update_option( 'woocommerce_myaccount_page_id',$shoppage->ID );
				}
			}
			// Set reading options
			$homepge = get_page_by_title( 'Homepage' );
			$posts_pge = get_page_by_title( 'Blog' );
			if( isset( $homepge ) && $homepge->ID ) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepge->ID); // setting up homepage
			}
			if( isset( $posts_pge ) && $posts_pge->ID ) {
				update_option('page_for_posts', $posts_pge->ID); // setting up blog
				update_option( 'show_on_front', 'page' );
			}
			wp_delete_post(1); // delete hello world post.

			// Menus to Import and assign - you can remove or add as many as you want
			$main_menu      = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
			$secondary_menu = get_term_by( 'name', 'Secondary Menu', 'nav_menu' );
			$footer_menu    = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
			$left_menu      = get_term_by( 'name', 'Left Menu', 'nav_menu' );
			$right_menu     = get_term_by( 'name', 'Right Menu', 'nav_menu' );

			$theme_menus = array();
			if( $main_menu ) {
				$theme_menus['primary-menu']    = $main_menu->term_id;
			}
			if( $secondary_menu ) {
				$theme_menus['secondary-menu']  =  $secondary_menu->term_id;
			}
			if( $footer_menu ) {
				$theme_menus['footer-menu']     =  $footer_menu->term_id;
			}
			if( $left_menu ) {
				$theme_menus['left-menu']       =  $left_menu->term_id;
			}
			if( $right_menu ) {
				$theme_menus['right-menu']      =  $right_menu->term_id;
			}
			// setup menus.
			set_theme_mod( 'nav_menu_locations', $theme_menus
			);


			//@tt
			$theme_options = $this->_get_json( 'theme-options.json' );
	          // Hook before import
	          $theme_options_tt = apply_filters( 'tt_theme_import_theme_options', $theme_options );
	          update_option( 'tt_temptt_opt', $theme_options_tt );

			// setting thumb for woocommerce categories.s
			if ( class_exists( 'woocommerce' ) ) {
				$tt_fet_img = '';
				$tt_fet_img = get_template_directory() . '/inc/helper/importer/content/' . basename( 'tt_featured.jpg' );
				if ( is_file( $tt_fet_img ) ) {
					$tt_fet_img_url = $this->plugin_url . 'content/tt_featured.jpg';
					$tt_fet_img_url = $this->cleanFilePath( $tt_fet_img_url );
					$attach_id      = $this->templatation_Generate_Featured_Image( $tt_fet_img_url, $post_id, '' );
				}

				$catTerms = get_terms( 'product_cat', array( 'hide_empty' => 0, 'orderby' => 'ASC' ) );
				foreach ( $catTerms as $catTerm ) :
					$thumbnail_id = get_woocommerce_term_meta( $catTerm->term_id, 'thumbnail_id', true );

//If a thumbnail is explicitly set for this category, we don't need to do anything else
					if ( ! get_woocommerce_term_meta( $catTerm->term_id, 'thumbnail_id', true ) ) {

						update_woocommerce_term_meta( $catTerm->term_id, 'thumbnail_id', absint( $attach_id ) );

					}
				endforeach;
			}


			// action hook for other setups externally
			if ( class_exists( 'UniteFunctionsRev' ) ) { // if revslider is activated
				$rev_directory = get_template_directory() . '/inc/helper/importer/revslider/'; // revsliders data dir

				foreach ( glob( $rev_directory . '*.zip' ) as $filename ) { // get all files from revsliders data dir
					$filename    = basename( $filename );
					$rev_files[] = get_template_directory() . '/inc/helper/importer/revslider/' . $filename;
				}
				if( is_array($rev_files)) {
					$slider = new RevSliderSlider();
					foreach ( $rev_files as $rev_file ) {
						$slider->importSliderFromPost( true, false, $rev_file );
					}
				}
			}
			update_option('envato_setup_complete',time()); /* added by tt */
			wp_redirect( esc_url_raw( $this->get_next_step_link() ) );
			exit;
		}

			/**
			* Downloads an image from the specified URL and attaches it to a post as a post thumbnail.
			*
			* @param string $file    The URL of the image to download.
			* @param int    $post_id The post ID the post thumbnail is to be associated with.
			* @param string $desc    Optional. Description of the image.
			* @return string|WP_Error Attachment ID, WP_Error object otherwise.
			*/
			public function templatation_Generate_Featured_Image( $file, $post_id, $desc ){
			    // Set variables for storage, fix file filename for query strings.
			    preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches );
			    if ( ! $matches ) {
			         return new WP_Error( 'image_sideload_failed', __( 'Invalid image URL' ) );
			    }

			    $file_array = array();
			    $file_array['name'] = basename( $matches[0] );

			    // Download file to temp location.
			    $file_array['tmp_name'] = download_url( $file );

			    // If error storing temporarily, return the error.
			    if ( is_wp_error( $file_array['tmp_name'] ) ) {
			        return $file_array['tmp_name'];
			    }

			    // Do the validation and storage stuff.
			    $id = media_handle_sideload( $file_array, $post_id, $desc );

			    // If error storing permanently, unlink.
/*			    if ( is_wp_error( $id ) ) {
			        @unlink( $file_array['tmp_name'] );
			        return $id;
			    }
			    return set_post_thumbnail( $post_id, $id );
*/
			    return $id;

			}

		/**
		 * Updates Step
		 */
		public function envato_setup_updates() {
			?>
			<h1><?php _e( 'Activate Theme', 'envato_setup' ); ?></h1>
			<p class="lead">Enter your Purchase Code for Automatic Theme Updates and access to Support.</p>
				<?php
				    $slug = basename( get_template_directory() );

				    $output = '';

				    //get errors so we can show them
				    $errors = get_option( $slug . '_wup_errors', array() );
				    delete_option( $slug . '_wup_errors' ); //delete existing errors as we will handle them next
				    //check if we have a purchase code saved already
				    $purchase_code = sanitize_text_field( get_option( $slug . '_wup_purchase_code', '' ) );

				    //output errors and notifications
				    if ( ! empty( $errors ) ) {
				      foreach ( $errors as $key => $error ) {
				        echo '<div class="notice-error notice-alt"><p>' . $error . '</p></div>';
				      }
				    }

				    if ( ! empty( $purchase_code ) ) {
				      if ( ! empty( $errors ) ) {
				        //since there is already a purchase code present - notify the user
				        echo '<div class="notice-warning notice-alt"><p>' . esc_html__( 'Purchase code not updated. We will keep the existing one.' ) . '</p></div>';
				      } else {
				        //this means a valid purchase code is present and no errors were found
				       echo '<div class="notice-success notice-alt notice-large" style="margin-bottom:15px!important">' . __( 'Your <strong>purchase code is valid</strong>. Thank you! Enjoy '. ucfirst(get_template()) .' Theme and automatic updates.' ) . '</div>';
				      }
				    }

				    if ( empty( $purchase_code ) ) {
				    echo '<form class="wupdates_purchase_code" action="" method="post">' .
				             __( '<p>Find out how to <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">get your purchase code</a> here.</p>' ) .
				             '<input type="hidden" name="wupdates_pc_theme" value="' . $slug . '" />' .
				             '<input type="text" id="' . sanitize_title( $slug ) . '_wup_purchase_code" name="' . sanitize_title( $slug ) . '_wup_purchase_code"
				              value="' . $purchase_code . '" placeholder="Purchase code ( e.g. 9g2b13fa-10aa-2267-883a-9201a94cf9b5 )" style="width:100%; padding:10px;"/><br/><br/>' .
				             '<p class="envato-setup-actions step">' .
				              '<input type="submit" class="button button-large button-next button-primary" value="Activate"/>' .
				              '<a href="'.esc_url( $this->get_next_step_link() ).'" class="button button-large button-next">'.__( 'Skip this step', 'envato_setup' ).'</a>'.
 				             '</p>
				      </form>';
				  	} else{
				    echo '<form class="wupdates_purchase_code" action="" method="post">' .
				             '<input type="hidden" name="wupdates_pc_theme" value="' . $slug . '" />' .
				             '<input type="text" id="' . sanitize_title( $slug ) . '_wup_purchase_code" name="' . sanitize_title( $slug ) . '_wup_purchase_code"
				              value="' . $purchase_code . '" placeholder="Purchase code ( e.g. 9g2b13fa-10aa-2267-883a-9201a94cf9b5 )" style="width:100%; padding:10px;"/><br/><br/>' .
				              '<p class="envato-setup-actions step">' .
				              '<a href="'.esc_url( $this->get_next_step_link() ).'" class="button button-primary button-large button-next">'.__( 'Continue', 'envato_setup' ).'</a>' .
 				             '</p>
				      </form>';
				  	}
?>
				<?php wp_nonce_field( 'envato-setup' ); ?>

			<?php
		}

		/**
		 * Payments Step save
		 */
		public function envato_setup_updates_save() {
			check_admin_referer( 'envato-setup' );

			// redirect to our custom login URL to get a copy of this token.
			$url = $this->get_oauth_login_url( $this->get_step_link( 'updates' ) );

			wp_redirect( esc_url_raw( $url ) );
			exit;
		}


		public function envato_setup_customize() {
		?>

			<h1>Setup <?php echo ucfirst(get_template()); ?> Child Theme (Optional)</h1>

			<p>
				If you are going to make changes to the theme source code please use a <a href="https://codex.wordpress.org/Child_Themes" target="_blank">Child Theme</a> rather than modifying the main theme HTML/CSS/PHP code. This allows the parent theme to receive updates without overwriting your source code changes. Use the form below to create and activate the Child Theme.
			</p>

			<?php if(!isset($_REQUEST['theme_name'])){ ?>
			<p class="lead">If you're not sure what a Child Theme is just click the "Skip this step" button.</p>
			<?php } ?>

			<?php
				// Create Child Theme
				if(isset($_REQUEST['theme_name']) && current_user_can('manage_options')){
					echo $this->_make_child_theme(esc_html($_REQUEST['theme_name']));
				}
				$theme = get_option('temptt_has_child_theme') ? wp_get_theme(get_option('temptt_has_child_theme') )->Name : ucfirst(get_template()).' Child';
			 ?>

			<?php if(!isset($_REQUEST['theme_name'])){ ?>

			<form action="<?php $_PHP_SELF ?>" method="POST">
			 <div class="child-theme-input" style="margin-bottom: 20px;">
			 <label style="font-weight: bold;margin-bottom: 5px; display: block;">Child Theme Title</label>
		 	 <input type="text" style="padding:10px; width: 100%;" name="theme_name" value="<?php echo $theme; ?>" />
		 	 </div>
			<p class="envato-setup-actions step">
		        <button type="submit" id= type="submit"  class="button button-primary button-next button-next">
		         <?php _e( 'Create and Use Child Theme', 'envato_setup' ); ?>
		        </button>
				<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php _e( 'Skip this step', 'envato_setup' ); ?></a>

			</p>
			</form>
			<?php } else { ?>
			<p class="envato-setup-actions step">
				<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-primary button-large button-next"><?php _e( 'Continue', 'envato_setup' ); ?></a>
			</p>
			<?php } ?>
			<?php
		}

		public function envato_setup_help_support() {
			?>
			<h1>Help and Support</h1>
			<p class="lead">This theme comes with 6 months item support from purchase date (with the option to extend this period). This license allows you to use this theme on a single website. Please purchase an additional license to use this theme on another website.</p>

			<p class="success">Item Support <strong>DOES</strong> Include:</p>

			<ul>
				<li>Availability of the author to answer questions</li>
				<li>Answering technical questions about item features</li>
				<li>Assistance with reported bugs and issues</li>
				<li>Help with bundled 3rd party plugins</li>
			</ul>

			<p class="error">Item Support <strong>DOES NOT</strong> Include:</p>
			<ul>
				<li>Customization services (this is available for extra fee(depends on the work needed). <a href="mailto:templatation@gmail.com" target="_blank">Email me</a>)</li>
				<li>Installation services (this is available for extra $35 only. <a href="mailto:templatation@gmail.com" target="_blank">Contact me, Same day delivery</a>)</li>
				<li>Help and Support for non-bundled 3rd party plugins (i.e. plugins you install yourself later on)</li>
			</ul>
			<p>More details about item support can be found in the ThemeForest <a href="http://themeforest.net/page/item_support_policy" target="_blank">Item Support Polity</a>. </p>
			<p class="envato-setup-actions step">
				<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-primary button-large button-next"><?php _e( 'Agree and Continue', 'envato_setup' ); ?></a>
				<?php wp_nonce_field( 'envato-setup' ); ?>
			</p>
			<?php
		}

		/**
		 * Final step
		 */
		public function envato_setup_ready() {

			update_option('envato_setup_complete',time());
			?>

			<h1><?php _e( 'Your Website is Ready!', 'envato_setup' ); ?></h1>

			<p class="lead success">Congratulations! The theme has been activated and your website is ready. Login to your WordPress dashboard to make changes and modify any of the default content to suit your needs.</p>
			<p>Please come back and <a href="http://themeforest.net/downloads" target="_blank">leave a 5-star rating</a> if you are happy with this theme. Thanks! </p>

			<div class="envato-setup-next-steps">
				<div class="envato-setup-next-steps-first">
					<h2><?php _e( 'Next Steps', 'envato_setup' ); ?></h2>
					<ul>
						<?php if(class_exists('woocommerce')) { ?><li class="setup-product"><a class="button  button-primary button-large woocommerce-button" href="<?php echo admin_url().'index.php?page=wc-setup';?>"><?php _e( 'Setup WooCommerce (optional)', 'envato_setup' ); ?></a></li><?php } ?>
						<li class="setup-product"><a class="button button-large" href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'View your new website!', 'envato_setup' ); ?></a></li>
					</ul>
				</div>
				<div class="envato-setup-next-steps-last">
					<h2><?php _e( 'More Resources', 'envato_setup' ); ?></h2>
					<ul>
						<li class="rating"><a href="http://themeforest.net/downloads"><?php _e( 'Leave an Item Rating', 'envato_setup' ); ?></a></li>
					</ul>
				</div>
			</div>
			<?php
		}

		/**
		 * Helper function
		 * Take a path and return it clean
		 *
		 * @param string $path
		 *
		 * @since    1.1.2
		 */
		public static function cleanFilePath( $path ) {
			$path = str_replace( '', '', str_replace( array( "\\", "\\\\" ), '/', $path ) );
			if ( $path[ strlen( $path ) - 1 ] === '/' ) {
				$path = rtrim( $path, '/' );
			}
			return $path;
		}

		public function is_submenu_page(){
			return ( $this->parent_slug == '' ) ? false : true;
		}
	}

}// if !class_exists

/**
 * Loads the main instance of Envato_Theme_Setup_Wizard to have
 * ability extend class functionality
 *
 * @since 1.1.1
 * @return object Envato_Theme_Setup_Wizard
 */

add_action( 'after_setup_theme', 'envato_theme_setup_wizard', 10 );

if ( ! function_exists( 'envato_theme_setup_wizard' ) ) :
	function envato_theme_setup_wizard() {
		Envato_Theme_Setup_Wizard::get_instance();
	}
endif;
