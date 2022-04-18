<?php
/**
 * Website common functions
 * php version 7.4
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @return void
 */
function OnXRPPingback_header()
{
    if (is_singular() && pings_open() ) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'OnXRPPingback_header');

/**
 * Get header html
 *
 * @param string $classname class name.
 *
 * @return $classname div with classname
 */
function OnXRPPage_Entry_top($classname)
{
    get_header();
    echo "<div class=\"common-page $classname\">\n"; // phpcs:ignore
    get_template_part('template-parts/content-header');
}

/**
 * Get footer html
 *
 * @return $div bottom page div
 */
function OnXRPPage_Entry_bottom()
{
    get_template_part('template-parts/content-footer');
    echo "</div>\n";
    get_footer();
}


/**
 * Get onXRPImage source
 *
 * @param int    $attachmentId image ID.
 * @param string $size         size of the image.
 * @param bool   $icon         true or false.
 *
 * @return string $image_src[0] Image URL.
 */
function OnXRPGet_Image_src($attachmentId, $size = 'full', $icon = false)
{
    $image_src = wp_get_attachment_image_src($attachmentId, $size, $icon);
    return $image_src[0];
}

/**
 * Get onXRPImage alt
 *
 * @param int    $attachmentId image ID.
 * @param string $default      default alt name for image.
 *
 * @return string $image_alt Image alt string.
 */
function OnXRPGet_Image_alt($attachmentId, $default = null)
{
    $image_alt = get_post_meta($attachmentId, '_wp_attachment_image_alt', true);
    if ($image_alt == '') {
        $image_alt = $default;
    }
    return $image_alt;
}

/**
 * Function to create the image with crop points
 *
 * @param array $image Image array.
 * @param int   $width Image size to return.
 * @param array $ratio Image ratio to return.
 *
 * @return string Return the image URL.
 */
function OnXRPGet_image( $image, $width = null, $ratio = null )
{

    if ($image && ! empty($image) && ! empty($image[0]) ) {

        $url = $image[0];

        $dimention = null;

        if ($image[1] > $image[2] ) {
            $dimention = $image[2];
        } else {
            $dimention = $image[1];
        }

        if (! empty($width) && ! empty($ratio) ) {

            $height = ( $dimention * $ratio[1] ) / $ratio[0];

            $params = array(
            'crop' => '0,0,' . (int) $dimention . 'px,' . (int) $height . 'px',
            'w'    => $width . 'px',
            );

            $url .= '?' . build_query($params);
        } elseif (! empty($width) ) {

            $params = array(
            'w' => $width . 'px',
            );

            $url .= '?' . build_query($params);
        }

        return $url;
    } else {
        return '';
    }
}


/**
 * Add support for svg images.
 *
 * @param array $file_types file types.
 *
 * @return array $file_types
 */
function OnXRPMime_types($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg';
    $file_types = array_merge($file_types, $new_filetypes);

    return $file_types;
}
add_filter('upload_mimes', 'OnXRPMime_types');

/**
 * Enable upload for webp image files.
 *
 * @param $existing_mimes object.
 *
 * @return void.
 * OnXRPWebp_Is_displayable
 */
function OnXRPWebp_Upload_mimes($existing_mimes)
{
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'OnXRPWebp_Upload_mimes');

/**
 * Enable preview / thumbnail for webp image files.
 *
 * @param $result object.
 * @param $path   object.

 * @return $result.
 */
function OnXRPWebp_Is_displayable($result, $path)
{
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize($path);

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'OnXRPWebp_Is_displayable', 10, 2);

/**
 * onXRPremove p tag from content
 *
 * @param string $content post content.
 *
 * @return string $content
 */
function OnXRPRemove_ptag($content)
{
    $content = str_ireplace('<p>', '', $content);
    $content = str_ireplace('</p>', '', $content);
    return $content;
}

class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        if($depth == 0) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='testd1'><ul class='testd1'>\n";
        } elseif($depth == 1) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<div class='testd2'><ul class='testd2'>\n";
        }
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}

/**
 * Function used to get twitter iframe
 *
 * @param [string] $url
 * @return void
 */
function httpGet($url)
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

/**
 * Function used to calculate estimated time to read post.
 *
 * @param [string] $url
 * @return void
 */

function OnXRPTimeToread($post) {
    $content = get_post_field( 'post_content', $post); // wordpress users only
    $word    = str_word_count($content);
    $m       = floor($word / 200);
    $s       = floor($word % 200 / (200 / 60));
    $est = $m . ' Mins' . ($m == 1 ? '' : 's') . ', ' . $s . ' second' . ($s == 1 ? '' : 's');

    return $est;
}

/**
 * Filter for esc_url workaround for og:image
 *
 * @param string $url ecs_url param.
 * @return string
 */
