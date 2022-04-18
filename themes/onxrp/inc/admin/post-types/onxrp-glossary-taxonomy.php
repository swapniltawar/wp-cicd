<?php
/**
 * This creates custom taxonomies for custom post types.
 */

/**
 * Class used to define and register the custom taxonomy.
 */
class Onxrp_Glossary_Taxonomy {

	/**
	 * Constructor which call on each newly-created object.
	 */
	public function __construct() {
		$this->create_category();
	}

	/**
	 * Function register a custom 'onxrp-glossary-category' taxonomy.
	 *
	 * @return void
	 */
	private function create_category() {

		$taxonomy_args = array(
			'label'        => 'Categories',
			'query_var'    => true,
			'hierarchical' => true,
			'rewrite'      => array(
				'slug'         => 'onxrp-glossary-category',
				'with_front'   => false,
				'hierarchical' => true,
			),
			'show_in_rest' => true,
		);

		register_taxonomy( 'onxrp-glossary-category', array('glossary'), $taxonomy_args );
	}

}

new Onxrp_Glossary_Taxonomy();
