<?php
/**
 * New NFT Glossary Widget Class
 * php version 7.4
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */


class new_nft_glossary_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        'new_nft_glossary_widget',
        __('New NFT Glossary Widget', 'onxrp'),
        array( 'description' => __( 'OnXRP new glossary', 'onxrp' ), )
        );
    }


    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) ){
            echo $args['before_title'] . '<span class="aside-title">' . $title . '</span>' . $args['after_title'];
        }

        $newArticles = get_posts(
            array(
                'numberposts'      => 6,
                'orderby'          => 'date',
                'order'            => 'DESC',
                'post_type'        => 'glossary',
            )
        );

        foreach ($newArticles as $key => $article) {
            $excerpt = wp_trim_words($article->post_excerpt, 20);
            ?>
            <div class="rhs__block">
                <a href="<?php echo esc_url(get_permalink($article->ID)) ?>" >
                    <h3 class="heading-three">
                        <?php echo wp_kses_post($article->post_title); ?>
                    </h3>
                </a>
                <p><?php echo wp_kses_post($excerpt);?></p>
                <a href="<?php echo esc_url(get_permalink($article->ID)) ?>" class="read-more-link"><?php echo wp_kses_post("Read more >");?></a>
            </div>

        <?php }

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New NFT Glossary', 'onxrp' );
        }
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat"
                id="<?php echo $this->get_field_id( 'title' ); ?>"
                name="<?php echo $this->get_field_name( 'title' ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}
