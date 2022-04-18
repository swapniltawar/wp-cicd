<?php
/**
 * Custom Menu page creation
 * php version 7.4
 *
 * @category Wacoal
 * @package  Wacoal
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     Wacoal
 */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(
        array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => true,
        )
    );

}
