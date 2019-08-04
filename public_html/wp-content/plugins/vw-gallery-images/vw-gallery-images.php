<?php
/*
 Plugin Name: VW Gallery Images
 Plugin URI: https://www.vwthemes.com/
 Description: Use to create and display gallery images.
 Author: VW Themes
 Version: 0.2
 Author URI: https://www.vwthemes.com/
*/

define( 'VW_GALLERY_IMAGES_VERSION', '0.2' );

add_action( 'init', 'vw_gallery_images_init' );

function vw_gallery_images_init() {
	register_post_type( 'vw_gallery', array(
		'labels' => array(
			'name'               => __( 'Gallery','vw-gallery-images' ),
			'singular_name'      => __( 'Gallery','vw-gallery-images' ),
			'add_new'            => __( 'Add New Gallery','vw-gallery-images' ),
			'add_new_item'       => __( 'Add New Gallery','vw-gallery-images' ),
			'edit_item'          => __( 'Edit Gallery', 'vw-gallery-images' ),
			'new_item'           => __( 'New Gallery', 'vw-gallery-images' ),
			'view_item'          => __( 'View Gallery', 'vw-gallery-images' ),
			'search_items'       => __( 'Search Gallery', 'vw-gallery-images' ),
			'not_found'          => __( 'No Gallery found.', 'vw-gallery-images' ),
			'not_found_in_trash' => __( 'No Gallery found in trash.', 'vw-gallery-images' ),
			'parent_item_colon'  => '',
			'menu_name'          => __( 'VW Gallery', 'vw-gallery-images' ),
			),
		'public'              => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'rewrite'             => false,
		'query_var'           => false,
		'menu_position'       => '',
		'menu_icon'           => 'dashicons-format-gallery',
		'supports'            => array( 'title' ),
		) );

}

function pw_add_image_sizes() {
    add_image_size( 'vw-gallery-image-medium', 300, 300, true );
}
add_action( 'init', 'pw_add_image_sizes' );
 
function pw_show_image_sizes($sizes) {
    $sizes['vw-gallery-image-medium'] = __( 'Custom Thumb', 'pippin' );
 
    return $sizes;
}
add_filter('image_size_names_choose', 'pw_show_image_sizes');


// Including the CSS and JS for the front end
add_action('wp_enqueue_scripts', 'vw_gallery_images_callback_for_setting_up_scripts');
function vw_gallery_images_callback_for_setting_up_scripts() {
	wp_enqueue_script( 'pretty-custom-js', plugins_url( '/js/jquery.prettycustom.js', __FILE__ ), array('jquery') );
	wp_enqueue_script( 'pretty-photo-js', plugins_url( '/js/jquery.prettyPhoto.js', __FILE__ ), array('jquery') );
	
    wp_enqueue_style( 'prettyPhoto-css', plugins_url( 'css/prettyPhoto.css', __FILE__ ), '', '1.0' );

}


function vw_gallery_images_metabox_enqueue($hook) {
	if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
		wp_enqueue_script('vw-gallery-images-metabox', plugin_dir_url( __FILE__ ) . '/js/vw-gm.js', array('jquery', 'jquery-ui-sortable'));
		wp_enqueue_style('vw-gallery-images-metabox', plugin_dir_url( __FILE__ ) . '/css/vw-gm.css');

		global $post;
		if ( $post ) {
			wp_enqueue_media( array(
					'post' => $post->ID,
				)
			);
		}

	}
}

add_action('admin_enqueue_scripts', 'vw_gallery_images_metabox_enqueue');

function vw_gallery_images_add_gallery_metabox($post_type) {
	$types = array('vw_gallery');

	if (in_array($post_type, $types)) {
		add_meta_box(
			'vw-gallery-image-metabox',
			__( 'Gallery Images', 'vw-gallery-images' ),
			'vw_gallery_images_meta_callback',
			$post_type,
			'normal',
			'high'
			);
	}
}

add_action('add_meta_boxes', 'vw_gallery_images_add_gallery_metabox');

