<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package  ONXRP
 */

get_header();

global $wp_query;

$res_found   = $wp_query->found_posts;
$search_word = get_search_query();

$post_count  = 0;
$search_data = ! empty($_SERVER) ? $_SERVER : array();

$requested_url = ! empty($search_data['REQUEST_URI']) ? esc_attr($search_data['REQUEST_URI']) : '';
$posts_search = [];

if (have_posts()) {
    while ( have_posts() ) :
        the_post();
        $post_count++;
        $postid           = get_the_ID();

        $temp['postid']        = $postid;
        $temp['title']         = get_the_title($postid);
		$temp['page_read']     = get_post_meta( $postid, 'page_header_read', true ) ? get_post_meta( $postid, 'page_header_read', true ) : OnXRPTimeToread($postid);
		$temp['post_type']     = get_post_type();
		$temp['thumbnail_url']  = get_the_post_thumbnail_url();

        array_push($posts_search, $temp);
    endwhile;

require locate_template('template-parts/content-search.php');

} if ($res_found == 0) {
    require locate_template('template-parts/content-none.php');
}

get_footer();
