<?php
/**
 * Group function settings
 * php version 7.4
 *
 * @category Wacoal
 * @package  Wacoal
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     Wacoal
 */

if (function_exists('acf_add_local_field_group') ) {
    /**
     * Acf theme options File Include
     */
    foreach ( glob(THEMEPATH . '/inc/website/acf-settings/options/*.php') as $filename ) {
        include $filename;
    }

    /**
     * Block Folder File Include
     */
    foreach ( glob(THEMEPATH . '/inc/website/block/*.php') as $filename ) {
        include $filename;
    }

}