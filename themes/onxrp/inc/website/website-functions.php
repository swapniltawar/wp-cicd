<?php
/**
 * Frontend website functions
 * php version 7.4
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */

/**
 * Common Function File Include
 */
foreach ( glob(THEMEPATH . '/inc/website/common/*.php') as $filename ) {
    include $filename;
}

/**
 * Acf settings Function File Include
 */
foreach ( glob(THEMEPATH . '/inc/website/acf-settings/*.php') as $filename ) {
    include $filename;
}
/*
  *Register sidebars
*/
function onxrp_footer_sidebar_widget()
{
    register_sidebar(array(
        'name'          => __('Fotter First Menu', 'ONXRP'),
        'id'            => 'footer-menu-first',
        'description'   => __('Widgets in this area will be shown on footer first menu.', 'ONXRP'),
        'before_widget' => '<div id="%1$s" class="onxrp-footer-first-menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="onxrp-footer-title">',
        'after_title'   => '</h5>',
    ));

    register_sidebar(array(
        'name'          => __('Fotter Second Menu', 'ONXRP'),
        'id'            => 'footer-menu-second',
        'description'   => __('Widgets in this area will be shown on footer second menu.', 'ONXRP'),
        'before_widget' => '<div id="%1$s" class="onxrp-footer-second-menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="onxrp-footer-title">',
        'after_title'   => '</h5>',
    ));

    register_sidebar(array(
        'name'          => __('Fotter Third Menu', 'ONXRP'),
        'id'            => 'footer-menu-third',
        'description'   => __('Widgets in this area will be shown on footer third menu.', 'ONXRP'),
        'before_widget' => '<div id="%1$s" class="onxrp-footer-third-menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="onxrp-footer-title">',
        'after_title'   => '</h5>',
    ));

    register_sidebar(array(
        'name'          => __('Fotter Fourth Menu', 'ONXRP'),
        'id'            => 'footer-menu-fourth',
        'description'   => __('Widgets in this area will be shown on footer fourth menu.', 'ONXRP'),
        'before_widget' => '<div id="%1$s" class="onxrp-footer-fourth-menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="onxrp-footer-title">',
        'after_title'   => '</h5>',
    ));

}
add_action('widgets_init', 'onxrp_footer_sidebar_widget');