function OnXRP_esc_image_url( $url ) {

	if ( preg_match( '/\.jpe?g|\.png|\.gif/', strtolower( $url ), $matches ) ) {
		$url = str_replace( '&#038;', '&', $url );
		$url = str_replace( '&amp;', '&', $url );
	}

	return $url;
}

add_filter( 'clean_url', 'OnXRP_esc_image_url', 999 );
add_filter( 'attribute_escape', 'OnXRP_esc_image_url', 999 );

/**
 * Function create the object of image and data
 *
 * @param object $object Image Object.
 * @return void
 */
function OnXRP_facebook_image( $object ) {
	global $post;
	$social_image = [];
	$image_id     = '';

	if ( ! empty( $post ) ) {
		$image_id     = get_post_thumbnail_id( $post->ID );
		$social_image = wp_get_attachment_image_src( $image_id, 'full' );
	}

	if ( ! empty( $social_image[0] ) ) {
		$img_url                   = $social_image[0];
		$image['url']              = $img_url;
		$image['width']            = $social_image[1];
		$image['height']           = $social_image[2];
		$object->add_image( $image );
	}
}

add_action( 'wpseo_add_opengraph_images', 'OnXRP_facebook_image' );

/**
 * Function used to create block category
 *
 * @param $categories $array
 * @param $post       post type
 *
 * @return void
 */
function OnXRPBlock_categories( $categories, $post )
{
    $temp = array(
        'slug'  => 'onxrp',
        'title' => __('onXRPcategory', 'onxrp'),
        'icon'  => 'wordpress',
    );

    $newCategories    = array();
    $newCategories[0] = $temp;

    foreach ($categories as $category) {
        $newCategories[] = $category;
    }

    return $newCategories;

}
add_filter('block_categories_all', 'OnXRPBlock_categories', 10, 2);

 /**
  * Function to change the serach size.
  *
  * @param array $queryVars query
  *
  * @return html Return the pagination html.
  */
  function OnXRPChange_Search_size($queryVars)
  {
      if (isset($_REQUEST['s']) ) { // Make sure it is a search page
          $queryVars['posts_per_page'] = 6; // Change 10 to the number of posts you would like to show
      }
      return $queryVars; // Return our modified query variables
  }
   add_filter('request', 'OnXRPChange_Search_size'); // Hook our custom function onto the request filter

/**
 * Function to remove pages from search result
 *
 * @param array $query wp_query array
 *
 * @return array $query wp_query array
 */
function OnXRPSearch_filter($query)
{
    if ($query->is_search) {
        $query->set('post_type', ['post', 'event', 'resource', 'career', 'service']);
    }
    return $query;
}
if (is_search()) {
    add_filter('pre_get_posts', 'OnXRPSearch_filter');
}

function Get_OnXRPPost_term($postid) {
    $post_type  = get_post_type($postid);
    $post_term  = '';
    $filter_cat = '';

    if($post_type == 'event') {
        $filter_cat = 'onxrp-event-type';
    } elseif ($post_type == 'career') {
        $filter_cat = 'onxrp-category';
    } elseif ($post_type == 'resource') {
        $filter_cat = 'onxrp-resource-type';
    } elseif ($post_type == 'service') {
        $filter_cat = 'onxrp-service-category';
    } else {
        $filter_cat = 'onxrp-blog-type';
        $filter_service = 'onxrp-post-services';
    }

    if($post_type == 'post') {
        $post_type = 'blog';
    }

    $post_term = get_the_terms($postid, $filter_cat);
    $term_name = $post_type;

    if($post_term && !empty($post_term)) {
        $term_ID   = $post_term[0]->term_id;
        $term_name = $post_term[0]->name ? $post_term[0]->name : $post_type;
    }

    return $term_name;
}

/**
 * Function to remove pages from search result
 *
 * @param int $id post id
 *
 * @return array $query wp_query array
 */
function OnXRP_Post_Breadcrumb() {
    global $post;
    echo '<ul class="breadcrumb">';
    if (is_category() || is_single()) {
        $post_type = get_post_type($post->ID);
        $first_letter = strtoupper(substr($post->post_title,0,1));
        if(is_single() && $post_type == 'glossary'){

            echo '<li><a href="'.get_site_url().'/nft-glossary/">NFT - Glossary</a> ></li>';

            if(is_numeric($first_letter)){

                echo '<li><a href="'.get_site_url().'/nft-glossary-terms/?letter=%23">Terms Begining with \'#\'</a></li>';

            }
            if(!is_numeric($first_letter)){

                echo '<li><a href="'.get_site_url().'/nft-glossary-terms/?letter='.$first_letter.'">Terms Begining with \''.$first_letter.'\'</a></li>';

            }

        }
        if(is_single() && $post_type == 'podcast'){

            echo '<li><a href="'.get_site_url().'/podcasts/">Podcast</a></li>';

        }
        $categories_hold = get_the_category($post->ID);
        if($categories_hold){
           foreach($categories_hold as $cat){
               echo '<li><a href="'.get_category_link($cat->cat_ID).'">'.$cat->name.'</a></li>';
           }
        }
        // >
        if (is_single()) {
            echo ' <li>  ';
            the_title();
            echo '</li>';
        }
    }
    echo '</ul>';
}


