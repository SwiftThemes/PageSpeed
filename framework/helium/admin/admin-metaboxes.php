<?php
/**
 * Add meta box
 *
 * @param post $post The post object
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function helium_add_meta_boxes( $post_type ) {
//	$post_types = helium_get_post_types();
//	foreach($post_types as $post_type){
//		add_meta_box( 'helium_page_options', __( 'Helium Options', 'page-speed'), 'helium_build_meta_box', $post_type, 'side', 'high','' );
//	}
	add_meta_box( 'helium_page_options', __( 'Helium Framework Options', 'page-speed'), 'helium_build_meta_box', 'page', 'side', 'high','' );
}

add_action( 'admin_init', 'helium_add_meta_boxes' );


function helium_build_meta_box() {
	global $he;
	wp_nonce_field( basename( __FILE__ ), "helium-meta-box-nonce" );
	?>

	<label>
		<input type="checkbox"
		       name="hide_breadcrumbs"
		       value=1 <?php checked( $he->get_meta( 'hide_breadcrumbs' ) ) ?>><?php _e( 'Hide breadcrumbs', 'page-speed') ?>
	</label>
	<br>
	<label>
		<input type="checkbox"
		       name="hide_title"
		       value=1 <?php checked( $he->get_meta( 'hide_title' ) ) ?>><?php _e( 'Hide page title', 'page-speed') ?>
	</label>
    <br>

    <label>
		<input type="checkbox"
		       name="hide_footer_widgets"
		       value=1 <?php checked( $he->get_meta( 'hide_footer_widgets' ) ) ?>><?php _e( 'Hide footer widgets', 'page-speed') ?>
	</label>
	<?php
}

function helium_save_meta_box( $post_id ) {

	if ( ! isset( $_POST["helium-meta-box-nonce"] ) || ! wp_verify_nonce( $_POST["helium-meta-box-nonce"], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	if ( ! current_user_can( "edit_post", $post_id ) ) {
		return $post_id;
	}

	if ( defined( "DOING_AUTOSAVE" ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	global $he;
	$sanitized = $he->get_meta();


	$sanitized['hide_breadcrumbs'] = isset( $_POST['hide_breadcrumbs'] ) ? true : false;
	$sanitized['hide_title']     = isset( $_POST['hide_title'] ) ? true : false;
	$sanitized['hide_footer_widgets']     = isset( $_POST['hide_footer_widgets'] ) ? true : false;

	update_post_meta( $post_id, '_he', $sanitized );

}

add_action( "save_post", "helium_save_meta_box", 10, 3 );
