<?php

if ( ! class_exists( 'Vw_Bakery_Pro_plugin_Settings' ) ) {
	/**
	 * Vw_Bakery_Pro_plugin_Settings initial setup
	 *
	 * @since 1.0
	 */
	class Vw_Bakery_Pro_plugin_Settings{

		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;
    protected $templates;
		/** Initiator **/
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/*  Constructor */
		public function __construct() {
      if(Vw_Bakery_Pro_plugin_Settings::is_active()){

         $this->templates = array();

    // Add a filter to the attributes metabox to inject template into the cache.
    if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {

      // 4.6 and older
      add_filter(
        'page_attributes_dropdown_pages_args',
        array( $this, 'register_project_templates' )
      );

    } else {

      // Add a filter to the wp 4.7 version attributes metabox
      add_filter(
        'theme_page_templates', array( $this, 'add_new_template' )
      );

    }

    // Add a filter to the save post to inject out template into the page cache
    add_filter(
      'wp_insert_post_data',
      array( $this, 'register_project_templates' )
    );

    // Add a filter to the template include to determine if the page has our
    // template assigned and return it's path
    add_filter(
      'template_include',
      array( $this, 'view_project_template')
    );

    // Add your templates to this array.
    $this->templates = array(
      'page-template/home-page.php' => 'VW Home-page',
      'page-template/contact.php' => 'VW Contact',
      'page-template/blog-fullwidth-extend.php' => 'VW Blog Fullwidth Extend',
      'page-template/blog-with-left-sidebar.php' => 'VW Blog With Left Sidebar',
      'page-template/blog-with-right-sidebar.php' => 'VW Blog With Right Sidebar',
      'page-template/page-with-left-sidebar.php' => 'VW Page With Left Sidebar',
      'page-template/page-with-right-sidebar.php' => 'VW Page With Right Sidebar'
    );

        add_filter( 'template_include', array($this,'vw_bakery_pro_replace_theme_file_index'),20, 2);
        add_filter( 'theme_file_path', array($this,'vw_bakery_pro_replace_theme_file_single'),20, 2);
        add_action( 'customize_register', 'remove_customizer_settings', 20 );
        add_action( 'wp_enqueue_scripts',  array($this,'vw_enqueue_style') );
        if (!is_admin())
        {
          add_action( 'init',array($this,'vw_bakery_pro_posttype_custom_controls' ));
        }
        
      }
		}


     public function add_new_template( $posts_templates ) {
    $posts_templates = array_merge( $posts_templates, $this->templates );
    return $posts_templates;
  }

  /**
   * Adds our template to the pages cache in order to trick WordPress
   * into thinking the template file exists where it doens't really exist.
   */
  public function register_project_templates( $atts ) {

    // Create the key used for the themes cache
    $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

    // Retrieve the cache list.
    // If it doesn't exist, or it's empty prepare an array
    $templates = wp_get_theme()->get_page_templates();
    if ( empty( $templates ) ) {
      $templates = array();
    }

    // New cache, therefore remove the old one
    wp_cache_delete( $cache_key , 'themes');

    // Now add our template to the list of templates by merging our templates
    // with the existing templates array from the cache.
    $templates = array_merge( $templates, $this->templates );

    // Add the modified cache to allow WordPress to pick it up for listing
    // available templates
    wp_cache_add( $cache_key, $templates, 'themes', 1800 );

    return $atts;

  }

  /**
   * Checks if the template is assigned to the page
   */
  public function view_project_template( $template ) {

    // Get global post
    global $post;

    // Return template if post is empty
    if ( ! $post ) {
      return $template;
    }

    // Return default template if we don't have a custom one defined
    if ( ! isset( $this->templates[get_post_meta(
      $post->ID, '_wp_page_template', true
    )] ) ) {
      return $template;
    }

    $file = VW_BAKERY_PRO_EXT_DIR. get_post_meta(
      $post->ID, '_wp_page_template', true
    );

    // Just to be safe, we check if the file exist first
    if ( file_exists( $file ) ) {
      return $file;
    } else {
      echo $file;
    }

    // Return template
    return $template;

    }
    
    public function vw_bakery_pro_posttype_custom_controls() {

      // ---------- CSS Enqueue -----------

      wp_enqueue_style( 'vw_bakery_pro_custom_controls_css',VW_BAKERY_PRO_EXT_URI.'assets/css/customizer.css');
      wp_enqueue_style( 'animation-wow',VW_BAKERY_PRO_EXT_URI.'assets/css/animate.css' );
      wp_enqueue_style( 'font-style',VW_BAKERY_PRO_EXT_URI.'assets/css/font-style.css' );
      wp_enqueue_style( 'effect', VW_BAKERY_PRO_EXT_URI.'assets/css/effect.css' );
      wp_enqueue_style( 'owl-carousel-style', VW_BAKERY_PRO_EXT_URI.'assets/css/owl.carousel.css' );
      wp_enqueue_style( 'font-awesome',VW_BAKERY_PRO_EXT_URI.'assets/css/fontawesome-all.min.css' );
      wp_enqueue_style('vw-bakery-pro-ie', VW_BAKERY_PRO_EXT_URI.'assets/css/ie.css', array('vw-bakery-pro-basic-style'));
      wp_enqueue_style( 'bootstrap-style', VW_BAKERY_PRO_EXT_URI.'assets/css/bootstrap.min.css' );

      // ---------- JS Enqueue -----------

      wp_enqueue_script( 'animation-wow', VW_BAKERY_PRO_EXT_URI . 'assets/js/wow.min.js');
      wp_enqueue_script( 'tether', VW_BAKERY_PRO_EXT_URI . 'assets/js/tether.js');
      wp_enqueue_script( 'superfish', VW_BAKERY_PRO_EXT_URI . 'assets/js/jquery.superfish.js',array('jquery'), '', true);
      wp_enqueue_script( 'owl-carousel', VW_BAKERY_PRO_EXT_URI . 'assets/js/owl.carousel.js', array('jquery'), '', true);
      wp_enqueue_script( 'smooth-scroll', VW_BAKERY_PRO_EXT_URI . 'assets/js/smoothScroll.js');
      wp_enqueue_script( 'vw-bakery-pro-customscripts', VW_BAKERY_PRO_EXT_URI . 'assets/js/custom.js', array('jquery'), '', true );
       wp_enqueue_script( 'bootstrap-js', VW_BAKERY_PRO_EXT_URI . 'assets/js/bootstrap.min.js');
    }

    public function vw_enqueue_style() {
      wp_enqueue_style( 'vw-style', VW_BAKERY_PRO_EXT_URI.'assets/css/vw-style.css' );

      $custom_css="";
      require_once VW_BAKERY_PRO_EXT_DIR . 'inline_style.php';
      wp_add_inline_style( 'vw-style',$custom_css );

      wp_style_add_data( 'vw-style', 'rtl', 'replace' );
    }

    // Override files
    public function vw_bakery_pro_replace_theme_file_index($file){
      if($file){
        $last_page=explode("/",$file);
        $page=  end($last_page);
        if( 'index.php' == $page ) {
            return VW_BAKERY_PRO_EXT_DIR . 'theme-index.php';
        }
        if( 'single.php' == $page){
          return VW_BAKERY_PRO_EXT_DIR . 'vw_single.php';
        }
        if( 'page.php' == $page){
          return VW_BAKERY_PRO_EXT_DIR . 'page.php';
        }
        if( 'archive.php' == $page){
          return VW_BAKERY_PRO_EXT_DIR . 'archive.php';
        }
        if( '404.php' == $page){
          return VW_BAKERY_PRO_EXT_DIR . '404.php';
        }
        if( 'search.php' == $page){
          return VW_BAKERY_PRO_EXT_DIR . 'search.php';
        }
        if( 'comments.php' == $page){
          return VW_BAKERY_PRO_EXT_DIR . 'vw_comments.php';
        }
        if( 'single-product.php' == $page){
          return VW_BAKERY_PRO_EXT_DIR . 'woocommerce/single-product.php';
        }
        if( 'taxonomy-product_cat.php' == $page){
          return VW_BAKERY_PRO_EXT_DIR . 'woocommerce/taxonomy-product_cat.php';
        }
        if( 'taxonomy-product_tag.php' == $page){
          return VW_BAKERY_PRO_EXT_DIR . 'woocommerce/taxonomy-product_tag.php';
        }
        if( 'archive-product.php' == $page){
          return VW_BAKERY_PRO_EXT_DIR . 'woocommerce/archive-product.php';
        }else{
          return $file;
         //  print_r($file);
         // exit;
          }

      }

    }

    static public function is_active() {
      $theme = wp_get_theme();
      if ( 'Sirat' === $theme->name || 'Sirat' === $theme->template ) {
          return TRUE;
      }else{
        return FALSE;
      }
  	}

	}
  function remove_customizer_settings( $wp_customize ){
       $wp_customize->remove_panel('sirat_panel_id');
       $wp_customize->remove_panel('sirat_typography');
       $wp_customize->remove_section( 'example_1' );
    }

}

/**
 * Kicking this off by calling 'get_instance()' method
 */
Vw_Bakery_Pro_plugin_Settings::get_instance();