/**
 * Function to remove pages from search result
 *
 * @param int $id post id
 *
 * @return array $query wp_query array
 */
function OnXRP_Get_Related_Posts($id) {

    $categoryArray = wp_get_post_categories($id);
    $related = get_posts(
        array(
            'category' => $categoryArray[0],
            'numberposts' => 4,
            'post__not_in' => array($id),
            )
        );

    foreach ($related as $post) {
        $featuredImageUrl = get_the_post_thumbnail_url($post->ID);
        $author_id = get_post_field( 'post_author', $post->ID );
        $postAuthorName = get_the_author_meta( 'display_name', $author_id );
        $postDate = get_the_date('', $post->ID);
        $postCategories = get_the_category($post->ID);
        $post_link = get_permalink( $post->ID );

        echo '<div class="article-block">
                <div class="article-block--image">
                    <a href="'.esc_url($post_link).'">
                        <img src="'.esc_url($featuredImageUrl).'" alt="onXRP" />
                    </a>
                </div>
                <div class="article-block--devider"></div>
                <a href="'.esc_url(get_term_link($postCategories[0]->term_id)).'">
                    <div class="tags">'.esc_attr($postCategories[0]->name).'</div>
                </a>
                <a href="'.esc_url($post_link).'">
                    <h3 class="heading-three">'.esc_attr($post->post_title).'</h3>
                </a>
                <div class="author-name">'.esc_attr($postAuthorName).'</div>
                <div class="article-date">'.esc_attr($postDate).'</div>
            </div>';
    }
}


/**
 * Function to fetch related trust resources
 *
 * @param int $id post id
 *
 * @return array $query wp_query array
 */
function OnXRP_Get_Related_TR($id) {

    $categoryArray = wp_get_post_categories($id);
    $related = get_posts(
        array(
            'post_type'      => 'trusted_resources',
            'category' => $categoryArray[0],
            'numberposts' => 4,
            'post_status'    => 'publish',
            'orderby'        => 'DESC',
            'post__not_in' => array($id),
            )
        );
       if($related) {

        echo '<section class="featured-projects featured-article title-right second-option community-members">
        <div class="container">
            <div class="article-title d-flex align-items-center">
                <img src="'.esc_url(THEMEURI).'/assets/images/title-icon.svg" alt="onXRP" />Other community leaders
            </div>
        </div>
        <div class="container featured-projects--container d-flex">
            <div class="featured-projects--left d-flex">';
       }

    foreach ($related as $post) {
        $featuredImageUrl = get_the_post_thumbnail_url($post->ID);
        $post_name = get_the_title($post->ID);
        $post_link = get_permalink( $post->ID );

        echo '<div class="featured-projects--tile">
        <a href="'.$post_link.'"><h5 class="heading-five">'.$post_name.'</h5></a>
        <div class="tile-shape rellax" data-rellax-speed="2" data-rellax-xs-speed=".3" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed=".1"></div>
        <a href="'.$post_link.'" class="rellax" data-rellax-speed="2" data-rellax-xs-speed=".3" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed=".1">
          <div class="tile-image" style="background-image: url('. esc_url($featuredImageUrl).'">  </div>
        </a>
    </div>
';
    }
    if($related) {
    echo ' </div>
    </div>
</section>';
    }
}



/**
 * Function to remove pages from search result
 *
 * @param string $content Post Content
 *
 * @return array $query wp_query array
 */
function OnXRP_Insert_Table_of_Content($content) {
    global $post;
    global $tableOfContents;
    if ( $post->post_type === 'post' || $post->post_type === 'podcast') {

        $tableOfContents = "
            <!-- table of contents -->
            <div class='page-anchors'>
                <span class='page-anchors__title'>Table of Contents</span>
                <ul>
        ";
        $index = 1;
        $indexes = [2 => 1, 3 => 0, 4 => 0, 5 => 0, 6 => 0];
        // Insert the IDs and create the TOC.
        $content = preg_replace_callback('#<(h[1-6])(.*?)>(.*?)</\1>#si', function ($matches) use (&$index, &$tableOfContents, &$indexes) {
            $tag = $matches[1];
            $title = strip_tags($matches[3]);
            $hasId = preg_match('/id=(["\'])(.*?)\1[\s>]/si', $matches[2], $matchedIds);
            $id = $hasId ? $matchedIds[2] : sanitize_title($title);

            $title = "$title";
            $tableOfContents .= "<li class='item-$tag'><a href='#$id'>$title</a></li>";
            if ($hasId) {
                return $matches[0];
            }
            return sprintf('<%s%s id="%s">%s</%s>', $tag, $matches[2], $id, $matches[3], $tag);
        }, $content);
        $tableOfContents .= '</ul></div>';

        return $tableOfContents.$content;
    } else {
        return $content;
    }
}
add_filter('the_content', 'OnXRP_Insert_Table_of_Content');