function vw_gallery_images_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'vw_gallery_images_meta_nonce' );
	$ids = get_post_meta( $post->ID, 'vw_gallery_images_gal_id', true );

	?>
	<table class="form-table">
		<tr>
			<td>
				<a class="gallery-add button" href="#" data-uploader-title="<?php esc_attr_e( 'Add image(s) to gallery', 'vw-gallery-images' ); ?>" data-uploader-button-text="<?php esc_attr_e( 'Add image(s)', 'vw-gallery-images' ); ?>"><?php esc_html_e( 'Add image(s)', 'vw-gallery-images' ); ?></a>

				<ul id="vw-gallery-images-item-list">
					<?php if ( $ids ) : foreach ( $ids as $key => $value ) : $image = wp_get_attachment_image_src( $value ); ?>

						<li>
							<input type="hidden" name="vw_gallery_images_gal_id[<?php echo $key; ?>]" value="<?php echo $value; ?>">
							<img class="image-preview" src="<?php echo esc_url( $image[0] ); ?>">
							<a class="change-image button button-small" href="#" data-uploader-title="<?php esc_attr_e( 'Change image', 'vw-gallery-images' ) ; ?>" data-uploader-button-text="<?php esc_attr_e( 'Change image', 'vw-gallery-images' ) ; ?>"><?php esc_html_e( 'Change image', 'vw-gallery-images' ) ; ?></a><br>
							<small><a class="remove-image" href="#"><?php esc_html_e( 'Remove image', 'vw-gallery-images' ) ; ?></a></small>
						</li>

					<?php endforeach;
					endif; ?>
				</ul>
			</td>
		</tr>
	</table>
	<?php
}

function vw_gallery_images_meta_save($post_id) {
	if (!isset($_POST['vw_gallery_images_meta_nonce']) || !wp_verify_nonce($_POST['vw_gallery_images_meta_nonce'], basename(__FILE__))) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if(isset($_POST['vw_gallery_images_gal_id'])) {
		$sanitized_values = array_map('intval', $_POST['vw_gallery_images_gal_id']);
		update_post_meta($post_id, 'vw_gallery_images_gal_id', $sanitized_values );
	} else {
		delete_post_meta($post_id, 'vw_gallery_images_gal_id');
	}
}
add_action('save_post', 'vw_gallery_images_meta_save');

function vw_gallery_images_get_custom_post_type_template( $single_template ) {
	global $post;
	if ($post->post_type == 'vw_gallery') {
		if ( file_exists( get_template_directory() . '/page-template/gallery.php' ) ) {
			$single_template = get_template_directory() . '/page-template/gallery.php';
		}
	}
	return $single_template;
}

add_filter( 'single_template', 'vw_gallery_images_get_custom_post_type_template' );

/*Shortcode for Gallery*/
function vw_gallery_images_gallery_show($gallery_id,$numberofitem, $bootstraponecolsize) {
	// add_thickbox();
	$get_post_id = isset( $gallery_id['vw_gallery'] ) ? absint( $gallery_id['vw_gallery'] ) : 0;
	$numberofitem = isset( $gallery_id['numberofitem'] ) ? absint( $gallery_id['numberofitem'] ) : 8;
	$bootstraponecolsize = isset( $gallery_id['bootstraponecolsize'] ) ? absint( $gallery_id['bootstraponecolsize'] ) : 2;

	if ( ! $get_post_id ) {
		return;
	}

	$images = get_post_meta($get_post_id, 'vw_gallery_images_gal_id', true);

	$res = '';
	if(empty($images)){
		$res = '<p>' . esc_html__( 'No Image Found', 'vw-gallery-images' ) . '</p>';
	}
	else{
		$gal_i=1;
		$res .= '<ul class="vw_gallery_front row clearfix">';
		foreach ($images as $image) {
			global $post;
			$image_uri_medium = wp_get_attachment_image( $image, 'vw-gallery-image-medium' );
			$image_uri_large = wp_get_attachment_image_url( $image, 'full' );
			$full = wp_get_attachment_link($image, 'large');
			$attachment_title = get_the_title($image);
			$res .= '<li class="col-md-'.$bootstraponecolsize.' col-sm-6 col-6 p-0">
			<a href="'.$image_uri_large.'" rel="prettyPhoto[gallery_name]" title="'.$attachment_title.'">'.$image_uri_medium.'<div class="icon_overlay"><i class="fa fa-plus"></i></div></a>
			</li>';
			if($gal_i == $numberofitem) {
				break;
			}
			$gal_i++;
		}
		$res .= '</ul>';
	}

	return $res;
}

add_shortcode( 'vw-galleryshow', 'vw_gallery_images_gallery_show' );
?>