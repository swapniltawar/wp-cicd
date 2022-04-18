<?php
/**
 * The template part for the Trusted Resources.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;

$extraid      = $attributes['extraid'];

$args = array(
    'posts_per_page'   => -1,
    'post_type'   => 'trusted_resources',
    'post_status'      => 'publish',
    'orderby'          =>  'DATE',
    'order'            => 'DESC'
);

$recent_posts = get_posts( $args );
?>

<section class="partner-slider-swiper partner-slider" <?php if( !empty($extraid) ){ echo 'id="'.$extraid.'"'; }?>>
        <div class="container partner-slider--container">
            <div class="swiper partner-slider--swiper js-partnerSwiper">
                <div class="swiper-wrapper">

                <?php
    foreach ( $recent_posts as $post ){
        $post_title = get_the_title( $post );
        $post_id = get_the_id( $post );
        $featured_image = get_the_post_thumbnail_url($post, 'full');
        $redirect_link = get_permalink( $post );

    ?>

                    <div class="swiper-slide">
                        <div class="featured-projects--tile">
                            <a href="<?php echo $redirect_link ?>"><h5 class="heading-five"><?php echo $post_title; ?></h5></a>
                            <div class="tile-shape" ></div>
                            <a href="<?php echo $redirect_link ?>"  >
                              <div class="tile-image" style="background-image: url(<?php echo  $featured_image; ?>"> </div>
                            </a>
                        </div>
                    </div>

                    <?php } ?>

                </div>
            </div>
            <div class="swiper-buttons">
                <div class="next-prev">
                    <div class="swiper-button-next"><span>Next</span></div>
                    <div class="swiper-button-prev"><div class="prev-circle"></div></div>
                </div>
                <div class="pagination">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>