/**
 * Function to remove pages from search result
 *
 * @param int $id post id
 *
 * @return array $query wp_query array
 */
function OnXRP_Get_Related_Glossary($id) {

    $related = get_posts(
        array(
            'post_type'      => 'glossary',
            'category__in' => wp_get_post_categories($id),
            'numberposts' => 4,
            'post__not_in' => array($id)
            )
        );

    foreach ($related as $post) {
        $featuredImageUrl = get_the_post_thumbnail_url($post->ID);
        $author_id = get_post_field( 'post_author', $post->ID );
        $postAuthorName = get_the_author_meta( 'display_name', $author_id );
        $postDate = get_the_date('', $post->ID);
        $postCategories = get_the_category($post->ID);
        $post_link = get_permalink( $post->ID );

        echo '<div class="article-block">
            <div class="article-block--image">
                <a href="'.esc_url($post_link).'">
                    <img src="'.esc_url($featuredImageUrl).'" alt="onXRP" />
                </a>
            </div>
            <div class="article-block--devider"></div>
            <a href="'.esc_url($post_link).'">
                <h3 class="heading-three">'.esc_attr($post->post_title).'</h3>
            </a>
            <div class="author-name">'.esc_attr($postAuthorName).'</div>
            <div class="article-date">'.esc_attr($postDate).'</div>
        </div>';
    }
}


/**
 * Function to load more functionality
 *
 * @param int $id post id
 *
 * @return array $query wp_query array
 */

function onxrp_loadmore_ajax_handler(){
    if(isset($_POST['cat_id'])){
        if($_POST['post_type'] == 'post')
        {
        $args = array(
            'posts_per_page' => 8,
            'cat' => $_POST['cat_id'],
            'paged' => $_POST['page'],
            'offset' =>  $_POST['offset']
        );
      }
      else{
        $args = array(
            'posts_per_page' => 8,
            'paged' => $_POST['page'],
            'offset' =>  $_POST['offset'],
            'post_type' => $_POST['post_type'],
            'tax_query' => array(
                array(
                    'taxonomy' => $_POST['taxonomy'],
                    'field' => 'term_id',
                    'terms' => $_POST['cat_id'],
                )
            )
        );
      }
    } else{
        $args = array(
            'posts_per_page' => 8,
            'paged' => $_POST['page'],
            'offset' =>  $_POST['offset'],
            'post_type' => $_POST['post_type'],
        );
    }
   	// it is always better to use WP_Query but not here
	query_posts( $args );
    $out = '';
	if( have_posts() ) :
		// run the loop
		while( have_posts() ): the_post();
        $post_type = get_post_type();
        $postid = get_the_ID();
        $post_link = get_permalink( $postid );
        $cat1 = get_the_category();
        if(!empty($cat1)){
            $currentcatslug1 = get_category_link($cat1[0]->term_id  );
        }
        $url = wp_get_attachment_url( get_post_thumbnail_id( $postid ), 'full' );
        $out .= '<div class="article-block">
                 <div class="article-block--image">
                 <a href="'.$post_link.'">';
        if (has_post_thumbnail()) {
            $out .= '<img src="'.$url.'" />';
        } else {
            $out .= '<img src="'.THEMEURI.'/assets/images/article-img.png" alt="onXRP" />';
        }
        $out .= '</a>';
        if($post_type == "podcast"){
        $out .= '<a href="'.$post_link.'" class="icon-play">
        <img src="'.THEMEURI.'/assets/images/icon-play.svg" alt="icon-play" ></a>';
        }
        $out .= '</div>
                <div class="article-block--devider"></div>';
        if($post_type == "post"){
        $out .= '<a href="'.$currentcatslug1.'">
                <div class="tags">'.$cat1[0]->cat_name.'</div>
                </a>';
        }
        $out .= '<a href="'.$post_link.'">
                <h2 class="heading-three">'.get_the_title().'</h2>
                 </a>';
        $out .= '<div class="author-name">'.get_the_author().'</div>
                 <div class="article-date">'.get_the_date().'</div>
                </div>';


		endwhile;

	endif;
	die($out); // here we exit the script and even no wp_reset_query() required!
}
add_action('wp_ajax_loadmore', 'onxrp_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'onxrp_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
