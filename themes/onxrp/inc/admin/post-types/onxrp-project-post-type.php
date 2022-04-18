<?php
/*
*	Project Post Type Registration
*
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

if ( ! class_exists( 'Onxrp_Project_Post_Type' ) ) {
	class Onxrp_Project_Post_Type {

		function __construct() {

			// Adds the project post type and taxonomies
			$this->onxrp_ext_project_init();

		}

		function onxrp_ext_project_init() {

			$project_base_slug = 'project';
			$project_category_slug = 'project-category';


			$labels = array(
				'name' => esc_html_x( 'Project Items', 'Project General Name', 'onxrp' ),
				'singular_name' => esc_html_x( 'Project Item', 'Project Singular Name', 'onxrp' ),
				'add_new' => esc_html__( 'Add New', 'onxrp' ),
				'add_new_item' => esc_html__( 'Add New Project Item', 'onxrp' ),
				'edit_item' => esc_html__( 'Edit Project Item', 'onxrp' ),
				'new_item' => esc_html__( 'New Project Item', 'onxrp' ),
				'view_item' => esc_html__( 'View Project Item', 'onxrp' ),
				'search_items' => esc_html__( 'Search Project Items', 'onxrp' ),
				'not_found' =>  esc_html__( 'No Project Items found', 'onxrp' ),
				'not_found_in_trash' => esc_html__( 'No Project Items found in Trash', 'onxrp' ),
				'parent_item_colon' => '',
			);

			$category_labels = array(
				'name' => esc_html__( 'Project Categories', 'onxrp' ),
				'singular_name' => esc_html__( 'Project Category', 'onxrp' ),
				'search_items' => esc_html__( 'Search Project Categories', 'onxrp' ),
				'all_items' => esc_html__( 'All Project Categories', 'onxrp' ),
				'parent_item' => esc_html__( 'Parent Project Category', 'onxrp' ),
				'parent_item_colon' => esc_html__( 'Parent Project Category:', 'onxrp' ),
				'edit_item' => esc_html__( 'Edit Project Category', 'onxrp' ),
				'update_item' => esc_html__( 'Update Project Category', 'onxrp' ),
				'add_new_item' => esc_html__( 'Add New Project Category', 'onxrp' ),
				'new_item_name' => esc_html__( 'New Project Category Name', 'onxrp' ),
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
				'menu_icon' => 'dashicons-buddicons-groups',
				'show_in_rest' => true,
				'supports' => array( 'title', 'author', 'excerpt', 'thumbnail' ),
				'register_meta_box_cb' => 'onxrp_project_metabox',
				'rewrite' => array( 'slug' => $project_base_slug, 'with_front' => false ),
			);

			register_post_type(
				'project' ,
				apply_filters( "onxrp_ext_register_post_type_project_args", $args )
			);

			register_taxonomy(
				'project_category',
				apply_filters( 'onxrp_ext_register_taxonomy_project_category_object_type',
					array( 'project' )
				),
				apply_filters( 'onxrp_ext_register_taxonomy_project_category_args',
					array(
						'hierarchical' => true,
						'label' => esc_html__( 'Project Categories', 'onxrp' ),
						'labels' => $category_labels,
						'show_in_nav_menus' => true,
						'show_tagcloud' => false,
						'show_in_rest' => true,
						'rewrite' => array( 'slug' => $project_category_slug ),
					)
				)
			);



		}



	}
	new Onxrp_Project_Post_Type;
}
