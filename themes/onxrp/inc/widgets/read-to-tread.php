<?php
/**
 * Ready to Trade Widget Class
 * php version 7.4
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */


class ready_to_tread_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        'ready_to_tread_widget',
        __('Ready to Trade Widget', 'onxrp'),
        array( 'description' => __( 'Ready to Trade Image and Text widget', 'onxrp' ), )
        );
    }


    function widget($args, $instance) {
        echo $args['before_widget'];
    ?>
        <div class="rhs__block">
            <div class="single-article">
                <div class="featured-article">
                    <div class="featured-article--content">
                        <div class="image">
                            <div class="image--oval-shape"></div>
                            <div class="image--wrapper" style="background-image: url(<?php echo esc_url($instance['image_uri']); ?>)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="heading-three">
                <?php echo wp_kses_post( $instance['title'] ); ?>
            </h3>
            <?php if(!empty($instance['button_text']) && !empty($instance['button_link'])) { ?>
                <a href="<?php echo esc_url( $instance['button_link'] ); ?>" class="btn btn--gradient">
                    <?php echo wp_kses_post( $instance['button_text'] ); ?>
                </a>
            <?php } ?>
        </div>
    <?php
        echo $args['after_widget'];
    }
//Ready to Trade?
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['button_text'] = strip_tags( $new_instance['button_text'] );
        $instance['button_link'] = strip_tags( $new_instance['button_link'] );
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        return $instance;
    }

    function form($instance) {
    ?>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br />
        <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title'] ?? 'Ready to Trade?'; ?>" class="widefat" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('button_text'); ?>">Button Text</label><br />
        <input type="text" name="<?php echo $this->get_field_name('button_text'); ?>" id="<?php echo $this->get_field_id('button_text'); ?>" value="<?php echo $instance['button_text'] ?? 'Access the Dex'; ?>" class="widefat" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('button_link'); ?>">Button Link</label><br />
        <input type="text" name="<?php echo $this->get_field_name('button_link'); ?>" id="<?php echo $this->get_field_id('button_link'); ?>" value="<?php echo $instance['button_link'] ?? '#'; ?>" class="widefat" />
    </p>
    <p>
        <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Image</label>
        <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
        <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri'] ?? ''; ?>" style="margin-top:5px;" />
        <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
    </p>
    <?php
    }
}
