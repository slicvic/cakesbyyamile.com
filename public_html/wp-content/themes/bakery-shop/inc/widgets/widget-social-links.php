<?php
/**
 * Widget Social Links
 *
 * @package Bakery_shop
 */

// register Bakery_Shop_Social_Links widget 
function bakery_shop_register_social_links_widget() {
    register_widget( 'Bakery_Shop_Social_Links' );
}
add_action( 'widgets_init', 'bakery_shop_register_social_links_widget' );
 
 /**
 * Adds Bakery_Shop_Social_Links widget.
 */
class Bakery_Shop_Social_Links extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'bakery_shop_social_links', // Base ID
			esc_html__( 'PROSYS: Social Links', 'bakery-shop' ), // Name
			array( 'description' => esc_html__( 'A Social Links Widget', 'bakery-shop' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	   
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : '';		
        $facebook   = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '' ;
        $instagram  = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '' ;
        $twitter    = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '' ;
        $pinterest  = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '' ;
        $linkedin   = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '' ;
        $youtube    = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '' ;
        
        if( $facebook || $instagram || $twitter || $pinterest || $linkedin || $youtube ){ 
        echo $args['before_widget'];
        if( isset($title) && $title != "" ){ echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title']; }
        ?>
            <ul class="networks">
				<?php if( $facebook ){ ?>
                <li><a href="<?php echo esc_url( $facebook ); ?>" title="<?php esc_attr_e( 'Facebook', 'bakery-shop' ); ?>" class="fa fa-facebook "></a></li>
				<?php } if( $instagram ){ ?>
                <li><a href="<?php echo esc_url( $instagram ); ?>" title="<?php esc_attr_e( 'Instagram', 'bakery-shop' ); ?>" class="fa fa-instagram"></a></li>
                <?php } if( $twitter ){ ?>
                <li><a href="<?php echo esc_url( $twitter ); ?>" title="<?php esc_attr_e( 'Twitter', 'bakery-shop' ); ?>" class="fa fa-twitter"></a></li>
				<?php } if( $pinterest ){ ?>
                <li><a href="<?php echo esc_url( $pinterest ); ?>"  title="<?php esc_attr_e( 'Pinterest', 'bakery-shop' ); ?>" class="fa fa-pinterest-p"></a></li>
				<?php } if( $linkedin ){ ?>
                <li><a href="<?php echo esc_url( $linkedin ); ?>" title="<?php esc_attr_e( 'Linkedin', 'bakery-shop' ); ?>" class="fa fa-linkedin"></a></li>
				<?php } if( $youtube ){ ?>
                <li><a href="<?php echo esc_url( $youtube ); ?>" title="<?php esc_attr_e( 'YouTube', 'bakery-shop' ); ?>" class="fa fa-youtube"></a></li>
                <?php } ?>
			</ul>
        <?php
        echo $args['after_widget'];
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : '';		
        $facebook   = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '' ;
        $instagram  = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '' ;
        $twitter    = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '' ;
        $pinterest  = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '' ;
        $linkedin   = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '' ;
        $youtube    = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '' ;
        
        ?>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'bakery-shop' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook', 'bakery-shop' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram', 'bakery-shop' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
		</p>
                
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter', 'bakery-shop' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest', 'bakery-shop' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'LinkedIn', 'bakery-shop' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_url( $linkedin ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e( 'YouTube', 'bakery-shop' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_url( $youtube ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
        $instance = array();
		
        $instance['title']      = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) :'';
        $instance['facebook']   = ! empty( $new_instance['facebook'] ) ? esc_url_raw( $new_instance['facebook'] ) : '';
        $instance['instagram']  = ! empty( $new_instance['instagram'] ) ? esc_url_raw( $new_instance['instagram'] ) : '';
        $instance['twitter']    = ! empty( $new_instance['twitter'] ) ? esc_url_raw( $new_instance['twitter'] ) : '';
        $instance['pinterest']  = ! empty( $new_instance['pinterest'] ) ? esc_url_raw( $new_instance['pinterest'] ) : '';
        $instance['linkedin']   = ! empty( $new_instance['linkedin'] ) ? esc_url_raw( $new_instance['linkedin'] ) : '';
        $instance['youtube']    = ! empty( $new_instance['youtube'] ) ? esc_url_raw( $new_instance['youtube'] ) : '';
		
        return $instance;
                
	}

} // class Bakery_Shop_Social_Links 