<?php
//custom socila icons
class wpb_social_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
			'wpb_social_widget', 
			// Widget name will appear in UI
			__('Social Icon', 'vw-bakery-pro'), 
			// Widget description
			array( 'description' => __( 'Widget for Social icons section', 'vw-bakery-pro' ), ) 
		);
	}
	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		?>
		<div class="social_widget">
			<?php
				$facebook = '';
				$twitter = '';
				$google = '';
				$linkedin = '';
				$pinterest = '';
				$tumblr = '';
				$instagram = '';
				$youtube = '';
				
				$title = apply_filters('widget_title', esc_html($instance['title']));
				$facebook = $instance['facebook'];
		        $twitter = $instance['twitter'];
		        $google = $instance['google'];
		        $linkedin = $instance['linkedin'];
		        $pinterest = $instance['pinterest'];
		        $tumblr = $instance['tumblr'];
		        $instagram = $instance['instagram'];
		        $youtube = $instance['youtube'];
		 
				// social profile link
		        $facebook_profile = '<a class="custom_facebook fff" href="' . esc_url($facebook) . '"><i class="fab fa-facebook-f"></i></a>';
		        $twitter_profile ='<a class="custom_twitter" href="' . esc_url($twitter) . '"><i class="fab fa-twitter"></i></a>';
		        $google_profile = '<a class="custom_google" href="' . esc_url($google) . '"><i class="fab fa-google-plus-g"></i></a>';
		        $linkedin_profile = '<a class="custom_linkedin" href="' . esc_url($linkedin) . '"><i class="fab fa-linkedin-in"></i></a>';
		        $pinterest_profile = '<a class="custom_pinterest" href="' . esc_url($pinterest) . '"><i class="fab fa-pinterest-p"></i></a>';
		        $tumblr_profile = '<a class="custom_tumblr" href="' . esc_url($tumblr) . '"><i class="fab fa-tumblr"></i></a>';
		        $instagram_profile = '<a class="custom_instagram" href="' . esc_url($instagram) . '"><i class="fab fa-instagram"></i></a>';
		         $youtube_profile = '<a class="custom_youtube" href="' . esc_url($youtube) . '"><i class="fab fa-youtube"></i></a>';
		 
				echo $args['before_widget'];
				
				if (!empty($title)) {
					echo $args['before_title'] . esc_html($title) . $args['after_title'];
				}
		 
		        echo '<div class="custom-social-icons">';
			        echo (!empty($facebook) ) ? $facebook_profile : null;
			        echo (!empty($twitter) ) ? $twitter_profile : null;
			        echo (!empty($google) ) ? $google_profile : null;
			        echo (!empty($linkedin) ) ? $linkedin_profile : null;
			        echo (!empty($pinterest) ) ? $pinterest_profile : null;
			        echo (!empty($tumblr) ) ? $tumblr_profile : null;
			        echo (!empty($instagram) ) ? $instagram_profile : null;
			        echo (!empty($youtube) ) ? $youtube_profile : null;
		        echo '</div>';
		        echo $args['after_widget'];
			?>
		</div>
		<?php
	}
		
	// Widget Backend 
	public function form( $instance ) {

		isset($instance['title']) ? $title = $instance['title'] : '';
        empty($instance['title']) ? $title = 'My Social Profile' : null;

		isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        empty($instance['facebook']) ? $facebook = '' : '';

		isset($instance['instagram']) ? $instagram = $instance['instagram'] : null;
        empty($instance['instagram']) ? $instagram = '' : '';

        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        empty($instance['twitter']) ? $twitter = '' : '';

        isset($instance['google']) ? $google = $instance['google'] : null;
        empty($instance['google']) ? $google = '' : '';

        isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
        empty($instance['linkedin']) ? $linkedin = '' : '';

        isset($instance['pinterest']) ? $pinterest = $instance['pinterest'] : null;
        empty($instance['pinterest']) ? $pinterest = '' : '';

        isset($instance['tumblr']) ? $tumblr = $instance['tumblr'] : null;
        empty($instance['tumblr']) ? $tumblr = '' : '';

        isset($instance['youtube']) ? $youtube = $instance['youtube'] : null;
        empty($instance['youtube']) ? $youtube = '' : '';

		?>	
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:','vw-bakery-pro'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php _e('Facebook:','vw-bakery-pro'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php _e('Twitter:','vw-bakery-pro'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('google')); ?>"><?php _e('Google+:','vw-bakery-pro'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('google')); ?>" name="<?php echo esc_attr($this->get_field_name('google')); ?>" type="text" value="<?php echo esc_attr($google); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php _e('Linkedin:','vw-bakery-pro'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php _e('Instagram:','vw-bakery-pro'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php _e('Pinterest:','vw-bakery-pro'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php _e('Tumblr:','vw-bakery-pro'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php _e('Youtube:','vw-bakery-pro'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>">
		</p>
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();	
		$instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';	
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
        $instance['instagram'] = (!empty($new_instance['instagram']) ) ? strip_tags($new_instance['instagram']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? strip_tags($new_instance['linkedin']) : '';
        $instance['pinterest'] = (!empty($new_instance['pinterest']) ) ? strip_tags($new_instance['pinterest']) : '';
        $instance['tumblr'] = (!empty($new_instance['tumblr']) ) ? strip_tags($new_instance['tumblr']) : '';
        $instance['youtube'] = (!empty($new_instance['youtube']) ) ? strip_tags($new_instance['youtube']) : '';
		return $instance;
	}
} // Class wpb_social_widget ends here


// Register and load the widget
function wpb_custom_load_widget() {
	register_widget( 'wpb_social_widget' );
}
add_action( 'widgets_init', 'wpb_custom_load_widget' );