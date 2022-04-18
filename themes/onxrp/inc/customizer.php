<?php
/**
 * onXRPTheme Customizer
 *
 * @package  ONXRP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function onxrp_customize_register( $wp_customize ) {

    $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('background_image');
    //  =============================
    //  = Blog Detail Section
    //  =============================

    $wp_customize->add_section('onxrp_blog_detail_section', array(
        'title'    => __('Blog Detail Settings', 'onxrp'),
        'priority' => 110,
    ));

    $wp_customize->add_setting('blog_detail_tout_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
    $wp_customize->add_control( 'tout_text_box', array(
        'section'  => 'onxrp_blog_detail_section',
        'settings' => 'blog_detail_tout_text',
        'label'    => __('Tout Button Text', 'onxrp'),
    ));

    $wp_customize->add_setting('blog_detail_tout_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
    $wp_customize->add_control( 'tout_link_box', array(
        'section'  => 'onxrp_blog_detail_section',
        'settings' => 'blog_detail_tout_link',
        'label'    => __('Tout Button Link', 'onxrp'),
    ));

    $wp_customize->add_setting('blog_detail_tout_img', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'blog_detail_tout_img', array(
        'section'  => 'onxrp_blog_detail_section',
        'settings' => 'blog_detail_tout_img',
        'label'    => __('Tout Image', 'onxrp'),
    )));



     //  =============================
    //  = Header Settings =
    //  =============================
    $wp_customize->add_section('onxrp_header_settings', array(
        'title'    => __('Header Settings', 'onxrp'),
        'priority' => 140,
    ));


    /* Button Text */
    $wp_customize->add_setting('header_button_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('onxrp_header_button_text', array(
        'label'      => __('Button Text', 'onxrp'),
        'section'    => 'onxrp_header_settings',
        'settings'   => 'header_button_text',
    ));

    /* Button Link */
    $wp_customize->add_setting('header_button_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('onxrp_header_button_link', array(
        'label'      => __('Button Link', 'onxrp'),
        'section'    => 'onxrp_header_settings',
        'settings'   => 'header_button_link',
    ));

       /* Link Target */
    $wp_customize->add_setting( 'onxrp_header_button_target', array(
        'capability' => 'edit_theme_options',
        'deafult' => '',
        'type'           => 'theme_mod',
      ) );

      $wp_customize->add_control( 'onxrp_header_button_target', array(
        'type' => 'checkbox',
        'section' => 'onxrp_header_settings', // Add a default or your own section
        'label' => __( 'Open in new tab' ),
      ) );


      function themeslug_sanitize_checkbox( $checked ) {
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
      }



     //  =============================
    //  = Footer Section               =
    //  =============================
    $wp_customize->add_section('onxrp_footer_settings', array(
        'title'    => __('Footer Settings', 'onxrp'),
        'priority' => 120,
    ));

    /* Footer Logo */
    $wp_customize->add_setting('footer_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'onxrp_footer_logo', array(
        'label'    => __('Footer Logo', 'onxrp'),
        'section'  => 'onxrp_footer_settings',
        'settings' => 'footer_logo',
    )));


    /* Footer copyright Text */
    $wp_customize->add_setting('footer_copyright_content', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('onxrp_footer_copyright_content', array(
        'label'      => __('Footer Copyright Text', 'onxrp'),
        'section'    => 'onxrp_footer_settings',
        'settings'   => 'footer_copyright_content',
    ));

    /* Footer Bottom Center */
    $wp_customize->add_setting('footer_bottom_center', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('onxrp_footer_bottom_center', array(
        'label'      => __('Footer Bottom Center', 'onxrp'),
        'type'       => 'textarea',
        'section'    => 'onxrp_footer_settings',
        'settings'   => 'footer_bottom_center',
    ));

    /* Footer Powered Text */
    $wp_customize->add_setting('footer_powered_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('onxrp_footer_powered_text', array(
        'label'      => __('Footer Pwered By Text', 'onxrp'),
        'section'    => 'onxrp_footer_settings',
        'settings'   => 'footer_powered_text',
    ));

    /* Mail Chimp Api Key */
    $wp_customize->add_setting('footer_mailchimp_api_key', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('onxrp_footer_mailchimp_api_key', array(
        'label'      => __('Mail Chimp API Key', 'onxrp'),
        'type' => 'password',
        'section'    => 'onxrp_footer_settings',
        'settings'   => 'footer_mailchimp_api_key',
    ));


     /* Mail Chimp List Id */
     $wp_customize->add_setting('footer_mailchimp_list_id', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('onxrp_footer_mailchimp_list_id', array(
        'label'      => __('Mail Chimp List Id', 'onxrp'),
        'type' => 'password',
        'section'    => 'onxrp_footer_settings',
        'settings'   => 'footer_mailchimp_list_id',
    ));

    /* Newsletter Success Message */
    $wp_customize->add_setting('footer_success_message', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('onxrp_footer_success_message', array(
        'label'      => __('Newsletter Success Message', 'onxrp'),
        'section'    => 'onxrp_footer_settings',
        'settings'   => 'footer_success_message',
    ));




     //  =============================
    //  = Social Media Links               =
    //  =============================
    $wp_customize->add_section('onxrp_social_links_settings', array(
        'title'    => __('Social Links', 'onxrp'),
        'priority' => 140,
    ));


    /* Youtube Link */
    $wp_customize->add_setting('social_media_youtube', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('onxrp_social_media_youtube', array(
        'label'      => __('Youtube Link', 'onxrp'),
        'section'    => 'onxrp_social_links_settings',
        'settings'   => 'social_media_youtube',
    ));

    /* Twiiter Link */
    $wp_customize->add_setting('social_media_twitter', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('onxrp_social_media_twitter', array(
        'label'      => __('Twitter Link', 'onxrp'),
        'section'    => 'onxrp_social_links_settings',
        'settings'   => 'social_media_twitter',
    ));





    //  =============================
    //  = Serach Page Section               =
    //  =============================
    $wp_customize->add_section('onxrp_404_settings', array(
        'title'    => __('404 Page Settings', 'onxrp'),
        'priority' => 120,
    ));


    $wp_customize->add_setting('onxrp_404_title', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('404_title', array(
        'label'      => __('404 Page Title', 'onxrp'),
        'section'    => 'onxrp_404_settings',
        'settings'   => 'onxrp_404_title',
    ));

    $wp_customize->add_setting('onxrp_404_subtitle', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('404_subtitle', array(
        'label'      => __('404 Page Subtitle', 'onxrp'),
        'section'    => 'onxrp_404_settings',
        'settings'   => 'onxrp_404_subtitle',
        'type'       => 'textarea',
    ));


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'onxrp_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'onxrp_customize_partial_blogdescription',
			)
		);
	}


}
add_action( 'customize_register', 'onxrp_customize_register', 20 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function onxrp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tonxrpine for the selective refresh partial.
 *
 * @return void
 */
function onxrp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Sanitize footer image
 *
 * @param $input
 *
 * @return string
 */
function my_customize_sanitize_header_logo($input)
{
    return attachment_url_to_postid($input);
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function onxrp_customize_preview_js() {
	wp_enqueue_script( 'onxrp-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), ONXRP_VERSION, true );
}
add_action( 'customize_preview_init', 'onxrp_customize_preview_js' );
