<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package  ONXRP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function OnXRP_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

    if (is_singular()) {
        global $post;
        $classes[] = 'page-' . $post->post_name;
    }

	return $classes;
}
add_filter( 'body_class', 'OnXRP_body_classes' );


/**
 * Add classes to the body tag in the dashboard.
 */
function  OnXRP_admin_body_class( $classes ) {

    global $pagenow;
    if(  $pagenow == 'post.php' ) {
        global $post;
        $admin_class = 'page-' . $post->post_name;
    }

    return "$classes $admin_class";
}

add_filter( 'admin_body_class', 'OnXRP_admin_body_class' );

/*
* Register Custom Post Type
*/
function onxrp_register_custom_post_init()
{
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-team-post-type.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-partner-post-type.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-team-meta.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-project-post-type.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-project-meta.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-category-meta.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-glossary-post-type.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-glossary-taxonomy.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-glossary-meta.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-podcast-post-type.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-podcast-meta.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-partner-meta.php';
    require_once THEMEPATH . '/inc/admin/post-types/onxrp-podcast-taxonomy.php';
}
add_action('init', 'onxrp_register_custom_post_init', 9);


/*
* Register Custom Fields For API
*/
add_action( 'rest_api_init', function () {

    //Register designation field for team post type
    register_rest_field( 'team', 'onxrp_team_designation', array(
        'get_callback' => function( $post_arr ) {
            return get_post_meta( $post_arr['id'], 'onxrp_team_designation', true );
        },
    ) );

    //Register linkedin field for team post type
    register_rest_field( 'team', 'onxrp_team_linkedin', array(
        'get_callback' => function( $post_arr ) {
            return get_post_meta( $post_arr['id'], 'onxrp_team_linkedin', true );
        },
    ) );

    //Register twiiter field for team post type
    register_rest_field( 'team', 'onxrp_team_twitter', array(
        'get_callback' => function( $post_arr ) {
            return get_post_meta( $post_arr['id'], 'onxrp_team_twitter', true );
        },
    ) );

    //Register author field for post post type
    register_rest_field( 'post', 'author_name', array(
        'get_callback' => function( $post_arr ) {
            $author_name = get_the_author();
            return $author_name;
        },
    ) );

    //Register first category field for post post type
    register_rest_field( 'post', 'first_category', array(
        'get_callback' => function( $post_arr ) {
            $category = get_the_category();
	        $currentcatname = $category[0]->cat_name;
            return $currentcatname;
        },
    ) );

     //Register featured image field for post post type
     register_rest_field( 'post', 'featured_image_url', array(
        'get_callback' => function( $post_arr ) {
            return  get_the_post_thumbnail_url($post_arr['id'], 'full');
        },
    ) );

    //Register redirect link field for proejct post type
    register_rest_field( 'project', 'onxrp_project_redirect', array(
        'get_callback' => function( $post_arr ) {
            return get_post_meta( $post_arr['id'], 'onxrp_project_redirect', true );
        },
    ) );

    //Register featured image field for podcast post type
    register_rest_field( 'podcast', 'featured_image_url', array(
        'get_callback' => function( $post_arr ) {
            return  get_the_post_thumbnail_url($post_arr['id'], 'full');
        },
    ) );


     //Register author field for podcast post type
     register_rest_field( 'podcast', 'author_name', array(
        'get_callback' => function( $post_arr ) {
            $author_name = get_the_author();
            return $author_name;
        },
    ) );

} );

/**
 * Add `rand` as an option for orderby param in REST API.
 * Hook to `rest_{$this->post_type}_collection_params` filter.
 *
 * @param array $query_params Accepted parameters.
 * @return array
 */
function onxrp_add_rand_orderby_rest_post_params( $query_params ) {
	$query_params['orderby']['enum'][] = 'rand';
	return $query_params;
}
add_filter( 'rest_post_collection_params', 'onxrp_add_rand_orderby_rest_post_params' );

function onxrp_remove_api_fields( $data, $post,  $request ) {

    if ($request['context'] === 'view') {
	unset( $data->data['status'],
           $data->data['date_gmt'],
           $data->data['content'],
           $data->data['guid'],
           $data->data['modified'],
           $data->data['modified_gmt'],
           $data->data['slug'],
           $data->data['comment_status'],
           $data->data['ping_status'],
           $data->data['sticky'],
           $data->data['template'],
           $data->data['format'],
           $data->data['meta'],
           $data->data['tags'],
           $data->data['acf'],

         );
         foreach($data->get_links() as $_linkKey => $_linkVal) {
            $data->remove_link($_linkKey);
        }
    }

	return $data;
}
 add_filter( 'rest_prepare_post', 'onxrp_remove_api_fields', 10, 3 );


function onxrp_encrypt_decrypt($stringToHandle,$encryptDecrypt){
    $output = null;
    // Set secret keys
    $secret_key = AUTH_KEY;
    $secret_iv = SECURE_AUTH_KEY;
    $key = hash('sha256',$secret_key);
    $iv = substr(hash('sha256',$secret_iv),0,16);
    // Check encryption or decryption
    if($encryptDecrypt == 'e'){
       // encrypting
       $output = base64_encode(openssl_encrypt($stringToHandle,"AES-256-CBC",$key,0,$iv));
    }else if($encryptDecrypt == 'd'){
       // decrypting
       $output = openssl_decrypt(base64_decode($stringToHandle),"AES-256-CBC",$key,0,$iv);
    }

    return $output;
}


// mailchimp scripts
function mailchimp_scripts(){
    wp_enqueue_script( 'mail-chimp-script', STYLESHEETURI. '/assets/js/website/mailchimp.js', array( 'jquery' ) );
    wp_localize_script( 'mail-chimp-script', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'mailchimp_scripts' );

add_action('wp_ajax_mail_chimp_submit', 'mail_chimp_submit');
add_action('wp_ajax_nopriv_mail_chimp_submit', 'mail_chimp_submit');


function mail_chimp_submit()
{
    $email   = $_POST['email'];
    $type    = $_POST['type'];
    $api_key = get_theme_mod('footer_mailchimp_api_key');

    if($type == 'brandguide')
    {
        $list_id         = $listId = onxrp_encrypt_decrypt($_POST['linkid'],'d');
        $success_message = 'downloadguide';
    }
    else
    {
        $list_id         = get_theme_mod('footer_mailchimp_list_id');
        $success_message_hold = get_theme_mod('footer_success_message') ? get_theme_mod('footer_success_message') : 'Subscribed Successfully';
        $success_message = '<div class="thank-you-message">
        <p>'.$success_message_hold.'</p>
        </div>';
    }

    if(empty($api_key) || empty($list_id))
    {

        $result= '<span class="form-validation error">Please Set API Key or List Id</span>';
    }
    else {

    $data_center = substr($api_key,strpos($api_key,'-')+1);

    $url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members';

    $json = json_encode([
        'email_address' => $email,
        'status'        => 'subscribed',
    ]);

    try {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $f_result = json_decode($result, true);
        if (200 == $status_code) {

            $result = $success_message;

        }
        else{
            $result = '<span class="form-validation error">'.$f_result['title'].'<span>';

        }
    } catch(Exception $e) {
        $result = $e->getMessage();

    }
}
  echo $result;
  die();
}