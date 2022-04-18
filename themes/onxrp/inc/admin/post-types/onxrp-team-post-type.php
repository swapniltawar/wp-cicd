<?php
/*
*	Team Post Type Registration
*/

if ( ! class_exists( 'Onxrp_Team_Post_Type' ) ) {
	class Onxrp_Team_Post_Type {

		function __construct() {

			// Adds the team post type and taxonomies
			$this->onxrp_ext_team_init();

			// Manage Columns for team overview
			add_filter( 'manage_edit-team_columns',  array( &$this, 'onxrp_ext_team_edit_columns' ) );
			add_action( 'manage_posts_custom_column', array( &$this, 'onxrp_ext_team_custom_columns' ), 10, 2 );

		}

		function onxrp_ext_team_init() {

			$labels = array(
				'name' => esc_html_x( 'Team Items', 'Team General Name', 'onxrp-extension' ),
				'singular_name' => esc_html_x( 'Team Item', 'Team Singular Name', 'onxrp-extension' ),
				'add_new' => esc_html__( 'Add New', 'onxrp-extension' ),
				'add_new_item' => esc_html__( 'Add New Team Item', 'onxrp-extension' ),
				'edit_item' => esc_html__( 'Edit Team Item', 'onxrp-extension' ),
				'new_item' => esc_html__( 'New Team Item', 'onxrp-extension' ),
				'view_item' => esc_html__( 'View Team Item', 'onxrp-extension' ),
				'search_items' => esc_html__( 'Search Team Items', 'onxrp-extension' ),
				'not_found' =>  esc_html__( 'No Team Items found', 'onxrp-extension' ),
				'not_found_in_trash' => esc_html__( 'No Team Items found in Trash', 'onxrp-extension' ),
				'parent_item_colon' => '',
			);

			$category_labels = array(
				'name' => esc_html__( 'Team Categories', 'onxrp-extension' ),
				'singular_name' => esc_html__( 'Team Category', 'onxrp-extension' ),
				'search_items' => esc_html__( 'Search Team Categories', 'onxrp-extension' ),
				'all_items' => esc_html__( 'All Team Categories', 'onxrp-extension' ),
				'parent_item' => esc_html__( 'Parent Team Category', 'onxrp-extension' ),
				'parent_item_colon' => esc_html__( 'Parent Team Category:', 'onxrp-extension' ),
				'edit_item' => esc_html__( 'Edit Team Category', 'onxrp-extension' ),
				'update_item' => esc_html__( 'Update Team Category', 'onxrp-extension' ),
				'add_new_item' => esc_html__( 'Add New Team Category', 'onxrp-extension' ),
				'new_item_name' => esc_html__( 'New Team Category Name', 'onxrp-extension' ),
			);

			$args = array(
				'labels' => $labels,
				'public' => false,
				'publicly_queryable' => false,
				'show_ui' => true,
				'query_var' => false,
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'show_in_rest' => true,
				'menu_position' => 5,
				'menu_icon' => 'dashicons-admin-users',
				'supports' => array( 'title', 'thumbnail', 'excerpt','custom-fields'),
				'register_meta_box_cb' => 'onxrp_team_metabox',
				'rewrite' => array( 'slug' => 'team', 'with_front' => false ),
			);

			register_post_type(
				'team' ,
				apply_filters( "onxrp_ext_register_post_type_team_args", $args )
			);

			register_taxonomy(
				'team_category',
				apply_filters( 'onxrp_ext_register_taxonomy_team_category_object_type',
					array( 'team' )
				),
				apply_filters( 'onxrp_ext_register_taxonomy_team_category_args',
					array(
						'hierarchical' => true,
						'label' => esc_html__( 'Team Categories', 'onxrp-extension' ),
						'labels' => $category_labels,
						'show_in_nav_menus' => false,
						'show_tagcloud' => false,
						'show_in_rest' => true,
						'rewrite' => true,
					)
				)
			);
		}

		function onxrp_ext_team_edit_columns( $columns ) {
			$columns['cb'] = "<input type=\"checkbox\" />";
			$columns['title'] = esc_html__( 'Title', 'onxrp-extension' );
			$columns['team_thumbnail'] = esc_html__( 'Featured Image', 'onxrp-extension' );
			$columns['author'] = esc_html__( 'Author', 'onxrp-extension' );
			$columns['team_category'] = esc_html__( 'Team Categories', 'onxrp-extension' );
			$columns['date'] = esc_html__( 'Date', 'onxrp-extension' );
			return $columns;
		}

		function onxrp_ext_team_custom_columns( $column, $post_id ) {

			switch ( $column ) {
				case "team_thumbnail":
					if ( has_post_thumbnail( $post_id ) ) {
						$thumbnail_id = get_post_thumbnail_id( $post_id );
						$attachment_src = wp_get_attachment_image_src( $thumbnail_id, array( 80, 80 ) );
						if ( $attachment_src ) {
							$thumb = $attachment_src[0];
						} else {
							$thumb = get_template_directory_uri() . '/includes/images/not-found.jpg';
						}
					} else {
						$thumb = get_template_directory_uri() . '/includes/images/no-image.jpg';
					}
					echo '<img class="attachment-80x80" width="80" height="80" alt="team image" src="' . esc_url( $thumb ) . '">';
					break;
				case 'team_category':
					echo get_the_term_list( $post_id, 'team_category', '', ', ','' );
				break;
			}
		}

	}
	new Onxrp_Team_Post_Type;
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
