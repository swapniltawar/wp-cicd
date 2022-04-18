<?php
/**
 * Custom fields for NFT Glossary page
 */
function onxrp_glossary_meta_box_markup( )
{
    global $post;
    $onxrp_glossary_tag       = get_post_meta( $post->ID, 'onxrp_glossary_tag', true );
    ?>
        <div>
            <label for="onxrp_glossary_tag">Glossary Terms</label> <br/><br/>
            <input name="onxrp_glossary_tag" type="text" value="<?php echo esc_attr( $onxrp_glossary_tag );?>">
        </div>
    <?php
}

function onxrp_glossary_tag_meta_box()
{
	global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'nft-glossary.php' )
        {
    		add_meta_box( 'onxrp_glossary_tag_meta_box', 'NFT Glossary', 'onxrp_glossary_meta_box_markup', 'page', 'side', 'high' );
		}
	}
}
add_action( 'add_meta_boxes', 'onxrp_glossary_tag_meta_box' );

function onxrp_glossary_meta_box_save( )
{
    global $post;

    if( isset( $_POST['onxrp_glossary_tag'] ) )
    {
        update_post_meta( $post->ID, 'onxrp_glossary_tag',esc_attr( $_POST['onxrp_glossary_tag'] ) );
    }

}

add_action( 'save_post', 'onxrp_glossary_meta_box_save' );