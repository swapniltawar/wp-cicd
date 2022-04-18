<?php
/**
 * Custom fields for Pdcast
 */
function onxrp_podcast_meta_box_markup( )
{
    global $post;
    $onxrp_podcast_video_url       = get_post_meta( $post->ID, 'onxrp_podcast_video_url', true );
    ?>
        <div>
            <label for="onxrp_podcast_video_url">Featured Url</label> <br/><br/>
            <input name="onxrp_podcast_video_url" type="text" value="<?php echo esc_attr( $onxrp_podcast_video_url );?>">
        </div>
    <?php
}

function onxrp_podcast_video_url_meta_box()
{
	add_meta_box( 'onxrp_podcast_video_url_meta_box', 'Featured Video Url', 'onxrp_podcast_meta_box_markup', 'podcast', 'side', 'high' );

}
add_action( 'add_meta_boxes', 'onxrp_podcast_video_url_meta_box' );

function onxrp_podcast_meta_box_save( )
{
    global $post;

    if( isset( $_POST['onxrp_podcast_video_url'] ) )
    {
        update_post_meta( $post->ID, 'onxrp_podcast_video_url', esc_attr( $_POST['onxrp_podcast_video_url'] ) );
    }

}

add_action( 'save_post', 'onxrp_podcast_meta_box_save' );

function onxrp_podcast_latest_caption_meta_box_markup( )
{
    global $post;
    $onxrp_podcast_latest_episode_caption       = get_post_meta( $post->ID, 'onxrp_podcast_latest_episode_caption', true );
    ?>
        <div>
            <label for="onxrp_podcast_latest_episode_caption">Latest Episode Caption</label> <br/><br/>
            <input name="onxrp_podcast_latest_episode_caption" type="text" value="<?php echo esc_attr( $onxrp_podcast_latest_episode_caption );?>">
        </div>
    <?php
}

function onxrp_podcast_latest_episode_caption_meta_box()
{
	add_meta_box( 'onxrp_podcast_latest_episode_caption_meta_box', 'Latest Episode Caption', 'onxrp_podcast_latest_caption_meta_box_markup', 'podcast', 'side', 'high' );

}
add_action( 'add_meta_boxes', 'onxrp_podcast_latest_episode_caption_meta_box' );

function onxrp_podcast_latest_episode_caption_meta_box_save( )
{
    global $post;

    if( isset( $_POST['onxrp_podcast_latest_episode_caption'] ) )
    {
        update_post_meta( $post->ID, 'onxrp_podcast_latest_episode_caption', esc_attr( $_POST['onxrp_podcast_latest_episode_caption'] ) );
    }

}

add_action( 'save_post', 'onxrp_podcast_latest_episode_caption_meta_box_save' );