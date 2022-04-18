<?php
/**
 * Glossary Custom Post Type
 */

/**
 * Class used to define and register the Glossary custom post type
 */
class Onxrp_Glossary_Post_Type {

	/**
	 * Constructor which call on each newly-created object
	 */
	public function __construct() {
		$this->create_post_type();
	}

	/**
	 * Function creates the 'Glossary' post type
	 */
	private function create_post_type() {

		$labels = array(
			'name'               => 'Glossary',
			'singular_name'      => 'Glossary',
			'add_new'            => 'Add Glossary',
			'add_new_item'       => 'Add Glossary',
			'edit_item'          => 'Edit Glossary',
			'new_item'           => 'Glossary',
			'view_item'          => 'View Glossary',
			'search_items'       => 'Search Glossary',
			'not_found'          => 'No Glossary found',
			'not_found_in_trash' => 'No Glossary found in trash',
			'menu_name'          => 'Glossary',
			'name_admin_bar'     => 'Glossary',
		);

		$args = array(
			'labels'          => $labels,
			'public'          => true,
			'has_archive'     => true,
			'show_ui'         => true,
			'capability_type' => 'post',
			'hierarchical'    => false,
			'rewrite'         => array(
				'slug' => 'glossary',
			),
			'with_front'      => false,
			'query_var'       => true,
			'supports'        => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
			'show_in_rest'    => true,
		);

		register_post_type( 'glossary', $args );
	}

}

new Onxrp_Glossary_Post_Type();
