<?php
/**
 * The template part for the App block.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;
$sectionText = $attributes['sectionText'] ? $attributes['sectionText'] : 'OUR APPS';
$slides = $attributes['applist'];
?>

<section class="sub-articles sub-articles-full app-articles">
    <div class="sub-articles--container container">
        <div class="article-title d-flex align-items-center">
            <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /> <?php echo esc_attr($sectionText); ?>
        </div>
        <div class="sub-articles--content d-flex">
            <div class="sub-articles--column d-flex">

            <?php if(! empty($slides) ) {
                  foreach ($slides as $key => $slide) { ?>

           <div class="article-block <?php if($slide['comingSoon']) { echo 'coming-soon-wrapper'; }?>">
                    <div class="article-block--image">
                    <div class="tile-shape rellax" data-rellax-speed="1" data-rellax-xs-speed=".7" data-rellax-mobile-speed=".7" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="1"></div>
                    <?php if($slide['comingSoon']) {?>
                        <img src="<?php echo esc_url($slide['imageUrl']); ?>" alt="onXRP" />
                        <div class="coming-soon-overlay"></div>
                        <div class="coming-soon">
                            <p>Coming Soon</p>
                        </div>
                    <?php } else { ?>
                        <a href="<?php  echo esc_attr($slide['linkUrl']); ?>" <?php if($slide['newTab']) {?>target="_blank" <?php } ?>>
                        <img src="<?php echo esc_url($slide['imageUrl']); ?>" alt="onXRP" />
                        </a>
                    <?php } ?>
                    </div>

                    <?php if($slide['comingSoon']) {?>
                    <h2 class="heading-three">
                    <?php echo esc_attr($slide['title']); ?> <span class="arrow is-top"></span>
                    </h2>
                    <?php } else { ?>
                     <a href="<?php  echo esc_attr($slide['linkUrl']); ?>" <?php if($slide['newTab']) {?>target="_blank" <?php } ?> class="heading-three">
                    <?php echo esc_attr($slide['title']); ?> <span class="arrow is-top"></span>
                    </a>
                    <?php } ?>
                    <p class="article-text">
                    <?php echo esc_attr($slide['subTitle']); ?>
                    </p>
                </div>

                <?php }
                } ?>
                <!-- Blank div -->
                <div class="article-block no-data"></div>
                <div class="article-block no-data"></div>
            </div>
        </div>
    </div>
</section>
