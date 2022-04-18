<?php
/**
 * onXRPfunctions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package  ONXRP
 */

if (! defined('ONXRP_VERSION') ) {
    // Replace the version number of the theme on each release.
    define('ONXRP_VERSION', '1.0.0');
}

define('THEMEPATH', get_template_directory());
define('THEMEURI', get_template_directory_uri());
define('STYLESHEETURI', get_stylesheet_directory_uri());

if (! function_exists('OnXRP_setup') ) :

    function OnXRP_setup()
    {
        load_theme_textdomain('onxrp', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');


        add_theme_support(
            'html5',
            array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            )
        );

        add_theme_support(
            'custom-background',
            apply_filters(
                'onxrp_custom_background_args',
                array(
                'default-color' => 'ffffff',
                'default-image' => '',
                )
            )
        );

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support(
            'custom-logo',
            array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
            )
        );

        add_theme_support( 'disable-custom-colors' );

        add_theme_support(
            'editor-color-palette',
            array(
                array(
                    'name'  => esc_html__( 'White', 'onxrp' ),
                    'slug'  => 'White',
                    'color' => '#ffffff',
                ),
                array(
                    'name'  => esc_html__( 'Grey', 'onxrp' ),
                    'slug'  => 'Grey',
                    'color' => '#EBEBEB',
                ),
                array(
                    'name'  => esc_html__( 'Blue', 'onxrp' ),
                    'slug'  => 'Blue',
                    'color' => '#568EE8',
                ),
                array(
                    'name'  => esc_html__( 'Yellow', 'onxrp' ),
                    'slug'  => 'Yellow',
                    'color' => '#F4CC08',
                ),
                array(
                    'name'  => esc_html__( 'Navy', 'onxrp' ),
                    'slug'  => 'Navy',
                    'color' => '#0F1939',
                ),
                array(
                    'name'  => esc_html__( 'Green', 'onxrp' ),
                    'slug'  => 'Green',
                    'color' => '#A6E2B6',
                ),
                array(
                    'name'  => esc_html__( 'Red', 'onxrp' ),
                    'slug'  => 'Red',
                    'color' => '#EF4335',
                ),
                array(
                    'name'  => esc_html__( 'Orange', 'onxrp' ),
                    'slug'  => 'Orange',
                    'color' => '#FF6A13',
                ),
                array(
                    'name'  => esc_html__( 'Pink', 'onxrp' ),
                    'slug'  => 'Pink',
                    'color' => '#F9B0BF',
                ),
            )
        );

        add_theme_support('align-wide');
        add_theme_support('custom-spacing');
        add_theme_support('experimental-custom-spacing');
    }
