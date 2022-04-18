<?php
/**
 * The template part for the Hero block.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;

$slides = $attributes['slides'];
?>

<section class="partner-slider">
    <div class="container partner-slider--container">
        <div class="swiper partner-slider--swiper js-partnerSwiper">
            <div class="swiper-wrapper">
                <?php if(! empty($slides) ) {
                    foreach ($slides as $key => $slide) {
                    ?>
                    <div class="swiper-slide">
                        <div class="featured-projects--tile">
                            <h5 class="heading-five"><?php echo esc_attr($slide['title']); ?></h5>
                            <div class="tile-shape"></div>
                            <div class="tile-image" style="background-image: url(<?php echo esc_url($slide['imageUrl']); ?>)">
                            </div>
                        </div>
                    </div>
                <?php }
                } ?>
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
