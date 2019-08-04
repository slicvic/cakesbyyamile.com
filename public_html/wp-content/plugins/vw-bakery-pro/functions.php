<?php

define('VW_BAKERY_STYLES','vw-bakery-');

function vw_bakery_pro_sanitize_choices( $input, $setting ) {
  global $wp_customize;
  $control = $wp_customize->get_control( $setting->id );
  if ( array_key_exists( $input, $control->choices ) ) {
    return $input;
  } else {
    return $setting->default;
  }
}

function vw_bakery_pro_string_limit_words($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

define('VW_BAKERY_PRO_SITE_URL','https://www.vwthemes.com/');
/* Theme Credit link */
function vw_bakery_pro_credit_link() {
	echo esc_html_e('Design & Developed by','vw-bakery-pro'). "<a href=".esc_url(VW_BAKERY_PRO_SITE_URL)." target='_blank'> VW Themes</a>";
}

/* Customizer */
require_once VW_BAKERY_PRO_PLUGIN_PATH. 'inc/customizer.php';
/* Get Started. */
require_once VW_BAKERY_PRO_PLUGIN_PATH. 'inc/getstarted/getstart.php';
require_once VW_BAKERY_PRO_PLUGIN_PATH. 'inc/posttype-templates/posttype-templates.php';
require_once VW_BAKERY_PRO_PLUGIN_PATH. 'inc/template-tags.php';
require_once VW_BAKERY_PRO_PLUGIN_PATH. 'inc/widget/contact-widget.php';
require_once VW_BAKERY_PRO_PLUGIN_PATH. 'inc/widget/socail-widget.php';
require_once VW_BAKERY_PRO_PLUGIN_PATH. 'inc/tgm.php';

define('VW_BAKERY_PRO_THEME_DOC','https://www.vwthemesdemo.com/docs/vw-bakery-pro-plugin/');
define('VW_BAKERY_PRO_SUPPORT','https://www.vwthemes.com/support/vw-theme/');
define('VW_BAKERY_PRO_FAQ','https://www.vwthemes.com/faqs/');
define('VW_BAKERY_PRO_CONTACT','https://www.vwthemes.com/contact/');
define('VW_BAKERY_PRO_REVIEW','https://www.vwthemes.com/topic/reviews-and-testimonials/');
define('VW_BAKERY_PRO_SHOPIFY','https://www.vwthemes.com/premium-shopify-themes/');
define('VW_BAKERY_PRO_MOODLE','https://vwthemes.com/lms-themes/taleem-responsive-moodle-theme/');
define('VW_BAKERY_PRO_MOBILE_APP','https://www.vwthemes.com/premium-woocommerce-mobile-app/vw-woocommerce-mobile-app/');

function vw_bakery_pro_widgets_init() {

 register_sidebar( array(
   'name'          => __( 'VW Blog Sidebar', 'vw-bakery-pro' ),
   'description'   => __( 'Appears on blog page sidebar', 'vw-bakery-pro' ),
   'id'            => 'vw-sidebar-1',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget'  => '</aside>',
   'before_title'  => '<h3 class="widget-title">',
   'after_title'   => '</h3>',
 ) );
 register_sidebar( array(
   'name'          => __( 'VW Page Sidebar', 'vw-bakery-pro' ),
   'description'   => __( 'Appears on page sidebar', 'vw-bakery-pro' ),
   'id'            => 'vw-sidebar-2',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget'  => '</aside>',
   'before_title'  => '<h3 class="widget-title">',
   'after_title'   => '</h3>',
 ) );
 register_sidebar( array(
   'name'          => __( 'VW Footer 1', 'vw-bakery-pro' ),
   'description'   => __( 'Appears on footer', 'vw-bakery-pro' ),
   'id'            => 'vw-footer-1',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget'  => '</aside>',
   'before_title'  => '<h3 class="widget-title">',
   'after_title'   => '</h3>',
 ) );
 register_sidebar( array(
   'name'          => __( 'VW Footer 2', 'vw-bakery-pro' ),
   'description'   => __( 'Appears on footer', 'vw-bakery-pro' ),
   'id'            => 'vw-footer-2',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget'  => '</aside>',
   'before_title'  => '<h3 class="widget-title">',
   'after_title'   => '</h3>',
 ) );
 register_sidebar( array(
   'name'          => __( 'VW Footer 3', 'vw-bakery-pro' ),
   'description'   => __( 'Appears on footer', 'vw-bakery-pro' ),
   'id'            => 'vw-footer-3',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget'  => '</aside>',
   'before_title'  => '<h3 class="widget-title">',
   'after_title'   => '</h3>',
 ) );
 register_sidebar( array(
   'name'          => __( 'VW Footer 4', 'vw-bakery-pro' ),
   'description'   => __( 'Appears on footer', 'vw-bakery-pro' ),
   'id'            => 'vw-footer-4',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget'  => '</aside>',
   'before_title'  => '<h3 class="widget-title">',
   'after_title'   => '</h3>',
 ) );
}
add_action( 'widgets_init', 'vw_bakery_pro_widgets_init' );

// ------------ menu ------------

add_action( 'after_setup_theme', 'register_custom_nav_menus' );
function register_custom_nav_menus() {
  register_nav_menus( array(
    'vw_primary_menu' => 'VW Primary Menu',
     
  ) );
  register_nav_menus( array(
    'vw_left_menu' => 'VW Left Menu',
     
  ) );
  register_nav_menus( array(
    'vw_right_menu' => 'VW Right Menu',
     
  ) );
  register_nav_menus( array(
    'vw_footer_menu' => 'VW Footer Menu',
     
  ) );
}
// Recent post widget with thumbnails
include VW_BAKERY_PRO_EXT_DIR.'../../../wp-includes/default-widgets.php';
Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
    function widget($args, $instance) {
            if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'vw-bakery-pro' );
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        /**
         * Filter the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the recent posts.
         */
        $r = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
        ) ) );
        if ($r->have_posts()) :
        ?>
        <?php echo $args['before_widget']; ?>
        <?php if ( $title ) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        } ?>
        <ul>
          <?php while ( $r->have_posts() ) : $r->the_post(); ?>
              <li>
                  <div class="row recent-post-box">
                    <div class="post-thumb <?php if(has_post_thumbnail()) { echo 'col-md-4 col-sm-4 col-4'; } ?> ">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="post-content <?php if(has_post_thumbnail()) { echo 'col-md-8 col-sm-8 col-8'; } else { echo 'col-md-12 col-sm-12 col-12'; }?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      <?php if ( $show_date ) : ?>
                          <p class="post-date"><?php the_date(); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
              </li>
          <?php endwhile; 
          wp_reset_postdata(); ?>
        </ul>

        <?php echo $args['after_widget'];
        
        endif;
    }
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');
?>