endif;
add_action('after_setup_theme', 'OnXRP_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @return void
 */
function OnXRP_Content_width()
{
    $GLOBALS['content_width'] = apply_filters('onxrp_content_width', 640);
}
add_action('after_setup_theme', 'OnXRP_Content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function OnXRP_Widgets_init()
{
     register_sidebar(
         array(
         'name'          => esc_html__('Sidebar', 'onxrp'),
         'id'            => 'sidebar-1',
         'description'   => esc_html__('Add widgets here.', 'onxrp'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
        )
     );
     register_sidebar(
        array(
        'name'          => esc_html__('Glossary Sidebar', 'onxrp'),
        'id'            => 'sidebar-2',
        'description'   => esc_html__('Add widgets here.', 'onxrp'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
       )
     );
     register_sidebar(
        array(
        'name'          => esc_html__('Glossary Detail Sidebar', 'onxrp'),
        'id'            => 'sidebar-3',
        'description'   => esc_html__('Add widgets here.', 'onxrp'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
       )
     );
     register_sidebar(
        array(
        'name'          => esc_html__('Podcast Detail Sidebar', 'onxrp'),
        'id'            => 'sidebar-4',
        'description'   => esc_html__('Add widgets here.', 'onxrp'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
       )
     );

}
add_action('widgets_init', 'OnXRP_Widgets_init');

/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function OnXRP_scripts()
{

    $distFileJson = file_get_contents(__DIR__ . '/dist/assets.json');
    $distFile = json_decode($distFileJson, true);

    wp_enqueue_script('onxrp-global', STYLESHEETURI . '/dist/' . $distFile['global']['js'], array('jquery'), null, true);
	wp_enqueue_style('onxrp-global', STYLESHEETURI . '/dist/' . $distFile['global']['css']);

    if (is_single()) {
        wp_enqueue_script('onxrp-article', STYLESHEETURI . '/dist/' . $distFile['article']['js'], array('jquery'), null, true);
    }

    wp_enqueue_script('onxrp-archive', STYLESHEETURI . '/assets/js/website/archive.js', array('jquery'), null, true);


    // wp_localize_script(
    //     'onxrp-archive',
    //     'onxrp_js_var',
    //     array(
    //     'ajaxurl' => admin_url('admin-ajax.php'),
    //     'nonce' => wp_create_nonce('ajax-nonce')
    //     )
    // );

    wp_enqueue_style('onxrp-style', get_stylesheet_uri(), array(), ONXRP_VERSION);
    wp_style_add_data('onxrp-style', 'rtl', 'replace');

    wp_enqueue_script('onxrp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), ONXRP_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'OnXRP_scripts');
/**
 * Admin Enqueue scripts and styles.
 */
function OnXRP_Admin_scripts($hook_suffix)
{
    $distFileJson = file_get_contents(__DIR__ . '/dist/assets.json');
    $distFile = json_decode($distFileJson, true);

    $allowed_postType = array('post','page');

    if( in_array($hook_suffix, array('post.php', 'post-new.php') ) ){
        $screen = get_current_screen();
        if( is_object( $screen ) && in_array($screen->post_type, $allowed_postType) ){
            wp_enqueue_script('onxrp-global', STYLESHEETURI . '/dist/' . $distFile['global']['js'], array('jquery'), null, true);
	        wp_enqueue_style('onxrp-global', STYLESHEETURI . '/dist/' . $distFile['global']['css']);
        }
    }

    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');

    wp_enqueue_script('admin', STYLESHEETURI . '/assets/js/wpadmin/admin.js', array('jquery'), null, true);

    wp_enqueue_style('jquery');
}
add_action('admin_enqueue_scripts', 'OnXRP_Admin_scripts');

/**
 * Admin functions include - START
 */

if (is_admin()) {

    include THEMEPATH . '/inc/admin/admin-functions.php';
}

/**
 * Implement the Custom Header feature.
 */
require THEMEPATH . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require THEMEPATH . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require THEMEPATH . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require THEMEPATH . '/inc/customizer.php';

/**
 * Website functions include
 */
require THEMEPATH . '/inc/website/website-functions.php';

/**
 * Widgets functions include
 */

foreach ( glob(THEMEPATH . '/inc/widgets/*.php') as $filename ) {
    include $filename;
}

// Register and load the widget
function OnXRP_load_widget() {
    register_widget( 'new_arcticle_widget' );
    register_widget( 'ready_to_tread_widget' );
    register_widget( 'new_nft_glossary_widget' );
    register_widget( 'new_podcast_widget' );
}
add_action( 'widgets_init', 'OnXRP_load_widget' );

/**
 * Insert Guternberg blocks
 */
require THEMEPATH . '/gutenberg/gutenberg.php';

/**
 * Register Header Menu
 */

function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

/**
 * Add class to header menu anchar tag
 */
function add_link_atts($atts) {
    $atts['class'] = "nav-bar--link";
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_link_atts');

/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function onxrp_my_load_more_scripts() {

	global $wp_query;

	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', STYLESHEETURI . '/assets/js/website/core.js', array('jquery') );

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'onxrp_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages,
        ) );

 	wp_enqueue_script( 'my_loadmore' );


}

add_action( 'wp_enqueue_scripts', 'onxrp_my_load_more_scripts' );

