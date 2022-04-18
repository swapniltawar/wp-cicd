<?php
/*
*	Partner Post Type Registration
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! class_exists( 'Onxrp_Trusted_Resources_Post_Type' ) ) {
	class Onxrp_Trusted_Resources_Post_Type {

		function __construct() {

			// Adds the partner post type and taxonomies
			$this->onxrp_ext_trusted_resources_init();

		}

		function onxrp_ext_trusted_resources_init() {

			$trusted_resources_base_slug = 'trusted-resources';
			$trusted_resources_category_slug = 'trusted-resources-category';


			$labels = array(
				'name' => esc_html_x( 'Trusted Resources Items', 'Trusted Resources General Name', 'onxrp' ),
				'singular_name' => esc_html_x( 'Trusted Resources Item', 'Partner Singular Name', 'onxrp' ),
				'add_new' => esc_html__( 'Add New', 'onxrp' ),
				'add_new_item' => esc_html__( 'Add New Trusted Resources Item', 'onxrp' ),
				'edit_item' => esc_html__( 'Edit Trusted Resources Item', 'onxrp' ),
				'new_item' => esc_html__( 'New Trusted Resources Item', 'onxrp' ),
				'view_item' => esc_html__( 'View Trusted Resources Item', 'onxrp' ),
				'search_items' => esc_html__( 'Search Trusted Resources Items', 'onxrp' ),
				'not_found' =>  esc_html__( 'No Trusted Resources Items found', 'onxrp' ),
				'not_found_in_trash' => esc_html__( 'No Trusted Resources Items found in Trash', 'onxrp' ),
				'parent_item_colon' => '',
			);

			$category_labels = array(
				'name' => esc_html__( 'Trusted Resources Categories', 'onxrp' ),
				'singular_name' => esc_html__( 'Trusted Resources Category', 'onxrp' ),
				'search_items' => esc_html__( 'Search Trust Resources Categories', 'onxrp' ),
				'all_items' => esc_html__( 'All Trust Resources Categories', 'onxrp' ),
				'parent_item' => esc_html__( 'Parent Trusted Resources Category', 'onxrp' ),
				'parent_item_colon' => esc_html__( 'Parent Trusted Resources Category:', 'onxrp' ),
				'edit_item' => esc_html__( 'Edit Trusted Resources Category', 'onxrp' ),
				'update_item' => esc_html__( 'Update Trusted Resources Category', 'onxrp' ),
				'add_new_item' => esc_html__( 'Add New Trusted Resources Category', 'onxrp' ),
				'new_item_name' => esc_html__( 'New Trusted Resources Category Name', 'onxrp' ),
			);

			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 5,
				'menu_icon' => 'dashicons-randomize',
				'show_in_rest' => true,
				'supports' => array( 'title', 'editor','author', 'excerpt', 'thumbnail' ),
				'register_meta_box_cb' => 'onxrp_tr_metabox',
				'rewrite' => array( 'slug' => $trusted_resources_base_slug, 'with_front' => false ),
			);

			register_post_type(
				'trusted_resources' ,
				apply_filters( "onxrp_ext_register_post_type_trusted_resources_args", $args )
			);

			register_taxonomy(
				'trusted_resources_category',
				apply_filters( 'onxrp_ext_register_taxonomy_trusted_resources_category_object_type',
					array( 'trusted_resources' )
				),
				apply_filters( 'onxrp_ext_register_taxonomy_trusted_resources_category_args',
					array(
						'hierarchical' => true,
						'label' => esc_html__( 'Trusted Resources Categories', 'onxrp' ),
						'labels' => $category_labels,
						'show_in_nav_menus' => true,
						'show_tagcloud' => false,
						'show_in_rest' => true,
						'rewrite' => array( 'slug' => $trusted_resources_category_slug ),
					)
				)
			);



		}



	}
	new Onxrp_Trusted_Resources_Post_Type;
}
