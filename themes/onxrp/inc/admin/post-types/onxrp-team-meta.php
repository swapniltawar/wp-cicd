<?php
/**
 *Custom fields for team member post type
 */
function onxrp_team_metabox() {

	add_meta_box(
		'onxrp_team_designation',
		'Designation',
		'onxrp_team_designation',
		'team',
		'normal',
		'default',

	);

	add_meta_box(
		'onxrp_team_linkedin',
		'Linkedin Url',
		'onxrp_team_linkedin',
		'team',
		'normal',
		'default'
	);

	add_meta_box(
		'onxrp_team_twitter',
		'Twitter Url',
		'onxrp_team_twitter',
		'team',
		'normal',
		'default'
	);

}

/**
 * Output the HTML for the metabox.
 */
function onxrp_team_designation() {
	global $post;

	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'team_fields' );


	$designation = get_post_meta( $post->ID, 'onxrp_team_designation', true );

	// Output the field
	echo '<input type="text" name="onxrp_team_designation" value="' . esc_textarea( $designation )  . '" class="team-meta-fields">';

}

/**
 * Output the HTML for the metabox.
 */
function onxrp_team_linkedin() {
	global $post;

	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'team_fields' );


	$linkedin = get_post_meta( $post->ID, 'onxrp_team_linkedin', true );

	// Output the field
	echo '<input type="text" name="onxrp_team_linkedin" value="' . esc_textarea( $linkedin )  . '" class="team-meta-fields">';

}

/**
 * Output the HTML for the metabox.
 */
function onxrp_team_twitter() {
	global $post;

	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'team_fields' );


	$twitter = get_post_meta( $post->ID, 'onxrp_team_twitter', true );

	// Output the field
	echo '<input type="text" name="onxrp_team_twitter" value="' . esc_textarea( $twitter )  . '" class="team-meta-fields">';

}


/**
 * Save the metabox data
 */
function onxrp_save_team_meta( $post_id, $post ) {

	// Return if the user doesn't have edit permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// Verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times.
	if ( ! wp_verify_nonce( $_POST['team_fields'], basename(__FILE__) ) ) {
		return $post_id;
	}

	// Now that we're authenticated, time to save the data.
	// This sanitizes the data from the field and saves it into an array $team_meta.
	$team_meta['onxrp_team_designation'] = esc_textarea( $_POST['onxrp_team_designation'] );
	$team_meta['onxrp_team_linkedin'] = esc_textarea( $_POST['onxrp_team_linkedin'] );
	$team_meta['onxrp_team_twitter'] = esc_textarea( $_POST['onxrp_team_twitter'] );

	// Cycle through the $team_meta array.
	foreach ( $team_meta as $key => $value ) :

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
add_action( 'save_post_team', 'onxrp_save_team_meta', 1, 2 );
