<?php
/**
 * Contains functions for working with assets (primarily JavaScript).
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */

namespace Clabs;

// Register action and filter hooks.
add_action(
    'enqueue_block_editor_assets',
    __NAMESPACE__ . '\OnXRP_Action_Enqueue_Block_Editor_assets'
);

/**
 * Set allowed post types.
 *
 * @return array array of post types allowed for Gutenberg.
 */
function Allowed_Post_types()
{
    return [
    'post',
    'page',
    'partner',
    ];
}

/**
 * A callback for the enqueue_block_editor_assets action hook.
 *
 * @return void
 */
function OnXRP_Action_Enqueue_Block_Editor_assets()
{
    global $post_type;

    // Only enqueue the script to register the scripts if supported.
    if (! in_array($post_type, Allowed_Post_types(), true) ) {
        return;
    }

    // Hero Block
    wp_enqueue_script(
        'clabs-block-hero-block',
        OnXRP_Get_Versioned_Asset_path('blockHeroBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-hero-block');

    // Intro Block
    wp_enqueue_script(
        'clabs-block-intro-block',
        OnXRP_Get_Versioned_Asset_path('blockIntroBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-intro-block');


     // Showcase Team
     wp_enqueue_script(
        'clabs-block-showcase-team',
        OnXRP_Get_Versioned_Asset_path('blockShowcaseTeam.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-showcase-team');

    // Project Block
    wp_enqueue_script(
        'clabs-block-project-block',
        OnXRP_Get_Versioned_Asset_path('blockProjectBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-project-block');

    // Trusted Resources
    wp_enqueue_script(
        'clabs-block-trusted-resources',
        OnXRP_Get_Versioned_Asset_path('blockTrustedResources.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-trusted-resources');

    // Podcast Block
    wp_enqueue_script(
        'clabs-block-podcast-block',
        OnXRP_Get_Versioned_Asset_path('blockPodcastBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-podcast-block');

     // Link Block
     wp_enqueue_script(
        'clabs-block-link-block',
        OnXRP_Get_Versioned_Asset_path('blockLinkBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-link-block');


    // Brand Guide
    wp_enqueue_script(
        'clabs-block-brand-guide',
        OnXRP_Get_Versioned_Asset_path('blockBrandGuide.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-brand-guide');


     // Link Text
    wp_enqueue_script(
        'clabs-block-link-text',
        OnXRP_Get_Versioned_Asset_path('blockLinkText.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-link-text');

     // Faq Block
    wp_enqueue_script(
        'clabs-block-faq-block',
        OnXRP_Get_Versioned_Asset_path('blockFaqBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-faq-block');

    // Grid Posts
    wp_enqueue_script(
        'clabs-block-grid-posts',
        OnXRP_Get_Versioned_Asset_path('blockGridPosts.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-grid-posts');


     // Hero Post
    wp_enqueue_script(
        'clabs-block-hero-post',
        OnXRP_Get_Versioned_Asset_path('blockHeroPost.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-hero-post');

    // Featured Post
    wp_enqueue_script(
        'clabs-block-featured-post',
        OnXRP_Get_Versioned_Asset_path('blockFeaturedPost.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-featured-post');

    // Podcast Post
    wp_enqueue_script(
        'clabs-block-podcast-post',
        OnXRP_Get_Versioned_Asset_path('blockPodcastPost.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-podcast-post');

     // Grid Block
     wp_enqueue_script(
        'clabs-block-grid-block',
        OnXRP_Get_Versioned_Asset_path('blockGridBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-grid-block');

    // Latest Post list
    wp_enqueue_script(
        'clabs-block-latest-post-list',
        OnXRP_Get_Versioned_Asset_path('blockPostListCard.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-latest-post-list');

    // Info Block
    wp_enqueue_script(
        'clabs-block-info-block',
        OnXRP_Get_Versioned_Asset_path('blockInfoBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-info-block');

    // Slider Block
    wp_enqueue_script(
        'clabs-block-slider-block',
        OnXRP_Get_Versioned_Asset_path('blockSliderBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-slider-block');

    // Partner Block
    wp_enqueue_script(
        'clabs-block-partner-block',
        OnXRP_Get_Versioned_Asset_path('blockPartnerBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-partner-block');

    // App Block
    wp_enqueue_script(
        'clabs-block-app-block',
        OnXRP_Get_Versioned_Asset_path('blockAppBlock.js'),
        [ 'wp-blocks', 'wp-i18n', 'wp-editor'],
        '1.0.0',
        true
    );
    OnXRP_Inline_Locale_data('clabs-block-app-block');

}

/**
 * Get the version for a given asset.
 *
 * @param string $asset_path Entry point and asset type separated by a '.'.
 *
 * @return string The asset version.
 */
function OnXRP_Get_Versioned_Asset_path( $asset_path )
{
    static $asset_map;

    // Create public path.
    $base_path = THEMEURI . '/gutenberg/build/';

    if (! isset($asset_map) ) {
        $asset_map_file = THEMEPATH . '/gutenberg/build/assetMap.json';
        if (file_exists($asset_map_file) && 0 === validate_file($asset_map_file) ) {
            ob_start();
            include $asset_map_file; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.IncludingFile, WordPressVIPMinimum.Files.IncludingFile.UsingVariable
            $asset_map = json_decode(ob_get_clean(), true);
        } else {
            $asset_map = [];
        }
    }

    /*
    * Appending a '.' ensures the explode() doesn't generate a notice while
    * allowing the variable names to be more readable via list().
    */
    list( $entrypoint, $type ) = explode('.', "$asset_path.");
    $versioned_path            = isset($asset_map[ $entrypoint ][ $type ]) ? $asset_map[ $entrypoint ][ $type ] : false;

    if ($versioned_path ) {
        return $base_path . $versioned_path;
    }

    return '';
}

/**
 * Creates a new Jed instance with specified locale data configuration.
 *
 * @param string $to_handle The script handle to attach the inline script to.
 *
 * @return void
 */
function OnXRP_Inline_Locale_data( string $to_handle )
{
    // Define locale data for Jed.
    $locale_data = [
    '' => [
    'domain' => 'clabs',
    'lang'   => is_admin() ? get_user_locale() : get_locale(),
    ],
    ];

    // Pass the Jed configuration to the admin to properly register i18n.
    wp_add_inline_script(
        $to_handle,
        'wp.i18n.setLocaleData( ' . wp_json_encode($locale_data) . ", 'clabs' );"
    );
}
