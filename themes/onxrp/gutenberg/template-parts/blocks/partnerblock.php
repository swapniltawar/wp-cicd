<?php
/**
 * The template part for the Partner block.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;
$sectionText = $attributes['sectionText'] ? $attributes['sectionText'] : 'Partners';
$slides = $attributes['partnerlist'];
?>
  <section class="partner-slider  partner-slider-swiper title-right">
    <div class="container">
            <div class="article-title d-flex align-items-center">
            <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" />
                <?php echo esc_attr($sectionText); ?>
            </div>
          </div>
         <div class="container partner-slider--container">

         <div class="swiper partner-slider--swiper js-partnerSwiper">
         <div class="swiper-wrapper">

            <?php if(! empty($slides) ) {
                foreach ($slides as $key => $slide) {
            ?>
            <div class="swiper-slide">
            <div class="featured-projects--tile">
                <a href="<?php  echo esc_attr($slide['linkUrl']); ?>"  <?php if($slide['newTab']) {?>target="_blank" <?php } ?>><h5 class="heading-five"><?php echo esc_attr($slide['title']); ?></h5></a>
                <div class="tile-shape rellax" data-rellax-speed="2" data-rellax-xs-speed=".5" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed=".7"></div>
                <a href="<?php  echo esc_attr($slide['linkUrl']); ?>"  <?php if($slide['newTab']) {?>target="_blank" <?php } ?>><div class="tile-image" style="background-image: url(<?php echo esc_url($slide['imageUrl']); ?>)"></div></a>
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
