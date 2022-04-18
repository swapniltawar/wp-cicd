<?php
/*
*	Podcast Post Type Registration
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! class_exists( 'Onxrp_Podcast_Post_Type' ) ) {
	class Onxrp_Podcast_Post_Type {

		function __construct() {

			// Adds the podcast post type and taxonomies
			$this->onxrp_ext_podcast_init();

		}

		function onxrp_ext_podcast_init() {

			$podcast_base_slug = 'podcast';


			$labels = array(
				'name' => esc_html_x( 'Podcast Items', 'Podcast General Name', 'onxrp' ),
				'singular_name' => esc_html_x( 'Podcast Item', 'Podcast Singular Name', 'onxrp' ),
				'add_new' => esc_html__( 'Add New Podcast', 'onxrp' ),
				'add_new_item' => esc_html__( 'Add New Podcast Item', 'onxrp' ),
				'edit_item' => esc_html__( 'Edit Podcast Item', 'onxrp' ),
				'new_item' => esc_html__( 'New Podcast Item', 'onxrp' ),
				'view_item' => esc_html__( 'View Podcast Item', 'onxrp' ),
				'search_items' => esc_html__( 'Search Podcast Items', 'onxrp' ),
				'not_found' =>  esc_html__( 'No Podcast Items found', 'onxrp' ),
				'not_found_in_trash' => esc_html__( 'No Podcast Items found in Trash', 'onxrp' ),
				'parent_item_colon' => '',
			);

			$category_labels = array(
				'name' => esc_html__( 'Categories', 'onxrp' ),
				'singular_name' => esc_html__( 'Category', 'onxrp' ),
				'search_items' => esc_html__( 'Search Podcast Categories', 'onxrp' ),
				'all_items' => esc_html__( 'All Podcast Categories', 'onxrp' ),
				'parent_item' => esc_html__( 'Parent Podcast Category', 'onxrp' ),
				'parent_item_colon' => esc_html__( 'Parent Podcast Category:', 'onxrp' ),
				'edit_item' => esc_html__( 'Edit Podcast Category', 'onxrp' ),
				'update_item' => esc_html__( 'Update Podcast Category', 'onxrp' ),
				'add_new_item' => esc_html__( 'Add New Podcast Category', 'onxrp' ),
				'new_item_name' => esc_html__( 'New Podcast Category Name', 'onxrp' ),
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
				'show_in_rest' => true,
				'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt'  ),
				'rewrite' => array( 'slug' => $podcast_base_slug, 'with_front' => false ),
			);

			register_post_type(
				'podcast' ,
				apply_filters( "onxrp_ext_register_post_type_podcast_args", $args )
			);




		}



	}
	new Onxrp_Podcast_Post_Type;
}
