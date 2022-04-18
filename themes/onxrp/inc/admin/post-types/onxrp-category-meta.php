<?php
/**
 *Custom fields for project member post type
 */
function onxrp_meta_box_markup( )
{
    global $post;
    $onxrp_category       = get_post_meta( $post->ID, 'onxrp_category', true );

    ?>
        <div>
            <label for="onxrp_category">Select Category</label> <br/><br/>
            <select name="onxrp_category">
                <?php
                $categories = get_categories();
                foreach($categories as $category) { ?>
                <option value="<?php echo $category->term_id;?>" <?php if($category->term_id == $onxrp_category){echo "selected";}?>> <?php echo $category->name ; ?> </option>
                <?php  } ?>

            </select>

        </div>
    <?php
}

function onxrp_category_meta_box()
{
	global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'category-page.php' )
        {
    		add_meta_box( 'onxrp_category_meta_box', 'Category', 'onxrp_meta_box_markup', 'page', 'side', 'high' );
		}
	}
}
add_action( 'add_meta_boxes', 'onxrp_category_meta_box' );


function onxrp_meta_box_save( )
{
    global $post;

    if( isset( $_POST['onxrp_category'] ) )
    {
        update_post_meta( $post->ID, 'onxrp_category',esc_attr( $_POST['onxrp_category'] ) );
    }

}

add_action( 'save_post', 'onxrp_meta_box_save' );