<?php
/**
 *Custom fields for trusted_resources member post type
 */
function onxrp_tr_metabox() {

	add_meta_box(
		'onxrp_tr_social',
		'Social Links',
		'onxrp_tr_social',
		'trusted_resources',
		'normal',
		'default',

	);

}

/**
 * Output the HTML for the metabox.
 */
function onxrp_tr_social() {
	global $post;

	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'tr_fields' );


	$twitter = get_post_meta( $post->ID, 'onxrp_tr_twitter', true );
	$youtube = get_post_meta( $post->ID, 'onxrp_tr_youtube', true );
	$instagram = get_post_meta( $post->ID, 'onxrp_tr_instagram', true );
	$website = get_post_meta( $post->ID, 'onxrp_tr_website', true );
	$linktree = get_post_meta( $post->ID, 'onxrp_tr_linktree', true );
	$reddit = get_post_meta( $postId, 'onxrp_tr_reddit', true );
	// Output the field

	echo '<div class="inside"><label>Twitter</lable>';
	echo '<input type="text" name="onxrp_tr_twitter" value="' . esc_textarea( $twitter )  . '" class="tr-meta-fields"></div>';
	echo '<div class="inside"><label>YouTube</lable>';
	echo '<input type="text" name="onxrp_tr_youtube" value="' . esc_textarea( $youtube )  . '" class="tr-meta-fields"></div>';
	echo '<div class="inside"><label>Instagram</lable>';
	echo '<input type="text" name="onxrp_tr_instagram" value="' . esc_textarea( $instagram )  . '" class="tr-meta-fields"></div>';
	echo '<div class="inside"><label>website</lable>';
	echo '<input type="text" name="onxrp_tr_website" value="' . esc_textarea( $website )  . '" class="tr-meta-fields"></div>';
	echo '<div class="inside"><label>Linktree</lable>';
	echo '<input type="text" name="onxrp_tr_linktree" value="' . esc_textarea( $linktree )  . '" class="tr-meta-fields"></div>';
	echo '<div class="inside"><label>Reddit</lable>';
	echo '<input type="text" name="onxrp_tr_reddit" value="' . esc_textarea( $reddit )  . '" class="tr-meta-fields"></div>';

}




/**
 * Save the metabox data
 */
function onxrp_save_tr_meta( $post_id, $post ) {

	// Return if the user doesn't have edit permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// Verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times.
	if ( ! wp_verify_nonce( $_POST['tr_fields'], basename(__FILE__) ) ) {
		return $post_id;
	}

	// Now that we're authenticated, time to save the data.
	// This sanitizes the data from the field and saves it into an array $tr_meta.
	$tr_meta['onxrp_tr_twitter'] = esc_textarea( $_POST['onxrp_tr_twitter'] );
	$tr_meta['onxrp_tr_youtube'] = esc_textarea( $_POST['onxrp_tr_youtube'] );
	$tr_meta['onxrp_tr_instagram'] = esc_textarea( $_POST['onxrp_tr_instagram'] );
	$tr_meta['onxrp_tr_website'] = esc_textarea( $_POST['onxrp_tr_website'] );
	$tr_meta['onxrp_tr_linktree'] = esc_textarea( $_POST['onxrp_tr_linktree'] );
	$tr_meta['onxrp_tr_reddit'] = esc_textarea( $_POST['onxrp_tr_reddit'] );

	// Cycle through the $tr_meta array.
	foreach ( $tr_meta as $key => $value ) :

		// Don't store custom data twice
		if ( 'revision' === $post->post_type ) {
			return;
		}

		if ( get_post_meta( $post_id, $key, false ) ) {
			// If the custom field already has a value, update it.
			update_post_meta( $post_id, $key, $value );
		} else {
			// If the custom field doesn't have a value, add it.
			add_post_meta( $post_id, $key, $value);
		}

		if ( ! $value ) {
			// Delete the meta key if there's no value
			delete_post_meta( $post_id, $key );
		}

	endforeach;

}
add_action( 'save_post_trusted_resources', 'onxrp_save_tr_meta', 1, 2 );
