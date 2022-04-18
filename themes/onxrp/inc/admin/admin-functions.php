<?php
/**
 * Admin Functions
 * php version 7.4
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */


/**
 * Hide the ACF Admin UI
 */
//add_filter('acf/settings/show_admin', '__return_false');

/**
 * Register Theme Options
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

}

/**
 * Register Theme Options
 */
add_filter('acf/settings/save_json', 'onxrp_acf_json_save_point');
function onxrp_acf_json_save_point( $path ) {
    // update path
    $path = get_template_directory() . '/acf-json';
    return $path;
}

/**
 * Loading JSON ACF files
 */
add_filter('acf/settings/load_json', 'onxrp_acf_json_load_point');
function onxrp_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
}
