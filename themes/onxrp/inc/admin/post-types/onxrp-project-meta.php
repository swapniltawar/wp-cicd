<?php
/**
 *Custom fields for project member post type
 */
function onxrp_project_metabox() {

	add_meta_box(
		'onxrp_project_redirect',
		'Redirect Link',
		'onxrp_project_redirect',
		'project',
		'normal',
		'default',
	);

}

/**
 * Output the HTML for the metabox.
 */
function onxrp_project_redirect() {
	global $post;

	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'project_fields' );


	$redirectLink = get_post_meta( $post->ID, 'onxrp_project_redirect', true );

	// Output the field
	echo '<input type="text" name="onxrp_project_redirect" value="' . esc_textarea( $redirectLink )  . '" class="project-meta-fields">';

}

/**
 * Save the metabox data
 */
function onxrp_save_project_meta( $post_id, $post ) {

	// Return if the user doesn't have edit permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// Verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times.
	if ( ! wp_verify_nonce( $_POST['project_fields'], basename(__FILE__) ) ) {
		return $post_id;
	}

	// Now that we're authenticated, time to save the data.
	// This sanitizes the data from the field and saves it into an array $project_meta.
	$project_meta['onxrp_project_redirect'] = esc_textarea( $_POST['onxrp_project_redirect'] );

	// Cycle through the $project_meta array.
	foreach ( $project_meta as $key => $value ) :

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
add_action( 'save_post_project', 'onxrp_save_project_meta', 1, 2 );
